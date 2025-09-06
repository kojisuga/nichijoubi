<!DOCTYPE html>
<!--〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓-->
<!--Header構成------------------------------------------------------------------------------------------------------------>
<!--〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓-->
<head>
<meta></meta>

<!--〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓-->
<!--Css------------------------------------------------------------------------------------------------------------------>
<script>function Css_________________________________________________________________________________________(){}</script>
<!--〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓-->
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css?<?php echo file_date(get_template_directory() . '/style.css'); ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/works.css?<?php echo file_date(get_template_directory() . '/css/works.css'); ?>" type="text/css" />

<!--〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓-->
<!--Jquery--------------------------------------------------------------------------------------------------------------->
<script>function Jquery______________________________________________________________________________________(){}</script>
<!--〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓-->
<script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
$(document).ready(function() {
  // IDが"menuHilightKey"の要素のテキストを取得
  var elementText = $("#menuHilightKey").text();

  // 取得したテキストを出力（例：コンソールに出力）
  var subMenuId = "#sm_"+elementText;
	 $(subMenuId).addClass("subMenuPartsHover");
});

</script>
<?php require "common.php"; ?> 																	<!-- Call common.php ---->
<?php require "header.php"; ?> 																	<!-- Call common.php ---->

</head>

<!--〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓-->
<!--body構成-------------------------------------------------------------------------------------------------------------->
<script>function Body______________________________________________________________________________________(){}</script>
<!--〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓〓-->
<body>
<!----------------------------------------------------------------------------------------------------------------------->
<script>function ____page_header(){}</script>
<!----------------------------------------------------------------------------------------------------------------------->
<div class="PageWrapper"> 
<!--	<div class="title">WORKS</div> -->
	<div class="contentsWrapper" id="">
		<div class="content" id="highlight">
<?php
if ( is_page( 'works' ) ) {
	// worksページのときに行う処理
	echo '<div id="menuHilightKey" class="hide">works</div>';
} 

$args = array(
	'post_type' => 'post', // 投稿タイプ（通常の投稿の場合は 'post'）
	'tax_query' => array(
		'relation' => 'AND', // 両方のカテゴリが必要な場合は 'AND' を使用
		array(
			'taxonomy' => 'category', // カテゴリーのタクソノミーを指定
			'field'    => 'slug', // カテゴリ名（スラッグ）で検索
			'terms'    => 'works',
		),
		array(
			'taxonomy' => 'category',
			'field'    => 'slug',
			'terms'    => 'highlight',
		),
	),
);


$the_query = new WP_Query( $args );

$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ){
$highlightCnt = 0;
$partsClass = "parts ";


	while ( $the_query->have_posts() ) {
	$highlightCnt++;
	$partsClass="";
	if($highlightCnt %2==1){
		$partsClass.= "left";
	}
	else{
		$partsClass.= "right";
	}
		$the_query->the_post();
		// 投稿のURLを取得
		$postUrl = get_permalink();
		$projectName = get_field('projectName');
		$projectImage = get_field('MainThumbnailImage');
		$projectYear =  get_field('year');

		// $projectNameの中身を出力したり、別の処理に使う
		echo '<a class="link" href="'.$postUrl.'">';
		echo	 '<div class="'.$partsClass.'">';
		echo		'<div class="image">';
		echo 			'<img src="'.$projectImage.'">';
		
		echo 		'</div>';
		echo		'<div class="caption">';
		echo 		$projectName;
		echo 		'</div>';
		echo		'<div class="caption">';
		echo 		$projectYear;
		echo 		'</div>';
		echo '	</div>';
		echo '</a>';
	}
}
?>
		</div><!--content highlight--> 
		<div class="container2" id="normal">
<?php
$args = array(
	'post_type' => 'post',
	'category_name' => 'works', // "works" カテゴリーのみを指定
	'tax_query' => array(
		array(
			'taxonomy' => 'category',
			'field'    => 'slug',
			'terms'    => array('highlight'), // 除外したいカテゴリー
			'operator' => 'NOT IN', // このカテゴリに属さない投稿を取得
		),
	),
);

$the_query = new WP_Query( $args );

if ( $the_query->have_posts() ) {
	$cnt = 0;
	while ( $the_query->have_posts() ) {
		$cnt++;
		$the_query->the_post();
		// 投稿3のタイトルなどを出力
		// 投稿のURLを取得
		$postUrl = get_permalink();
		$projectName = get_field('projectName');
		$projectImage = get_field('MainThumbnailImage');
		$projectYear =  get_field('year');
		// $projectNameの中身を出力したり、別の処理に使う

///

		$linkClass = "link ";

		if ($cnt % 3 === 2) {
			$linkClass .= "centralParts ";
		}
		if ($cnt % 2 === 1) {
			$linkClass .= "leftParts ";
		}
		// $projectNameの中身を出力したり、別の処理に使う
		echo '<a class="'.$linkClass.'" href="'.$postUrl.'">';


		echo	 '<div class="box2">';
		echo		'<div class="image">';
		echo 			'<img src="'.$projectImage.'">';
		
		echo 		'</div>';
		echo		'<div class="projectName">';
		echo 		$projectName;
		echo 		'</div>';
		echo		'<div class="caption">';
		echo 		$projectYear;
if ( has_category('previousworks') ) {
	echo ' (previousworks) ';
} else {
}
		echo 		'</div>';

		echo '	</div>';
		echo '</a>';
	}
	wp_reset_postdata();
} else {
	// 投稿が見つからなかった場合の処理
}

?>
		</div><!--content highlight--> 
	</div><!--contentsWrapper--> 
</div><!--PageWrapper --> 


<?php require "footer.php"; ?> 																	<!-- Call common.php ---->

</body>
</html>