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
                $messages[] = 'Email already exists';
                return new ViewModel(array('form' => $form, 'messages' => $messages));
            }
            
            
            $form->setData($postData);
            if ($form->isValid() === FALSE) {
                foreach($form->getElements() as $element){
                    \Zend\Debug\Debug::dump($element);
                }
                $messages[] = 'Form has invalid data';
                return new ViewModel(array('form' => $form, 'messages' => $messages));                
            }else{
                try{
                    $this->getUserTable()->save($user);
                }catch(\Exception $e){
                    echo $e->getMessage();
                }
                return $this->redirect()->toUrl('/user/success');
            }
        }

        return new ViewModel(array('form' => $form, 'messages' => $messages));
    }
    
    public function successAction()
    {
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
                foreach($form->getElements() as $element){
                    \Zend\Debug\Debug::dump($element);
                }
                $messages[] = 'Form has invalid data';
                return new ViewModel(array('form' => $form, 'messages' => $messages));                
            }else{
                try{
                    $this->getUserTable()->save($user);
                }catch(Exception $e){
                    echo $e->getMessage();
                }
                return $this->redirect()->toUrl('/user/success');
            }
        }

        return new ViewModel(array('form' => $form, 'messages' => $messages));
    }

    public function deleteAction()
    {
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