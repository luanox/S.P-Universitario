<section class="requerimento">
    <div class="container cadastro">
    <form method="post" enctype="multipart/form-data">
                    <?php
                        if (isset($_POST['acao'])) {
                            if (Solicitacao::insert($_POST)) {
                                Painel::alert('sucesso','Seu cadastro foi feito com sucesso!');
                            }else {
                                Painel::alert('erro','Erro ao fazer o Requerimento!');
                            }
                        }
                    ?>
                    <div class="form-group col-md-6">
                        <label><i class="fa fa-user"></i> Nome do Aluno</label>
                        <input type="text" class="form-control" name="nome"  require>
                    </div><!-- form-group -->
                    <div class="form-group col-md-6">
                        <label><i class="fa fa-unlock-alt"></i> Senha </label>
                        <input type="password" class="form-control" name="senha_aluno" require>
                    </div><!-- form-group -->
                    <div class="form-group col-md-6">
                        <label>Curso:</label>
                        <select name="curso" class="form-control">
                            <option value="">Selecione o curso:</option>
                            <option value="Administração" style="color:red;">Não sou aluno</option>
                            <option value="Administração" style="color:green;">Ja sou formado(a)</option>
                            <option value="Administração">Administração</option>
                            <option value="Ciências Biológicas">Ciências Biológicas</option>
                            <option value="Geografia">Geografia</option>
                            <option value="História">História</option>
                            <option value="Letras">Letras</option>
                            <option value="Matemática">Matemática</option>
                            <option value="Pedagogia">Pedagogia</option>
                            <option value="Serviço Social">Serviço Social</option>
                            <option value="Sistemas de Informação">Sistemas de Informação</option>
                            <option value="Turismo">Turismo</option>
                        </select>
                    </div><!--form-group-->
                    <div class="form-group col-md-6">
                        <label><i class="fa fa-home"></i> Endereço </label>
                        <input type="text" class="form-control" name="endereco"  require>
                    </div><!-- form-group -->
                    <div class="form-group col-md-6">
                        <label>Periodo:</label>
                        <select name="periodo" class="form-control">
                            <option value="">Selecione seu Periodo</option>
                            <option value="1º Periodo">1º Periodo</option>
                            <option value="2º Periodo">2º Periodo</option>
                            <option value="3º Periodo">3º Periodo</option>
                            <option value="4º Periodo">4º Periodo</option>
                            <option value="5º Periodo">5º Periodo</option>
                            <option value="6º Periodo">6º Periodo</option>
                            <option value="7º Periodo">7º Periodo</option>
                            <option value="8º Periodo">8º Periodo</option>
                        </select>
                    </div><!--form-group-->
                    <div class="form-group col-md-3">
                        <label><i class="fa fa-map-marker"></i> Cidade </label>
                        <input type="text" class="form-control" name="cidade"  require>
                    </div><!-- form-group -->
                    <div class="form-group col-md-3">
                        <label><i class="fa fa-map"></i> Estado </label>
                        <input type="text" class="form-control" name="estado" require>
                    </div><!-- form-group -->
                    <div class="form-group col-md-6">
                        <label><i class="fa fa-envelope"></i> E-mail</label>
                        <input type="text" class="form-control" name="email"  require >
                    </div><!-- form-group -->
                    <div class="form-group col-md-6">
                        <label><i class="fa fa-phone"></i> Telefone</label>
                        <input class="tel" class="form-control" type="text" name="tel" require >
                    </div><!-- form-group -->
                    <div class="form-group">
                        <input type="hidden" name="nome_tabela" value="tb_site.aluno" />
                        <input type="submit" name="acao" value="Cadastrar">
                    </div><!-- form-group -->
                </form> 
    </div><!-- cadastro -->  
    <div class="clear"></div><!-- clear -->
</section><!-- // -->
