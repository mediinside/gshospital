$(function(){

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