<?php
	
	class Usuario{

		public function atualizarUsuario($nome,$senha,$imagem){
			$sql = MySql::conectar()->prepare("UPDATE `tb_admin.usuarios` SET nome = ?, senha = ?,img = ? WHERE usuario = ?");
			if($sql->execute(array($nome,$senha,$imagem,$_SESSION['usuario']))){
				return true;
			}else{
				return false;
			}
		}

		public static function userExists($user){
			$sql = MySql::conectar()->prepare("SELECT `id` FROM `tb_admin.usuarios` WHERE usuario=?");
			$sql->execute(array($user));
			if($sql->rowCount() == 1)
				return true;
			else
				return false;
		}

		public static function cadastrarUsuario($user,$senha,$imagem,$nome,$cargo){
			$sql = MySql::conectar()->prepare("INSERT INTO `tb_admin.usuarios` VALUES (null,?,?,?,?,?)");
			$sql->execute(array($user,$senha,$imagem,$nome,$cargo));
		}

	}

?>