// -------------------------
// LoadEvent
// -------------------------
$(function(){

	$(window).on('load',function(){
		FadeInFunc();
	});
	$(window).resize(function (){
		FadeInFunc();
	});
	$(document).ready(function(){
		FadeInFunc();
	});
});

function FadeInFunc(){
	$(".FadeInLeft").each(function(){
		if ( $(this).offset().top > 0 ) {
			var offset = $(this).offset().top;
			var scrolltop = $(window).scrollTop();
			var windowH = $(window).height();
	
			if (scrolltop > offset - windowH * 0.75){
				$(this).css("opacity","1");
				moveX="translate(0,0)";
				$(this).css("-webkit-transform",moveX);
			}
		}
	});

	$(".FadeInRight").each(function(){
		if ( $(this).offset().top > 0 ) {
			var offset = $(this).offset().top;
			var scrolltop = $(window).scrollTop();
			var windowH = $(window).height();
	
			if (scrolltop > offset - windowH * 0.75){
				$(this).css("opacity","1");
				moveX="translate(0,0)";
				$(this).css("-webkit-transform",moveX);
			}
		}
	});
	
	$(".FadeInUp").each(function(){
		if ( $(this).offset().top > 0 ) {
			var offset = $(this).offset().top;
			var scrolltop = $(window).scrollTop();
			var windowH = $(window).height();
	
			if (scrolltop > offset - windowH * 0.75){
				$(this).css("opacity","1");
				moveX="translateY(0)";
				$(this).css("-webkit-transform",moveX);
			}
		}
	});
	$(".FadeIn").each(function(){
		if ( $(this).offset().top >= 0 ) {
			var offset = $(this).offset().top;
			var scrolltop = $(window).scrollTop();
			var windowH = $(window).height();
			
			if (scrolltop > offset - windowH * 0.75){
				$(this).css("opacity","1");
			}
		}
	});
	$(".FadeInSlideMaskRight").each(function(){
		if ( $(this).offset().top > 0 ) {
			var offset = $(this).offset().top;
			var scrolltop = $(window).scrollTop();
			var windowH = $(window).height();
	
			if (scrolltop > offset - windowH * 0.75){
				$(this).css("transform","scale(0,0)");
			}
		}
	});
	$(".FadeInSlideMaskLeft").each(function(){
		if ( $(this).offset().top > 0 ) {
			var offset = $(this).offset().top;
			var scrolltop = $(window).scrollTop();
			var windowH = $(window).height();
	
			if (scrolltop > offset - windowH * 0.75){
				$(this).css("transform","scale(0,0)");
			}
		}
	});
	$(".fadeInMaskGra").each(function(){
		if ( $(this).offset().top > 0 ) {
			var offset = $(this).offset().top;
			var scrolltop = $(window).scrollTop();
			var windowH = $(window).height();
	
			if (scrolltop > offset - windowH * 0.75){
				$(this).addClass("visible");
			}
		}
	});
}

// -------------------------
// フェードイン
// -------------------------
$(function(){
	$(window).scroll(function(){
		FadeInFunc();
	});
});
