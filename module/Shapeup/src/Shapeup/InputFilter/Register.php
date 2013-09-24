<?php
/**
 * Register.php
 * InputFilter for use in conjunction with the Register form.
 * 
 * @author Zachary Burnham zburnham@gmail.com
 */

namespace Shapeup\InputFilter;

use Shapeup\Validator\ConfirmPassword;

use Zend\InputFilter\Factory;
use Zend\InputFilter\InputFilter;

class Register extends InputFilter
{
    public function __construct()
    {
        
        //MYTODO this needs a test
        $factory = new Factory;
        
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
                    'name' => 'Regex',
                    'options' => array(
                        'pattern' => '|^[A-Za-z0-9\p{P}\s]+$|',
                    ),
                ),
            ),
        ));
        $this->add($password);
        
        $confirmPasswordValidator = new ConfirmPassword;
        
        $confirmPassword = $factory->createInput(array(
            'name' => 'confirmPassword',
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
                    'name' => 'Regex',
                    'options' => array(
                        'pattern' => '|^[A-Za-z0-9\p{P}\s]+$|',
                    ),
                ),
                $confirmPasswordValidator,
            ),
        ));
        $this->add($confirmPassword);
        
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