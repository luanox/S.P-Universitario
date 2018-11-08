<?php
    if(isset($_GET['id'])){
		$id = (int)$_GET['id'];
		$solicitacao = Painel::select('tb_site.solicitacao','num_protocolo = ?',array($id));
	}else{
		Painel::alert('erro','Você precisa passar o parametro ID.');
		die();
	}
    
?>
<div class="box-content">
    <h2><i class="fa fa-pencil"></i> Editar solicitacaos</h2>
    <form method="post" enctype="multipart/form-data">
        <?php
            if(isset($_POST['acao'])){
				if(Solicitacao::update($_POST)){
					Painel::alert('sucesso','O depoimento foi editado com sucesso!');
				}else{
					Painel::alert('erro','Campos vázios não são permitidos.');
				}
			}
        ?>
        <div class="form-group">
            <select name="estado">
                <option><?php echo $solicitacao['estado'] ?></option>
                <option value="Concluido">Concluido</option>
            </select>
        </div><!-- form-group -->
        <div class="form-group">
            <div class="gerar-pdf">
                <a target="_blank" href="<?php echo INCLUDE_PATH_PAINEL ?>gerar-pdf.php?id=<?php echo $solicitacao['num_protocolo']; ?>">Gerar PDF</a>
            </div>
        </div><!-- form-group -->
        <div class="form-group">
            <input type="hidden" name="nome_tabela" value="tb_site.solicitacao" />
            <input type="submit" name="acao" value="Atualizar">
        </div><!-- form-group -->
        
    </form>
</div><!-- box-content -->

