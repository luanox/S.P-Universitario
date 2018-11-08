<?php

	session_start();
	date_default_timezone_set('America/Sao_Paulo');
	$autoload = function($class){
		if($class == 'Email'){
			require_once('classes/phpmailer/PHPMailerAutoLoad.php');
		}
		include('classes/'.$class.'.php');
	};

	spl_autoload_register($autoload);


	define('INCLUDE_PATH','http://localhost/S.P_Universitario/');
	define('INCLUDE_PATH_PAINEL',INCLUDE_PATH.'painel/');
	define('INCLUDE_PATH_ALUNO',INCLUDE_PATH.'aluno/');
	define('INCLUDE_PATH_USUARIO',INCLUDE_PATH.'painel/');
	define('INCLUDE_PATH_NOTICIAS',INCLUDE_PATH.'painel/');
	define('INCLUDE_PATH_REQUERIMENTO',INCLUDE_PATH.'painel/');
	define('INCLUDE_PATH_SLIDE',INCLUDE_PATH.'painel/');
	define('INCLUDE_PATH_SOLICITACAO',INCLUDE_PATH.'painel/');

	define('BASE_DIR_PAINEL',__DIR__.'/painel');
	define('BASE_DIR_ALUNO',__DIR__.'/aluno');
	define('BASE_DIR_USUARIO',__DIR__.'/painel');
	define('BASE_DIR_NOTICIAS',__DIR__.'/painel');
	define('BASE_DIR_REQUERIMENTO',__DIR__.'/painel');
	define('BASE_DIR_SLIDE',__DIR__.'/painel');
	define('BASE_DIR_SOLICITACAO',__DIR__.'/painel');

	//Conectar com banco de dados!
	define('HOST','localhost');
	define('USER','root');
	define('PASSWORD','');
	define('DATABASE','tcc2');

	//Funções do painel
	function pegaCargo($indice){
		return Painel::$cargos[$indice];
	}

	function selecionadoMenu($par){
		/*<i class="fa fa-angle-double-right" aria-hidden="true"></i>*/
		$url = explode('/',@$_GET['url'])[0];
		if($url == $par){
			echo 'class="menu-active"';
		}
	}

	function verificaPermissaoMenu($permissao){
		if($_SESSION['cargo'] >= $permissao){
			return;
		}else{
			echo 'style="display:none;"';
		}
	}

	function verificaPermissaoPagina($permissao){
		if($_SESSION['cargo'] >= $permissao){
			return;
		}else{
			include('painel/pages/permissao_negada.php');
			die();
		}
	}
?>