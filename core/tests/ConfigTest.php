<?php
use PHPUnit\Framework\TestCase;


class ConfigTest extends TestCase
{
    public function testConfigLoader()
    {
        // check if we manage a static instance
        $this->assertClassHasStaticAttribute('instance', \Barebone\Config::class);

        // get the instance and see if its a Config type
        $instance = \Barebone\Config::instance();
        $this->assertInstanceOf(\Noodlehaus\Config::class, $instance);
    }

    public function testConfigLoaderApi()
    {
        // get the instance, test if it still provides the functions we use

        $instance = \Barebone\Config::instance();

        $this->assertTrue(is_callable(array($instance, 'has')));
        $this->assertTrue(is_callable(array($instance, 'get')));
        $this->assertTrue(is_callable(array($instance, 'all')));
    }

    public function testConfigGet()
    {
        // property missing = null
        $result = \Barebone\Config::read('I_DONT_EXIST');
        $this->assertNull($result);

        // property exists = array, in this case.
        $result = \Barebone\Config::read('mysql');
        $this->assertArrayHasKey('host', $result);

        // property exists = string, in this case.
        $result = \Barebone\Config::read('mysql.host');
        $this->assertEquals('localhost', $result);
    }

    public function testConfigHas()
    {
        // property missing = false
        $result = \Barebone\Config::exists('I_DONT_EXIST');
        $this->assertFalse($result);

        // property exists = true
        $result = \Barebone\Config::exists('mysql');
        $this->assertTrue($result);
    }

    public function testConfigAll()
    {
        // read without "key" = return array with "all keys"
        $result = \Barebone\Config::read();
        $this->assertTrue(is_array($result));

    }
}