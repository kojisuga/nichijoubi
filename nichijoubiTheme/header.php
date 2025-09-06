<!--〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓-->
<!--Css------------------------------------------------------------------------------------------------------------------>
<!--〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓-->
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/Header.css?<?php echo file_date(get_template_directory() . '/css/Header.css'); ?>" type="text/css" />

<!--〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓-->
<!--Jquery--------------------------------------------------------------------------------------------------------------->
<!--〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓-->
<script>
// OnClick

var $Menuflag = "CLOSE";

$(function(){
	$(".HeaderMenuIcon").on("click", function() {
		if( $Menuflag == "CLOSE" ){
			$Menuflag = "OPEN";
			
			// Menuバーのスライド
			$(".BasicHeaderMenu").css("height","100vh");
			$(".BasicHeaderMenu").css("opacity","1");
			$("#Bar1").addClass("rotate45");
			$("#Bar3").addClass("rotate_45");
			$("#Bar2").addClass("hide");
		}
		else{
			$Menuflag = "CLOSE";
			// Menuバーのスライド
			$(".BasicHeaderMenu").css("height","0vh");
			$(".BasicHeaderMenu").css("opacity","0");
			$("#Bar1").removeClass("rotate45");
			$("#Bar3").removeClass("rotate_45");
			$("#Bar2").removeClass("hide");
		}
	});
	
	// menu hover
	
	
});
</script>

<!--〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓-->
<!--Html----------------------------------------------------------------------------------------------------------------->
<!--〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓-->

<?php
	$home = home_url();
	$current =  ($_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
	if("/"==substr($current,strlen($current)-1,1)){
		$current = substr($current,0,strlen($current)-1);
	}

	if(strstr($home,$current)){
	// TOPページ用
	

	}
	else{
	// TOPページ意外


	}

?>
