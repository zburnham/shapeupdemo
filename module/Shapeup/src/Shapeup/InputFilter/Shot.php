<?php
/**
 * Shot.php
 * InputFilter for use in conjunction with the Shot form.
 * 
 * @author Zachary Burnham <zburnham@gmail.com>
 */

namespace Shapeup\InputFilter;

use Zend\InputFilter\Factory;
use Zend\InputFilter\InputFilter;

class Shot extends InputFilter
{
    public function __construct()
    {
        $factory = new Factory;
        
        $velocity = $factory->createInput(array(
            'name' => 'velocity',
            'filters' => array(
                array(
                    'name' => 'StringTrim'
                ),
                array(
                    'name' => 'Digits'
                ),
            ),
            'validators' => array(
                array(
                    'name' => 'InArray',
                    'options' => array(
                        'haystack' => array(
                            '40',
                            '50',
                            '60',
                            '70',
                            '80',
                        ),
                    ),
                ),
            ),
        ));
        $this->add($velocity);
        
        $angle = $factory->createInput(array(
            'name' => 'angle',
            'filters' => array(
                array(
                    'name' => 'StringTrim'
                ),
            ),
            // MYTODO this is kind of sloppy, it's
            // exploiting php's implicit casting -
            // the string is being cast to an int
            // when the comparison happens.
            'validators' => array(
                array(
                    'name' => 'Regex',
                    'options' => array(
                        'pattern' => '|^[0-9]{1,2}$|',
                        'messages' => array(
                            \Zend\Validator\Regex::NOT_MATCH=>
                            'This field only accepts numbers.',
                        ),
                    ),
                ),
                array(
                    'name' => 'GreaterThan',
                    'options' => array(
                        'min' => 0,
                        'inclusive' => TRUE,
                        'messages' => array(
                            \Zend\Validator\GreaterThan::NOT_GREATER_INCLUSIVE=>
                            'Enter a number greater that or equal to 0.'
                        ),
                    ),
                ),
                array(
                    'name' => 'LessThan',
                    'options' => array(
                        'max' => 90,
                        'inclusive' => TRUE,
                        'messages' => array(
                            \Zend\Validator\LessThan::NOT_LESS_INCLUSIVE =>
                            'Enter a number less than or equal to 90.'
                        ),
                    ),
                ),
            ),
        ));
        $this->add($angle);
        
        $csrf = $factory->createInput(array(
            'name' => 'csrf',
            'filters' => array(
                array('name' => 'StringTrim'),
                array('name' => 'StripTags'),
            ),
            'validators' => array(
                array(
                    'name' => 'Csrf',
                ),
            )
        ));
        $this->add($csrf);
        
        $submit = $factory->createInput(array(
            'name' => 'submit',
            'filters' => array(
                array(
                    'name' => 'StringTrim',
                ),
                array(
                    'name' => 'Alpha'
                ),
            ),
            'validators' => array(
                array(
                    'name' => 'Identical',
                    'options' => array(
                        'token' => 'Submit',
                    ),
                ),
            ),
        ));
        $this->add($submit);
    }
}