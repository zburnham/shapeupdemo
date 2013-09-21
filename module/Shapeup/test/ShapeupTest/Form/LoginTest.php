<?php
/**
 * LoginTest.php
 * Test suite for the Login form class.
 */
namespace ShapeupTest\Form;

use Shapeup\Form\Login;

class LoginTest extends \PHPUnit_Framework_TestCase
{
    /**
     *
     * @var Shapeup\Form\Login
     */
    protected $object;
    
    /**
     * Mock Shapeup\InputFilter\Login
     */
    protected $inputFilter;
    
    public function setUp()
    {
        parent::setUp();
        
        $this->setObject(new Login);
    }
    
    /**
     * @return Shapeup\Form\Login
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * @param \Shapeup\Form\Login $object
     * @return \ShapeupTest\Form\LoginTest
     */
    public function setObject(Login $object)
    {
        $this->object = $object;
        return $this;
    }

    /**
     * @return Mock of Shapeup\InputFilter\Login
     */
    public function getInputFilter()
    {
        return $this->inputFilter;
    }

    /**
     * @param Mock $inputFilter
     * @return \ShapeupTest\Form\LoginTest
     */
    public function setInputFilter($inputFilter)
    {
        $this->inputFilter = $inputFilter;
        return $this;
    }
}
