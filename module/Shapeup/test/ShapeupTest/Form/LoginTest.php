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
     * Reality check.
     */
    public function testSanity()
    {
        $this->assertTrue(TRUE);
    }
    
    /**
     * Does it have a username element?
     */
    public function testHasUsername()
    {
        $elements = $this->getObject()->getElements();
        $this->assertArrayHasKey('username', $elements);
        $this->assertInstanceOf(
                '\Zend\Form\Element\Text', 
                $elements['username']);
    }
    
    /**
     * Does it have a password element?
     */
    public function testHasPassword()
    {
        $elements = $this->getObject()->getElements();
        $this->assertArrayHasKey('password', $elements);
        $this->assertInstanceOf(
                '\Zend\Form\Element\Password', 
                $elements['password']);
    }
    
    /**
     * Does it have a csrf element?
     */
    public function testHasCsrf()
    {
        $elements = $this->getObject()->getElements();
        $this->assertArrayHasKey('csrf', $elements);
        $this->assertInstanceOf(
                '\Zend\Form\Element\Csrf',
                $elements['csrf']);
    }
    
    /**
     * Does it have a submit element?
     */
    public function testHasSubmit()
    {
        $elements = $this->getObject()->getElements();
        $this->assertArrayHasKey('submit', $elements);
        $this->assertInstanceOf(
                '\Zend\Form\Element\Submit',
                $elements['submit']);
    }
    
    /**
     * Is the method POST?
     */
    public function testMethodIsPost()
    {
        $post = $this->getObject()->getAttribute('method');
        $this->assertSame('POST', $post);
    }
    
    /**
     * 
     */
    
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
