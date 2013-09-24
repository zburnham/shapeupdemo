<?php
/**
 * TargetTest.php
 * Test suite for \Shapeup\Hydrator\Target class.
 *
 * @author Zachary Burnham zburnham@gmail.com
 */

namespace ShapeupTest\Target;

use Shapeup\Hydrator\Target as TargetHydrator;
use Shapeup\Model\Target as TargetModel;

class TargetTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Instance of class being tested.
     * 
     * @var \Shapeup\Hydrator\Target
     */
    protected $object;
    
    public function setUp()
    {
        parent::setUp();
        $this->setObject(new TargetHydrator);
    }
    
    public function testHydration()
    {
        $data = array(
            'targetId' => '1',
            'userId' => '2',
            'size' => '10',
            'position' => '20',
            'isDestroyed' => '1',
        );
        
        $model = new TargetModel;
        $hydrator = $this->getObject();
        $result = $hydrator->hydrate($data, $model);
        
        $this->assertInternalType('int', $result->getTargetId());
        //MYTODO fill in the other keys
    }
    
    /**
     * @return \Shapeup\Hydrator\Target
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * @param \Shapeup\Hydrator\Target $object
     * @return \ShapeupTest\Hydrator\TargetTest
     */
    public function setObject(\Shapeup\Hydrator\Target $object)
    {
        $this->object = $object;
        return $this;
    }
}
