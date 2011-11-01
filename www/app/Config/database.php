<?php

if(file_exists('app/config/database.local.php')){
    require_once('database.local.php');
}else{

    class DATABASE_CONFIG {

        public $default = array(
            'datasource' => 'Database/Mysql',
            'persistent' => false,
            'host' => '',
            'login' => '',
            'port' => '',
            'password' => '',
            'database' => '',
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
}
