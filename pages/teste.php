<section class="requerimento"></section>
    <div class="center">
        <div class="servicos-requerimento">
            <div class="info-requerimento">
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
                    <div class="form-group">
                        <label><i class="fa fa-user"></i> Nome do Aluno</label>
                        <input type="text" name="nome"  require>
                    </div><!-- form-group -->
                    <div class="form-group">
                        <label><i class="fa fa-unlock-alt"></i> Senha </label>
                        <input type="password" name="senha" require>
                    </div><!-- form-group -->
                    <div class="form-group">
                        <label>Curso:</label>
                        <select name="tipo">
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
                    <div class="form-group">
                        <label><i class="fa fa-home"></i> Endereço </label>
                        <input type="text" name="endereco"  require>
                    </div><!-- form-group -->
                    <div class="form-group">
                        <label><i class="fa fa-map-marker"></i> Cidade </label>
                        <input type="text" name="cidade"  require>
                    </div><!-- form-group -->
                    <div class="form-group">
                        <label><i class="fa fa-map"></i> Estado </label>
                        <input type="text" name="estado" require>
                    </div><!-- form-group -->
                    <div class="form-group">
                        <label><i class="fa fa-envelope"></i> E-mail</label>
                        <input type="text" name="email"  require >
                    </div><!-- form-group -->
                    <div class="form-group">
                        <label><i class="fa fa-phone"></i> Telefone</label>
                        <input class="tel" type="text" name="tel" require >
                    </div><!-- form-group -->
                    <div class="form-group">
                        <input type="hidden" name="nome_tabela" value="tb_site.aluno" />
                        <input type="submit" name="acao" value="Cadastrar">
                    </div><!-- form-group -->
                </form> 
            </div><!-- info-protocolo -->
        </div><!-- W50 -->
    </div><!-- Center -->
    <div class="clear"></div><!-- clear -->
</section>Extras




<form method="post">
            <?php
                if (isset($_POST['acao'])) {
                    if (Solicitacao::insert($_POST)) {
                        Painel::alert('sucesso','Seu cadastro foi feito com sucesso!');
                    }else {
                        Painel::alert('erro','Erro ao fazer o Requerimento!');
                    }
                }
            ?>
            <div class="form-group col-md-12">
                <div class="col-md-6">
                    <label><i class="fa fa-user"></i> Nome do Aluno</label>
                    <input type="text" class="form-control" name="nome" placeholder="Nome do aluno">
                </div>
                <div class="col-md-6">
                    <label><i class="fa fa-unlock-alt"></i> Senha </label>
                    <input type="text" class="form-control" name="password" placeholder="senha">
                </div>
            </div><!-- form-group -->
            <div class="form-group col-md-12">
                <div class="col-md-6">
                    <label>Curso:</label>
                    <select name="curso" class="form-control">
                        <option value="">Selecione o curso</option>
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
                </div>
                <div class="col-md-6">
                    <label><i class="fa fa-home"></i> Endereço </label>
                    <input type="text" class="form-control" name="endereco" placeholder="Endereço">
                </div>
            </div><!-- form-group -->
            <div class="form-group col-md-12">
                <div class="col-md-6">
                    <label>Periodo:</label>
                    <select name="periodo" class="form-control">
                        <option value="">Selecione seu Periodo</option>
                        <option value="Administração">1º Periodo</option>
                        <option value="Ciências Biológicas">2º Periodo</option>
                        <option value="Geografia">3º Periodo</option>
                        <option value="História">4º Periodo</option>
                        <option value="Letras">5º Periodo</option>
                        <option value="Matemática">6º Periodo</option>
                        <option value="Pedagogia">7º Periodo</option>
                        <option value="Serviço Social">8º Periodo</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label><i class="fa fa-map-marker"></i> Cidade </label>
                    <input type="text" class="form-control" name="cidade" placeholder="Cidade">
                </div>
                <div class="col-md-3">
                    <label><i class="fa fa-map"></i> Estado </label>
                    <input type="text" class="form-control" name="estado" placeholder="Estado">
                </div>
            </div><!-- form-group -->
            <div class="form-group col-md-12">
                <div class="col-md-6">
                    <label><i class="fa fa-envelope"></i> E-mail</label>
                    <input type="text" class="form-control" name="email" placeholder="E-mail">
                </div>
                <div class="col-md-6">
                    <label><i class="fa fa-phone"></i> Telefone</label>
                    <input type="text" class="form-control tel" name="tel" placeholder="Telefone">
                </div>
            </div><!-- form-group -->
            <div class="form-group col-md-12">
                <div clas="col-md-12">
                    <input type="hidden" name="nome_tabela" value="tb_site.aluno" />
                    <input type="submit" class="btn btn-primary" value="Cadastrar">
                </div>
            </div><!-- form-group -->
        </form>