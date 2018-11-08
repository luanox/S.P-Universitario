<?php

	include('../../includeConstants.php');
	/**/
	$data['sucesso'] = true;
	$data['mensagem'] = "";

	if(Painel::logado() == false){
		die("Você não está logado!");
	}

	if(isset($_POST['acao']) && $_POST['acao'] == 'inserir_mensagem'){
		$mensagem = $_POST['mensagem'];
		$nome = $_SESSION['nome'];
		$id_user = $_SESSION['id_user'];
		
		$sql = MySql::conectar()->prepare("INSERT INTO `tb_admin.chat` VALUES (null,?,?)");
		$sql->execute(array($id_user,$mensagem));

		echo '<div class="mensagem-chat">
				<span>'.$nome.':</span>
				<p>'.$mensagem.'</p>
			</div><!--mensagem-chat-->';



	$_SESSION['lastIdChat'] = MySql::conectar()->lastInsertId();

	}else if(isset($_POST['acao']) && $_POST['acao'] == 'pegarMensagens'){
		//Recuperar mensagens
		$lastId = $_SESSION['lastIdChat'];

		$sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.chat` WHERE id > $lastId");
		$sql->execute();
		$mensagens = $sql->fetchAll();
		$mensagens = array_reverse($mensagens);
		foreach ($mensagens as $key => $value) {
			$nomeUsuario = MySql::conectar()->prepare("SELECT nome FROM `tb_admin.usuarios` WHERE id = $value[user_id]");
			$nomeUsuario->execute();
			$nomeUsuario = $nomeUsuario->fetch()['nome'];
			echo '<div class="mensagem-chat">
				<span>'.$nomeUsuario.':</span>
				<p>'.$value['mensagem'].'</p>
			</div><!--mensagem-chat-->';

			$_SESSION['lastIdChat'] = $value['id'];
		}
	}
?>