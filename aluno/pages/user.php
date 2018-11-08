<?php
    $id=$_SESSION['id_aluno'];
    $solicitacao =  MySql::conectar()->prepare("SELECT * FROM `tb_admin.requerimentos` AS a INNER JOIN `tb_site.solicitacao` AS b ON a.pk_requerimento=b.fk_requerimento WHERE fk_aluno = $id");
    $solicitacao->execute();
?>
<div class="main-content container">
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card card-table">
                <div class="card-header">
                    <h2 class="title"><span class="glyphicon glyphicon-folder-open"></span> Suas solicitaçoês</h2>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-striped table-borderless">
                        <thead>
                            <tr>
                            <th style="width:40%;"><span class="glyphicon glyphicon-download-alt"></span> Requerimento</th>
                            <th style="width:30%;"><span class="glyphicon glyphicon-console"></span> Número do requerimento</th>
                            <th style="width:20%;"><span class="glyphicon glyphicon-calendar"></span> Data</th>
                            <th style="width:35%;"><span class="glyphicon glyphicon-check"></span> Estado</th>
                            </tr>
                        </thead>
                        <tbody class="no-border-x">
                            <?php
                                foreach ($solicitacao as $key => $value) {
                            ?>
                            <tr>
                                <td><?php echo $value['requerimento'] ?></td>
                                <td class="text-success"><?php echo $value['num_protocolo'] ?></td>
                                <td><?php echo $value['data_requerimento'] ?></td>
                                <td class="text-success"><?php echo $value['estado'] ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div><!-- card-body table-responsive -->
            </div><!-- card card-table -->
        </div><!-- col -->
    </div> <!-- row -->  
</div><!-- ain-content container -->
