<?php
/**
 * Target.php
 * Service class for interacting with the Target class.
 * 
 * @author Zachary Burnham zburnham@gmail.com
 */

namespace Shapeup\Service;

use Shapeup\Model\Target;

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
     * Marks the target as destroyed in the database (marks boolean isDestroyed
     * for this target).
     * 
     * @return bool Success/failure of update
     */
    public function markDestroyed()
    {
        // check for targetId
        // update database with new destruction info
        // return return value from ->update()
    }
    
    public function getResult($landingLocation)
    {
        // compares $landingLocation to see if
        // it's within the bounds of the target
        // based on landing location and target
        // size
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
    }
}