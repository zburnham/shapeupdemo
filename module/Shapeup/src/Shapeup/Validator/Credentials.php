<?php
/**
 * Credentials.php
 * Validator to check credentials against database.
 * 
 * @author Zachary Burnham zburnham@gmail.com
 */

namespace Shapeup\Validator;

use Zend\Crypt\Password\Bcrypt;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Where;
use Zend\Validator\Callback;

class Credentials extends Callback
{
    /**
     * TableGateway instance for database access.
     *
     * @var \Zend\Db\TableGateway\TableGateway
     */
    protected $db;
    
    /**
     * IsValid implementation.
     * Looks for a valid combination of username and (hashed) password.
     * 
     * @param type $value
     * @param type $context
     */
    public function isValid($value, $context = NULL)
    {
        $crypt = new Bcrypt;
        $username = $context['username'];
        $cryptPassword = $crypt->create($value);
        
        $db = $this->getDb();
        $where = new Where;
        $where->equalTo('username', $username)
                ->equalTo('password', $cryptPassword);
        $result = $db->select($where);
//        $result = $db->select('username = ?', $username)
//                ->andWhere('password = ?', $cryptPassword);
        if (1 == $result->count()) {
            return TRUE;
        } else if (0 == $result->count()) {
            return FALSE;
        } else {
            throw new \Exception('Invalid number of rows returned when we
                tried to verify credentials: ' . $result->count());
        }
    }
    
    /**
     * @return \Zend\Db\TableGateway\TableGateway
     */
    public function getDb()
    {
        return $this->db;
    }

    /**
     * @param \Zend\Db\TableGateway\TableGateway $db
     * @return \Shapeup\Validator\Credentials
     */
    public function setDb(TableGateway $db)
    {
        $this->db = $db;
        return $this;
    }
}