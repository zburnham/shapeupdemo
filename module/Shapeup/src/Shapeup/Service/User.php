<?php
/**
 * User.php
 * Service class for interacting with a User object.
 * 
 * @author Zachary Burnham zburnham@gmail.com
 */

namespace Shapeup\Service;

use Shapeup\InputFilter\Login;
use Shapeup\InputFilter\Register;

use Zend\Crypt\Password\Bcrypt;
use Zend\Db\TableGateway\TableGateway;
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
    // MYTODO remember to inject this
    protected $shotsDb;
    
    /**
     * Bcrypt instance for working with passwords.
     *
     * @var \Zend\Crypt\Password\Bcrypt
     */
    //MYTODO remember to inject this
    protected $crypt;
    
    /**
     * @var \Shapeup\InputFilter\Register
     */
    protected $registerInputFilter;
    
    /**
     * @var \Shapeup\InputFilter\Login
     */
    protected $loginInputFilter;
    
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
     * Pick the Register input filter.
     * 
     * @return void
     */
    public function initRegisterInputFilter()
    {
        $this->setInputFilter($this->getRegisterInputFilter());
    }
    
    /**
     * Pick the Login input filter.
     * 
     * @return void
     */
    public function initLoginInputFilter()
    {
        $this->setInputFilter($this->getLoginInputFilter());
    }
    /**
     * Creates a new user.
     * 
     * @param string $username
     * @param string $password
     * @return int The auto-increment ID for the new record. (userId)
     */
    public function createNew($username, $password)
    {
        $db = $this->getDb();
        $crypt = $this->getCrypt();
        $data = array(
            'username' => $username,
            'password' => $crypt->create($password),
        );
        $db->insert($data);
        return $db->getLastInsertValue();
    }
    
    /**
     * Gets the 5 users with the highest accuracy.
     * 
     * @return array
     */
    //MYTODO needs test
    public function getTop5()
    {
//        $db = $this->getDb();
//        $result = $db->select()
//                ->order('accuracy DESC')
//                ->limit(5);
//        return $result->toArray();
        return "Top 5";
    }
    
    /**
     * Load the User information from the database.
     * 
     * @param  $userId
     * @throws \InvalidArgumentException
     */
    public function load($userId, $field = 'userId') 
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
     * @param array $data
     * @return int
     */
    public function save(array $data = array())
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
    public function setShotsDB(TableGateway $shotsDB)
    {
        $this->shotsDb = $shotsDB;
        return $this;
    }
    /**
     * @return \Zend\Crypt\Password\Bcrypt
     */
    public function getCrypt()
    {
        return $this->crypt;
    }

    /**
     * @param \Zend\Crypt\Password\Bcrypt $crypt
     * @return \Shapeup\Service\User
     */
    public function setCrypt(Bcrypt $crypt)
    {
        $this->crypt = $crypt;
        return $this;
    }

    /**
     * @return \Shapup\InputFilter\Login
     */
    public function getLoginInputFilter()
    {
        return $this->loginInputFilter;
    }

    /**
     * @param \Shapeup\InputFilter\Login $loginInputFilter
     * @return \Shapeup\Service\User
     */
    public function setLoginInputFilter(Login $loginInputFilter)
    {
        $this->loginInputFilter = $loginInputFilter;
        return $this;
    }
    
    /**
     * @return \Shapeup\InputFilter\Register
     */
    public function getRegisterInputFilter()
    {
        return $this->registerInputFilter;
    }

    /**
     * @param \Shapeup\InputFilter\Register $registerInputFilter
     * @return \Shapeup\Service\User
     */
    public function setRegisterInputFilter(Register $registerInputFilter)
    {
        $this->registerInputFilter = $registerInputFilter;
        return $this;
    }
}