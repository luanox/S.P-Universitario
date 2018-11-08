$(function(){
    //Aqui vai todo codigo em javascript
    $('.mobile').click(function(){
        //o que vai acontecer quando clicarmos no .mobile
        var listaMenu = $('.mobile ul');
        listaMenu.slideToggle();  
    });

    if($('target').length > 0) {
        // movimentação dentro da pagina
        var elemento = '#'+$('target').attr('target');
        var divScroll = $(elemento).offset().top;
        $('html,body').animate({'scrollTop':divScroll},2000);
    }

	carregarDinamico();
	function carregarDinamico(){
		$('[realtime]').click(function(){
			var pagina = $(this).attr('realtime');
			$('.container-principal').load(include_path+'pages/'+pagina+'.php');

			return false;
		})
    }
    
    $(document).ready(function(){
        // formatar campo input para telefone
        $(".tel").keypress(function (e) {
          if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            return false;
          }
          var curchr = this.value.length;
          var curval = $(this).val();
          if (curchr == 2 && curval.indexOf("(") <= -1) {
            $(this).val("(" + curval + ")" + "-");
          } else if (curchr == 4 && curval.indexOf("(") > -1) {
            $(this).val(curval + ")-");
          } else if (curchr == 5 && curval.indexOf(")") > -1) {
            $(this).val(curval + "-");
          } else if (curchr == 9) {
            $(this).val(curval + "-");
            $(this).attr('maxlength', '14');
          }
        });
      });

})