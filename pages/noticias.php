 <section class="noticias">
    <div class="container">
        <div class=" col-md-12">
            <div class="col-md-4">
                <form class="pesquisa input-group" method="post">
                    <input class="form-control" style="font-size: 15px;" placeholder="Procure pele notícia" type="text" name="busca">
                    <input class="btn btn-danger" type="submit" name="acao" value="Buscar">
                </form>
            </div><!-- col-md-4 -->
            <div class="minhas-noticias col-md-8">
                <?php
                    $query = "";
                    if(isset($_POST['acao']) && $_POST['acao'] == 'Buscar'){
                        $titulo = $_POST['busca'];
                        $query = "WHERE (titulo LIKE '%$titulo%')";
                    }
                    if($query == ''){
                        $query2 = "";
                    }else{
                        $query2 = "";
                    }
                    $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios` AS a INNER JOIN `tb_site.noticias` AS b ON a.pk_usuario=b.fk_id $query ORDER BY data ASC");
        
                    $sql->execute();
                    $noticias = $sql->fetchAll();
                    if($query != ''){
                        echo '<div style="width:100%;" class="busca-result"><p>Foram encontrados <b>'.count($noticias).'</b> resultado(s)</p></div>';
                    }
                    foreach ($noticias as $key => $value) {
                ?>        
                <p class="titulo-noticia col-md-12"><a href="<?php echo INCLUDE_PATH ?>noticias-single?id=<?php echo $value['pk_depo']; ?>"><?php echo $value['titulo'] ?></a></p>
                <?php } ?>
            </div><!-- minhas noticias -->
        </div><!-- col-md-12 -->
    </div><!-- container -->
</section><!-- noticias -->