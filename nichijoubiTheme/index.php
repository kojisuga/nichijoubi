<!DOCTYPE html>
<head>
<meta></meta>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css?<?php echo file_date(get_template_directory() . '/style.css'); ?>" type="text/css" />

<?php require "common.php"; ?> 																	<!-- Call common.php ---->
<script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
<style>
.pageWrapper{
	width:"100%";
	height:100vh;
	position:relative;
}
.caption{
	font-size:11pt;
	letter-spacing:0.2em;

	position:absolute;
	top:50%;
	left:50%;
	transform:translate(-50%,-50%);

}
</style>
</head>

<body>

<div class="pageWrapper">
	<div class="caption">
		サイト準備中
	</div>
</div>
</body>
</html>