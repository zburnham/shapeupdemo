<?php
/**
 * Login.php
 * Form for logging in to the system.
 * 
 * @author Zachary Burnham
 */

namespace Shapeup\Form;

use Zend\Form\Element;
use Zend\Form\Form;
use Zend\Form\FormInterface;

class Login extends Form
{
    //MYTODO remember to inject InputFilter
    public function __construct($name = NULL, $options = array())
    {
        parent::__construct();
                
        $this->setAttribute('method', 'POST');
        
        $this->add(array(
            'type' => 'Zend\Form\Element\Text',
            'name' => 'username',
            'options' => array(
                'label' => 'Username: ',
            ),
        ));
        
        $this->add(array(
            'type' => 'Zend\Form\Element\Password',
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
            'attributes' => array(
                'value' => 'Submit',
            ),
        ));
        $this->setBindOnValidate(FormInterface::BIND_ON_VALIDATE);
    }
}