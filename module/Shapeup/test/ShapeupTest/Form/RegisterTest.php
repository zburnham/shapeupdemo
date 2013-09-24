<?php
/**
 * RegosterTest.php
 * Test suite for the \Shapeup\Form\Register class.
 * 
 * @author Zachary Burnham zburnham@gmail.com
 */

namespace ShapeupTest\Form;

use Shapeup\Form\Register;

class RegisterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Register instance.
     *
     * @var \Shapeup\Form\Register
     */
    protected $object;
    
    public function setUp()
    {
        parent::setUp();
        
        $this->setObject(new Register);
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
     * Does it have a confirmPassword element?
     */
    public function testHasConfirmPassword()
    {
        $elements = $this->getObject()->getElements();
        $this->assertArrayHasKey('confirmPassword', $elements);
        $this->assertInstanceOf(
                '\Zend\Form\Element\Password', 
                $elements['confirmPassword']);
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
     * @return \Shapeup\Form\Register
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * @param \Shapeup\Form\Register $object
     * @return \ShapeupTest\Form\RegisterTest
     */
    public function setObject(Register $object)
    {
        $this->object = $object;
        return $this;
    }
}