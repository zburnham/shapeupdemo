<?php
/**
 * Shot.php
 * Service class for interaction with the Shot model.
 * 
 * @author Zachary Burnham zburnham@gmail.com
 */

namespace Shapeup\Service;

//use Shapeup\Model\Shot;
use Shapeup\Service\DistanceCalculations;

class Shot extends AbstractServiceClass
{

    public function __construct()
    {
        //echo "Loading Shot.." . debug_backtrace();
    }
    /**
     * Service class that does the math.
     * 
     * @var \Shapeup\Service\DistanceCalculations
     */
    protected $distanceCalculator;

    public function getLandingLocation()
    {
        $calc = $this->getDistanceCalculator();
        $shot = $this->getModel();

        $calc->setAngle($model->getAngle())
                ->setInitialVelocity($model->getVelocity())
                // MYTODO refactor 'G' for consistency
                ->setG($model->getG())
                ->setInitialAltitude($model->getInitialAltitude());
        return $calc->calculateDistance();
    }

    /**
     * Did the shot hit the target?
     * @return void
     */
    public function markHit()
    {
        $this->getModel()->setWasAHit(TRUE);
    }

    /**
     * Persists the information from the model.
     * 
     * @param array $data
     * @return int
     */
    public function save(array $data = array())
    {
        $model = $this->getModel();
        if (empty($data)) {
            $data = array(
                'angle' => $model->getAngle(),
                'velocity' => $model->getVelocity(),
                'initialAltitude' => $model->getInitialAltitude(),
                'gravity' => $model->getGravity(),
                'wasAHit' => $model->getWasAHit(),
                'targetId' => $model->getTargetId(),
                'userId' => $model->getUserId(),
                'userAgentString' => $model->getUserAgentString(),
            );
        }
        return parent::save($data);
    }

    /**
     * Loads persisted information.
     * 
     * @param int $shotId
     */
    public function load($shotId, $field = 'shotId')
    {
        if (!is_int($shotId)) {
            //throw new \InvalidArgumentException('Invalid value given for shot ID.');
        }
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