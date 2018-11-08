<?php
if(isset($_GET['id'])){
    $id = (int)$_GET['id'];
    $aluno = Noticias::select('tb_site.aluno','id_aluno = ?',array($id));
}else{
    Usuario::alert('erro','Você precisa passar o parametro ID.');
    die();
}
$solicitacao =  MySql::conectar()->prepare("SELECT * FROM `tb_admin.requerimentos` AS a INNER JOIN `tb_site.solicitacao` AS b ON a.pk_requerimento=b.fk_requerimento WHERE fk_aluno = $id ");
$solicitacao->execute();
?>
<div class="box-content">
	<h2><i class="fa fa-id-card-o" aria-hidden="true"></i> Aluno: <?php echo $aluno['nome_aluno'] ?></h2>
	<div class="info-item">
		<div class="row1">
				<div class="card-title"><i class="fa fa-rocket"></i> S.P Universitario</div>
				<img style="width:250px;background: #c7c6c6;" src="../imagens/logoG.png">
		</div><!--row1-->
		<div class="row2">
            <div class="card-title"><i class="fa fa-rocket"></i> Informações do Aluno:</div>
            <p><i class="fa fa-pencil"></i> Nome: <?php echo $aluno['nome_aluno'] ?></p>
            <p><i class="fa fa-pencil"></i> Curso: <?php echo $aluno['curso'] ?> <span> /<?php echo $aluno['periodo'] ?></span></p>
            <p><i class="fa fa-pencil"></i> Endereço: <?php echo $aluno['endereco'] ?></p>
            <p><i class="fa fa-pencil"></i> Cidade: <?php echo $aluno['cidade'] ?></p>
            <p><i class="fa fa-pencil"></i> E-mail: <?php echo $aluno['email'] ?></p>
            <p><i class="fa fa-pencil"></i> Tel: <?php echo $aluno['tel'] ?></p>
		</div><!--row2-->
	    <div class="clear"></div>
	</div><!--info-item-->
	<div class="wraper-table">
	<table>
		<tbody>
            <tr style="background: #00bfa5;">
                <td>Requerimento</td>
                <td>Numero do Requerimento</td>
                <td>Data</td>
                <td>Estado</td>
            </tr>
            
                <?php
                 foreach ($solicitacao as $key => $value) {
                
                ?>
                <tr>
                    <td><?php echo $value['requerimento'] ?> </td>
                    <td><?php echo $value['num_protocolo']?></td>
                    <td><?php echo $value['data_requerimento'] ?></td>
                    <td><?php echo $value['estado']?></td>
                </tr>    
                <?php } ?>    
            		
	    </tbody>
    </table>
	
	</div>

</div><!--box-content-->