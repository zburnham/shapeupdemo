<?php
/**
 * Shot.php
 * Service class for interaction with the Shot model.
 * 
 * @author Zachary Burnham zburnham@gmail.com
 */

namespace Shapeup\Service;

use Shapeup\Model\Shot;
use Shapeup\Service\DistanceCalculations;

class Shot extends AbstractServiceClass
{
    /**
     * Service class that does the math.
     * 
     * @var \Shapeup\Service\DistanceCalculations
     */
    protected $distanceCalculator;
    
    public function getLandingLocation()
    {
        // determine where the shell landed
    }

    public function markHit()
    {
        // Mark the shot as having hit the target
    }
    
    /**
     * Persists the information from the model.
     */
    public function save()
    {
        // assemble data
        parent::save($data);
    }
    
    /**
     * Loads persisted information.
     * 
     * @param int $shotId
     */
    public function load($shotId)
    {
        parent::load($shotId);
    }
     
    
    /**
     * 
     * @return \Shapeup\Service\DistanceCalculator
     */
    public function getDistanceCalculator()
    {
        return $this->distanceCalculator;
    }

    /**
     * @param \Shapeup\Service\DistanceCalculations $distanceCalculator
     * @return \Shapeup\Model\Shot
     */
    public function setDistanceCalculator(DistanceCalculations $distanceCalculator)
    {
        $this->distanceCalculator = $distanceCalculator;
        return $this;
    }
}