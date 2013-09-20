<?php
/**
 * DistanceCalculationsTest.php
 * Tests for the DistanceCalculations service class.
 * 
 * @author Zachary Burnham zburnham@gmail.com
 */

namespace ShapeupTest\Service;

use Shapeup\Service\DistanceCalculations;

class DistanceCalculationsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Shapeup\Service\DistanceCalculations
     */
    protected $object;
    
    /**
     * Sets up the test cases.
     * 
     * @return void
     */
    public function setUp()
    {
        $this->setObject(new DistanceCalculations);
        parent::setUp();
    }
    
    /**
     * Reality check.
     */
    public function testSanity()
    {
        $this->assertTrue(TRUE);
    }
    
    public function trajectoryParameters()
    {
        return array(
            array(10, 45, 100, 0, 1000),
            array(5, 45, 100, 0, 2000),
            array(9.81, 45, 100, 100, 1111.11),
            array(9.81, 35, 100, 0, 957.89),
        );
    }
    
    /**
     * Checks the math to get the expected results.
     * 
     * @dataProvider trajectoryParameters
     */
    public function testCalculationsProduceAccurateResults(
            $g,
            $theta, 
            $initialVelocity,
            $initialAltitude, 
            $distance)
    {
        $dc = $this->getObject();
        $dc->setAngle($theta)
                ->setG($g)
                ->setInitialAltitude($initialAltitude)
                ->setInitialVelocity($initialVelocity);
        $this->assertEquals($distance, $dc->calculateDistance());
    }
    
    /**
     * @return \Shapeup\Service\DistanceCalculations
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * @param \ShapeupTest\Service\Shapeup\Service\DistanceCalculations $object
     * @return \ShapeupTest\Service\DistanceCalculationsTest
     */
    public function setObject(DistanceCalculations $object)
    {
        $this->object = $object;
        return $this;
    }


}