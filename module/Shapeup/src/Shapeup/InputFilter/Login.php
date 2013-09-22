<?php
/**
 * Login.php
 * InputFilter for use in conjunction with the Login form.
 * 
 * @author Zachary Burnham zburnham@gmail.com
 */

namespace Shapeup\InputFilter;

use Zend\InputFilter\Factory;
use Zend\InputFilter\InputFilter;

class Login extends InputFilter
{
    public function __construct()
    {
        $factory = new Factory;
        
        //MYTODO Need to figure out string length values.
        
        //MYTODO I'm repeating myself way too often
        //when defining filters on these inputs.
        //Should probably subclass Zend\InputFilter\Factory.
        $username = $factory->createInput(array(
            'name' => 'username',
            'filters' => array(
                array(
                    'name' => 'StringTrim'
                    ),
                array(
                    'name' => 'StripTags'
                    ),
            ),
            'validators' => array(
                array(
                    'name' => 'Alnum',
                ),
            ),
        ));
        $this->add($username);
        
        $password = $factory->createInput(array(
            'name' => 'password',
            'filters' => array(
                array(
                    'name' => 'StringTrim'
                    ),
                array(
                    'name' => 'StripTags'
                    ),
            ),
            'validators' => array(
                array(
                    'name' => '\Shapeup\Validator\Credentials',
                    ),
                array(
                    'name' => 'Regex',
                    'options' => array(
                        'pattern' => '|^[A-Za-Z0-9\p{P}\s]+$|',
                    ),
                ),
            ),
        ));
        $this->add($password);
        
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