<?php
/**
 * User.php
 * Service class for interacting with a User object.
 * 
 * @author Zachary Burnham zburnham@gmail.com
 */

namespace Shapeup\Service;

//use Shapeup\Model\User;

use Zend\Crypt\Password\Bcrypt;
use Zend\Session;

class User extends AbstractServiceClass
{
    /**
     * The TableGateway instance that holds shot information.
     * We need this information to calculate the average accuracy
     * of the shots this user has taken.
     *
     * @var \Zend\Db\TableGateway
     */
    protected $shotsDb;
    
    /**
     * Calculates the accuracy average for a user.
     * 
     * @param \Shapeup\Model\User $user
     * @return float Average accuracy expressed in percent.
     * 
     *  //MYTODO needs a test.
     */
    public function calculateAverage($userId)
    {
        $db = $this->getShotsDb();
        $resultSet = $db->select(array('userId' => $userId));
        $shots = $resultSet->count();
        $totalHits = 0;
        for($i = 0; $i < $shots; $i++) {
            $row = $resultSet->current();
            $resultSet->next();
            if ('1' === $row['wasAHit'])
            {
                $totalHits++;
            }
        }
        $average = ($totalHits/$shots) * 100;
        return $average;
    }
    
    /**
     * Log the user in.
     * 
     * @param int $userId
     */
    public function logIn($userId)
    {
        $sessionContainer = new Session\Container;
        $sessionContainer->userId = $userId;
    }
    
    /**
     * Load the User information from the database.
     * 
     * @param  $userId
     * @throws \InvalidArgumentException
     */
    public function load($userId) 
    {
        if (!is_int($userId)) {
            //throw new \InvalidArgumentException('Invalid value given for user ID.');
        }
        parent::load($userId);
    }
    
    /**
     * Persists the item in the database.
     * This is where the password is encrypted.
     * Also updates the average accuracy value.
     * 
     * @return int
     */
    public function save()
    {
        $model = $this->getModel();
        
        $bcrypt = new Bcrypt;
        $data = array(
            'username' => $model->getUsername(),
            'password' => $bcrypt->create($model->getPassword()),
        );
        return parent::save($data);
    }
    
    /**
     * @return \Zend\Db\TableGateway
     */
    public function getShotsDB()
    {
        return $this->shotsDb;
    }

    /**
     * @param \Zend\Db\TableGateway $shotsDB
     * @return \Shapeup\Model\User
     */
    public function setShotsDB(\Zend\Db\TableGateway $shotsDB)
    {
        $this->shotsDb = $shotsDB;
        return $this;
    }
}