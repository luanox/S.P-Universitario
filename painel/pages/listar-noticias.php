<?php
    if (isset($_GET['excluir'])){
        $idExcluir = intval($_GET['excluir']);
        Noticias::deletar('tb_site.noticias',$idExcluir);
        Noticias::redirect(INCLUDE_PATH_USUARIO.'listar-noticias');
    }
    verificaPermissaoPagina(0);
    $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    $porPagina = 4;
    $noticias = Noticias::selectAll('tb_site.noticias', ($paginaAtual - 1) * $porPagina,$porPagina*$paginaAtual);
?>
<div class="box-content">
    <h2><i class="fa fa-list"></i> Listar Notícias</h2>
    <div class="wraper-table">
        <table>
            <tr>
                <td><i class="fa fa-user-circle-o"></i> Nome</td>
                <!-- <td><i class="fa fa-comments"></i> Noticia</td> -->
                <td><i class="fa fa-calendar"></i> Data</td>
                <td></td>
                <td></td>
            </tr>
            <?php
                foreach ($noticias as $key => $value) {
                
            ?>
            <tr>
                <td><?php echo $value['titulo'] ?></td>
                <td><?php echo $value['data'] ?></td>
                <td><a class="btn-edit" href="<?php echo INCLUDE_PATH_USUARIO ?>editar-noticias?id=<?php echo $value['pk_depo']; ?>"><i class="fa fa-pencil-square-o"></i> Editar</a></td>
                <td><a actionBtn="delete" class="btn-delete" href="<?php echo INCLUDE_PATH_USUARIO ?>listar-noticias?excluir=<?php echo $value['pk_depo']; ?>"><i class="fa fa-exclamation-circle"></i> Excluir</a></td>
            </tr>
            <?php } ?>
        </table>
    </div><!-- wraper-table -->

    <div class="paginacao">
        <?php
            $totalPaginas = ceil(count(Noticias::selectAll('tb_site.noticias')) / $porPagina);

            for ($i = 1; $i <= $totalPaginas; $i++) { 
                if ($i == $paginaAtual) {
                    echo '<a class="page-selected" href="'.INCLUDE_PATH_USUARIO.'listar-noticias?pagina='.$i.'">'.$i.'</a>';
                }else{
                    echo '<a href="'.INCLUDE_PATH_USUARIO.'listar-noticias?pagina='.$i.'">'.$i.'</a>';
                }
            }
        ?>
    </div>
    
</div><!-- box-content -->