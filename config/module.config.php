<?php
return array(
    
    'onyx_user' => array(
        'static_salt' => '94ae2c097990e9c777333e6af0c805ad',
        'auth_table' => 'user',
        'credential_column' => 'password',
        'identity_column' => 'email',
        'double_opt_in' => true,
        'welcome_template' => 'onyx-user/email/tpl/welcome-email',
        'welcome_template_double_opt' => 'onyx-user/email/tpl/welcome-email-double',
        'welcome_subject' => 'Welcome to the site',
        'reset_email_template' => 'onyx-user/email/tpl/reset-email',
        'token_expire' => '-3 hour',
        'default_role' => 'guest',
    ),
    
    'controllers' => array(
        'invokables' => array(
            'OnyxUser\Controller\User' => 'OnyxUser\Controller\UserController',
        ),
    ),
        // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'user' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/user[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        'controller' => 'OnyxUser\Controller\User',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'onyx_user' => __DIR__ . '/../view',            
        ),
        'template_map' => array(
            'layout/onyx_user'    => __DIR__ . '/../view/layout/onyx_user.phtml',
        ),
    ),
);