<?php
/**
 * Projectile.php
 * Form to accept input for targeting a virtual howitzer.
 * Seriously.
 * 
 * @author Zachary Burnham <zburnham@gmail.com>
 */

namespace Shapeup\Form;

use Zend\Form\Form;
use Zend\Form\FormInterface;

class Shot extends Form
{
    public function __construct()
    {
        $this->setAttribute('method', 'POST');
        $this->setAttribute('action', 'fire');
        
        $this->add(array(
            'type' => 'Zend\Form\Element\Text',
            'name' => 'angle',
            'options' => array(
                'label' => 'Angle: ',
            ),
        ));
        
        $velocitiesArray = array(
            '40',
            '50',
            '60',
            '70',
            '80',
        );
        
        $velocitiesOptions = array_combine($velocitiesArray, $velocitiesArray);
        
        $this->add(array(
            'type' => 'Zend\Form\Element\Select',
            'name' => 'velocity',
            'options' => array(
                'label' => 'Initial Velocity: ',
                'value_options' => $velocitiesOptions,
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