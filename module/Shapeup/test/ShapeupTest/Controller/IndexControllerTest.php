<?php
/**
 * IndexControllerTest.php
 * Tests for Shapeup module's IndexController.
 * 
 * @author Zachary Burnham zburnham@gmail.com
 */

namespace ShapeupTest\Controller;


class ShapeupControllerTest extends AbstractControllerTest
{
    public function setUp()
    {
        parent::setUp();
    }
    
    /**
     * Reality check.
     */
    public function testSanity()
    {
        $this->assertTrue(TRUE);
    }
    
    /**
     * Does the routing work?
     */
    public function testIndexActionExists()
    {
        $this->dispatch('/');
        $this->assertResponseStatusCode('200');
    }
    
    /**
     * Routed to the correct controller and action?
     */
    public function testIsThisTheRightControllerAndAction()
    {
        $this->dispatch('/');
        $this->assertControllerName('Shapeup\Controller\Index');
        $this->assertActionName('index');
    }
    
    /**
     * Did we match the right route name?
     */
    public function testCorrectRoute()
    {
        $this->dispatch('/');
        $this->assertMatchedRouteName('home');
    }
    
    /**
     * Did we get the right controller class?
     */
    public function testCorrectControllerClass()
    {
        $this->dispatch('/');
        $this->assertControllerClass('IndexController');
    }
}