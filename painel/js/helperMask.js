$(function(){

	$('[name=cpf]').mask('999.999.999-99');
	$('[name=cnpj]').mask('99.999.999/9999-99');
	$('[name=preco]').maskMoney({prefix:'R$ ', allowNegative: true, thousands:'.', decimal:',', affixesStay: false});

	$('[name=tipo_cliente]').change(function(){
		var val = $(this).val();
		if(val == 'fisico'){
			$('[name=cpf]').parent().show();
			$('[name=cnpj]').parent().hide();
		}else{
			$('[name=cpf]').parent().hide();
			$('[name=cnpj]').parent().show();
		}
	})

})