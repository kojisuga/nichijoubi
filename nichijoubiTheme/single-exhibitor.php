<?php
// single.phpなどの投稿テンプレートファイル内で使用

if ( have_posts() ) {
    while ( have_posts() ) {
        the_post(); // これを呼び出すことで、ACF関数が現在の投稿を参照できるようになります
        
        // ACFフィールドの値を変数に格納
		$exhibitor_name = get_field('exhibitorName');
        $brand_name = get_field('brandName');

		if($brand_name){
			if($exhibitor_name){
				$brand_name = " (" . $brand_name. ")";
			}
		}
        $genre = get_field('genre');
        $url = get_field('url');
		$instagramAccount = get_field('instagramAccount');
		$instagramUrl = get_field('instagramUrl');
		$mailAdress = get_field('mail');
		$concept  = get_field('concept');
		$commitment = get_field('commitment');
		$message  = get_field('message');
		if( have_rows('imageList') ):
			
			$arImageList = array();
			
			// ループ開始
			while( have_rows('imageList') ): the_row();
				
				// サブフィールド'image'から画像フィールドの値を取得
				// 返り値が「画像URL」形式の場合
				$image_url = get_sub_field('image');
				
				$arImageList[] = $image_url;
				
				// 返り値が「画像アレイ」形式の場合
				// $image_array = get_sub_field('image');
				// $image_url = $image_array['url'];
		
				// 画像のaltテキストが必要な場合は、画像アレイ形式で取得して
				// $image_alt = $image_array['alt'];
		
			endwhile;
		
		endif;
?>
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/singleExhibitor.css?<?php echo file_date(get_template_directory() . '/css/singleExhibitor.css'); ?>" type="text/css" />
		

<div class="pageWrapper">
	<div class="topImage">
		<img src="<?php echo $arImageList[0]; ?>">
	</div>


</div><!-- pageWrapper -->

	<div class="exhibitorInfo">
		<div class="captionArea fadeInMaskGra">
			<div class="parts">
				<div class="data">
					<?php echo $exhibitor_name.$brand_name." — ".$genre; ?>
				</div>
			</div>
			<div class="parts">
				<div class="label">
					<img src="<?php echo get_template_directory_uri(); ?>/image/common/icon/iconMail.png">
				</div>
				<div class="data">
					<?php echo $mailAdress; ?>
				</div>
			</div>
			<div class="parts">
				<div class="label">
					<img src="<?php echo get_template_directory_uri(); ?>/image/common/icon/iconWeb.png">
				</div>
				<div class="data">
					<?php echo '<a href="'. $url .'" target="_blank">'. $url .'</a>'; ?>
				</div>
			</div>
			<div class="parts">
				<div class="label">
					<img src="<?php echo get_template_directory_uri(); ?>/image/common/icon/iconSns.png">
				</div>
				<div class="data">
					<?php echo '<a href="'. $instagramUrl .'" target="_blank">'. $instagramAccount .'</a>';?>
				</div>
			</div>
			<div class="caption" id="concept">
				<div class="title">concept</div>
				<div class="text"><?php echo $concept; ?></div>
			</div><!-- caption -->
			<div class="caption" id="message">
				<div class="title">message</div>
				<div class="text"><?php echo $message; ?></div>
			</div><!-- caption -->
			<div class="caption" id="commitment">
				<div class="title">commitment</div>
				<div class="text"><?php echo $commitment; ?></div>
			</div><!-- caption -->
			

		</div><!-- captionArea -->
		<div class="imageArea">
<?php
	for($i = 1;$i<count($arImageList);$i++){
		echo '<div class="image">';
		echo	'<img src="'.$arImageList[$i].'"';
		echo '</div>';
	}
?>
		</div>
	</div>


<?php
    }
}
?>