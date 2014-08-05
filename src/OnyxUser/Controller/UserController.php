<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace OnyxUser\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use OnyxSystem\DataFunctions;

class UserController extends AbstractActionController
{
    protected $userTable;
    protected $_createUserForm;
    protected $eventIdentifier = 'Onyx\Service\EventManger';
    
    public function onDispatch( \Zend\Mvc\MvcEvent $e ){
        $this->layout('layout/onyx_user');
        
        return parent::onDispatch($e);
    }
    
    public function indexAction()
    {
        $OnyxAcl = $this->getServiceLocator()->get('OnyxAcl');
        $ident = $OnyxAcl->getIdentity();
        
        return new ViewModel(array('ident' => $ident));
    }
    
    public function addAction()
    {
        $form = $this->_getCreateUserForm();
        $sm = $this->getServiceLocator();
        $user = $sm->get('OnyxUser');        
        $form->bind($user);
        $messages = array();
        
        if ($this->request->isPost()) {
            $postData = $this->request->getPost();
            
            //Check that the email address exists in the database
            $validator = new \Zend\Validator\Db\NoRecordExists(
                array(
                    'table'   => 'user',
                    'field'   => 'email',
                    'adapter' => $sm->get('Zend\Db\Adapter\Adapter'),
                )
            );  

            if ($validator->isValid($postData->User['email']) === FALSE) {
                // email address is invalid; print the reasons
                $messages['email'] = array('Email already exists');
                return new ViewModel(array('form' => $form, 'messages' => $messages));
            }
            
            
            $config = $sm->get('config');
            
            $form->setData($postData);
            if ($form->isValid() === FALSE) {
                $messages = $form->getMessages();
                return new ViewModel(array('form' => $form, 'messages' => $messages));                
            }else{
                try{
                    if($config['onyx_user']['double_opt_in']){
                        $user->setIsactive(false);
                    }else{
                        $user->setIsactive(true);
                    }   
                    $user->setRole($config['onyx_user']['default_role']);
                    $this->getUserTable()->save($user);
                    $this->getEventManager()->trigger('newUserAdded', null, $postData);
                }catch(\Exception $e){
                    $this->getEventManager()->trigger('logError', null, array("name" => "Error saving user -> OU-UC-ADD01", "message" => $e->getMessage(), "data" => $postData));
                }
                
                $this->renderer = $this->getServiceLocator()->get('ViewRenderer');  
                if($config['onyx_user']['double_opt_in']){
                    $token = $this->getUserTable()->setNewToken($user);
                    $confirmLink = $config['site_settings']['site_url'] . '/user/confirm/' . $token;
                    $content = $this->renderer->render($config['onyx_user']['welcome_template_double_opt'], array('firstName' => $user->getFirstname(), 'lastName' => $user->getLastname(), "confirmLink" => $confirmLink));                      
                }else{
                    $content = $this->renderer->render($config['onyx_user']['welcome_template'], array('firstName' => $user->getFirstname(), 'lastName' => $user->getLastname()));  
                }
                $this->getEventManager()->trigger('sendMessage', null, array(
                    "to" => array($user->getEmail(), $user->getFirstname() . " " . $user->getLastname()),
                    "subject" => $config['onyx_user']['welcome_subject'],
                    "body" => $content,
                    ));                
                
                return $this->redirect()->toUrl('/user/success');
            }
        }

        return new ViewModel(array('form' => $form, 'messages' => $messages));
    }
    
    public function successAction()
    {
    }
    
    public function confirmAction(){
        $token = (string)$this->params('id');
        if($token == null){
            return new ViewModel(array('success' => false));
        }
        $user = $this->getUserTable()->getByToken($token);
        if($user === false){
            return new ViewModel(array('success' => false));
        }
        $sm = $this->getServiceLocator();
        $config = $sm->get('config');
                
        if(strtotime($user->tokenexpire) < strtotime($config['onyx_user']['token_expire'])){
            return new ViewModel(array('success' => false));
        }
        $user->setIsactive(true);
        $user->setTokenexpire(date('Y-m-d H:i:s', strtotime('-1 year')));
        $this->getUserTable()->save($user);
        return new ViewModel(array('success' => true));;
    }
    
    public function resetAction(){
        $token = (string)$this->params('id');
        if($token == null){
            return new ViewModel(array('success' => false, 'done' => false));
        }
        $user = $this->getUserTable()->getByToken($token);
        if($user === false){
            return new ViewModel(array('success' => false, 'done' => false));
        }
        $sm = $this->getServiceLocator();
        $config = $sm->get('config');

        if(strtotime($user->tokenexpire) < strtotime($config['onyx_user']['token_expire'])){
            return new ViewModel(array('success' => false, 'done' => false));
        }
        
        if ($this->request->isPost()) {
            $data = $this->request->getPost(); 
            if(isset($data['password']) && isset($data['password-repeat'])){
                if($data['password'] == $data['password-repeat']){
                    $user->setPassword($data['password']);
                    $user->setTokenexpire(date('Y-m-d H:i:s', strtotime('-1 year')));
                    $this->getUserTable()->save($user);
                    return new ViewModel(array('success' => true, 'done' => true));
                }
                
            }
            return new ViewModel(array('success' => true, 'message' => 'password invalid', 'done' => false));
        }
           
        return new ViewModel(array('success' => true, 'done' => false));
    }

