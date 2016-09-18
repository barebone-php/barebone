<?php
require __DIR__ . '/../../core/vendor/autoload.php';
use \Barebone\Config;

$environment = Config::read('app.environment', 'development');
$config = Config::read('mysql', []);

return array(
    "paths" => array(
        "migrations" => "./migrations",
        "seeds" => "./seeds"
    ),
    "environments" => array(
        "default_migration_table" => "phinx",
        "default_database" => $environment,
        "development" => array(
            "adapter" => "mysql",
            "host" => $config['host'],
            "name" => $config['database'],
            "user" => $config['username'],
            "pass" => $config['password'],
            "port" => $config['port'],
            "charset" => $config['charset'],
            "collation" => $config['collation'],
        )
    )
);