<?php
/**
 * ShotTest.php
 * Test suite for the \Shapeup\Service\Shot class.
 * 
 * @author Zachary Burnham zburnham@gmail.com
 */

namespace ShapeupTest\Service;

use Shapeup\Model;
use Shapeup\Service;

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
        
        $this->setObject(new Service\Shot);
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
    
    /**
     * @return \Shapeup\Service\Shot
     */
    public function getObject()
    {
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