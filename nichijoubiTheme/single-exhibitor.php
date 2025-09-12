<?php
// single.phpなどの投稿テンプレートファイル内で使用

if ( have_posts() ) {
    while ( have_posts() ) {
        the_post(); // これを呼び出すことで、ACF関数が現在の投稿を参照できるようになります
        
        // ACFフィールドの値を変数に格納
        $exhibitor_name = get_field('exhibitorName');
        $brand_name = get_field('brandName');
        $genre = get_field('genre');
        $url = get_field('url');
        
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
            <?php if ($exhibitor_name) : ?>
                <p><strong>出展者名:</strong> <?php echo esc_html($exhibitor_name); ?></p>
            <?php endif; ?>
            
            <?php if ($brand_name) : ?>
                <p><strong>ブランド名:</strong> <?php echo esc_html($brand_name); ?></p>
            <?php endif; ?>
            
            <?php if ($genre) : ?>
                <p><strong>ジャンル:</strong> <?php echo esc_html($genre); ?></p>
            <?php endif; ?>
            
            <?php if ($url) : ?>
                <p><strong>URL:</strong> <a href="<?php echo esc_url($url); ?>" target="_blank"><?php echo esc_html($url); ?></a></p>
            <?php endif; ?>
        </div>


<?php
    }
}
?>