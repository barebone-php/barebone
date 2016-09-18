<?php
use Barebone\Log;
use PHPUnit\Framework\TestCase;

use \Slim\Container as ContainerInterface;
use \Barebone\Controller;

class ControllerTest extends TestCase
{
    protected static $container;

    public static function setUpBeforeClass()
    {
        $environment = \Slim\Http\Environment::mock([
            'REQUEST_METHOD' => 'GET',
            'REQUEST_URI' => '/test/suite',
        ]);
        $request = \Slim\Http\Request::createFromEnvironment($environment);
        $response = new \Slim\Http\Response();
        self::$container = new \Slim\Container(compact('request', 'response', 'environment'));
    }

    public function testControllerConstruct()
    {
        $controller = new Controller( self::$container );

        $this->assertInstanceOf(\Slim\Http\Environment::class, $controller->getEnvironment());
        $this->assertInstanceOf(\Slim\Http\Request::class, $controller->getRequest());
        $this->assertInstanceOf(\Slim\Http\Response::class, $controller->getResponse());
    }


    public function testControllerLogTrait()
    {
        $controller = new Controller( self::$container );
        $current_log = file_get_contents(Log::getFilepath());

        // runtime only string
        $test_string = 'phpunit' . time();

        // test writing
        $log_was_written = $controller->log($test_string, 'info');
        $this->assertTrue($log_was_written);

        $log_was_written = $controller->log($test_string, 'warn');
        $this->assertTrue($log_was_written);

        $log_was_written = $controller->log($test_string, 'error');
        $this->assertTrue($log_was_written);

        // test if updated log contains string with set severity.
        $updated_log = file_get_contents(Log::getFilepath());

        $this->assertContains('INFO: ' . $test_string, $updated_log, 'Severity "info" was written');
        $this->assertContains('WARNING: ' . $test_string, $updated_log, 'Severity "warn" was written');
        $this->assertContains('ERROR: ' . $test_string, $updated_log,' Severity "error" was written');

        // restore application log
        file_put_contents(Log::getFilepath(), $current_log);
    }

    public function testLazySessionProperty()
    {
        $controller = new Controller( self::$container );

        // the session property doesn't exist by default
        $this->assertClassNotHasAttribute('session', Controller::class);

        // if accessed, __get returns the Session interface.
        $session = $controller->session;
        $this->assertInstanceOf(\Aura\Session\Segment::class, $session);

        // test expected session API
        $this->assertTrue(is_callable(array($session, 'set')));
        $this->assertTrue(is_callable(array($session, 'get')));
        $this->assertTrue(is_callable(array($session, 'clear')));
    }



}