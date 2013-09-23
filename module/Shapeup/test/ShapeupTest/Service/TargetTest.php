<?php
/**
 * TargetTest.php
 * Test suite for \Shapeup\Service\Target class.
 * 
 * @author Zachary Burnham zburnham@gmail.com
 */

namespace ShapeupTest\Service;

use Shapeup\Model;
use Shapeup\Service\Target;

class TargetTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Instance of class being tested.
     * 
     * @var \Shapeup\Service\Target
     */
    protected $object;
    
    public function setUp()
    {
        parent::setUp();
        
        $this->setObject(new Target);
    }
    
    public function testMarkDestroyed()
    {
        //MYTODO
    }
    
    public function testCreateNew()
    {
        //MYTODO more mocking
    }
    
    public function testGetResult()
    {
        $target = $this->getObject();
        $model = new Model\Target;
        $model->setPosition(100)
                ->setSize(5);
        $target->setModel($model);
        $this->assertTrue($target->getResult(97));
        $this->assertFalse($target->getResult(88));
    }
    
    public function testUserHasCurrentTarget()
    {
        // MYTODO more mocking
    }
    
    /**
     * @return \Shapeup\Service\Target
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * 
     * @param \Shapeup\Service\Target $object
     * @return \ShapeupTest\Service\TargetTest
     */
    public function setObject(Target $object)
    {
        $this->object = $object;
        return $this;
    }


}