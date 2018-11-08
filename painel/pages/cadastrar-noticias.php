<?php
    verificaPermissaoPagina(0);
    $noticias2 = MySql::conectar()->prepare("SELECT pk_usuario,nome FROM `tb_admin.usuarios`");
    $noticias2->execute();
?>
<div class="box-content">
    <h2><i class="fa fa-pencil"></i> Adicionar Notícias</h2>
    <form method="post" enctype="multipart/form-data">
        <?php
            if (isset($_POST['acao'])) {
                if (Noticias::insert($_POST)) {
                    Painel::alert('sucesso','O cadastro da Noticia foi feito com sucesso!');
                }else {
                    Painel::alert('erro','Erro ao cadastrar!');
                }
            }
        ?>
        
        <div class="form-group esconde">
            <label><i class="fa fa-user"></i> Publicador:</label>
            <input type="text" name="fk_id" value="<?php echo $_SESSION['pk_usuario']; ?>">
		</div><!--form-group-->
        <div class="form-group">
            <label><i class="fa fa-comments" aria-hidden="true"></i> Titulo:</label>
            <input  type="text" name="titulo">
        </div><!-- form-group -->
        <div class="form-group">
            <label><i class="fa fa-text-width" aria-hidden="true"></i> Notícia:</label>
            <textarea class="tinymce" name="noticia"></textarea>
        </div><!-- form-group -->
        <div class="form-group">
            <label><i class="fa fa-font" aria-hidden="true"></i> Fonte:</label>
            <input  type="text" name="fonte">
        </div><!-- form-group -->
        <div class="form-group">
			<label><i class="fa fa-calendar"></i> Data:</label>
			<input formato="data" type="text" name="data">
		</div><!--form-group-->
        <div class="form-group">
            <input type="hidden" name="nome_tabela" value="tb_site.noticias" />
            <input type="submit" name="acao" value="Cadastrar">
        </div><!-- form-group -->
        
    </form>
</div><!-- box-content -->