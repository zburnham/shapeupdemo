<?php
/**
 * AbstractServiceClass.php
 * Abstract class to base concrete service implementations on.
 * 
 * @author Zachary Burnham zburnham@gmail.com
 */

namespace Shapeup\Service;

use Shapeup\Hydrator\BaseHydrator;

use Zend\Db\TableGateway;
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
    
    public function save($data) 
    {
        if (!$this->getIsDataValidated()) {
            if (!$this->getInputFilter()->isValid($data)) {
                throw new \Exception('Tried to save invalid data.');
            } else {
                $this->setIsDataValidated(TRUE);
            }
        }
        $this->getDb()->insert($data);
    }
    
    /**
     * Populates model based on a the results of a database query.
     * 
     * @param string $value
     * @param string $field
     */
    public function load($value, $field = NULL) 
    {
        //This is a little too much magic for me, really.
        if (NULL === $field) {
            $tableName = strtolower($this->getDb()->getTable());
            $field = rtrim($tableName,'s') . 'Id';
        }
        $result = $this->getDb()->select(array($field => $value));
        $this->hydrate($result->toArray());
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
}