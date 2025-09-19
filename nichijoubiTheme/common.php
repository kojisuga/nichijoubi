
<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
session_start();

?>
<!DOCTYPE html>
<?php wp_head(); ?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="島作,台湾,shimasaku,taiwan,japanese,handcraft,日常美,nichijoubi,日常,nichijou">
<meta name="description" content="">
<link rel="shortcut icon" href="">
<link rel="apple-touch-icon" href="">

<!--〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓-->
<!--Css------------------------------------------------------------------------------------------------------------------>
<!--〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓-->
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/common.css?<?php echo file_date(get_template_directory() . '/css/common.css'); ?>" 


<!-- -->
<!--〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓-->
<!--Jquery--------------------------------------------------------------------------------------------------------------->
<!--〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/jquery/common.js?<?php echo file_date(get_template_directory() . '/jquery/common.js'); ?>"</script>

<?php

// URLパラメータの 'id' の値を取得
echo "sessionDataBefore: ".$_SESSION['lang'];

if($_GET['lang']){
	$lang = $_GET['lang'];

	$_SESSION['lang'] = $lang;
}
else{
	if(!isset($_SESSION['lang'])){
	$_SESSION['lang'] = "AUS";
	}

}

// セッション変数に値を保存
echo "sessionDataAftter: ".$_SESSION['lang'];



?>
</head>



