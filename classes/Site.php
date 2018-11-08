<?php
	
	class Site{

		public static function updateUsuarioOnline(){
			if(isset($_SESSION['online'])){
				$token = $_SESSION['online'];
				$horarioAtual = date('Y-m-d H:i:s');
				$user = $_SESSION['id_aluno'];
				$check = MySql::conectar()->prepare("SELECT `id` FROM `tb_admin.online` WHERE token = ?");
				$check->execute(array($_SESSION['online']));

				if($check->rowCount() == 1){
					$sql = MySql::conectar()->prepare("UPDATE `tb_admin.online` SET ultima_acao = ? WHERE token = ?");
					$sql->execute(array($horarioAtual,$token));
				}else{
				if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			    $ip = $_SERVER['HTTP_CLIENT_IP'];
				} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
				} else {
			    $ip = $_SERVER['REMOTE_ADDR'];
				}
					$token = $_SESSION['online'];
					$horarioAtual = date('Y-m-d H:i:s');
					$sql = MySql::conectar()->prepare("INSERT INTO `tb_admin.online` VALUES (null,?,?,?,?)");
					$sql->execute(array($user,$ip,$horarioAtual,$token));
				}
			}else{
				$_SESSION['online'] = uniqid();
				if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
				    $ip = $_SERVER['HTTP_CLIENT_IP'];
				} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
				    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
				} else {
				    $ip = $_SERVER['REMOTE_ADDR'];
				}
				$token = $_SESSION['online'];
				$horarioAtual = date('Y-m-d H:i:s');
				$sql = MySql::conectar()->prepare("INSERT INTO `tb_admin.online` VALUES (null,?,?,?,?)");
				$sql->execute(array($ip,$horarioAtual,$token));
			}
		}

		public static function contador(){
			if(!isset($_COOKIE['visita'])){
				$user = $_SESSION['pk_usuario'];
				setcookie('visita','true',time() + (60*60*24*7));
				$sql = MySql::conectar()->prepare("INSERT INTO `tb_admin.visitas` VALUES (null,?,?,?)");
				$sql->execute(array($user,$_SERVER['REMOTE_ADDR'],date('Y-m-d')));
			}
		}

	}

?>