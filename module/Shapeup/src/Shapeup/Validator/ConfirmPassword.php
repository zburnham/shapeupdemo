<?php
/**
 * ConfirmPassword.php
 * Validator to compare confirmPassword field to Password field.
 * I can't really believe you need a custom validator to do this.
 * 
 * @author Zachary Burnham zburnham@gmail.com
 */

namespace Shapeup\Validator;

use Zend\Validator\Callback;

class ConfirmPassword extends Callback
{
    /**
     * Error codes.
     * @const string
     */
    const NOT_EQUAL = 'notEqual';
    
    /**
     * Error messages
     * @var array
     */
    protected $messageTemplates = array(
        self::NOT_EQUAL => "The passwords are not the same.",
    );
    
    public function isValid($value, $context = array())
    {
        if ($value == $context['password'])
        {
            return TRUE;
        }
        $this->error(self::NOT_EQUAL);
        return FALSE;
    }
}