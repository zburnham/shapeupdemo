<?php
/**
 * TargetTest.php
 * Test suite for the Shapeup\Model\Target class.
 * 
 * @author Zachary Burnham zburnham@gmail.com
 */

namespace ShapeupTest\Model;

use Shapeup\Model\Target;

class TargetTest extends AbstractModelTest
{
    /**
     * @var \Shapeup\Model\Target
     */
    protected $object;
    //MYTODO check to see if the first backslash is the cause of 
    //the auto-complete being broken in other tests.
    
    public function setUp()
    {
        parent::setUp();
        
        $this->setObject(new Target);
    }
    
    public function propertiesToTest()
    {
        return array(
            array('targetId', 1),
            array('userId', 3),
            array('size', 5),
            array('position', 450),
            array('isDestroyed', FALSE),
        );
    }
    
    /**
     * @return \Shapeup\Model\Target
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * @param \Shapeup\Model\Target $object
     * @return \ShapeupTest\Model\TargetTest
     */
    public function setObject($object)
    {
        $this->object = $object;
        return $this;
    }
}