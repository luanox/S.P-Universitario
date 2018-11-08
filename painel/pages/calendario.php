<?php
	//$mes = isset($_GET['mes']) ? (int)$_GET['mes'] : date('m',time());
	//$ano = isset($_GET['ano']) ? (int)$_GET['ano'] : date('Y',time());

	$mes = date('m',time());
	$ano = date('Y',time());

	if($mes > 12)
		$mes = 12;
	if($mes < 1)
		$mes = 1;

	$numeroDias = cal_days_in_month(CAL_GREGORIAN,$mes,$ano);
	$diaInicialdoMes = date('N',strtotime("$ano-$mes-01"));

	$diaDeHoje = date('d',time());



	$diaDeHoje = "$ano-$mes-$diaDeHoje";

	$meses = array('Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','agosto','Setembro','Outubro','Novembro','Dezembro');

	//Nome do mês no formato de string!
	$nomeMes = $meses[(int)$mes-1];
?>

<div class="box-content">
	<h2><i class="fa fa-calendar" aria-hidden="true"></i> Calendário e Agenda | <u><?php echo $nomeMes ?></u>/<?php echo $ano; ?></h2></h2>

	<table class="calendario-table">
		<tr>
			<td>Domingo</td>
			<td>Segunda</td>
			<td>Terça</td>
			<td>Quarta</td>
			<td>Quinta</td>
			<td>Sexta</td>
			<td>Sabado</td>
		</tr>

		<?php
			$n = 1;
			$z = 0;
			$numeroDias+=$diaInicialdoMes;
			while ($n <= $numeroDias) {
				if($diaInicialdoMes == 7 && $z != $diaInicialdoMes){
					$z = 7;
					$n = 8;
				}
				if($n % 7 == 1){
					echo '<tr>';
				}

				if($z >= $diaInicialdoMes){
					$dia = $n - $diaInicialdoMes;
					if($dia < 10){
						$dia = str_pad($dia, strlen($dia)+1, "0", STR_PAD_LEFT);
					}
					$atual = "$ano-$mes-$dia";
					if($atual != $diaDeHoje){
					echo "<td dia=\"$atual\">$dia</td>";
					}else{
						echo '<td dia="'.$atual.'" class="day-selected">'.$dia.'</td>';
					}
				}else{
					echo "<td></td>";
					$z++;
				}
				if($n % 7 == 0){
					echo '</tr>';
				}
				$n++;
			}
		?>
		
	</table>

	<form method="post" action="<?php echo INCLUDE_PATH_PAINEL ?>ajax/calendario.php">
		<div class="card-title">Adicionar Tarefa para <?php echo date('d/m/Y',time()); ?></div>
		<input required="" type="text" name="tarefa" />
		<input required="" class="esconde" type="text" name="fk_usuario" value="<?php echo $_SESSION['pk_usuario']?>"/>
		<input type="hidden" name="data" value="<?php  echo date('Y-m-d'); ?>" />
		<input type="hidden" name="acao" value="inserir">
		<input type="submit"  value="Cadastrar!">
	</form>

	<div class="box-tarefas">
		<div class="card-title">
		Tarefas de <?php echo date('d/m/Y',time()); ?>
		</div>
		<?php
			$pegarTarefas = MySql::conectar()->prepare("SELECT * FROM `tb_admin.agenda` WHERE data = '$diaDeHoje' ORDER BY id DESC");
			$pegarTarefas->execute();
			$pegarTarefas = $pegarTarefas->fetchAll();
			foreach ($pegarTarefas as $key => $value) {

		?>
		<div class="box-tarefas-single">
			<h2><i class="fa fa-pencil"></i> <?php echo $value['tarefa']; ?></h2>
		</div>
		<?php } ?>
		<div class="clear"></div>
	</div>

</div>