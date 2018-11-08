<?php
    $requerimento = MySql::conectar()->prepare("SELECT pk_requerimento,requerimento FROM `tb_admin.requerimentos`");
    $requerimento->execute();

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
<div class="servicos-requerimento container">
    <div class="title-requerimento">
        <h2>SOLICITAÇÃO DE PROTOCOLO</h2>
    </div><!-- title -->
    <div class="info-requerimento">
        <p>Para qualquer solicitação de protocolo e necessário o pagamento do DAE no <a href="http://www.daeuemg.mg.gov.br/a1dw/emitirdae.do" TARGET="_blank">link</a></p>
        <div class="notificacao">
            <p>Retirar o documento na Secretaria do local do seu curso.</p>
        </div><!-- form-group --> 
        <form method="post" enctype="multipart/form-data">
        <?php
            if (isset($_POST['acao'])) {
                if (Solicitacao::insert($_POST)) {
                    Painel::alert('sucesso','O Requerimento foi feito com sucesso!');
                }else {
                    Painel::alert('erro','Erro ao fazer o Requerimento!');
                }
            }
        ?>
        <div class="form-group">
            <label><span class="glyphicon glyphicon-education"></span> Nome do Aluno </label>
            <input class="form-control" type="text" name="nome"  value="<?php echo $_SESSION['nome_aluno']; ?>"require>
        </div><!-- form-group -->
        <div class="form-group">
            <label><span class="glyphicon glyphicon-download-alt"></span> Requerimento:</label>
            <select class="form-control" name="fk_requerimento" id="">
                <option value="">Selecione o Requerimento:</option> 
                <?php
                    foreach ($requerimento as $key => $value) {     
                ?>
                <option value="<?php echo $value['pk_requerimento'] ?>"><?php echo $value['requerimento'] ?></option>
                <?php } ?>
            </select>
        </div><!--form-group-->
        <div class="form-group int">
            <input type="password" name="fk_aluno"  value="<?php echo $_SESSION['id_aluno']; ?>" require>
            <input type="text" name="data_requerimento"  value="<?php echo $diaDeHoje ?>" require>
            <input type="text" name="estado"  value="Em andamento" require>
        </div><!-- form-group -->
        <div class="form-group">
            <input type="hidden" name="nome_tabela" value="tb_site.solicitacao" />
            <input class="btn btn-primary" type="submit" name="acao" value="Solicitar">
        </div><!-- form-group -->
    </form>
    </div><!-- info-protocolo -->
</div><!-- W50 -->