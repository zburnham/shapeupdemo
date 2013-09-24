<?php
/**
 * IndexController.php
 * Default controller for Shapeup module.
 * 
 * @author Zachary Burnham zburnham@gmail.com
 */

namespace Shapeup\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    /**
     * Landing action.
     */
    public function indexAction()
    {
        $view = new ViewModel;
        return $view;
    }
    
    public function loginAction()
    {
        $view = new ViewModel;
        $view->form = $this->getServiceLocator()->get('login-form');
        return $view;
    }
    
    public function registerAction()
    {
        $view = new ViewModel;
        $sm = $this->getServiceLocator();
        $form = $sm->get('register-form');
        $request = $this->getRequest();
        if ($request->isPost()) {
            $post = $request->getPost();
            $form->setData($post);
            if ($form->isValid($post)) {
                $userService = $sm->get('user-service');
                $userService->setIsDataValidated(TRUE);
                //$userService->initRegisterInputFilter();
                $userService->hydrate($post->toArray());
                $userService->save();
                $view->message = 'Registration Successful.';
            } else {
                $view->failure = TRUE;
                $view->form = $form;
            }
        } else {
            $view->form = $form;
        }
        return $view;
    }
    
    public function boomAction()
    {
        $view = new ViewModel;
        $view->form = $this->getServiceLocator()->get('shot-form');
        return $view;
    }
}
