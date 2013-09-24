<?php
/**
 * Shot.php
 * Hydrator for the \Shapeup\Model\User class.
 * 
 * @author Zachary Burnham zburnham@gmail.com
 */

namespace Shapeup\Hydrator;

class Shot extends BaseHydrator
{
    /**
     * I could probably get away without this, but let's be explicit.
     * 
     * @param array $data
     * @param mixed $object
     */
    public function hydrate(array $data, $object)
    {
        $data['angle'] = (float)$data['angle'];
        $data['initialAltitude'] = (float)$data['initialAltitude'];
        $data['gravity'] = (float)$data['gravity'];
        $data['shotId'] = (int)$data['shotId'];
        $data['velocity'] = (int)$data['velocity'];
        $data['wasAHit'] = (bool)$data['wasAHit'];
        $data['targetId'] = (int)$data['targetId'];
        $data['userId'] = (int)$data['userId'];
        
        return parent::hydrate($data, $object);
    }
}