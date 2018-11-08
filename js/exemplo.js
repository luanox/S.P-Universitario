$(function() {
    
    var atual = -1;
    var maximo = $('.info-servicos').length -1;
    var timer;
    var animacaoDelay = 1;

    executarAnimacao();
    function executarAnimacao() {
        $('.info-servicos').hide();
        timer = setInterval(logicaAnimacao,animacaoDelay*300);
        function logicaAnimacao() {
            atual++;
            if (atual > maximo) {
                clearInterval(timer);
                return false;
            }
            $('.info-servicos').eq(atual).fadeIn();
        }
    }
})