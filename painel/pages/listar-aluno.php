<div class="box-content">
	<h2><i class="fa fa-id-card-o" aria-hidden="true"></i> Alunos</h2>
	<div class="busca">
		<h4><i class="fa fa-search"></i> Realizar uma busca</h4>
		<form method="post">
			<input style="font-size: 15px;" placeholder="Procure pelo nome do Aluno" type="text" name="busca">
			<input type="submit" name="acao" value="Buscar">
		</form>
	</div><!--busca-->
	<?php

		if(isset($_GET['deletar'])){
			//queremos deletar algum produto.
			$id = (int)$_GET['deletar'];
			MySql::conectar()->exec("DELETE FROM `tb_site.aluno` WHERE id_aluno = $id");
			Painel::alert('sucesso',"O empreendimento foi deletado com sucesso!");
		}

	?>
	<div class="boxes">
		<?php
			$query = "";
			if(isset($_POST['acao']) && $_POST['acao'] == 'Buscar'){
				$nome = $_POST['busca'];
				$query = "WHERE (nome LIKE '%$nome%')";
			}
			if($query == ''){
				$query2 = "";
			}else{
				$query2 = "";
			}
			$sql = MySql::conectar()->prepare("SELECT * FROM `tb_site.aluno` $query ORDER BY id_aluno ASC");

			$sql->execute();
			$aluno = $sql->fetchAll();
			if($query != ''){
				echo '<div style="width:100%;" class="busca-result"><p>Foram encontrados <b>'.count($aluno).'</b> resultado(s)</p></div>';
			}
			foreach ($aluno as $key => $value) {
		?>
		<div id="item-<?php echo $value['id_aluno']; ?>" class="box-single-wraper" style="padding:10px 20px;">
			<div style="border: 1px solid #ccc;padding:8px 15px;height: 100%;">
				<div style="width: 70%;float: left;border: 0;" class="box-single">
					<div class="body-box">
						<p><b><i class="fa fa-pencil"></i> Nome:</b> <?php echo $value['nome_aluno'] ?></p>
						<p><b><i class="fa fa-pencil"></i> Curso:</b> <?php echo ucfirst($value['curso']) ?></p>
						<div class="group-btn">
							<a class="btn delete" href="<?php echo INCLUDE_PATH_PAINEL ?>listar-empreendimentos?deletar=<?php echo $value['id_aluno']; ?>"><i class="fa fa-times"></i> Excluir</a>
							<a style="background: #0091ea" class="btn" href="<?php echo INCLUDE_PATH_PAINEL ?>visualizar-aluno?id=<?php echo $value['id_aluno']; ?>"><i class="fa fa-eye"></i> Visualizar</a>
						</div><!--group-btn-->
					</div><!--body-box-->
				</div><!--box-single-->
				<div class="clear"></div>
			</div>
		</div><!--box-single-wraper-->
		<?php } ?>
	</div><!--boxes-->
</div><!--box-content-->