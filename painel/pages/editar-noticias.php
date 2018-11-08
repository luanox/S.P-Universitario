<?php
    if(isset($_GET['id'])){
		$id = (int)$_GET['id'];
		$noticia = Noticias::select('tb_site.noticias','pk_depo = ?',array($id));
	}else{
		Usuario::alert('erro','Você precisa passar o parametro ID.');
		die();
	}
    
?>
<div class="box-content">
    <h2><i class="fa fa-pencil"></i> Editar Noticias</h2>
    <form method="post" enctype="multipart/form-data">
        <?php
            if(isset($_POST['acao'])){
				if(Noticias::update_noticias($_POST)){
					Painel::alert('sucesso','O depoimento foi editado com sucesso!');
					$noticia = Noticias::select('tb_site.noticias','pk_depo = ?',array($id));
				}else{
					Painel::alert('erro','Campos vázios não são permitidos.');
				}
			}
        ?>
        <div class="form-group">
            <label><i class="fa fa-comments" aria-hidden="true"></i> Noticia:</label>
            <textarea class="tinymce" name="noticia"><?php echo $noticia['noticia'] ?></textarea>
        </div><!-- form-group -->
        <div class="form-group">
			<label><i class="fa fa-calendar"></i> Data:</label>
			<input formato="data" type="text" name="data" value="<?php echo $noticia['data']; ?>">
		</div><!--form-group-->
        <div class="form-group">
            <input type="hidden" name="nome_tabela" value="tb_site.noticias" />
            <input type="submit" name="acao" value="Atualizar">
        </div><!-- form-group -->
        
    </form>
</div><!-- box-content -->