<?php
/**
 * Login.php
 * Form for logging in to the system.
 * 
 * @author Zachary Burnham
 */

namespace Shapeup\Form;

use Zend\Form\Form;
use Zend\Form\FormInterface;

class Login extends Form
{
    public function __construct($name = NULL, $options = array())
    {
        parent::__construct();
                
        $this->setAttribute('method', 'POST');
        
        //MYTODO get rid of the attributes key once
        //it's determined we don't need them
        $this->add(array(
            'type' => 'Zend\Form\Element\Text',
//            'attributes' => array(
//                'type' => 'text',
//            ),
            'name' => 'username',
            'options' => array(
                'label' => 'Username: ',
            ),
        ));
        
        $this->add(array(
            'type' => 'Zend\Form\Element\Password',
//            'attributes' => array(
//                'type' => 'text',
//            ),
            'name' => 'password',
            'options' => array(
                'label' => 'Password: '
            ),
        ));
        
        $this->add(array(
            'type' => 'Zend\Form\Element\Csrf',
            'name' => 'csrf',
            'options' => array(
                'csrf_options' => array(
                    'timeout' => 600,
                ),
            ),
        ));
        
        $this->add(array(
            'type' => 'Zend\Form\Element\Submit',
            'name' => 'submit',
            'options' => array(
                'label' => 'Submit',
            ),
            'value' => 'Submit',
        ));
        $this->setBindOnValidate(FormInterface::BIND_ON_VALIDATE);
    }
}