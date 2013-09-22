<?php
/**
 * ProjectileTest.php
 * Test suite for Shapeup\InputFilter\Projectile class.
 * 
 * @author Zachary Burnham zburnham@gmail.com
 */

namespace ShapeupTest\InputFilter;

use Shapeup\InputFilter\Shot;

class ShotTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Shapeup\InputFilter\Shot 
     */
    protected $object;
    
    public function setUp()
    {
        parent::setUp();
        $this->setObject(new Shot);
    }
    
    /**
     * Reality check.
     */
    public function testSanity()
    {
        $this->assertTrue(TRUE);
    }
    
    /**
     * Do we have all the elements we're looking for?
     * MYTODO could probably backport to Form tests
     */
    public function testHasAllElements()
    {
        $testArray = array(
            'velocity',
            'angle',
            'csrf',
            'submit',
        );
        
        $inputs = $this->getObject->getInputs();
        $testKeys = array_keys($inputs);
        $this->assertSame($testArray, $testKeys);
    }
    
    public function validityTestData()
    {
        return array(
            array('velocity', '80', TRUE),
            array('velocity', 'adf92387' , FALSE),
            array('angle', '45', TRUE),
            array('angle', '-5', FALSE),
            array('angle', '180', FALSE),
            array('angle', '29as(E&W$', FALSE),
        );
    }
    
    /**
     * Tests the validation results of various fields.
     * 
     * @dataProvider validityTestData
     * 
     * @param mixed $field
     * @param mixed $value
     * @param mixed $result
     */
    public function testValidities($field, $value, $result)
    {
        $if = $this->getObject();
        $data = array($field => $value);
        $if->setData($data);
        $invalidInputs = $if->getInvalidInput();
        $this->assertIdentical(
                !$result, // Yes, you read that right.  
                // Counter-intuitive, I know, but it
                // makes providing easily understandable
                // data sets much easier.
                array_key_exists($field, $invalidInputs)
                );
    }
    
    /**
     * @return Shapeup\InputFilter\Shot
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * @param \ShapeupTest\InputFilter\Shapeup\InputFilter\Shot $object
     * @return \ShapeupTest\InputFilter\ProjectileTest
     */
    public function setObject(Shapeup\InputFilter\Login $object)
    {
        $this->object = $object;
        return $this;
    }
}