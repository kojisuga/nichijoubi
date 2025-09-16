// -------------------------
// LoadEvent
// -------------------------
$(function(){

	$(window).on('load',function(){
		fadeInFunc();
	});
	$(window).resize(function (){
		fadeInFunc();
	});
	$(document).ready(function(){
		fadeInFunc();
	});
});

function fadeInFunc(){
	$(".fadeInLeft").each(function(){
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

	$(".fadeInRight").each(function(){
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
	
	$(".fadeInUp").each(function(){
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
	$(".fadeIn").each(function(){
		if ( $(this).offset().top >= 0 ) {
			var offset = $(this).offset().top;
			var scrolltop = $(window).scrollTop();
			var windowH = $(window).height();
			
			if (scrolltop > offset - windowH * 0.75){
				$(this).css("opacity","1");
			}
		}
	});
	$(".fadeInSlideMaskRight").each(function(){
		if ( $(this).offset().top > 0 ) {
			var offset = $(this).offset().top;
			var scrolltop = $(window).scrollTop();
			var windowH = $(window).height();
	
			if (scrolltop > offset - windowH * 0.75){
				$(this).css("transform","scale(0,0)");
			}
		}
	});
	$(".fadeInSlideMaskLeft").each(function(){
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
		fadeInFunc();
	});
});
