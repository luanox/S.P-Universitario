<?php
	if(isset($_COOKIE['lembrar'])){
		$user = $_COOKIE['user'];
		$password = $_COOKIE['password'];
		$sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios` WHERE user = ? AND password = ?");
		$sql->execute(array($user,$password));
		if($sql->rowCount() == 1){
				$info = $sql->fetch();
				$_SESSION['login'] = true;
				$_SESSION['user'] = $user;
				$_SESSION['id_user'] = $info['id'];
				$_SESSION['password'] = $password;
				$_SESSION['cargo'] = $info['cargo']; 
				$_SESSION['img'] = $info['img'];
				Painel::redirect(INCLUDE_PATH_PAINEL);
			
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Painel de controle</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>estilo/font-awesome.min.css">
	<link href="<?php echo INCLUDE_PATH_PAINEL ?>css/style.css" rel="stylesheet" />
</head>
<body>

	<div class="box-login">
		<?php
			if(isset($_POST['acao'])){
				$usuario = $_POST['usuario'];
				$senha = $_POST['senha'];
				$sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios` WHERE usuario = ? AND senha = ?");
				$sql->execute(array($usuario,$senha));
				if($sql->rowCount() == 1){
					$info = $sql->fetch();
					//Logamos com sucesso.
					$_SESSION['login'] = true;
					$_SESSION['usuario'] = $usuario;
					$_SESSION['senha'] = $senha;
					$_SESSION['pk_usuario'] = $info['pk_usuario'];;
					$_SESSION['cargo'] = $info['cargo'];
					$_SESSION['nome'] = $info['nome']; 
					$_SESSION['img'] = $info['img'];
					if(isset($_POST['lembrar'])){
						setcookie('lembrar',true,time()+(60*60*24),'/');
						setcookie('usuario',$usuario,time()+(60*60*24),'/');
						setcookie('senha',$senha,time()+(60*60*24),'/');
					}
					Painel::redirect(INCLUDE_PATH_PAINEL);
				}else{
					//Falhou
					echo '<div class="erro-box"><i class="fa fa-times"></i> Usuário ou senha incorretos!</div>';
				}
			}
		?>
		<h2>Efetue o login:</h2>
		<form method="post">
			<input type="text" name="usuario" placeholder="Login..." required>
			<input type="password" name="senha" placeholder="Senha..." required>
			<div class="form-group-login left">
				<input type="submit" name="acao" value="Logar!">
			</div>
			<div class="form-group-login right">
				<label>Lembrar-me</label>
				<input type="checkbox" name="lembrar" />
			</div>
			<div class="clear"></div>
		</form>
	</div><!--box-login-->

</body>
</html>