<?php
/**
 * AbstractModelTest.php
 * Base test suite for models.
 * 
 * @author Zachary Burnham zburnham@gmail.com
 */

namespace ShapeupTest\Model;

abstract class AbstractModelTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Instance of the class being tested.
     *
     * @var mixed
     */
    protected $object;
    
    /**
     * Tests the getters/setters for proper functioning.
     * 
     * @dataProvider propertiesToTest
     */
    public function testGettersAndSetters($property, $value)
    {
        $obj = $this->getObject();
        $setFunction = 'set' . ucfirst($property);
        $getFunction = 'get' . ucfirst($property);
        $obj->$setFunction($value);
        $this->assertSame($value, $obj->$getFunction());
    }
    
    /**
     * Next two methods are here so that we can customize the auto-complete
     * for each individual model.
     */
    
    abstract public function getObject();
    
    abstract public function setObject($object);
    
    /**
     * Need to provide custom testing data for particular class.
     * 
     * @return array
     */
    abstract public function propertiesToTest();
}