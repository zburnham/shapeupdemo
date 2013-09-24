<?php

namespace ShapeupTest\Service;

use Shapeup\Form;
use Shapeup\Hydrator;
use Shapeup\InputFilter;
use Shapeup\Model;
use Shapeup\Service as ServiceTest;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2013-09-22 at 13:32:43.
 */
class AbstractServiceClassTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var AbstractServiceClass
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new ServiceTest\AbstractServiceClass;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
        
    }

    /**
     * @covers Shapeup\Service\AbstractServiceClass::hydrate
     * odoo   Implement testHydrate().
     */
    public function testHydrate()
    {
        $this->object
                ->setModel(new Model\Shot)
                ->setHydrator (new Hydrator\Shot);
        $data = array(
            'angle' => 45,
            'velocity' => 60,
            'initialAltitude' => 100,
            'userAgentString' => 'oiajfpoaiwepo',
            'userId' => 3,
            'gravity' => 9.81,
            'shotId' => 5,
            'wasAHit' => 1,
            'targetId' => 4,
        );
        $this->object->hydrate($data);
        $model = $this->object->getModel();
        foreach ($data as $key => $value) {
            $getMethod = 'get' . ucfirst(($key));
            $model = $this->object->getModel();
            $this->assertEquals($data[$key],$model->$getMethod());
        }
    }

    /**
     * @covers Shapeup\Service\AbstractServiceClass::save
     * //MYTODO   Implement testSave().
     */
    public function testSave()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Shapeup\Service\AbstractServiceClass::load
     * //MYTODO   Implement testLoad().
     */
    public function testLoad()
    {
        // Remove the following lines when you implement this test.
        // MYTODO when you figure out mocking
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Shapeup\Service\AbstractServiceClass::getDb
     * //MYTODO   Implement testGetDb().
     */
    public function testGetDb()
    {
        // Remove the following lines when you implement this test.
        // MYTODO when you figure out mocking
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Shapeup\Service\AbstractServiceClass::setDb
     * //MYTODO   Implement testSetDb().
     */
    public function testSetDb()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Shapeup\Service\AbstractServiceClass::getModel
     * //MYTODO   Implement testGetModel().
     */
    public function testGetModel()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Shapeup\Service\AbstractServiceClass::setModel
     * //MYTODO   Implement testSetModel().
     */
    public function testSetModel()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Shapeup\Service\AbstractServiceClass::getHydrator
     * //MYTODO   Implement testGetHydrator().
     */
    public function testGetHydrator()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Shapeup\Service\AbstractServiceClass::setHydrator
     * //MYTODO   Implement testSetHydrator().
     */
    public function testSetHydrator()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Shapeup\Service\AbstractServiceClass::getForm
     * //MYTODO   Implement testGetForm().
     */
    public function testGetForm()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Shapeup\Service\AbstractServiceClass::setForm
     * //MYTODO   Implement testSetForm().
     */
    public function testSetForm()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Shapeup\Service\AbstractServiceClass::getInputFilter
     * //MYTODO   Implement testGetInputFilter().
     */
    public function testGetInputFilter()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Shapeup\Service\AbstractServiceClass::setInputFilter
     * //MYTODO   Implement testSetInputFilter().
     */
    public function testSetInputFilter()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Shapeup\Service\AbstractServiceClass::getServiceManager
     * //MYTODO   Implement testGetServiceManager().
     */
    public function testGetServiceManager()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Shapeup\Service\AbstractServiceClass::setServiceManager
     * //MYTODO   Implement testSetServiceManager().
     */
    public function testSetServiceManager()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Shapeup\Service\AbstractServiceClass::getIsDataValidated
     * //MYTODO   Implement testGetIsDataValidated().
     */
    public function testGetIsDataValidated()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Shapeup\Service\AbstractServiceClass::setIsDataValidated
     * //MYTODO   Implement testSetIsDataValidated().
     */
    public function testSetIsDataValidated()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

}
