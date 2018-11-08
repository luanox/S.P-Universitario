<?php
    $noticias =  MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios` AS a INNER JOIN `tb_site.noticias` AS b ON a.pk_usuario=b.fk_id LIMIT 15");
    $noticias->execute();
    $slides = MySql::conectar()->prepare("SELECT * FROM  `tb_site.slider`");
    $slides->execute();
?>
<section class="banner-container">
    <?php
        foreach ($slides as $key => $value) { 
    ?>
    <tr>
        <div style="background-image: url('<?php echo INCLUDE_PATH; ?>');" class="banner-single"><img style="width:100%;height:100%;" src="<?php echo INCLUDE_PATH_USUARIO?>uploads/<?php echo $value['img'] ?>"/></div><!--banner-single-->
    </tr>
    <?php } ?>
    <div class="overlay"></div><!-- overlay -->
    <div class="bullets"></div><!-- bullets -->
</section><!-- banner container -->
<section class="extras">
    <div class="container">
        <div id="noticia" class="text-center noticia-container">
            <h2 class="title">ÚLTIMAS NOTÍCIAS</h2>
            <div class="depoimentos-sigle col-md-12 col-sm-12">
                <?php
                    foreach ($noticias as $key => $value) {
                ?>
                <p class="titulo-noticia col-md-12 col-sm-12"><span><?php echo $value['data'] ?></span><a href="<?php echo INCLUDE_PATH ?>noticias-single?id=<?php echo $value['pk_depo']; ?>"><?php echo $value['titulo'] ?></a></p>
                <?php } ?>
            </div><!-- depoimentos single -->
        </div><!--  -->
    </div><!-- Center -->
</section><!-- Extras -->
<section id="extra-features" class="extra-features servicos">
    <div class="container text-center">
        <h2 class="title">OUTROS SISTEMAS DA UNIVERSIDADE</h2>
        <div class="grid row">
            <div class="item col-lg-4 col-md-6">
                <h2><i class="fa fa-users" aria-hidden="true"></i></h2>
                <h3>WebGiz</h3>
                <p><a href="http://webgiz.uemg.br/" target="_blank">O WebGiz é uma ferramenta que o aluno tem para acessar suas notas, frequência e situação das disciplinas do módulo em curso. Além disso, o mecanismo disponibiliza as datas das aulas, das avaliações e os conteúdos ministrados pelos professores.</a></p>
            </div>
            <div class="item col-lg-4 col-md-6">
                <h2><i class="fa fa-book" aria-hidden="true"></i></h3>
                <h3>SiBi - UEMG</h3>
                <p><a href="http://200.198.28.133/pergamum/biblioteca/index.php" target="_blank">As Bibliotecas da UEMG são espaços de cultura e cidadania, cuja missão é proporcionar ao seu corpo docente, discente, técnico administrativo e comunidade em geral, acesso de qualidade às informações técnico-científicas buscando excelência em seus serviços com a melhoria contínua de suas ações.</a></p>
            </div>
            <div class="item col-lg-4 col-md-6">
                <h2><i class="fa fa-desktop" aria-hidden="true"></i></h2>
                <h3>Educação a Distância (EaD)</h3>
                <p><a href="http://ava.uemg.br/" target="_blank">EaD é uma forma de ensino/aprendizagem mediados por tecnologias que permitem que o professor e o aluno estejam em ambientes físicos diferentes.</a></p>
            </div>
        </div>
    </div>
    <div class="clear"></div><!-- clear -->
</section>


