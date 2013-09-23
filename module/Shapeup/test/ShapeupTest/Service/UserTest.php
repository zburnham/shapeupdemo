<?php
/**
 * UserTest.php
 * Test suite for \Shapeup\Service\UserTest.php
 * 
 * @author Zachary Burnham zburnham@gmail.com
 */

namespace ShapeupTest\ServiceTest;

use Shapeup\Model;
use Shapeup\Service\User;

use Zend\Session\SessionManager;

class UserTest extends \PHPUnit_Framework_TestCase
{
    
    public function setUp()
    {
        parent::setUp();
        
        $this->setObject(new User);
    }
    /**
     * Instance of class being tested.
     *
     * @var \Shapeup\Service\User
     */
    protected $object;
    
    /**
     * Is the average being calculated accurately?
     */
    public function testCalculateAverage()
    {
        $service  = $this->getObject();
        $user = new Model\User;
        //MYTODO look up mocking
        $this->markTestIncomplete() ;
    }
    
    /**
     * Is the session variable 'userId' being set
     * properly when logIn() is called?
     */
    public function testLogIn()
    {
        // MYTODO figure out sessions again
    }
    
    /**
     * 
     * @return \Shapeup\Service\User
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * @param \Shapeup\Service\User $object
     * @return \ShapeupTest\Service\UserTest
     */
    public function setObject(\Shapeup\Service\User $object)
    {
        $this->object = $object;
        return $this;
    }
}