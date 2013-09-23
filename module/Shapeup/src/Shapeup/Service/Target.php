<?php
/**
 * Target.php
 * Service class for interacting with the Target class.
 * 
 * @author Zachary Burnham zburnham@gmail.com
 */

namespace Shapeup\Service;

//use Shapeup\Model\Target;

class Target extends AbstractServiceClass
{
    /**
     * Creates a new instance of the Target class
     * and persists to the database.
     * 
     * @param int $userId
     * @return Target
     */
    public function createNew($userId)
    {
        // create new Target and persist to database
        // size / location of Target is random
    }   
    
    /**
     * Persist the target in the database.
     * 
     * @return int
     */
    public function save()
    {
        $model = $this->getModel();
        
        $data = array(
            'userId' => $model->getUserId(),
            'size' => $model->getSize(),
            'position' => $model->getPosition(),
            'isDestroyed' => $model->getIsDestroyed(),
        );
        return parent::save($data);
    }
    
    /**
     * Persists the information in the database.
     * 
     * @param int $targetId
     */
    public function load($targetId)
    {
        if (!is_int($targetId)) {
            //throw new \InvalidArgumentException('Invalid target ID given.');
        }
        parent::load($targetId);
    }
    
    /**
     * Marks the target as destroyed in the database (marks boolean isDestroyed
     * for this target).
     * 
     * @param int $targetId
     * @returns int 
     */
    public function markDestroyed($targetId)
    {
        $db = $this->getDb();
        $data = array('isDestroyed' => '1');
        $result = $db->update($data, array('targetId' => $targetId));
        if ($result->count() > 1) {
            throw new \Exception('Wuhoh, more than one target got destroyed!');
        }
    }
    
    /**
     * Determines if the shot landed on the target.
     * 
     * @param float $landingLocation
     * @return boolean
     */
    public function getResult($landingLocation)
    {
        $target = $this->getModel();
        $size = $target->getSize();
        $location = $target->getLocation();
        $range = array(
            'near' => $location - $size,
            'far' => $location + $size,
            );
        
        if ($landingLocation > $near && $landingLocation < $far) {
            return TRUE;
        }
        return FALSE;
    }
    
    /**
     * Does the user have a currently un-destroyed target?
     * 
     * @param int $userId
     * @return bool
     */
    public function userHasCurrentTarget($userId)
    {
        // checks database for a non-destroyed Target
        $db = $this->getDb();
        $result = $db->select(array('userId' => $userId, 'isDestroyed' => '0'));
        if (0 < $result->count()) {
            return TRUE;
        }
        return FALSE;
    }
}