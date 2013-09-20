<?php
/**
 * AbstractControllerTest.php
 * Abstract class for controller tests.  Basically cribs ::findParentPath()
 * from Bootstrap class, because paths to the application config
 * may vary.
 * 
 * @author Zachary Burnham zburnham@gmail.com
 */

namespace ShapeupTest\Controller;

use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

abstract class AbstractControllerTest extends AbstractHttpControllerTestCase
{
    public function setUp()
    {
        //This is somewhat less than perfect, but it makes
        //things a little more portable.
        $modulePath = static::findParentPath('module');
        $this->setApplicationConfig(
            include $modulePath . '/../config/application.config.php'
        );
        parent::setUp();
    }
    
    /**
     * Cribbed from Bootstrap class.
     */
    protected static function findParentPath($path)
    {
        $dir = __DIR__;
        $previousDir = '.';
        while (!is_dir($dir . '/' . $path)) {
            $dir = dirname($dir);
            if ($previousDir === $dir) return false;
            $previousDir = $dir;
        }
        return $dir . '/' . $path;
    }
}