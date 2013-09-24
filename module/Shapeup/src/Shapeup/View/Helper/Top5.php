<?php
/**
 * Top5.php
 * View helper to show the top 5 most accurate users.
 * 
 * @author Zachary Burnham zburnham@gmail.com
 */

namespace Shapeup\View\Helper;

use Zend\ServiceManager\ServiceManager;
use Zend\ServiceManager\ServiceManagerAwareInterface as SMI;
use Zend\View\View;
use Zend\View\Helper\AbstractHelper;

class Top5 extends AbstractHelper implements SMI
{
    protected $sm;
    
    public function __invoke()
    {
        $sm = $this->getSm();
        $userService = $sm->get('user-service');
        return $userService->getTop5();
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