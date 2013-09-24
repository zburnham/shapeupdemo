<?php
/**
 * Target.php
 * Hydrator for the Shapeup\Model\Target model.
 * 
 * @author Zachary Burnham zburnham@gmail.com
 */

namespace Shapeup\Hydrator;

class Target extends BaseHydrator
{
    /**
     * I know, I know, php is loosely typed..
     * 
     * @param array $data
     * @param mixed $object
     * @return mixed
     */
    public function hydrate(array $data, $object)
    {
        $data['targetId'] = (int)$data['targetId'];
        $data['userId'] = (int)$data['userId'];
        $data['size'] = (int)$data['size'];
        $data['position'] = (int)$data['position'];
        $data['isDestroyed'] = (bool)$data['isDestroyed'];
        
        return parent::hydrate($data, $object);
    }
}