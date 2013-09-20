<?php
/**
 * Calculations.php
 * Service to do the calculations the physics dictates.
 * 
 * You will notice that there is no property for the weight
 * of the projectile in this class.  Weight/mass is irrelevant
 * to the calculation; everything accellerates towards the center of 
 * the Earth at the same rate.  Think about Galileo and the Leaning
 * Tower of Pisa.
 * 
 * These calculations also disregard windage or air resistance.
 * 
 * @author Zachary Burnham zburnham@gmail.com 
 */

namespace Shapeup\Service;

class DistanceCalculations
{
    /**
     * Acceleration due to gravity.
     * Defaults to value found on Earth, in meters per second per second.
     *
     * @var float
     */
    protected $g = 9.81;
    
    /**
     * Altitude the projectile was launched from, in meters.
     *
     * @var int
     */
    protected $initialAltitude = 0;
    
    /**
     * Initial velocity of the projectile, in meters per second.
     *
     * @var int
     */
    protected $initialVelocity;
    
    /**
     * Final distance traveled by projectile, in meters.
     *
     * @var float
     */
    protected $distance;
    
    /**
     * Initial angle of projectile relative to horizontal, in degrees.
     *
     * @var int
     */
    protected $angle;
    
    /**
     * Calculates the distance traveled by a projectile
     * given the values set in the class properties.
     * Returns value accurate to two decimal places.
     * 
     * @return float
     * @throws \Exception
     */
    public function calculateDistance()
    {
        if (
            NULL === $this->angle ||
            NULL === $this->initialVelocity
           ) {
            throw new \Exception('Angle and initial velocity must be set.');
        }
        
        $alt = $this->getInitialAltitude();
        $vel = $this->getInitialVelocity();
        $g = $this->getG();
        $theta = $this->getAngle();
        
        $distance =
            (($vel * cos(deg2rad($theta))) / $g) *
                (
                    ($vel * sin(deg2rad($theta))) +
                    sqrt(
                            pow($vel * sin(deg2rad($theta)), 2) + (2 * $g * $alt))
                );
        $distance = round($distance, 2);
        $this->setDistance($distance);        
        return $distance;
    }
    
    /**
     * @return float
     */
    public function getG()
    {
        return $this->g;
    }

    /**
     * @param float $g
     * @return \Shapeup\Service\Calculations
     */
    public function setG($g)
    {
        $this->g = $g;
        return $this;
    }

    /**
     * @return int
     */
    public function getInitialAltitude()
    {
        return $this->initialAltitude;
    }

    /**
     * @param int $initialAltitude
     * @return \Shapeup\Service\Calculations
     */
    public function setInitialAltitude($initialAltitude)
    {
        $this->initialAltitude = $initialAltitude;
        return $this;
    }

    /**
     * @return int
     */
    public function getInitialVelocity()
    {
        return $this->initialVelocity;
    }

    /**
     * @param int$initialVelocity
     * @return \Shapeup\Service\Calculations
     */
    public function setInitialVelocity($initialVelocity)
    {
        $this->initialVelocity = $initialVelocity;
        return $this;
    }

    /**
     * @return float
     */
    public function getDistance()
    {
        return $this->distance;
    }

    /**
     * @param float $distance
     * @return \Shapeup\Service\Calculations
     */
    public function setDistance($distance)
    {
        $this->distance = $distance;
        return $this;
    }

    /**
     * @return int
     */
    public function getAngle()
    {
        return $this->angle;
    }

    /**
     * @param int $angle
     * @return \Shapeup\Service\Calculations
     */
    public function setAngle($angle)
    {
        $this->angle = $angle;
        return $this;
    }




}