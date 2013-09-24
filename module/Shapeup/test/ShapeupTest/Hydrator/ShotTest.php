<?php
/**
 * ShotTest.php
 * Test suite for \Shapeup\Hydrator\Shot class.
 *
 * @author Zachary Burnham zburnham@gmail.com
 */

namespace ShapeupTest\Hydrator;

use Shapeup\Hydrator\Shot as ShotHydrator;
use Shapeup\Model\Shot as ShotModel;

class ShotTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Instance of class being tested.
     * 
     * @var \Shapeup\Hydrator\Shot
     */
    protected $object;
    
    public function setUp()
    {
        parent::setUp();
        $this->setObject(new ShotHydrator);
    }
    
    public function testHydration()
    {
        $data = array(
            'shotId' => '1',
            'angle' => '12.22',
            'velocity' => '10',
            'initialAltitude' => '2.53',
            'gravity' => '9.81',
            'wasAHit'=> '0',
            'targetId' => '234',
            'userAgentString' => 'blah blah blah',
            'userId' => '32',
        );
        
        $model = new ShotModel;
        $hydrator = $this->getObject();
        $result = $hydrator->hydrate($data, $model);
        
        $this->assertInternalType('int', $result->getShotId());
        //MYTODO fill in the other keys
    }
    
    /**
     * @return \Shapeup\Hydrator\Shot
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * @param \Shapeup\Hydrator\Shot $object
     * @return \ShapeupTest\Hydrator\ShotTest
     */
    public function setObject(\Shapeup\Hydrator\Shot $object)
    {
        $this->object = $object;
        return $this;
    }
}