<?php

namespace ShapeupTest\Service;

use Shapeup\Service\Test;

class TestTest extends \PHPUnit_Framework_TestCase
{
    protected $object;
    
    public function setUp()
    {
        parent::setUp();
        
        $this->setObject(new Test);
    }
    
    public function testSanity()
    {
        $this->assertEquals(1,1);
    }
    
    public function testSanityAgain()
    {
        $this->assertEquals(2,2);
    }
    
    public function getObject()
    {
        return $this->object;
    }

    public function setObject($object)
    {
        $this->object = $object;
        return $this;
    }
}
