<?php

// Filename: /module/Blog/config/module.config.php
return array(
    'db' => array(
        'driver'         => 'Pdo',
        'username'       => 'root',  //edit this
        'password'       => '',  //edit this
        'dsn'            => 'mysql:dbname=contestweb;host=localhost',
        'driver_options' => array(
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
        )
    ),
     'service_manager' => array(
         'factories' => array(
             'Forum\Mapper\PageMapperInterface'   => 'Forum\Factory\ZendDbSqlMapperFactory',
             'Forum\Service\PageServiceInterface' => 'Forum\Factory\PageServiceFactory',
             'Zend\Db\Adapter\Adapter'           => 'Zend\Db\Adapter\AdapterServiceFactory',
             'Forum\Service\UserService' => 'Forum\Factory\UserServiceFactory',
         )
     ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    
    // This lines opens the configuration for the RouteManager
     'controllers' => array(
             'factories' => array(
             'Forum\Controller\Page' => 'Forum\Factory\PageControllerFactory',
                 'Forum\Controller\User'=>'Forum\Factory\UserControllerFactory',
         )
        ),
    'router' => array(
        // Open configuration for all possible routes
        'routes' => array(
            // Define a new route called "post"
            'page' => array(
                // Define the routes type to be "Zend\Mvc\Router\Http\Literal", which is basically just a string
                'type' => 'literal',
                // Configure the route itself
                'options' => array(
                    // Listen to "/blog" as uri
                    'route'    => '/forum',
                    // Define default controller and action to be called when this route is matched
                    'defaults' => array(
                        'controller' => 'Forum\Controller\Page',
                        'action'     => 'index',
                    )
                )
            ),
            'register'=>array(
                'type' => 'literal',
                'options' => array(
                    // Listen to "/blog" as uri
                    'route'    => '/register',
                    // Define default controller and action to be called when this route is matched
                    'defaults' => array(
                        'controller' => 'Forum\Controller\User',
                        'action'     => 'register',
                    )
                )
            ),
            'test'=>array(
                'type' => 'literal',
                'options' => array(
                    // Listen to "/blog" as uri
                    'route'    => '/test',
                    // Define default controller and action to be called when this route is matched
                    'defaults' => array(
                        'controller' => 'Forum\Controller\User',
                        'action'     => 'test',
                    )
                )
            ),
            'login'=>array(
                'type' => 'literal',
                'options' => array(
                    // Listen to "/blog" as uri
                    'route'    => '/login',
                    // Define default controller and action to be called when this route is matched
                    'defaults' => array(
                        'controller' => 'Forum\Controller\User',
                        'action'     => 'login',
                    )
                )
            )
        )
    )
);