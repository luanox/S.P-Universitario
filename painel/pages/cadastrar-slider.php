<?php
    verificaPermissaoPagina(0);
    $noticias2 = MySql::conectar()->prepare("SELECT pk_usuario,nome FROM `tb_admin.usuarios`");
    $noticias2->execute();
?>
<div class="box-content">
    <h2><i class="fa fa-file-pdf-o"></i> Adicionar Slider</h2>
    <form method="post" enctype="multipart/form-data">
    
        <?php
            if (isset($_POST['acao'])) {
                $fk_usuario = $_POST['fk_usuario'];
                $nome = $_POST['nome'];
                $img = $_FILES['img'];

                if ($fk_usuario == '') {
                    Painel::alert('erro','O fk_usuario está vázio!');
                }elseif ($nome == '') {
                    Painel::alert('erro','O nome está vázio!');
                }elseif ($img['name'] == '') {
                    Painel::alert('erro','A imagem está vázio!');
                }else{
                    if (Slide::imagemValida($img) == false) {
                        Painel::alert('erro','O formato especificado não está correto!');
                    }else{
                        $usuario = new Slide();
                        $img = Slide::uploadFile($img);
                        $usuario->cadastrarSlider($fk_usuario,$nome,$img);
                        Painel::alert('sucesso','O cadastro do slider foi feito com sucesso!');
                    }
                }
            }
        ?>
        <div class="form-group esconde">
            <label><i class="fa fa-user"></i> Publicador:</label>
            <input type="text" name="fk_usuario" value="<?php echo $_SESSION['pk_usuario']; ?>">
		</div><!--form-group-->
        <div class="form-group">
            <label><i class="fa fa-cog" aria-hidden="true"></i> Titulo:</label>
            <input type="text" name="nome"  require>
        </div><!-- form-group -->
        <div class="form-group">
            <label><i class="fa fa-picture-o" aria-hidden="true"></i> Imagem:</label>
            <input type="file" name="img" require>
        </div><!-- form-group -->
        <div class="form-group">
            <input type="submit" name="acao" value="Cadastrar">
        </div><!-- form-group -->
        
    </form>
</div><!-- box-content -->