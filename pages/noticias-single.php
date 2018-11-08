<?php
    if(isset($_GET['id'])){
        $id = (int)$_GET['id'];
        $noticia = Noticias::select('tb_site.noticias','pk_depo = ?',array($id));
    }else{
        Usuario::alert('erro','Você precisa passar o parametro ID.');
        die();
    }
?>
<section class="noticias">
    <div class="center">
        <div class="info-noticia">
            <div class="title">
                <h2><?php echo $noticia['titulo'] ?></h2>
                <p><?php echo $noticia['data'] ?></p>
            </div><!-- title -->
            <div class="fonte">
                <p><?php echo $noticia['noticia'] ?></p>
            </div><!-- info-protocolo -->
            <span><?php echo $noticia['fonte'] ?></span>
        </div><!-- info-noticia -->
    </div><!-- Center -->
    <div class="clear"></div><!-- clear -->
</section><!-- noticias -->