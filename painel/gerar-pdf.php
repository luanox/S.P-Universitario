<?php
	ob_start();
	include('templateFinanceiro.php');
	$conteudo = ob_get_contents();
	ob_end_clean();

	$mdpf = new mPDF();
	$mdpf->WriteHTML($conteudo);
	$mdpf->Output();
?>

