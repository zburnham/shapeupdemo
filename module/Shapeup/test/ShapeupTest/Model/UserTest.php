<?php
/**
 * UserTest.php
 * Test suite for the \Shapeup\Model\User class.
 * 
 * @author Zachary Burnham zburnham@gmail.com
 */

namespace ShapeupTest\Model;

use Shapeup\Model\User;

class UserTest extends AbstractModelTest
{
    /**
     * @var \Shapeup\Model\User
     */
    protected $object;
    
    public function setUp()
    {
        parent::setUp();
        
        $this->setObject(new User);
    }
    
    /**
     * Data provider.
     * 
     * @return array
     */
    
    public function propertiesToTest()
    {
        return array(
            array('username', 'foo'),
            array('password', '﻿$2a$14$ELP46XxXrjXtM0ITYzkWSu2asAZ7N.oSKp7rbu1kJhtIcnGz0V1ey'),
        );
    }
    
    /**
     * Accuracy is kind of a special case, with the type juggling we have to do.
     * We hates floats, we hates them forever, preciousssssss...
     */
    public function testGetterAndSetterForAccuracy()
    {
        $user = $this->getObject();
        $value = 55.837296;
        $user->setAccuracy($value);
        $this->assertEquals(55.84, $user->getAccuracy());
    }
    
    /**
     * @return \Shapeup\Model\User
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * @param \Shapeup\Model\User $object
     * @return \ShapeupTest\Model\UserTest
     */
    public function setObject(\Shapeup\Model\User $object)
    {
        $this->object = $object;
        return $this;
    }


}
