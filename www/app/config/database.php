<?php
if(file_exists('app/config/database.local.php')){
	require_once('database.local.php');
}else{
	class DATABASE_CONFIG {

		var $default = array(
			'driver' => '',
			'host' => '',
			'port' => '',
			'login' => '',
			'password' => '',
			'database' => '',
			'encoding' => 'y'
		);
	}
}
?>