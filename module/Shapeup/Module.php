<?php

namespace Shapeup;

use Shapeup\Controller;
use Shapeup\Form;
use Shapeup\InputFilter;
use Shapeup\Model;

use Zend\Db\TableGateway;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
    
    public function getServiceConfig()
    {
        //MYTODO alphabetize these
        return array(
            'factories' => array(
                'shot' => new Model\Shot,
                'target' => new Model\Target,
                'user' => new Model\User,
                'shot-form' => function($sm) {
                    $sf = new Form\Shot;
                    $sf->bind($sm->get('shot'));
                    //MYTODO need a hydrator
                },
                'login-form' => function($sm) {
                    $lf = new Form\Login;
                    $lf->bind($sm->get('user'));
                    //MYTODO need a hydrator
                },
                'shot-table-gateway' => function($sm) {
                    return new TableGateway('shots', $sm->get('db-adapter'));
                },
                'user-table-gateway' => function($sm) {
                    return new TableGateway('users', $sm->get('db-adapter'));
                },
                'target-table-gateway' => function($sm) {
                    return new TableGateway('targets', $sm->get('db-adapter'));
                }
            ),
        );
    }
       
}