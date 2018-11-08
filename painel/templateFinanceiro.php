<?php
include('../includeConstants.php');
?>
<?php
if(isset($_GET['id'])){
    $id = (int)$_GET['id'];
    $aluno = Noticias::select('tb_site.solicitacao','num_protocolo = ?',array($id));
}else{
    Usuario::alert('erro','Você precisa passar o parametro ID.');
    die();
}
?>

<style type="text/css">
	*{
		margin: 0;
		padding: 0;
		box-sizing: border-box;
	}

	h2{
		color: #000000;
		padding: 8px;
		text-align: center;
	}

	.box p{
		text-align: right;
	}
	.box{
		width: 900px;
		margin:0 auto;
	}

	table{
		width: 900px;
		margin-top:15px;
		border-collapse: collapse;
	}
	table td{
		font-size: 14px;
		padding:8px;
		border: 1px solid #ccc;
	}
</style>
<div class="box">
<?php
	$nome = (isset($_GET['pagamento']) && $_GET['pagamento'] == 'concluidos') ? 'Concluidos' : 'Pendentes';
?>
<h2> DECLARAÇÃO</h2>
	<div class="wraper-table">
		<p>Declaro, para os devidos fins, que <?php echo $aluno['nome'] ?> é aluna (o) regularmente matriculada (o) no curso de Mestrado do Programa de Pós-Graduação em Ciência da Computação da Universidade Federal de São Carlos, reconhecido pela CAPES, de acordo com a Portaria MEC 524/2008. Esta declaração é válida entre o período de <?php echo $aluno['data_requerimento'] ?>.</p>
	
	</div>

</div>