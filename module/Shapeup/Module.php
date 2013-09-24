<?php

namespace Shapeup;

use Shapeup\Controller;
use Shapeup\Form;
use Shapeup\InputFilter;
use Shapeup\Model;
use Shapeup\Validator;

use Zend\Db\TableGateway\TableGateway;
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
        $config = array(
            'factories' => array(
                'user' => function() {
                    return new Model\User;
                },
                'credentials-validator' => function($sm) {
                    $cv = new Validator\Credentials;
                    $cv->setDb($sm->get('user-table-gateway'));
                    return $cv;
                },
                'shot-form' => function($sm) {
                    $sf = new Form\Shot;
                    $sf->bind($sm->get('shot'));
                    //MYTODO need a hydrator
                },
                'login-form' => function($sm) {
                    $lf = new Form\Login;
                    //$lf->bind($sm->get('user'));
                    //$lf->setSm($sm);
                    return $lf;
                    //MYTODO need a hydrator
                },
                'register-form' => function($sm) {
                    $rf = new Form\Register;
                    return $rf;
                },
                'login-inputfilter' => function($sm) {
                    $li = new InputFilter\Login($sm);
                    return $li;
                },
                'shot-table-gateway' => function($sm) {
                    return new TableGateway('shots', $sm->get('db-adapter'));
                },
                'user-table-gateway' => function($sm) {
                    return new TableGateway('users', $sm->get('db-adapter'));
                },
                'target-table-gateway' => function($sm) {
                    return new TableGateway('targets', $sm->get('db-adapter'));
                },
                'user-service' => function($sm) {
                    $s = new Service\User;
                    $s->setSm($sm);
                    $s->setModel($sm->get('user'));
                    $s->setHydrator($sm->get('user-hydrator'));
                    $s->setRegisterInputFilter($sm->get('register-inputfilter'));
                    $s->setLoginInputFilter($sm->get('login-inputfilter'));
                    $s->setDb($sm->get('user-table-gateway'))
                            ->setShotsDb($sm->get('shot-table-gateway'));
                    return $s;
                }
            ),
            'invokables' => array(
                'register-inputfilter' => '\Shapeup\InputFilter\Register',
                'user-hydrator' => '\Shapeup\Hydrator\User',
                'shot' => '\Shapeup\Model\Shot',
                'target' => '\Shapeup\Model\Target',
                //'user' => '\Shapeup\Model\User',
            )
        );
        // pulling in additional config from module.config.php
        // I would think that should be done automatically..
        return array_merge_recursive($config, $this->getConfig());
    }
       
}