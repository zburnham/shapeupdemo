<?php
/**
 * Login.php
 * View helper to show the top 5 most accurate users.
 * 
 * @author Zachary Burnham zburnham@gmail.com
 */

namespace Shapeup\View\Helper;

use Zend\ServiceManager\ServiceManager;
use Zend\Session\Container;
use Zend\View\View;
use Zend\View\Helper\AbstractHelper;

class Login extends AbstractHelper
{
    protected $sm;
    
    public function __invoke()
    {
        $sm = $this->getSm();
        $container = new Container;
        $userId = $container->userId;
        $content = '';
        if (NULL === $userId) {
            $content .= 'Welcome, please <a href="/login">Login or <a href="/register">Register</a>.';
        } else {
            $userService = $sm->get('user-service');
            if ($userService->load($userId)) {
                $user = $userService->getModel();
                $username = $user->getUsername();
                $content .= 'Welcome, ' . $username;
            } else {
                $content .= 'Error, user not found.';
            }
        }
        return $content;
    }
    
    public function setServiceManager(ServiceManager $serviceManager)
    {
        $this->sm = $serviceManager;
    }
    
    public function getSm()
    {
        return $this->sm;
    }


}
