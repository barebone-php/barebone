<?php
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

        $log_was_written = $controller->log('phpunit testControllerTrait');
        $this->assertTrue($log_was_written);

        $log_was_written = $controller->log('phpunit testControllerTrait', 'warn');
        $this->assertTrue($log_was_written);

        $log_was_written = $controller->log('phpunit testControllerTrait', 'error');
        $this->assertTrue($log_was_written);

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