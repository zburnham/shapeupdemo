<?php
/**
 * LoginTest.php
 * Test suite for Shapeup\InputFilter\Login class.
 * 
 * @author Zachary Burnham zburnham@gmail.com
 */

namespace ShapeupTest\InputFilter;

use Shapeup\InputFilter\Login;
use ShapeupTest\Bootstrap;

class LoginTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Shapeup\InputFilter\Login 
     */
    protected $object;
    
    /**
     * ServiceManager instance.
     *
     * @var \Zend\ServiceManager\ServiceManager
     */
    protected $sm;
    
    public function setUp()
    {
        parent::setUp();
        $this->setSm(Bootstrap::getServiceManager());
        $this->setObject($this->getSm()->get('login-inputfilter'));
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
        
        $inputs = $this->getObject()->getInputs();
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
            //array('password', 'bar', TRUE),
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
        $if->isValid();
        $invalidInputs = $if->getInvalidInput();
        $this->assertSame(
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
    public function setObject(Login $object)
    {
        $this->object = $object;
        return $this;
    }
    
    /**
     * @return \Zend\ServiceManager\ServiceManager
     */
    public function getSm()
    {
        return $this->sm;
    }

    /**
     * @param \Zend\ServiceManager\ServiceManager $sm
     * @return \ShapeupTest\InputFilter\LoginTest
     */
    public function setSm(\Zend\ServiceManager\ServiceManager $sm)
    {
        $this->sm = $sm;
        return $this;
    }
}