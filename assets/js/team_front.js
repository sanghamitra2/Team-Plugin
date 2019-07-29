(function($){
	// popup-js
				$('.list_img').click(function(){
					$(this).siblings('.popup').fadeIn(500).css('display' , 'inline-flex').parent('li').addClass('active');
				});
				$('.popup .close').click(function(){
					$(this).parents('.popup').fadeOut(500).parent('li').removeClass('active');
				});
	
})(jQuery) 
