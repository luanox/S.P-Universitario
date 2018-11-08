<?php
	session_start();
	date_default_timezone_set('America/Sao_Paulo');
	require('vendor/autoload.php');
	$autoload = function($class){
		if($class == 'Email'){
			require_once('classes/phpmailer/PHPMailerAutoload.php');
		}
		include('classes/'.$class.'.php');
	};



	spl_autoload_register($autoload);


	define('INCLUDE_PATH','http://localhost/S.P_Universitario/');
	define('INCLUDE_PATH_PAINEL',INCLUDE_PATH.'painel/');

	define('BASE_DIR_PAINEL',__DIR__.'/painel');
	//Conectar com banco de dados!
	define('HOST','mysql.hostinger.com.br');
	define('USER','u416850185_tcc');
	define('PASSWORD','99588494');
	define('DATABASE','u416850185_tcc');

?>