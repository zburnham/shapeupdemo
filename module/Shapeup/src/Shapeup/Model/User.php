<?php
/**
 * User.php
 * Model to describe a user in the system.
 * 
 * @author Zachary Burnham zburnham@gmail.com
 */

namespace Shapeup\Model;

class User
{
    /**
     * Auto-increment id.
     *
     * @var int
     */
    protected $userId;
    
    /**
     * The user's selected username.
     * 
     * @var string
     */
    protected $username;
    
    /**
     * The user's chosen password, encrypted.
     * 
     * @var string
     */
    protected $password;
    
    /**
     * User's overall shot accuracy.  Tracked to two decimal points.
     * 
     * @var float
     */
    protected $accuracy;
    
    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     * @return \Shapeup\Model\User
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return \Shapeup\Model\User
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return \Shapeup\Model\User
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }
    
    /**
     * @return float
     */
    public function getAccuracy()
    {
        return $this->accuracy;
    }

    /**
     * @param float $accuracy
     * @return \Shapeup\Model\User
     */
    public function setAccuracy($accuracy)
    {
        $this->accuracy = round($accuracy, 2);
        return $this;
    }
}