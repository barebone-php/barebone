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
        // no property key = null
        $result = \Barebone\Config::get();
        $this->assertNull($result);

        // property missing = null
        $result = \Barebone\Config::get('I_DONT_EXIST');
        $this->assertNull($result);

        // property exists = array, in this case.
        $result = \Barebone\Config::get('mysql');
        $this->assertArrayHasKey('host', $result);

        // property exists = string, in this case.
        $result = \Barebone\Config::get('mysql.host');
        $this->assertEquals('localhost', $result);
    }

    public function testConfigHas()
    {
        // property missing = false
        $result = \Barebone\Config::has('I_DONT_EXIST');
        $this->assertFalse($result);

        // property exists = true
        $result = \Barebone\Config::has('mysql');
        $this->assertTrue($result);
    }

    public function testConfigAll()
    {
        // return array with "all keys"
        $result = \Barebone\Config::all();
        $this->assertTrue(is_array($result));

    }
}