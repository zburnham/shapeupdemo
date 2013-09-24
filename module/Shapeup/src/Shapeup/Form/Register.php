<?php
/**
 * Register.php
 * Form to accept user input to create a new user.
 *
 * @author Zachary Burnham
 */

namespace Shapeup\Form;

use Zend\Form\Form;
use Zend\Form\FormInterface;

class Register extends Form
{
    //MYTODO remember to inject InputFilter
    public function __construct()
    {
        parent::__construct();
        
        $this->setAttribute('method', 'POST');
        //MYTODO remember to give these actions in the controller.
        
        $this->add(array(
            'type' => 'Zend\Form\Element\Text',
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
            'type' => 'Zend\Form\Element\Password',
//            'attributes' => array(
//                'type' => 'text',
//            ),
            'name' => 'confirmPassword',
            'options' => array(
                'label' => 'Confirm password: '
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
            
            'attributes' => array(
                'value' => 'Submit',
            ),
        ));
        $this->setBindOnValidate(FormInterface::BIND_ON_VALIDATE);
    }
}