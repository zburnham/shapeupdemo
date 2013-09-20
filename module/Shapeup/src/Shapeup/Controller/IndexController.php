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
        $view->setVariable('foo', 'bar');
        return $view;
    }
}
