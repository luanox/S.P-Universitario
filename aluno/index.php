<?php
include('../config.php');
if(isset($_GET['sair'])){
	Painel::loggoutAluno();
}
?>
<?php Site::updateUsuarioOnline(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Painel do Aluno</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>estilo/font-awesome.min.css">
	<link rel="stylesheet" href="../estilo/solicitacao.css">
	<link rel="icon" href="../imagens/icon.png" type="image/x-icon" />
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<base base="<?php echo INCLUDE_PATH_ALUNO; ?>" />
	<?php
        $url = isset($_GET['url']) ? $_GET['url'] : 'home';
        switch ($url) {
            case 'home':
                echo '<target target="home" />';
                break;
            
            case 'user':
                echo '<target target="user" />';
                break;
        }
    ?>   
    <nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="home"><span class="glyphicon glyphicon-home"></span> Home</a></li>
				<li><a href="<?php echo INCLUDE_PATH_ALUNO; ?>user"><span class="glyphicon glyphicon-folder-open"></span> Últimas Solicitações </a></li>
				<li><a class="nav-item nav-link navbar-left" href="<?php echo INCLUDE_PATH_ALUNO ?>?sair"> <i class="glyphicon glyphicon-log-in"></i> <span>Sair</span></a></li>
			</ul>
		</div><!-- container-fluid -->
    </nav><!-- navbar navbar-inverse -->
    <div class="container-principal">
		<?php
		if(file_exists('pages/'.$url.'.php')){
			include('pages/'.$url.'.php');
		}else{
			if ($url != 'home' && $url != 'user'){
				$pagina404 = true;
				include('404.php');
			}else{
				include('aluno/home.php');
			}
		}
		?>
    </div><!-- container-principal-->
    <script src="<?php echo INCLUDE_PATH; ?>js/jquery.js"></script>
    <script src="<?php echo INCLUDE_PATH; ?>js/scripts.js"></script>
    <script src="<?php echo INCLUDE_PATH; ?>js/slider.js"></script>
    <script src="<?php echo INCLUDE_PATH; ?>js/exemplo.js"></script>
</body>
</html>