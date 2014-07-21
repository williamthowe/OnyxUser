<?php
return array(
    
    'user_settings' => array(
        'static_salt' => '94ae2c097990e9c777333e6af0c805ad',
        'auth_table' => 'user',
        'credential_column' => 'password',
        'identity_column' => 'email',
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
                        'id'     => '[0-9]+',
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
            'user' => __DIR__ . '/../view',
        ),
    ),
);