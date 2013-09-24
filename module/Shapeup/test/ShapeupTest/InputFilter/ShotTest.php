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
     * @var \Shapeup\InputFilter\Shot 
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
        
        $inputs = $this->getObject()->getInputs();
        $testKeys = array_keys($inputs);
        $this->assertSame($testArray, $testKeys);
    }
    
    public function validityTestData()
    {
        return array(
            array('velocity', '80', TRUE),
            array('velocity', 'adf92387' ,FALSE),
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
        $this->assertFalse($if->isValid()); // we never give it a complete dataset
        $invalidInputs = $if->getInvalidInput();
        $this->assertSame(
                !$result, 
                array_key_exists($field, $invalidInputs)
                );
    }
    
    public function errorMessages()
    {
        return array(
            array(\Zend\Validator\Regex::NOT_MATCH,
                'This field only accepts numbers.',
                ),
            array(\Zend\Validator\GreaterThan::NOT_GREATER_INCLUSIVE,
                'Enter a number greater that or equal to 0.',
                ),
            array(\Zend\Validator\LessThan::NOT_LESS_INCLUSIVE,
                'Enter a number less than or equal to 90.',
                ),
        );
    }
    
    /**
     * Check the custom error messages.
     * 
     * @dataProvider errorMessages
     * @param string $constant  The error message index.
     * @param string $value The custom error message. 
     */
    public function testCustomValidationErrorMessages($constant, $value)
    {
        $validators = $this->getObject()->getInputs()['angle']->getValidatorChain()->getValidators();
        $errorMessages = array();
        foreach ($validators as $key => $validator) {
            $errorMessages = array_merge($errorMessages, $validator['instance']->getMessageTemplates());
        }
        $this->assertTrue(array_key_exists($constant,
                $errorMessages));
        $this->assertSame($value, $errorMessages[$constant]);
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
    public function setObject(Shot $object)
    {
        $this->object = $object;
        return $this;
    }
}