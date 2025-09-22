<?php
// single.phpなどの投稿テンプレートファイル内で使用

if ( have_posts() ) {
    while ( have_posts() ) {
        the_post(); // これを呼び出すことで、ACF関数が現在の投稿を参照できるようになります
        
        // ACFフィールドの値を変数に格納
		$exhibitor_name = get_field('exhibitorName');
        $brand_name = get_field('brandName');

        $genre = get_field('genre');
        $genreJP = get_field('genreJP');
        $url = get_field('url');
		$instagramAccount = get_field('instagramAccount');
		$instagramUrl = get_field('instagramUrl');
		$mailAdress = get_field('mail');
		$concept  = get_field('concept');
		$commitment = get_field('commitment');
		$message  = get_field('message');
		$profile = get_field('profile');
		$conceptJP  = get_field('conceptJP');
		$commitmentJP = get_field('commitmentJP');
		$messageJP  = get_field('messageJP');
		$profileJP = get_field('profileJP');
		$mainImageCut = get_field('mainImageCut');

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

<script>

	
jQuery(document).ready(function($) {
	const viewportHeight = window.innerHeight;
	const targetHeight = $(".exhibitorInfo > .captionArea").height();

	console.log(viewportHeight);
	console.log(targetHeight);

	if(viewportHeight < targetHeight){
		$(".exhibitorInfo > .captionArea").css("position","initial");
	}
});

</script>

		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/singleExhibitor.css?<?php echo file_date(get_template_directory() . '/css/singleExhibitor.css'); ?>" type="text/css" />
		

<div class="pageWrapper">
	<div class="topImage">
<?php if($mainImageCut){ ?>
		<img class="fadeIn" src="<?php echo $mainImageCut; ?>">
<?php }else{ ?>
		<img class="fadeIn" src="<?php echo $arImageList[0]; ?>">
<?php } ?>
	</div>



	<div class="exhibitorInfo">
		<div class="captionArea ">
			<div class="partsWrapper ">
<?php if($exhibitor_name){ ?>
				<div class="parts fadeIn">
					<div class="data artName">
						<?php echo $exhibitor_name; ?>
					</div>
				</div>
<?php } ?>
<?php if($brand_name){ ?>
				<div class="parts fadeIn">
					<div class="data brandName">
						<?php echo $brand_name; ?>
					</div>
				</div>
<?php } ?>
<?php if($genre){ ?>
				<div class="parts fadeIn">
					<div class="data langTW">
						<?php echo $genre; ?>
					</div>
					<div class="data langJP">
						<?php echo $genreJP; ?>
					</div>
				</div>
<?php } ?>
			</div><!-- partsWrapper -->
<?php if($concept){?>
			<div class="caption fadeIn langTW" id="concept">
<!--				<div class="title">創作理念</div>	-->
				<div class="text"><?php echo $concept; ?></div>
			</div><!-- caption -->
			<div class="caption fadeIn langJP" id="concept">
<!--				<div class="title">コンセプト</div>	-->
				<div class="text"><?php echo $conceptJP; ?></div>
			</div><!-- caption --><?php } ?>			
<?php if($message){?>
			<div class="caption fadeIn langTW" id="message">
				<div class="title">致拿起作品的您 </div>
				<div class="text"><?php echo $message; ?></div>
			</div><!-- caption -->
			<div class="caption fadeIn langJP" id="message">
				<div class="title">作品を手に取ってくださる方へ </div>
				<div class="text"><?php echo $messageJP; ?></div>
			</div><!-- caption -->
<?php } ?>			
<?php if($commitment){?>
			<div class="caption fadeIn langTW" id="commitment">
				<div class="title">對「產品」的用心與講究</div>
				<div class="text"><?php echo $commitment; ?></div>
			</div><!-- caption -->
			<div class="caption fadeIn langJP" id="commitment">
				<div class="title">ものづくりに対する想いやこだわり</div>
				<div class="text"><?php echo $commitmentJP; ?></div>
			</div><!-- caption -->
<?php } ?>		

		</div><!-- captionArea -->
		<div class="imageArea">
<?php
	for($i = 1;$i<count($arImageList);$i++){
		echo '<div class="image fadeIn">';
		echo	'<img src="'.$arImageList[$i].'">';
		echo '</div>';
	}
?>
		</div><!-- imageArea -->
	</div><!-- exhibitorInfo -->
	<div class="contentsWrapper">
		<div class="contents" id="profile">
			<div class="title">
				profile
			</div><!-- title -->
			<div class="substance">
				<div class="image">
	<?php 
		if( have_rows('profileImageList') ):
			
			$arProfileImageList = array();
			
			// ループ開始
			while( have_rows('profileImageList') ): the_row();
				
				// サブフィールド'image'から画像フィールドの値を取得
				// 返り値が「画像URL」形式の場合
				$image_url = get_sub_field('image');
				
				$arProfileImageList[] = $image_url;
				
	
			endwhile;
		
			echo '<img  class="fadeIn" src="' .$arProfileImageList[0]. '">';
	
		endif;
	?>
	
	<?php 
		if( have_rows('studioImageList') ):
						
			// ループ開始
			while( have_rows('studioImageList') ): the_row();
				
				// サブフィールド'image'から画像フィールドの値を取得
				// 返り値が「画像URL」形式の場合
				$image_url = get_sub_field('image');
				
				echo '<img  class="fadeIn" src="' .$image_url. '">';
	
			endwhile;
		
	
		endif;
	?>

					<img src="">
				</div><!-- image -->
				<div class="captionArea langTW">
					<?php echo $profile; ?>
<div class="partsWrapper ">

<?php if($url){?>
				<div class="parts fadeIn">
					<div class="label">
						<img src="<?php echo get_template_directory_uri(); ?>/image/common/icon/iconWeb.png">
					</div>
					<div class="data">
						<?php echo '<a href="'. $url .'" target="_blank">'. $url .'</a>'; ?>
					</div>
				</div>

<?php }?>
<?php if($instagramUrl){?>
				<div class="parts fadeIn">
					<div class="label">
						<img src="<?php echo get_template_directory_uri(); ?>/image/common/icon/iconSns.png">
					</div>
					<div class="data">
						<?php echo '<a href="'. $instagramUrl .'" target="_blank"> '. $instagramAccount .'</a>';?>
					</div>
				</div>
<?php }?>
<?php if($mailAdress){?>
				<div class="parts fadeIn">
					<div class="label">
						<img src="<?php echo get_template_directory_uri(); ?>/image/common/icon/iconMail.png">
					</div>
					<div class="data">
						<?php echo $mailAdress; ?>
					</div>
				</div>
<?php }?>
			</div><!-- partsWrapper -->
				</div><!-- captionArea -->
				<div class="captionArea langJP">
					<?php echo $profileJP; ?>
<div class="partsWrapper ">

<?php if($url){?>
				<div class="parts fadeIn">
					<div class="label">
						<img src="<?php echo get_template_directory_uri(); ?>/image/common/icon/iconWeb.png">
					</div>
					<div class="data">
						<?php echo '<a href="'. $url .'" target="_blank">'. $url .'</a>'; ?>
					</div>
				</div>

<?php }?>
<?php if($instagramUrl){?>
				<div class="parts fadeIn">
					<div class="label">
						<img src="<?php echo get_template_directory_uri(); ?>/image/common/icon/iconSns.png">
					</div>
					<div class="data">
						<?php echo '<a href="'. $instagramUrl .'" target="_blank"> '. $instagramAccount .'</a>';?>
					</div>
				</div>
<?php }?>
<?php if($mailAdress){?>
				<div class="parts fadeIn">
					<div class="label">
						<img src="<?php echo get_template_directory_uri(); ?>/image/common/icon/iconMail.png">
					</div>
					<div class="data">
						<?php echo $mailAdress; ?>
					</div>
				</div>
<?php }?>
			</div><!-- partsWrapper -->
				</div><!-- captionArea -->
	
	
			</div><!-- substance -->
		</div><!-- profile -->


	<?php 
		if( have_rows('subExhibitor') ):
			if(has_tag('virtualauthor')){
			}else{ 
echo		'<div class="contents" id="subExhibitor">';
echo			'<div class="title">support exhibitor</div>';
			
			// ループ開始
			while( have_rows('subExhibitor') ): the_row();
				echo '<div class="parts fadeIn">';
				// サブフィールド'image'から画像フィールドの値を取得
				// 返り値が「画像URL」形式の場合
				$exhibitorName = get_sub_field('exhibitorName');
				$brandName = get_sub_field('brandName');
				if($brandName){
					if($exhibitorName){
						$brandName = " (" . $brandName. ")";
					}
				}
				$genre = get_sub_field('genre');
				$genreJP = get_sub_field('genreJP');
				$url = get_sub_field('url');
				$concept = get_sub_field('concept');
				$conceptJP = get_sub_field('conceptJP');
				$instagramAccount = get_sub_field('instagramAccount');
				$instagramUrl = get_sub_field('instagramUrl');
				$mailAdress =  get_sub_field('mail');

				$subExhibitorList = array();
				if (have_rows('imageList')) :
					echo '<div class="imageArea">';
					// 「imageList」の行をループ
					while (have_rows('imageList')) : the_row();
					
						// 内側のサブフィールド「image」から画像URLを取得
						// ACFの「返り値」が「画像URL」の場合
						$image_url = get_sub_field('image');

						$subExhibitorList[] = $image_url;

					endwhile;
						echo '<img src="' .$subExhibitorList[0]. '">';
						echo '</div>';
				endif;
?>
					<div class="exhibitorInfo">
						<div class="captionArea">
		
							<div class="parts exhibitorName">
								<div class="data">
									<?php echo $exhibitorName; ?>
								</div>
							</div>
							<div class="parts exhibitorName">
								<div class="data">
									<?php echo $brandName; ?>
								</div>
							</div>
							<div class="parts exhibitorName">
								<div class="data langTW">
									<?php echo $genre; ?>
								</div>
								<div class="data langJP">
									<?php echo $genreJP; ?>
								</div>

							</div>

							<div class="parts concept langTW">
								<?php echo $concept?>
							</div>
							<div class="parts concept langJP">
								<?php echo $conceptJP?>
							</div>
<?php if($url){ ?>
							<div class="parts ">
								<div class="label">
									<img src="<?php echo get_template_directory_uri(); ?>/image/common/icon/iconWeb.png">
								</div>
								<div class="data">
									<?php echo '<a href="'. $url .'" target="_blank">'. $url .'</a>'; ?>
								</div>
							</div>
<?php } ?>
<?php if($instagramUrl){ ?>

							<div class="parts ">
								<div class="label">
									<img src="<?php echo get_template_directory_uri(); ?>/image/common/icon/iconSns.png">
								</div>
								<div class="data">
									<?php echo '<a href="'. $instagramUrl .'" target="_blank"> '. $instagramAccount .'</a>';?>
								</div>
							</div>
<?php } ?>
<?php if($mailAdress){ ?>
							<div class="parts ">
								<div class="label">
									<img src="<?php echo get_template_directory_uri(); ?>/image/common/icon/iconMail.png">
								</div>
								<div class="data">
									<?php echo $mailAdress; ?>
								</div>
							</div>
<?php } ?>

		

						</div><!-- captionArea -->
					</div><!-- exhibitorInfo -->
				</div><!-- parts -->
<?php
			endwhile;
			}
		endif;


		echo '</div><!-- subExhibitor -->';

	?>

	</div><!-- contentsWrapper -->


</div><!-- pageWrapper -->


<?php
    }
}
?>