$(function(){
	var swiper1 = new Swiper('.mini .swiper-container', {
		slidesPerView: 1,
		spaceBetween: 14,
		loop: true,
		speed: 600,
		autoplay: {
			delay: 3500,
			disableOnInteraction: false,
		},
		parallax: true,
		navigation: {
			nextEl: '.mini .swiper-button-next',
			prevEl: '.mini .swiper-button-prev',
		}
	});
	var swiper2 = new Swiper('#main-slide .swiper-container', {
		slidesPerView: 1,
		spaceBetween: 14,
		loop: true,
		speed: 600,
		autoplay: {
			delay: 3500,
			disableOnInteraction: false,
		},
		parallax: true,
		navigation: {
			nextEl: '#main-slide .swiper-button-next',
			prevEl: '#main-slide .swiper-button-prev',
		},
		pagination: {
			el: '#main-slide .swiper-pagination',
			clickable: true,
		},
	});
});

$(window).on("load resize",function(){
	if ($(window).width()<=1260){
		$('.menu-button').on('click',function(){
			$(this).toggleClass('cross');
			$('nav').toggleClass('on');
		});
		$("nav .gnb li > a").on('click',function(){
			$(this).siblings('dl').toggle().parent('li').siblings().find('dl').hide();
		})
	}
});

