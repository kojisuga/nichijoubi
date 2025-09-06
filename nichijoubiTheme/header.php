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
		$opacity = 100;
	}
	else{
		$opacity = 100;
	}

?>

<!--<div class="menuBoard"></div>-->
<div class="MenuPc" style="opacity:<?php echo $opacity;?>">
	
	<div class="logo"><img src="<?php echo get_template_directory_uri(); ?>/image/common/logo_sq.png"></div><!-- logo -->
<!--
	<div class="Menu">

		<a href="<?php echo home_url();?>/"><li class="hbutton" id=""  >TOP</li></a>
		<a href="<?php echo home_url();?>/works"><li class="hbutton" id=""  >WORKS</li></a>
		<a href="<?php echo home_url();?>/about"><li class="hbutton" id=""  >ABOUT</li></a>
		<a href="<?php echo home_url();?>/contact"><li class="hbutton" id=""  >CONTACT</li></a>
	</div><!-- Menu -->


	<div class="subMenu">
<!--廃止		<div class="caption">page guides</div>	-->
		<a class="link"  href="<?php echo home_url();?>"      ><div class="parts subMenuParts" id="sm_entrance"><span class="numbering">1</span><div class="text">top<div class="caption">check new topics</div></div></div></a>
		<a class="link"  href="<?php echo home_url();?>/works"><div class="parts subMenuParts" id="sm_works"><span class="numbering">2</span><div class="text">works<div class="caption">Introducing our works</div></div></div></a>
		<a class="link"  href="<?php echo home_url();?>/about"><div class="parts subMenuParts"id="sm_about"><span class="numbering">3</span><div class="text">about<div class="caption">concept&our profile</div></div></div></a>
		<a class="link"  href="<?php echo home_url();?>/contact"><div class="parts subMenuParts" id="sm_contact"><span class="numbering">4</span><div class="text">contact<div class="caption">contact to us</div></div></div></a>
	</div><!-- subMenu -->
</div>
	

<div class="MenuMobile">
	<div class="BasicHeaderMenu">
		<div class="HeaderMenuListWrapper">
			<div class="MenuImageWrapper">
			</div><!-- HeaderMenuSnsWrapper -->
			<a href="<?php echo home_url();?>/"><li class="hbutton" id="mob_entrance"  >top<div class="subCaption">check new topics</div></li></a>
			<a href="<?php echo home_url();?>/about"><li class="hbutton" id="mob_about"  >about<div class="subCaption">concept&our profile</div></li></a>
			<a href="<?php echo home_url();?>/works"><li class="hbutton" id="mob_works"  >works<div class="subCaption">Introducing our works</div></li></a>
			<a href="<?php echo home_url();?>/contact"><li class="hbutton" id="mob_contact"  >contact<div class="subCaption">contact to us</div></li></a>
		</div><!-- HeaderMenuListWrapper -->
		
		
	</div><!-- BasicHeaderMenu -->
	<!-- MenuIcon -->
	<div class="HeaderMenuIcon">
		<div class="MenuIconBar rotate0"      id="Bar1"></div>
		<div class="MenuIconBar rotateAppear" id="Bar2"></div>
		<div class="MenuIconBar rotate0"      id="Bar3"></div>
	</div>
</div>
