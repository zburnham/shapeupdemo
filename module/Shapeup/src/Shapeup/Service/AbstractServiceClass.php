<?php
/**
 * AbstractServiceClass.php
 * Abstract class to base concrete service implementations on.
 * 
 * @author Zachary Burnham zburnham@gmail.com
 */

namespace Shapeup\Service;

use Shapeup\Hydrator\BaseHydrator;

use Zend\Db\TableGateway\TableGateway;
use Zend\InputFilter\InputFilter;
use Zend\Form\Form;
use Zend\ServiceManager\ServiceManager;

class AbstractServiceClass
{
    /**
     * TableGatway instance for interacting with database.
     *
     * @var \Zend\Db\TableGateway
     */
    protected $db;
    
    /**
     *
     * @var \Zend\ServiceManager\ServiceManager
     */
    //MYTODO inject this when it's asked for from the service manager.
    protected $sm;
    
    /**
     * Instance of corresponding Model class.
     *
     * @var mixed
     */
    protected $model;
    
    /**
     * Hydrator to populate / read values from model.
     *
     * @var Shapeup\Hydrator\BaseHydrator
     */
    protected $hydrator;
    
    /**
     * Form to accept user input.
     *
     * @var Zend\Form\Form
     */
    protected $form;
    
    /**
     * InputFilter for filtration/validation of user input.
     * 
     * @var \Zend\InputFilter\InputFilter
     */
    protected $inputFilter;
    
    /**
     * ServiceManager instance.
     * 
     * @var \Zend\ServiceManager\ServiceManager
     */
    protected $serviceManager;
    
    /**
     * Has this data been through the InputFilter?
     *
     * @var bool
     */
    protected $isDataValidated = FALSE;
    
    /**
     * The last auto-incremented value created.
     *
     * @var int
     */
    protected $lastInsertId;
    
    /**
     * Hydrates the model.
     * 
     * @param array $data
     * @return mixed
     */
    public function hydrate(array $data = array())
    {
        $model = $this->getModel();
        $this->getHydrator()->hydrate($data, $model);
        return $model;
    }
    
    /**
     * Persists the information in the databse.
     * 
     * @param array $data
     * @return int
     * @throws \Exception
     */
    public function save(array $data) 
    {
        if (!$this->getIsDataValidated()) {
            if (!$this->getInputFilter()->isValid($data)) {
                throw new \Exception('Tried to save invalid data.');
            } else {
                $this->setIsDataValidated(TRUE);
            }
        }
        $db = $this->getDb();
        $db->insert($data);
        $this->setLastInsertId($db->getLastInsertValue());
        return $db->getLastInsertValue();
    }
    
    /**
     * Populates model based on a the results of a database query.
     * 
     * @param string $value
     * @param string $field
     * @return array
     */
    public function load($value, $field = NULL) 
    {
        //This is a little too much magic for me, really.
        $db = $this->getDb();
        if (NULL === $field) {
            $tableName = strtolower($this->getDb()->getTable());
            $field = rtrim($tableName, 's') . 'Id';
        }
        $result = $db->select(array($field => $value));
        if (0 == $result->count()) {
            return FALSE;
        } else {
            return $result->toArray();
        }
        throw new \Exception('Something really went wrong with load().. The row count is' . $result->count());
       
    }
    
    /**
     * @return \Zend\Db\TableGateway
     */
    public function getDb()
    {
        return $this->db;
    }

    /**
     * @param \Zend\Db\TableGateway $db
     * @return \Shapeup\Service\AbstractServiceClass
     */
    public function setDb(TableGateway $db)
    {
        $this->db = $db;
        return $this;
    }
    
    /**
     * @return \Zend\ServiceManager\ServiceManager
     */
    public function getSm()
    {
        return $this->sm;
    }

    /**
     * @param \Zend\ServiceManager\ServiceManager\ $sm
     * @return \Shapeup\Service\AbstractServiceClass
     */
    public function setSm($sm)
    {
        $this->sm = $sm;
        return $this;
    }

    
    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param mixed $model
     * @return \Shapeup\Service\AbstractServiceClass
     */
    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    /**
     * @return \Shapeup\Hydrator\AbstractHydrator
     */
    public function getHydrator()
    {
        return $this->hydrator;
    }
    
    /**
     * @param Shapeup\Hydrator\BaseHydrator $hydrator
     * @return \Shapeup\Service\AbstractServiceClass
     */

    public function setHydrator(BaseHydrator $hydrator)
    {
        $this->hydrator = $hydrator;
        return $this;
    }

    /**
     * @return \Zend\Form\Form
     */
    public function getForm()
    {
        return $this->form;
    }

    /**
     * 
     * @param \Shapeup\Service\Zend\Form\Form $form
     * @return \Shapeup\Service\AbstractServiceClass
     */
    public function setForm(Form $form)
    {
        $this->form = $form;
        return $this;
    }

    /**
     * @return \Zend\InputFilter\InputFilter
     */
    public function getInputFilter()
    {
        return $this->inputFilter;
    }

    /**
     * @param \Zend\InputFilter\InputFilter $inputFilter
     * @return \Shapeup\Service\AbstractServiceClass
     */
    public function setInputFilter(InputFilter $inputFilter)
    {
        $this->inputFilter = $inputFilter;
        return $this;
    }

    /**
     * @return \Zend\ServiceManager\ServiceManager
     */
    public function getServiceManager()
    {
        return $this->serviceManager;
    }

    /**
     * @param \Zend\ServiceManager\ServiceManager $serviceManager
     * @return \Shapeup\Service\AbstractServiceClass
     */
    public function setServiceManager(ServiceManager $serviceManager)
    {
        $this->serviceManager = $serviceManager;
        return $this;
    }
    
    /**
     * @return bool
     */
    public function getIsDataValidated()
    {
        return $this->isDataValidated;
    }

    /**
     * @param bool $isDataValidated
     * @return \Shapeup\Service\AbstractServiceClass
     */
    public function setIsDataValidated($isDataValidated)
    {
        $this->isDataValidated = $isDataValidated;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getLastInsertId()
    {
        return $this->lastInsertId;
    }

    /**
     * @param int $lastInsertId
     * @return \Shapeup\Service\AbstractServiceClass
     */
    public function setLastInsertId($lastInsertId)
    {
        $this->lastInsertId = $lastInsertId;
        return $this;
    }
}