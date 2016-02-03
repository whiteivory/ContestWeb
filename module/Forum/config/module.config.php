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
             'Forum\Service\FollowServiceInterface'=>'Forum\Factory\FollowServiceFactory',
             'Forum\Mapper\FollowMapperInterface'=>'Forum\Factory\FollowMapperFactory',
             'Forum\Mapper\RecruitMapperInterface'   => 'Forum\Factory\RecruitMapperFactory',
             'Forum\Service\RecruitServiceInterface' => 'Forum\Factory\RecruitServiceFactory',
             'Forum\Service\RFollowServiceInterface'=>'Forum\Factory\RFollowServiceFactory',
             'Forum\Mapper\RFollowMapperInterface'=>'Forum\Factory\RFollowMapperFactory',
              
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
             'Forum\Controller\Follow'=>'Forum\Factory\FollowControllerFactory',
             'Forum\Controller\Recruit'=>'Forum\Factory\RecruitControllerFactory',
             'Forum\Controller\RFollow'=>'Forum\Factory\RFollControllerFactory',
             'Forum\Controller\PRecruit'=>'Forum\Factory\PRecruitControllerFactory',
             'Forum\Controller\PRFollow'=>'Forum\Factory\PRFollControllerFactory',
         )
        ),
    'router' => array(
        // Open configuration for all possible routes
        'routes' => array(
            // Define a new route called "post"
            'account' => array(
                // Define the routes type to be "Zend\Mvc\Router\Http\Literal", which is basically just a string
                'type' => 'literal',
                // Configure the route itself
                'options' => array(
                    // Listen to "/blog" as uri
                    'route'    => '/account',
                    // Define default controller and action to be called when this route is matched
                    'defaults' => array(
                        'controller' => 'Forum\Controller\User',
                        'action'     => 'index',
                    )
                ),
                'may_terminate' => true,
                'child_routes'  => array(
                    'detail' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route'    => '/:id',
                            'defaults' => array(
                                'controller' => 'Forum\Controller\User',
                                'action' => 'index'
                            ),
                            'constraints' => array(
                                'id' => '[1-9]\d*'
                            )
                        )
                    )
                )
            ),
            'page' => array(
                // Define the routes type to be "Zend\Mvc\Router\Http\Literal", which is basically just a string
                'type' => 'literal',
                // Configure the route itself
                'options' => array(
                    // Listen to "/blog" as uri
                    'route'    => '/page',
                    // Define default controller and action to be called when this route is matched
                    'defaults' => array(
                        'controller' => 'Forum\Controller\Page',
                        'action'     => 'index',
                    )
                ),
                'may_terminate' => true,
                'child_routes'  => array(
                    'detail' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route'    => '/:id',
                            'defaults' => array(
                                'controller' => 'Forum\Controller\Follow',
                                'action' => 'detail'
                            ),
                            'constraints' => array(
                                'id' => '[1-9]\d*'
                            )
                        )
                    )
                )
            ),
            'recruit' => array(
                // Define the routes type to be "Zend\Mvc\Router\Http\Literal", which is basically just a string
                'type' => 'literal',
                // Configure the route itself
                'options' => array(
                    // Listen to "/blog" as uri
                    'route'    => '/recruit',
                    // Define default controller and action to be called when this route is matched
                    'defaults' => array(
                        'controller' => 'Forum\Controller\Recruit',
                        'action'     => 'index',
                    )
                ),
                'may_terminate' => true,
                'child_routes'  => array(
                    'detail' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route'    => '/:id',
                            'defaults' => array(
                                'controller' => 'Forum\Controller\RFollow',
                                'action' => 'detail'
                            ),
                            'constraints' => array(
                                'id' => '[1-9]\d*'
                            )
                        )
                    )
                )
            ),
            'precruit' => array(
                // Define the routes type to be "Zend\Mvc\Router\Http\Literal", which is basically just a string
                'type' => 'literal',
                // Configure the route itself
                'options' => array(
                    // Listen to "/blog" as uri
                    'route'    => '/precruit',
                    // Define default controller and action to be called when this route is matched
                    'defaults' => array(
                        'controller' => 'Forum\Controller\PRecruit',
                        'action'     => 'index',
                    )
                ),
                'may_terminate' => true,
                'child_routes'  => array(
                    'detail' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route'    => '/:id',
                            'defaults' => array(
                                'controller' => 'Forum\Controller\PRFollow',
                                'action' => 'detail'
                            ),
                            'constraints' => array(
                                'id' => '[1-9]\d*'
                            )
                        )
                    )
                )
            ),
            'radd'=>array(
                'type' => 'literal',
                'options' => array(
                    'route'    => '/radd',
                    'defaults' => array(
                        'controller' => 'Forum\Controller\Recruit',
                        'action'     => 'add',
                    )
                )
            ),
            'search'=>array(
                'type' => 'literal',
                'options' => array(
                    // Listen to "/blog" as uri
                    'route'    => '/search',
                    // Define default controller and action to be called when this route is matched
                    'defaults' => array(
                        'controller' => 'Forum\Controller\Page',
                        'action'     => 'search',
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
            ),
            'add'=>array(
                'type' => 'literal',
                'options' => array(
                    'route'    => '/add',
                    'defaults' => array(
                        'controller' => 'Forum\Controller\Page',
                        'action'     => 'add',
                    )
                )
            ),
            'addUpPicSer'=>array(
                'type' => 'literal',
                'options' => array(
                    'route'    => '/addUpPicSer',
                    'defaults' => array(
                        'controller' => 'Forum\Controller\Page',
                        'action'     => 'addUpPicSer',
                    )
                )
            ),
            'testajax'=>array(
                'type' => 'literal',
                'options' => array(
                    'route'    => '/testajax',
                    'defaults' => array(
                        'controller' => 'Forum\Controller\Page',
                        'action'     => 'testajax',
                    )
                )
            ),
        )
    )
);