<?php
/**
 * UserTest.php
 * Test suite for \Shapeup\Hydrator\User class.
 *
 * @author Zachary Burnham zburnham@gmail.com
 */

namespace ShapeupTest\User;

use Shapeup\Hydrator\User as UserHydrator;
use Shapeup\Model\User as UserModel;

class UserTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Instance of class being tested.
     * 
     * @var \Shapeup\Hydrator\User
     */
    protected $object;
    
    public function setUp()
    {
        parent::setUp();
        $this->setObject(new UserHydrator);
    }
    
    public function testHydration()
    {
        $data = array(
            'userId' => '2',
            'username' => 'Foo',
            'password' => 'thisisnotreal',
            'accuracy' => '38.38',
        );
        
        $model = new UserModel;
        $hydrator = $this->getObject();
        $result = $hydrator->hydrate($data, $model);
        
        $this->assertInternalType('int', $result->getUserId());
        //MYTODO fill in the other keys
    }
    
    /**
     * @return \Shapeup\Hydrator\User
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * @param \Shapeup\Hydrator\User $object
     * @return \ShapeupTest\Hydrator\UserTest
     */
    public function setObject(\Shapeup\Hydrator\User $object)
    {
        $this->object = $object;
        return $this;
    }
}

