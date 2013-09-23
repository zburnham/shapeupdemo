<?php
/**
 * ShotTest.php
 * Test suite for the Shapeup\Model\Shot class.
 * 
 * @author Zachary Burnham zburnham@gmail.com
 */

namespace ShapeupTest\Model;

use Shapeup\Model\Shot;

class ShotTest extends AbstractModelTest
{
    /**
     * @var \Shapeup\Model\Shot
     */
    protected $object;
    
    public function setUp()
    {
        parent::setUp();
        
        $this->setObject(new Shot);
    }
    
    /**
     * Data provider.
     * 
     * @return array
     */
    public function propertiesToTest()
    {
        return array(
            array('angle', 45.66),
            array('velocity' , 50),
            array('wasAHit', TRUE),
            array('targetId', 1324),
            array('userId', 1837),
            array('userAgentString', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:23.0) Gecko/20100101 Firefox/23.0'),
            array('gravity', 10),
            array('initialAltitude', 3));
    }
    
    /**
     * @return Shapeup\Model\Shot
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * @param \ShapeupTest\Model\Shapeup\Model\Shot $object
     * @return \ShapeupTest\Model\ShotTest
     */
    public function setObject($object)
    {
        $this->object = $object;
        return $this;
    }


}