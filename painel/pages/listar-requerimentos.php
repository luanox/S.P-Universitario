<?php
    verificaPermissaoPagina(0);
    $mes = date('m',time());
	$ano = date('Y',time());

	if($mes > 12)
		$mes = 12;
	if($mes < 1)
		$mes = 1;

	$numeroDias = cal_days_in_month(CAL_GREGORIAN,$mes,$ano);
	$diaInicialdoMes = date('N',strtotime("$ano-$mes-01"));

	$diaDeHoje = date('d',time());

    $diaDeHoje = "$diaDeHoje/$mes/$ano";
?>
<div class="box-content">
    <h2><i class="fa fa-list"></i> Listar Requerimentos</h2>
    <div class="busca">
		<h4><i class="fa fa-search"></i> Realizar uma busca</h4>
		<form method="post">
			<input formato="data" style="font-size: 15px;" placeholder="Procure pela data do requerimento" type="text" name="busca">
			<input type="submit" name="acao" value="Buscar">
		</form>
	</div><!--busca-->
    <div class="wraper-table">
        <table>
            <tr>
                <td><i class="fa fa-user"></i> Nome</td>
                <td><i class="fa fa-file-pdf-o"></i> Requerimento</td>
                <td><i class="fa fa-graduation-cap"></i> Data</td>
                <td><i class="fa fa-graduation-cap"></i> Estado</td>
                <td></td>
            </tr>
            <?php
                $query = "WHERE (data_requerimento = '$diaDeHoje')";
                if(isset($_POST['acao']) && $_POST['acao'] == 'Buscar'){
                    $data = $_POST['busca'];
                    $query = "WHERE (data_requerimento LIKE '%$data%')";
                }
                if($query == ''){
                    $query2 = "";
                }else{
                    $query2 = "";
                }
                $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.requerimentos` AS a INNER JOIN `tb_site.solicitacao` AS b ON a.pk_requerimento=b.fk_requerimento $query ORDER BY data_requerimento ");
                $sql->execute();
                $solicitacao = $sql->fetchAll();
                if($query != ''){
                    echo '<div style="width:100%;" class="busca-result"><p>Foram encontrados <b>'.count($solicitacao).'</b> resultado(s)</p></div>';
                }
                
            ?>
            <?php
                foreach ($solicitacao as $key => $value) {
            ?>
            <tr>
                <td><?php echo $value['nome'] ?></td>
                <td><?php echo $value['requerimento'] ?></td>
                <td><?php echo $value['data_requerimento'] ?></td>
                <td><?php echo $value['estado'] ?></td>
                <td>
                    <div class="gerar-pdf">
                        <a href="<?php echo INCLUDE_PATH_USUARIO ?>editar-solicitacao?id=<?php echo $value['num_protocolo']; ?>">Concluir</a>
                    </div>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div><!-- wraper-table -->
    
</div><!-- box-content -->