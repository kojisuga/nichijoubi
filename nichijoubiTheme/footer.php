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
		echo '<div class="hide" id="pageTarget">about</div>';

?>

<?php
	}
	else if("exhibitor" == $naviPoint){

		echo '<div class="hide" id="pageTarget">exhibitor</div>';
?>

<?php
	}
	else if("contact" == $naviPoint){
		echo '<div class="hide" id="pageTarget">contact</div>';

?>

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
	
