<?php
/**
 * User.php
 * Hydrator for the Shapeup\Model\User model.
 * 
 * @author Zachary Burnham zburnham@gmail.com
 */

namespace Shapeup\Hydrator;

class User extends BaseHydrator
{
    /**
     * Blah blah blah loosely typed..
     * 
     * @param array $data
     * @param mixed $object
     * @return mixed
     */
    public function hydrate(array $data, $object)
    {
        if (isset($data['userId'])) {
            $data['userId'] = (int)$data['userId'];
        }
        if (isset($data['accuracy'])) {
            $data['accuracy'] = (float)$data['accuracy'];
        }
        
        return parent::hydrate($data, $object);
    }
}
