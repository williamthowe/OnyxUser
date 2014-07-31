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
    
    public function indexAction()
    {
        return new ViewModel();
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
                    $this->getUserTable()->save($user);
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
        $id = (int)$this->params('id');
        if (!$id) {
            return new ViewModel(array('message' => "no user found"));
        }else{
            $user = $this->getUserTable()->getById($id);
            $token = $this->getUserTable()->setNewToken($user);
            $config = $this->getServiceLocator()->get('config');
            
            
            $this->renderer = $this->getServiceLocator()->get('ViewRenderer');  
            $content = $this->renderer->render('onyx-user/email/tpl/forgot-password', array('firstname' => $user->firstname, 'lastname' => $user->lastname, 'email' => $user->email, 'token' => $token, 'sitename' => $config['site_setings']['site_name'], 'siteurl' => $config['site_setings']['site_url']));  
            $this->getEventManager()->trigger('sendMessage', null, array(
                "to" => array($user->email, $user->firstname . ' ' . $user->lastname),
                "subject" => "Password reset",
                "body" => $content,
                ));
            
            return new ViewModel(array('message' => "reset email sent"));
        }
    }
    
    public function logoutAction(){
        $OnyxAcl = $this->getServiceLocator()->get('OnyxAcl');
        $OnyxAcl->logout();
        return $this->redirect()->toRoute('home');
    }

    public function loginAction(){
        $messages = array();
        $OnyxAcl = $this->getServiceLocator()->get('OnyxAcl');
        $config = $this->getServiceLocator()->get('config');
        if($OnyxAcl->checkAuth()){
            // logged in redirect to where wanted            
            $this->redirect()->toRoute($config['aclSettings']['loginRoute']);
        }
        if ($this->request->isPost()) {
            $data = $this->request->getPost();
            
            if($OnyxAcl->authenticate($data)){
                $data = DataFunctions::objectToArray($OnyxAcl->getIdentity());
                $this->getUserTable()->updateLogin($data['id']);
                $this->redirect()->toRoute($config['aclSettings']['loginRoute']);
            }else{
                $messages[] = $OnyxAcl->message;
            }  
                    
        }
        return new ViewModel(array('messages' => $messages));
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
