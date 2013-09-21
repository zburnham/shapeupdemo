<?php
/**
 * Projectile.php
 * InputFilter for use in conjunction with the Projectile form.
 * 
 * @author Zachary Burnham <zburnham@gmail.com>
 */

namespace Shapeup\InputFilter;

use Zend\InputFilter\Factory;
use Zend\InputFilter\InputFilter;

class Projectile extends InputFilter
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
                array(
                    'name' => 'Digits'
                ),
            ),
            'validators' => array(
                array(
                    'name' => 'GreaterThan',
                    'options' => array(
                        'min' => 0,
                        'inclusive' => TRUE,
                    ),
                ),
                array(
                    'name' => 'LessThan',
                    'options' => array(
                        'max' => 90,
                        'inclusive' => TRUE,
                    ),
                ),
            ),
        ));
        $this->add($angle);
        
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