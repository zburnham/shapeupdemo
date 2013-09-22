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
    /**
     * Auto-increment value.
     *
     * @var int
     */
    protected $targetId;
    
    /**
     * The size of the target.
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
}