    public function editAction()
    {
        $id = (int)$this->params('id');
        if (!$id) {
            return $this->redirect()->toRoute('user', array(
                'action' => 'add'
            ));
        }
        
        $sm = $this->getServiceLocator();  
        $messages = array();
        $form = $this->_getCreateUserForm(); 
        $user = $this->getUserTable()->getById($id);
        if($user === false){
             $messages[] = "no user with that id found";
             return $this->redirect()->toRoute('user', array(
                'action' => 'add'
            ));     
        }
        $form->bind($user);
        $form->get('submit')->setAttribute('value', 'Edit');
        
        
        if ($this->request->isPost()) {
            $postData = $this->request->getPost();
                        
            $form->setData($postData);
            if ($form->isValid() === FALSE) {
                $messages = $form->getMessages();
                return new ViewModel(array('form' => $form, 'messages' => $messages));                     
            }else{
                try{
                    $this->getUserTable()->save($user);
                    $this->getEventManager()->trigger('userEditied', null, $postData);
                }catch(Exception $e){
                    $this->getEventManager()->trigger('logError', null, array("name" => "Error saving user -> OU-UC-EDIT01", "message" => $e->getMessage(), "data" => $postData));
                }
                return $this->redirect()->toUrl('/user/success');
            }
        }

        return new ViewModel(array('form' => $form, 'messages' => $messages));
    }

    public function deleteAction()
    {
    }
    
    public function forgotPasswordAction(){   
        if ($this->request->isPost()) {
            $data = $this->request->getPost();   
            $email = $data['email'];        
            if (!$email) {
                return new ViewModel(array('message' => "no user found", 'posted' => false));
            }else{
                $user = $this->getUserTable()->getByEmail($email);
                if($user === false){
                    return new ViewModel(array('message' => "no user found", 'posted' => false));
                }else{
                    $token = $this->getUserTable()->setNewToken($user);
                    $config = $this->getServiceLocator()->get('config');

                    $resetLink = $config['site_settings']['site_url'] . '/user/reset/' . $token;            

                    $this->renderer = $this->getServiceLocator()->get('ViewRenderer');  
                    $content = $this->renderer->render($config['onyx_user']['reset_email_template'], array('firstname' => $user->getFirstname(), 'lastname' => $user->getLastname(),'sitename' => $config['site_settings']['site_name'], "resetLink" => $resetLink));                      

                                   
                    $this->getEventManager()->trigger('sendMessage', null, array(
                        "to" => array($user->email, $user->firstname . ' ' . $user->lastname),
                        "subject" => "Password reset",
                        "body" => $content,
                        ));

                    return new ViewModel(array('message' => "", 'posted' => true));
                }
            }
        }
        return new ViewModel(array('message' => "", 'posted' => false));
    }
    
    public function logoutAction(){
        $OnyxAcl = $this->getServiceLocator()->get('OnyxAcl');
        $config = $this->getServiceLocator()->get('config');
        $OnyxAcl->logout();
        return $this->redirect()->toRoute($config['onyx_acl']['logout_route']);
    }

    public function loginAction(){
        $backto = $this->params()->fromQuery('backto');
        $messages = array();
        $OnyxAcl = $this->getServiceLocator()->get('OnyxAcl');
        $config = $this->getServiceLocator()->get('config');
        if($OnyxAcl->checkAuth()){
            // logged in redirect to where wanted              
            $this->redirect()->toRoute($config['onyx_acl']['login_route']);
        }
        if ($this->request->isPost()) {
            $data = $this->request->getPost();           
            
            if($OnyxAcl->authenticate($data)){
                $ident = DataFunctions::objectToArray($OnyxAcl->getIdentity());
                $this->getUserTable()->updateLogin($ident['id']);
                    if(isset($data['backto'])){
                       $router = $this->getServiceLocator()->get('Router');                       
                       if($router->hasRoute($data['backto'])){
                            $this->redirect()->toRoute($data['backto']);
                        }else{
                            $this->redirect()->toRoute($config['onyx_acl']['login_route']);
                        }
                    }else{
                        $this->redirect()->toRoute($config['onyx_acl']['login_route']);
                    }
                
            }else{
                $messages[] = $OnyxAcl->message;
            }  
                    
        }
        return new ViewModel(array('messages' => $messages, 'backto' => $backto));
    }

    public function getUserTable(){
        if (!$this->userTable) {
            $sm = $this->getServiceLocator();
            $this->userTable = $sm->get('OnyxUserTable');
        }
        return $this->userTable;
    }
    
    

    protected function _getCreateUserForm()
    {
        if (!$this->_createUserForm) {
            $this->_setCreateUserForm(
                $this->getServiceLocator()->get('contentuser_create_user_form')
            );
        }
        return $this->_createUserForm;
    }

    protected function _setCreateUserForm(\Zend\Form\Form $createUserForm)
    {
        $this->_createUserForm = $createUserForm;
    }
}
