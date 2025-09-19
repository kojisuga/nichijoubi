<!--〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓-->
<!--Css------------------------------------------------------------------------------------------------------------------>
<script>function Css_________________________________________________________________________________________(){}</script>
<!--〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓-->
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/footer.css?<?php echo file_date(get_template_directory() . '/css/footer.css'); ?>" type="text/css" />

<!--〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓-->
<!--Jquery--------------------------------------------------------------------------------------------------------------->
<script>function Jquery______________________________________________________________________________________(){}</script>
<!--〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓-->

<?php

if("TW"==$_SESSION['lang']){
//
?>
<script>

(function($) {
  $(function() {
	$(".langJP").addClass("hide");
	console.log("mode TW");
  });
})(jQuery);

</script>
<?php
//

}
else if("JP"==$_SESSION['lang']){
//
?>
<script>

(function($) {
  $(function() {
	$(".langTW").addClass("hide");
	console.log("mode JP");
  });
})(jQuery);

</script>

<?php
//
}
else{
//
?>
<script>

(function($) {
  $(function() {
	$(".langJP").addClass("hide");
	console.log("mode TW");
  });
})(jQuery);

</script>
<?php
//
}

if($_GET['page']){
	$naviPoint = $_GET['page'];

	if("about" == $naviPoint){
?>
	<script>
		console.log("about");
		bodyChange_y =$("#about").offset().top - 0;
		if( bodyChange_y > 0 ){
			$("body,html").animate({scrollTop:bodyChange_y},500);
		}
</script>
<?php
	}
	else if("exhibitor" == $naviPoint){
?>
	<script>
		console.log("exhibitor");
		bodyChange_y =$("#exhibitorInfo").offset().top - 500;
		if( bodyChange_y > 0 ){
		$("body,html").animate({scrollTop:bodyChange_y},500);
		}
	</script>
<?php
	}
	else if("contact" == $naviPoint){
?>
	<script>
		console.log("contact");
		bodyChange_y =$("#contact").offset().top - 80;
		if( bodyChange_y > 0 ){
			$("body,html").animate({scrollTop:bodyChange_y},500);
		}
	</script>
<?php
	}
	else{

	}

}

?>


<!--〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓-->
<!--Html----------------------------------------------------------------------------------------------------------------->
<script>function Html________________________________________________________________________________________(){}</script>
<!--〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓-->
<div class="footerWrapper" id="commonf">
	<div class="info">
		<div class="copyright">
			All rights reserved, <?php echo date('Y'); ?> copyright(c) nichijoubi.
		</div>
<?php
// 現在のページのURLを取得
?>
</div><!-- info -->
</div>
	
