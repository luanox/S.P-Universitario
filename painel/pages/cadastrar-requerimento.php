<?php
    verificaPermissaoPagina(0);
    $noticias2 = MySql::conectar()->prepare("SELECT pk_usuario,nome FROM `tb_admin.usuarios`");
    $noticias2->execute();
?>
<div class="box-content">
    <h2><i class="fa fa-file-pdf-o"></i> Adicionar Requerimento</h2>
    <form method="post" enctype="multipart/form-data">
        <?php
            if (isset($_POST['acao'])) {
                if (Requerimento::insert($_POST)) {
                    Painel::alert('sucesso','O cadastro da Noticia foi feito com sucesso!');
                }else {
                    Painel::alert('erro','Erro ao cadastrar!');
                }
            }
        ?>
        <div class="form-group esconde">
			<label><i class="fa fa-user"></i> Publicador:</label>
            <input type="text" name="fk_id" value="<?php echo $_SESSION['pk_usuario']; ?>">
			<!-- <input type="text" name="fk_id"> -->
		</div><!--form-group-->
        <div class="form-group">
            <label><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Nome do Requerimento:</label>
            <input type="text" name="requerimento">
        </div><!-- form-group -->
        <div class="form-group">
            <input type="hidden" name="nome_tabela" value="tb_admin.requerimentos" />
            <input type="submit" name="acao" value="Cadastrar">
        </div><!-- form-group -->
        
    </form>
</div><!-- box-content -->