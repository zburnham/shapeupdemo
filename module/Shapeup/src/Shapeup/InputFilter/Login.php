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
use Zend\ServiceManager\ServiceManager;

class Login extends InputFilter
{
    /**
     * ServiceManager instance.
     *
     * @var \Zend\ServiceManager\ServiceManager
     */
    protected $sm;
    
    public function __construct($sm)
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
                    'name' => 'Regex',
                    'options' => array(
                        'pattern' => '|^[a-zA-Z0-9]+$|',
                    )
                ),
            ),
        ));
        $this->add($username);
        
        $credentialsValidator = $sm->get('credentials-validator');
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
                $credentialsValidator,
                array(
                    'name' => 'Regex',
                    'options' => array(
                        'pattern' => '|^[A-Za-z0-9\p{P}\s]+$|',
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
    
    /**
     * 
     * @return \Zend\ServiceManager\ServiceManager
     */
    public function getSm()
    {
        return $this->sm;
    }

    /**
     * @param \Zend\ServiceManager\ServiceManager $sm
     * @return \Shapeup\InputFilter\Login
     */
    public function setSm(ServiceManager $sm)
    {
        $this->sm = $sm;
        return $this;
    }
}