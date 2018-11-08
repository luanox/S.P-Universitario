<?php
    if (isset($_GET['excluir'])){
        $idExcluir = intval($_GET['excluir']);
        Slide::deletar('tb_site.slider',$idExcluir);
        Slide::redirect(INCLUDE_PATH_USUARIO.'listar-slider');
    }
    verificaPermissaoPagina(0);
    $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    $porPagina = 4;
    $slides = Slide::selectAll('tb_site.slider', ($paginaAtual - 1) * $porPagina,$porPagina*$paginaAtual);
?>
<div class="box-content">
    <h2><i class="fa fa-list"></i> Listar Slider</h2>
    <div class="wraper-table">
        <table>
            <tr>
                <td><i class="fa fa-user-circle-o"></i> Titulo</td>
                <!-- <td><i class="fa fa-comments"></i> Noticia</td> -->
                <td><i class="fa fa-calendar"></i> slider</td>
                <td></td>
                <td></td>
            </tr>
            <?php
                foreach ($slides as $key => $value) {
                
            ?>
            <tr>
                <td><?php echo $value['nome'] ?></td>
                <td><img style="width:350px;height:100px;" src="<?php echo INCLUDE_PATH_USUARIO?>uploads/<?php echo $value['img'] ?>"/></td>
                <td><a class="btn-edit" href="<?php echo INCLUDE_PATH_USUARIO ?>editar-slider?id=<?php echo $value['pk_slider']; ?>"><i class="fa fa-pencil-square-o"></i> Editar</a></td>
                <td><a actionBtn="delete" class="btn-delete" href="<?php echo INCLUDE_PATH_USUARIO ?>listar-slider?excluir=<?php echo $value['pk_slider']; ?>"><i class="fa fa-exclamation-circle"></i> Excluir</a></td>
            </tr>
            <?php } ?>
        </table>
    </div><!-- wraper-table -->

    <div class="paginacao">
        <?php
            $totalPaginas = ceil(count(Slide::selectAll('tb_site.slider')) / $porPagina);

            for ($i = 1; $i <= $totalPaginas; $i++) { 
                if ($i == $paginaAtual) {
                    echo '<a class="page-selected" href="'.INCLUDE_PATH_USUARIO.'listar-slider?pagina='.$i.'">'.$i.'</a>';
                }else{
                    echo '<a href="'.INCLUDE_PATH_USUARIO.'listar-slider?pagina='.$i.'">'.$i.'</a>';
                }
            }
        ?>
    </div>
    
</div><!-- box-content -->