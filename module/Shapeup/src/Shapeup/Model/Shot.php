<?php
/**
 * Shop.php
 * Model to describe an individual shot.
 * 
 * @author Zachary Burnham zburnham@gmail.com
 */

namespace Shapeup\Model;

class Shot
{
    /**
     * Auto-increment value.
     *
     * @var int
     */
    protected $shotId;
    
    /**
     * The angle at which the shot was taken.
     * 
     * @var float
     */
    protected $angle;
    
    /**
     * Initial velocity of the projectile.
     *
     * @var int
     */
    protected $velocity;
    
    /**
     * The initial height of the howitzer.
     *
     * @var int
     */
    protected $initialHeight;
    
    /**
     * Did the shot hit the target?
     *
     * @var bool
     */
    protected $wasAHit;
    
    /**
     * The ID of the target the shot was aiming for.
     * Foreign key.
     *
     * @var int
     */
    protected $targetId;
    
    /**
     * User-Agent header string for that particular shot.
     *
     * @var string
     */
    protected $userAgentString;
    
    /**
     * 
     *
     * @var int
     */
    protected $userId;

    /**
     * @return int
     */
    public function getShotId()
    {
        return $this->shotId;
    }

    /**
     * @param int $shotId
     * @return \Shapeup\Model\Shot
     */
    public function setShotId($shotId)
    {
        $this->shotId = $shotId;
        return $this;
    }

    /**
     * @return float
     */
    public function getAngle()
    {
        return $this->angle;
    }

    /**
     * @param float $angle
     * @return \Shapeup\Model\Shot
     */
    public function setAngle($angle)
    {
        $this->angle = round($angle, 2);
        return $this;
    }

    /**
     * @return int
     */
    public function getVelocity()
    {
        return $this->velocity;
    }

    /**
     * @param int $velocity
     * @return \Shapeup\Model\Shot
     */
    public function setVelocity($velocity)
    {
        $this->velocity = $velocity;
        return $this;
    }
    
    /**
     * @return float
     */
    public function getInitialHeight()
    {
        return $this->initialHeight;
    }

    /**
     * @param float $initialHeight
     * @return \Shapeup\Model\Shot
     */
    public function setInitialHeight($initialHeight)
    {
        $this->initialHeight = $initialHeight;
        return $this;
    }

    
    /**
     * @return bool
     */
    public function getWasAHit()
    {
        return $this->wasAHit;
    }

    /**
     * @param bool $wasAHit
     * @return \Shapeup\Model\Shot
     */
    public function setWasAHit($wasAHit)
    {
        $this->wasAHit = $wasAHit;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getTargetId()
    {
        return $this->targetId;
    }

    /**
     * @param int $targetId
     * @return \Shapeup\Model\Shot
     */
    public function setTargetId($targetId)
    {
        $this->targetId = $targetId;
        return $this;
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     * @return \Shapeup\Model\Shot
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getUserAgentString()
    {
        return $this->userAgentString;
    }

    /**
     * @param string $userAgentString
     * @return \Shapeup\Model\Shot
     */
    public function setUserAgentString($userAgentString)
    {
        $this->userAgentString = $userAgentString;
        return $this;
    }
}