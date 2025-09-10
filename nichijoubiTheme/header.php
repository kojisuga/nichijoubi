<!--〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓-->
<!--Css------------------------------------------------------------------------------------------------------------------>
<!--〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓-->
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/header.css?<?php echo file_date(get_template_directory() . '/css/header.css'); ?>" type="text/css" />

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
<div class="menu">
	<div class="background">
		<div class="logo">
			<img src="<?php echo get_template_directory_uri(); ?>/image/common/nichijoubi_logo_bk.png">
		</div>
		<div class="menuListWrapper">
			<a class="aLink" href="<?php echo get_home_url() ?>/"><div class="list">top</div></a>
			<a class="aLink" href="<?php echo get_home_url() ?>/"><div class="list">about</div></a>
			<a class="aLink" href="<?php echo get_home_url() ?>/"><div class="list">exhibitor</div></a>
			<a class="aLink" href="<?php echo get_home_url() ?>/"><div class="list">contact</div></a>
		</div><!-- menuListWrapper -->
		<div class="lang">
			<div class="label">Lang</div>
			
			<div class="btnWrapper">
				<div class="btn">JP</div> / 
				<div class="btn">TW</div> / 
				<div class="btn">EN</div>
			</div><!-- background -->
		</div>

		<div class="sArea">
			<div class="logo">
				<img src="<?php echo get_template_directory_uri(); ?>/image/common/shimasakuLogo.png">
			</div>
			<div class="info">
				<div class="period">
					<div class="day">
						11/21(金) <br>
						11/22(土) <br>
						11/23(日) <br>
					</div>
					<div class="time">
						10:30 - 17:30
					</div>
				</div>
				<div class="place">
					松山文創園區<br>
					北向製菸工廠
				</div>
			</div>
		</div>
	</div><!-- background -->
	<div class="mobDisp menuButton"></div>

</div><!-- basicMenu -->
