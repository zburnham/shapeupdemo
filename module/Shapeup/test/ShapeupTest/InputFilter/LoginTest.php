<?php
/**
 * LoginTest.php
 * Test suite for Shapeup\InputFilter\Login class.
 * 
 * @author Zachary Burnham zburnham@gmail.com
 */

namespace ShapeupTest\InputFilter;

use Shapeup\InputFilter\Login;

class LoginTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Shapeup\InputFilter\Login 
     */
    protected $object;
    
    public function setUp()
    {
        parent::setUp();
        $this->setObject(new Login);
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
            'username',
            'password',
            'csrf',
            'submit',
        );
        
        $inputs = $this->getObject->getInputs();
        $testKeys = array_keys($inputs);
        $this->assertSame($testArray, $testKeys);
    }
    
    /**
     * Data provider for validity testing.
     */
    public function valuesDataProvider()
    {
        // MYTODO figure out how to mock
        // the TableGateway to test
        // credential validity.
        // MYTODO also, figure out how to mock
        // so that the csrf validator can
        // check the session variable.
//        return array(
//            array('#$($#', '', )
//        )
    }
    
    public function validityTestData()
    {
        return array(
            array('username', 'foo', TRUE),
            array('username', '#%(*&$' , FALSE),
            array('password', 'bar', TRUE),
            array('password', chr(27), FALSE),
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
     * @return Shapeup\InputFilter\Login
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * @param \ShapeupTest\InputFilter\Shapeup\InputFilter\Login $object
     * @return \ShapeupTest\InputFilter\LoginTest
     */
    public function setObject(Shapeup\InputFilter\Login $object)
    {
        $this->object = $object;
        return $this;
    }
}