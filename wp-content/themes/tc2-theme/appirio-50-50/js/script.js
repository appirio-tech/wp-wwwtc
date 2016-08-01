// JavaScript Document
//Custom Modal Plugin
(function($){
	$.fn.modal = function(){
		//Set position of modal
		var modalSetMiddle = function($element){
			var backHeight = $('.modal-drop').height();	
			if($element.data('rel') === 'modal-login'){
				$element = $element.find('.modal-body');
				var elemHeight = $element.height();
				if(backHeight >= elemHeight){
					$element.css({
						'margin-top': (backHeight - elemHeight)/2
					});
				}
			}
		};
		//Oepn modal function
		var modalOpen = function($element){
			var $element = $element || $('.modal-content');
			$('.modal-drop').addClass('in').attr('data-role',$element.data('rel'));
			$('.modal-dialog').addClass('in').attr('data-role',$element.data('rel')).attr('data-modal',$element.attr('id'));
			$('body').addClass('is-modal-open');
			$element.addClass('in');
			modalSetMiddle($element);
			$('.gallery').gallery('STOP');
		};
		//Close modal function
		var modalClose = function($element){
			var $element = $element || $('.modal-content');
			$('.modal-drop').removeClass('in');
			$('.modal-dialog').removeClass('in');
			$('body').removeClass('is-modal-open');
			if($element.length){
				$element.removeClass('in');
			}else{
				$('.modal-content').removeClass('in');
			}
			$('.gallery').gallery('START');
		};
		//Click on elements to trigger modal
		$(this).on('click',function(){
			var target = $(this).data('target');
			var $element = $('#'+target);
			if($('.modal-dialog').hasClass('in')){
				modalClose();
				setTimeout(function(){
					modalOpen($element);
				},1000);	
			}else{
				modalClose();
				modalOpen($element);
			}
			$(window).resize(function(){
				modalSetMiddle($element);
			});
		});
		//Close button on modal
		$('.modal-content .js-close').on('click',function(){
			modalClose();
		});
		//Click outside of modal
		$(document).on('click',function(event){
			if(!$(event.target).closest('.modal-body,.js-modal').length){
				modalClose();
			}	
		});
	};
})(jQuery);

//Gallery
(function($){
	$.fn.gallery = function(options){
		var _index = 0,
			_that = $(this),
			_content = _that.find('[data-role="content"]'),
			_widget = _that.find('[data-role="widget"]'),
			_length = _widget.length,
			_transition = 1500,
			_deferred = true,
			__status,
			_CT;
		
		//Create Pagination(Dots)
		var _setActive = function(index){
			var _dots = $('.dots-pagination');
			if(_CT){
				clearTimeout(_CT);
			}
			index ? (_deferred = false) : (index = 0);
			_widget.removeClass('active');
			_dots.find('li').removeClass('active');
			for(var i = index; i < _length; i++){
				_widget.eq(i).addClass('active');
			}
			_dots.find('li').eq(index).addClass('active');
			_dots.attr('data-index',index);
			$('.js-scroll').attr('data-index',index);
			_CT = setTimeout(function(){
				_deferred = true;	
			},_transition);
		}
		
		var _increate = function(index){
			if(index < _length - 1){
				index++;
			}
			_setActive(index);
			return index;	
		}
		
		var _decreate = function(index){
			if(index > 0){
				index--;
			}
			_setActive(index);	
			return index;	
		}
		
		var _init = function(){
			var _ul = $('<ul />');
			_ul.addClass('dots-pagination');
			for(var i = 0;i < _length;i++){
				var _li = $('<li />')
							.addClass('dots-pagination-item')
							.data('label',i)
							.appendTo(_ul);
				var _link = $('<a />')
								.text(i)
								.appendTo(_li);
			}
			_content.append(_ul);
			//Set Index to Widget
			_widget.each(function(index, element) {
				$(element).css({
					'z-index': _length - index	
				})
			});
			_setActive();
		}
		
		if(typeof options === 'undefined'){
			_init();
			_status = 'START';
			//Mouse Scroll
			$('body').bind('mousewheel', function(event) {
				if(_deferred && _status === 'START'){
					if(event.deltaY > -1){
						_index = _decreate(_index);
					}else{
						_index = _increate(_index);
					}
				}
			});
			//Keyboard Press
			$('body').on('keydown',function(event){
				if(_deferred && _status === 'START'){
					switch(event.which){
						//Up
						case 38:
							_index = _decreate(_index);
							break;
						//Down
						case 40:
							_index = _increate(_index);
							break;
						//Left
						case 37:
							if($('.widget-challenges').hasClass('active')){
								$('.widget-challenges .slider').slick('slickPrev');	
							}
							if($('.widget-quote').hasClass('active')){
								$('.widget-quote .slider').slick('slickPrev');	
							}
							break;
						//Right
						case 39:
							if($('.widget-challenges').hasClass('active')){
								$('.widget-challenges .slider').slick('slickNext');	
							}
							if($('.widget-quote').hasClass('active')){
								$('.widget-quote .slider').slick('slickNext');	
							}
							break;
					}
				}
			});
			//Swipe Up & Down
			$('body').swipe( {
			//Generic swipe handler for all directions
				swipe:function(event, direction, distance, duration, fingerCount, fingerData) {
					switch (direction){
						case 'up':
							_index = _increate(_index);
							break;
						case 'down':
							_index = _decreate(_index);
							break;
					}  
				}
			});
			//Dots Click
			$('.dots-pagination').on('click','li',function(){
				_index = $(this).data('label');
				_setActive(_index);
			});
		}
		if(typeof options === 'string'){
			_status = options;
		}
	};
})(jQuery);

$(document).ready(function(e) {
	
	$("header .logo, footer .logo").click(function() {
	  $(".dots-pagination li:first-child").click(); 
	});
	
	//Slider on Quote widget
	$('.widget-quote .slider').slick({
		arrows: false,
		autoplay: false,
  		autoplaySpeed: 10000,
		dots: true,
		infinite: true,
		slidesToShow: 1
	});
    //Slider on Crowdsourced Challenges widget
	$('.widget-challenges .slider').slick({
		arrows: false,
		centerMode: false,
		autoplay: false,
  		autoplaySpeed: 10000,
		dots: true,
		infinite: true,
		slidesToScroll: 4,
		slidesToShow: 4,
		responsive: [
			{
				breakpoint: 5600,
				settings: 'unslick'
			},
			{
				breakpoint: 1200,
				settings: 'unslick'
			},
			{
				breakpoint: 1024,
				settings: 'unslick'
			},
			{
				breakpoint: 768,
				settings: {
					slidesToScroll: 1,
					slidesToShow: 1
				}
			}
		]
	});
	
	$('.js-modal').modal();
	//Gallery
	var minWidth768 = window.matchMedia('(min-width: 768px)');
	handleMinWidth768 = function(mql) {
		if(mql.matches){
			$('.gallery').gallery();
			$('.gallery').gallery('START');	
			$('html,body,.main-container').scrollTop(0);
		}else{
			$('.gallery').gallery('STOP');	
		}
	};
	minWidth768.addListener(handleMinWidth768);
	if(matchMedia('(min-width: 768px)').matches){
		$('.gallery').gallery();
		$('.gallery').gallery('START');	
		$('html,body,.main-container').scrollTop(0);
	}
	
});