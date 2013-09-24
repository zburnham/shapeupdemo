<?php
/**
 * module.config.php
 * Configuration for Shapeup module
 * 
 * @author Zachary Burnham zburnham@gmail.com
 */

return array(
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/',
                    'defaults' => array(
                        'controller' => 'Shapeup\Controller\Index',
                        'action' => 'index',
                    ),
                ),
            ),
            
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Shapeup\Controller\Index' => 'Shapeup\Controller\IndexController',
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    'view_helpers' => array(
        'factories' => array(
            'top5' => function ($sm) {
                $top5 = new \Shapeup\View\Helper\Top5;
                $top5->setServiceManager($sm);
                return $top5;
            },
            'login' => function ($sm) {
                return new \Shapeup\View\Helper\Login;
            },
        ),
    ),
);