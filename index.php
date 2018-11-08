<?php include('config.php'); ?>
<?php Site::contador(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="estilo/boot.css">
    <link rel="stylesheet" href="estilo/noticia.css">
    <link rel="stylesheet" href="estilo/solicitacao.css">
    <link rel="stylesheet" href="estilo/login-painel.css">
    <link rel="stylesheet" href="estilo/style.default.css" id="theme-stylesheet">
    <link href="estilo/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo INCLUDE_PATH; ?>imagens/icon.png" type="image/x-icon" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>S.P Universitario</title>
</head>
<body>
<base base="<?php echo INCLUDE_PATH; ?>" />
    <?php
        $url = isset($_GET['url']) ? $_GET['url'] : 'home';
        switch ($url) {
            case 'login':
                echo '<target target="login" />';
                break;
            
            case 'noticia':
                echo '<target target="noticia" />';
                break;
        }
    ?>    
    <header>
        <div class="container">
            <div class="center">
                <div class="logo left">
                    <img src="imagens/logo.png" style="width:50px;">
                    <a href="/projeto_uemg1">S.P Universitário</a>
                </div><!-- Logo -->
                <nav class="desktop right">
                    <ul>
                        <li><a href="<?php echo INCLUDE_PATH; ?>">Home</a></li>
                        <li><a href="<?php echo INCLUDE_PATH; ?>noticias">Notícias</a></li>
                        <button type="submit" name="acao" class="btn btn-primary btn-login"><a href="<?php echo INCLUDE_PATH; ?>login">LOGIN <i class="fa fa-sign-out"></i></a></button>
                    </ul>
                </nav>
                <nav class="mobile right">
                    <div class="botao-menu-mobile">
                    <i class="fa fa-bars" aria-hidden="true"></i>   
                    </div>
                    <ul>
                        <li><a href="<?php echo INCLUDE_PATH; ?>">Home</a></li>
                        <li><a href="<?php echo INCLUDE_PATH; ?>noticias">Notícias</a></li>
                        <li><a href="<?php echo INCLUDE_PATH; ?>login">Login <i class="fa fa-sign-out"></i></a></li>
                    </ul>
                </nav>
            </div><!-- center -->
            </div>
        <div class="clear"></div><!-- clear-->
    </header>
    <div class="container-principal">
    <?php

        if(file_exists('pages/'.$url.'.php')){
            include('pages/'.$url.'.php');
        }else{
            if ($url != 'login' && $url != 'noticia'){
                $pagina404 = true;
                include('pages/404.php');
            }else{
                include('pages/home.php');
            }
        }
    ?>
    </div><!-- container-principal-->
    <footer class="main-footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6"><a href="#" class="brand">S.P Universitário</a>
            <ul class="contact-info list-unstyled">
              <li><a href="spuni@universidade.com">spuni@universidade.com</a></li>
              <li><a href="tel:5532999999999">+5532999999999</a></li>
            </ul>
          </div>
          <div class="col-lg-3 col-md-8">
            <h5>Outros Sistemas da Universidade</h5>
            <ul class="links list-unstyled">
              <li> <a href="http://webgiz.uemg.br/" target="_blank">WebGiz</a></li>
              <li> <a href="http://200.198.28.133/pergamum/biblioteca/index.php" target="_blank">SiBi - UEMG</a></li>
              <li> <a href="http://ava.uemg.br/" target="_blank">Educação a Distância (EaD)</a></li>
            </ul>
          </div>
          <div class="col-lg-3 col-md-6">
            <h5>Menu Footer</h5>
            <ul class="links list-unstyled">
              <li> <a href="<?php echo INCLUDE_PATH; ?>">Home</a></li>
              <li> <a href="<?php echo INCLUDE_PATH; ?>noticias">Notícias</a></li>
              <li> <a href="<?php echo INCLUDE_PATH; ?>login">Login</a></li>
              <li> <a href="<?php echo INCLUDE_PATH; ?>cadastrar">Cadastrar</a></li>
            </ul>
          </div>
          <div class="col-lg-3 col-md-6">
          <img style="width:180px;height:180px;" src="imagens/logoG.png" alt="..." class="img-fluid">
          </div>
        </div>
      </div>
      <div class="copyrights">
        <div class="container">
          <div class="row">
            <div class="col-md-7">
              <p>&copy; 2018 S.P Universitário All rights reserved.</p>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <script src="<?php echo INCLUDE_PATH; ?>js/jquery.js"></script>
    <script src="<?php echo INCLUDE_PATH; ?>js/scripts.js"></script>
    <script src="<?php echo INCLUDE_PATH; ?>js/slider.js"></script>
    <script src="<?php echo INCLUDE_PATH; ?>js/exemplo.js"></script>
</body>
</html>