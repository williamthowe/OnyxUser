<?php
namespace OnyxUser;

use OnyxUser\Model\User;
use OnyxUser\Model\UserTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use OnyxAcl\Acl as OnyxAcl;

class Module
{
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
    
    public function getServiceConfig()
    {
        return array(
            'factories' => array(                      
                'OnyxAcl' => function($sm){
                    return new OnyxAcl($sm);
                },
                'OnyxUser' =>  function($sm) {
                    $config = $sm->get('Config');
                    $user = new User();
                    $user->setStaticSalt($config['onyx_user']['static_salt']);
                    return $user;
                },
                'OnyxUserTable' =>  function($sm) {
                    $tableGateway = $sm->get('OnyxUserTableGateway');
                    $table = new UserTable($tableGateway);
                    return $table;
                },
                'OnyxUserTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype($sm->get('OnyxUser'));
                    return new TableGateway('user', $dbAdapter, null, $resultSetPrototype);
                },
                'contentuser_create_user_form' => function($sm) {
                    $form = new Form\UserForm();
                    return $form;
                },        
            ),
            
        );
    }
}
