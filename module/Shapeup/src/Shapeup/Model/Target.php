<?php
/**
 * Target.php
 * Model to describe a target.
 * 
 * @author Zachary Burnham zburnham@gmail.com
 */

namespace Shapeup\Model;

class Target
{
    //MYTODO better descriptions in the @var entries on properties.
    
    /**
     * Auto-increment value.
     *
     * @var int
     */
    protected $targetId;
    
    /**
     * The user associated with this target.
     * Foreign key.
     * 
     * @var int
     */
    protected $userId;
    
    /**
     * The size of the target (radius).
     *
     * @var int
     */
    protected $size;
    
    /**
     * The position of the target.
     *
     * @var int
     */
    protected $position;
    
    /**
     * Has the target been destroyed?
     * 
     * @var bool
     */
    protected $isDestroyed;
    
    /**
     * @return int
     */
    public function getTargetId()
    {
        return $this->targetId;
    }
    
    /**
     * @param int $targetId
     * @return \Shapeup\Model\Target
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
     * @return \Shapeup\Model\Target
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
        return $this;
    }
        
    /**
     * @return int
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param int $size
     * @return \Shapeup\Model\Target
     */
    public function setSize($size)
    {
        $this->size = $size;
        return $this;
    }

    /**
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param int $position
     * @return \Shapeup\Model\Target
     */
    public function setPosition($position)
    {
        $this->position = $position;
        return $this;
    }
    
    /**
     * @return bool
     */
    public function getIsDestroyed()
    {
        return $this->isDestroyed;
    }

    /**
     * @param bool $isDestroyed
     * @return \Shapeup\Model\Target
     */
    public function setIsDestroyed($isDestroyed)
    {
        $this->isDestroyed = $isDestroyed;
        return $this;
    }
}