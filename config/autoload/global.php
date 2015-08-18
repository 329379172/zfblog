<?php
/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

return [
    'service_manager' => [
        'factories' => [
            'Zend\Db\Adapter\Adapter' => 'Zend\Db\Adapter\AdapterServiceFactory'
        ]
    ],
    'db' => [
        'driver'         => 'Pdo',
        'dsn'            => 'mysql:dbname=dbname;host=localhost',
        'driver_options' => [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
        ],
        'username' => '',
        'password' => ''
    ],
    'Redis' => [
        'adapter' => 'redis',
        'options' => [
            'server' => [
                'host' => '',
                'port' => 6379
            ]
        ]
    ],
    'mysqli' => [
        'host' => '',
        'username' => '',
        'password' => '',
        'dbname' => ''
    ],
    'mail' => [
        'name' => 'qq',
        'host' => 'smtp.qq.com',
        'connection_class' => 'login',
        'connection_config' => [
            'username' => '',
            'password' => ''
        ]
    ],
    'mailTo' => '',
    'mailFrom' => ''
];