<?php 
class DATABASE_CONFIG {
    public $default = array(
        'datasource' => 'Database/Mysql',
        'persistent' => false,
        'host' => 'localhost',
        'port' => 8889,
        'login' => 'root',
        'password' => 'root',
        'database' => 'smscanada_cake_dev',
        'prefix' => '',
        //'encoding' => 'utf8',
    );


    public $test = array(
        'datasource' => 'Database/Mysql',
        'persistent' => false,
        'host' => 'localhost',
        'login' => 'user',
        'password' => 'password',
        'database' => 'test_database_name',
        'prefix' => '',
        //'encoding' => 'utf8',
    );
}

