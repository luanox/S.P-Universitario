<?php
    if (isset($_COOKIE['lembre'])) {
        $email = $_COOKIE['email'];
        $senha = $_COOKIE['senha_aluno'];
        $sql = MySql::conectar()->prepare("SELECT * FROM `tb_site.aluno` WHERE email = ? AND senha_aluno = ?");
        $sql->execute(array($email,$senha));
        if($sql->rowCount() == 1){
            $info = $sql->fetch();
            //Logamos com sucesso.
            $_SESSION['login'] = true;
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            $_SESSION['id_aluno'] = $info['id_aluno'];
            $_SESSION['nome_aluno'] = $info['nome_aluno'];
            header('Location: '.INCLUDE_PATH_ALUNO);
            die();
        }
    }
?>
<section class="login-user">
    <?php
        //validação para fazer o login
        if(isset($_POST['acao'])){
            $email = $_POST['email'];
            $senha = $_POST['senha_aluno'];
            $sql = MySql::conectar()->prepare("SELECT * FROM `tb_site.aluno` WHERE email = ? AND senha_aluno = ?");
            $sql->execute(array($email,$senha));
            if($sql->rowCount() == 1){
                $info = $sql->fetch();
                //Logamos com sucesso.
                $_SESSION['email'] = $email;
                $_SESSION['senha_aluno'] = $senha;
                $_SESSION['id_aluno'] = $info['id_aluno'];
                $_SESSION['nome_aluno'] = $info['nome_aluno'];
                header('Location: '.INCLUDE_PATH_ALUNO);
                die();
            }else{
                //Falhou
                echo '<div class="erro-box"><i class="fa fa-times"></i> Usuário ou senha incorretos!</div>';
            }
        }
    ?>
    <div class="login">
        <h1>Login</h1>
        <form method="post">
            <input type="text" name="email" placeholder="Email" require >
            <input type="password" name="senha_aluno" placeholder="senha" require>
            <button type="submit" name="acao" class="btn btn-primary btn-block btn-toggle">Entrar</button>
            <button type="submit" class="btn btn-primary btn-block btn-danger"><a href="<?php echo INCLUDE_PATH; ?>cadastrar">Cadastrar</a></button>
        </form>
    </div><!-- login -->
    <div class="clear"></div><!-- clear -->
</section><!-- Extras -->

