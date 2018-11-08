$(function(){

	var curSlide = 0;
	var maxSlide = $('.banner-single').length - 1;
	var delay = 3;


	initSlider();
	changeSlide();


	function initSlider(){
		$('.banner-single').hide();
		$('.banner-single').eq(0).show();
		for(var i = 0; i < maxSlide+1; i++){
			var content = $('.bullets').html();
			if(i == 0)
				content+='<span class="active-slider"></span>';
			else
				content+='<span></span>';
			$('.bullets').html(content);
		}
	}

	function changeSlide(){
		setInterval(function(){
			$('.banner-single').eq(curSlide).fadeOut(1000);
			curSlide++;
			if(curSlide > maxSlide)
				curSlide = 0;
			$('.banner-single').eq(curSlide).fadeIn(1000);
			//Trocar bullets da navegacao do slider!
			$('.bullets span').removeClass('active-slider');
			$('.bullets span').eq(curSlide).addClass('active-slider');
		},delay * 3000);
	}


	$('body').on('click','.bullets span',function(){
		var currentBullet = $(this);
		$('.banner-single').eq(curSlide).animate({'opacity':'0'},2000);
		curSlide = currentBullet.index();
		$('.banner-single').eq(curSlide).animate({'opacity':'1'},2000);
		$('.bullets span').removeClass('active-slider');
		currentBullet.addClass('active-slider');
	});

})