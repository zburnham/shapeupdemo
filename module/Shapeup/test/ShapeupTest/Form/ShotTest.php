<?php
/**
 * ProjectileTest.php
 * Tests for \Shapeup\Form\Projectile class.
 * 
 * @author Zachary Burnham zburnham@gmail.com
 */

namespace ShapeupTest\Form;

use Shapeup\Form\Shot;

class ShotTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Shapeup\Form\Shot
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
     * Does it have an angle element?
     */
    public function testHasAngle()
    {
        $elements = $this->getObject()->getElements();
        $this->assertArrayHasKey('angle', $elements);
        $this->assertInstanceOf(
                '\Zend\Form\Element\Text',
                $elements['angle']);
    }
    
    /**
     * Does it have a velocity element?
     */
    public function testHasVelocity()
    {
        $elements = $this->getObject()->getElements();
        $this->assertArrayHasKey('velocity', $elements);
        $this->assertInstanceOf(
                '\Zend\Form\Element\Select',
                $elements['velocity']);
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
     * @return Shapeup\Form\Shot
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * @param \ShapeupTest\Form\Shapeup\Form\Shot $object
     * @return \ShapeupTest\Form\ProjectileTest
     */
    public function setObject(Shapeup\Form\Shot $object)
    {
        $this->object = $object;
        return $this;
    }


}