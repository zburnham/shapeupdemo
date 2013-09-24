<?php
/**
 * ShotTest.php
 * Test suite for the \Shapeup\Service\Shot class.
 * 
 * @author Zachary Burnham zburnham@gmail.com
 */

namespace ShapeupTest\Service;

use Shapeup\Model;
use Shapeup\Service\Shot;

class ShotTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Instance of class being tested
     *
     * @var \Shapeup\Service\Shot
     */
    protected $object;
    
    public function setUp()
    {
        parent::setUp();
        
        $this->setObject(new Shot);
    }
    
    public function testMarkHit()
    {
        $service = $this->getObject();
        $service->setModel(new Model\Shot);
        $service->markHit();
        $this->assertTrue($this->getObject()->getModel()->getWasAHit());
    }
    
    public function testGetLandingLocation()
    {
        $service = $this->getObject();
        // need to mock DistanceCalculations object
        $this->markTestIncomplete('Mocking');
    }
    
    public function testSanity()
    {
        $this->assertEquals(1,1);
    }
    
    public function testSanityAgain()
    {
        $this->assertEquals(2,2);
    }
    
    /**
     * @return \Shapeup\Service\Shot
     */
    public function getObject()
    {
//        if (NULL == $this->object) {
//            $classes = get_declared_classes();
//            if (in_array("Shapeup\Service\Shot", $classes)) {
//                echo "This shouldn't autoload.." . PHP_EOL . PHP_EOL;
//            }
//            echo "Loading Shot instance.." . PHP_EOL . PHP_EOL;
//            $this->setObject(new Shot);
//        }
        return $this->object;
    }

    /**
     * @param \Shapeup\Service\Shot $object
     * @return \ShapeupTest\Service\ShotTest
     */
    public function setObject($object)
    {
        $this->object = $object;
        return $this;
    }
}