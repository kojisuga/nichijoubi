<!DOCTYPE html>
<head>
<meta></meta>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/main.css?<?php echo file_date(get_template_directory() . '/css/main.css'); ?>" type="text/css" />

<?php require "common.php"; ?> 																	<!-- Call common.php ---->
<script src="//code.jquery.com/jquery-3.2.1.min.js"></script>

<script>
jQuery(document).ready(function($) {
    // 画面サイズを取得

    const viewportHeight = window.innerHeight;
    const viewportWidth = window.innerWidth;
		
	const dummyDiv = $('<div>').css({
		'position': 'absolute',
		'visibility': 'hidden', // ユーザーに見えないようにする
		'width': 'var(--keyImageWidth)' // CSS変数を適用
	}).appendTo('body'); // bodyに追加して幅を計算させる
	
	// ダミー要素の幅（ピクセル値）を取得
	const widthInPixels = dummyDiv.width();
	
	// ダミー要素を削除
	dummyDiv.remove();
	
	console.log(`--keyImageWidthの計算結果（px）：${widthInPixels}`);

    // AJAXリクエストでPHPに値を送信
	$.ajax({
		type: 'POST',
		url: ajaxurl,
		data: {
			'action' : 'genTopThumnail',
			'width' : viewportWidth,
			'height' : viewportHeight,
			'keyImageWidth': widthInPixels,
		},
		success: function( response ){
			$('#top').prepend(response);
			viewThumbnail();
			
		}
	});	
	// ↓↓↓ 修正されたイベントハンドラ ↓↓↓
	$('#top').on('click', '.block', function() {
		console.log("click");
		console.log($(this).attr('data-postURL'));
	});

});

$(function(){
	var bodyChange_y;
	
	if( "#about" == location.hash ){
		console.log("about");
		bodyChange_y =$("#about").offset().top - 0;
	}
	else if( "#exhibitor" == location.hash ){
		console.log("exhibitor");
		bodyChange_y =$("#exhibitorInfo").offset().top - 80;
	}
	else if( "#contact" == location.hash ){
		console.log("exhibitor");
		bodyChange_y =$("#contact").offset().top - 80;
	}
	if( bodyChange_y > 0 ){
		 $("body,html").animate({scrollTop:bodyChange_y},500);
	}
	
});

function viewThumbnail(){

	const readyTime = new Date().getTime();
	let loadBlocks = 0;

$('.block').each(function() {
	const $block = $(this);
	const $images = $block.find('.thumbnailImg[data-slideNumber="1"], .thumbnailImg[data-slideNumber="2"]');
	const totalImages = $images.length;
	let loadedImages = 0;

	// スライドショー開始関数（元のコードのまま）
	function startSlideshow() {

		setInterval(function() {

			// tagetのブロックの画像数を取得
			totalBlockNum = $('.block').length;
			
			// random数を取得
			slideTargetBlockNum = Math.floor(Math.random() * (totalBlockNum - 0 + 1)) + 0;
//			console.log(slideTargetBlockNum);

			slideTargetBlock = $(".thumbnailWrapper").find('.block[data-blockserialnumber="'+slideTargetBlockNum+'"]');
//			console.log("slideTargetBlock:"+slideTargetBlock);
			slideTargetBlockImgCoount = slideTargetBlock.find('img').length;
			
			// tagetのブロックの現在の表示スライドを取得
			currentViewImageNumber = slideTargetBlock.attr('data-viewImageNumber');
			// tagetのブロックの次の表示スライドを取得
			if(slideTargetBlockImgCoount >= parseInt(currentViewImageNumber, 10)+1){
				nextViewImageNumber = parseInt(currentViewImageNumber, 10) + 1; // 結果: 21
			}
			else{
				nextViewImageNumber = 1;
			}
			slideTargetBlock.attr('data-viewImageNumber', nextViewImageNumber);
			
//			console.log("blockNumber:"+slideTargetBlockNum+"の");
//			console.log("currentViewImageNumber:"+currentViewImageNumber);
//			console.log("nextViewImageNumber:"+nextViewImageNumber );

//			console.log(slideTargetBlock.find('*'));
			
			slideTargetBlock.find('img[data-slidenumber="' + currentViewImageNumber + '"]').css("opacity","0");

			slideTargetBlock.find('img[data-slideNumber="' + nextViewImageNumber + '"]').css("opacity","1");
			
		}, 500);

/*
		const $allImages = $block.find('.thumbnailImg');
		const totalSlides = $allImages.length;
		let currentSlide = 0;
		$allImages.css('opacity', '0');
		$allImages.eq(0).css('opacity', '1');
		setInterval(function() {
			$allImages.eq(currentSlide).animate({
				opacity: 0
			}, 1500);
			currentSlide = (currentSlide + 1) % totalSlides;
			$allImages.eq(currentSlide).animate({
				opacity: 1
			}, 1500);
		}, 10000);
*/
	}

	// 初回読み込みとキャッシュからの読み込みを処理する関数
	function handleImageLoad() {
//		console.log("execute handleImageLoad");

		const totalBlockCount = $('.block').length;
		loadedImages++;
		if (loadedImages === totalImages) {
			loadBlocks++;
//			console.log(loadBlocks + "番目のブロック読み込み完了");
			const slideshowStartTime = new Date().getTime();
			const timeDifference = slideshowStartTime - readyTime;
//			console.log(`\n時間差分: ${timeDifference} ms`);
			Idealtime = 300 * loadBlocks;
			Gqptime = Idealtime - timeDifference;
			if (Gqptime <= 0) {
				delayTime = 0;
			} else {
				delayTime = Gqptime;
			}
//			$block.css("opacity", "1");
console.log("そろった？");

			if(loadBlocks >= (totalBlockCount*1) ){
				$(".block").animate({
					opacity: 1
				}, 1000);
				startSlideshow();
			}
			else{
			}


		}
	}

	function randomLoad(){
//		console.log("execute randomLoad");
		loadedImages++;
		loadBlocks++;
		const totalBlockCount = $('.block').length;

//		console.log("load serialNumber : "+loadBlocks);
		targetBlock = $(".thumbnailWrapper").find('.block[data-blockserialnumber="'+loadBlocks+'"]');
//		console.log(targetBlock);
		const slideshowStartTime = new Date().getTime();
		const timeDifference = slideshowStartTime - readyTime;
		Idealtime = 125 * loadBlocks;
		Gqptime = Idealtime - timeDifference;
		if (Gqptime <= 0) {
			delayTime = 0;
		} else {
			delayTime = Gqptime;
		}

		IdealTimeSlide = 500 * loadBlocks;
		GqptimeSlide = IdealTimeSlide - timeDifference;
		if (GqptimeSlide <= 0) {
			delayTimeSlide = 0;
		} else {
			delayTimeSlide = GqptimeSlide;
		}

		setTimeout(function(block) {
			
//			block.css("opacity", "1");
//			console.log(delayTime);
		}, delayTime, targetBlock); // ★ setTimeoutの第3引数でtargetBlockを渡す
		
		if(loadBlocks >= (totalBlockCount*2) ){
console.log("そろった？");
			$(".block").animate({
				opacity: 1
			}, 1000);

			startSlideshow();
		}
		else{
		}
	}

	// 画像の読み込み完了をチェック
	// キャッシュからの読み込みを検知
	$images.each(function() {
		// `complete`プロパティを使って、画像がすでに読み込まれているかチェック
		if (this.complete) {
//			console.log("キャッシュから読み込み: " + $(this).attr('src'));
			// キャッシュからの読み込み時にも同じ処理を実行
			randomLoad(); 
		} else {
//			console.log("サーバーから新規読み込み: " + $(this).attr('src'));
			$images.on('load', handleImageLoad);

		}
	});
});
}
</script>


</head>

<body>
<?php require "header.php"; ?> 																	<!-- Call common.php ---->

<div class="pageWrapper">
	<div class="contentsWrapper">
		<div class="contents" id="top">
	
		</div><!-- contents -->
		<div class="contents" id="about">
			<div class="logo fadeIn">
				<div class="image">
					<img src="<?php echo get_template_directory_uri(); ?>/image/common/nichijoubi_logo_bk.png">
				</div>
				<div class="subTitle"><div class="vertical">japanese handcraft</div></div>
			</div><!-- logo -->
			<div class="message fadeIn">
				<div class=" twMode concept">
					我們的日常生活中，衣、食、住的每一件「物品」，都是與我們一同度過歲月的夥伴。<br>
					<br>
					每一件物品，都蘊藏著一段故事。<br>
					<br>
					素材來自何方？擁有著什麼樣的特性？<br>
					創作者又是懷抱著怎樣的意想製作而成？<br>
					<br>
					每一件物品，也都有其獨特的個性。<br>
					<br>
					當我們了解它們的個性，思考在日常生活中該如何使用與細心呵護， 便能在使用的過程中，與它們建立深厚的連結。<br>
					透過這份用心與珍惜， 物品得以長久陪伴我們，並隨著時間的流轉愈加增添美麗。<br>
					<br>
					這樣的日常美景，能悄然孕育出幸福的瞬間，引領我們走向一種細緻而舒心的生活方式， 也讓我們的心靈感受到溫柔與豐盈。<br>
					<br>
					我們所追求的，是這樣一種生活的美好。並以此為初心，投入每一件物品的製作。<br>
					<br>
					是一個延續日本精緻手工傳統的職人集體。<br>
					我們將於 2025年11月 参加「島作」展出。非常期待與台灣的各位見面
				</div>
			</div>
		</div><!-- contents about -->


		<div class="contents" id="exhibitorInfo">
			<div class="title fadeIn">
				參展廠商<!-- exhibitor -->
				<div class="vLine"></div>
			</div>

<?php
	
	$args = array(
    'post_type'      => 'post',
    'category_name'  => 'exhibitor',
    'posts_per_page' => -1,
    'post__not_in'   => array(256), // 投稿ID 256 を除外
    'orderby'        => 'date',
);
	
	// ユーザーエージェントを取得
	$user_agent = $_SERVER['HTTP_USER_AGENT'];
	
	// ユーザーエージェントがモバイルデバイス（スマホ、タブレット）のものか判定
	$is_mobile = false;
	if ( preg_match('/Mobile|Android|BlackBerry|iPhone|iPad|Windows Phone|webOS/i', $user_agent) ) {
		$is_mobile = true;
	}
	
	// 判定結果に基づいて order を変更
	if ( $is_mobile ) {
		// モバイル版のクエリ
		$args['order'] = 'DESC'; // 新しい順
	} else {
		// PC版のクエリ
		$args['order'] = 'ASC';  // 古い順
	}
	
	// WP_Queryインスタンスを作成
	$exhibitor_posts = new WP_Query($args);


	// ループ開始
	if ($exhibitor_posts->have_posts()) {
		while ($exhibitor_posts->have_posts()) {
			$exhibitor_posts->the_post();
	
			// ここでACFフィールドの値を取得
			$brandName = get_field('brandName');
			$exhibitorName = get_field('exhibitorName');
if(($exhibitorName)&&($brandName)){
			$brandName = "(".$brandName.")";
}
			$genre = get_field('genre');
			
			$post_url = get_permalink();
			$is_virtual_author = has_tag('virtualauthor');
		


?>
<?php  if ($is_virtual_author) {
}
else{?>
					<a href="<?php echo $post_url; ?>">
<?php } ?>
					<div class="parts fadeIn">
<?php  if ($is_virtual_author) { ?>
					<a class="aLink" href="<?php echo $post_url; ?>">
<?php } ?>

						<div class="genre">
							<?php echo $genre; ?>
						</div>
						<div class="exhibitorName">
							<?php echo $exhibitorName; ?>
						</div>
						<div class="brandName">
							<?php echo $brandName; ?>
						</div>
<?php  if ($is_virtual_author) {
						echo "</a>";
}?>
<?php
if ( have_rows('subExhibitor') ) :
		echo '<div class=" subExhibitor">';
 // 各サブ出展者のデータをループで処理
    while ( have_rows('subExhibitor') ) : the_row();
		echo '<div class="parts hasLine">';
        // 「subExhibitor」のサブフィールドを取得
        $subExhibitorName = get_sub_field('exhibitorName');
        $subBrandName = get_sub_field('brandName');
        $subGenre = get_sub_field('genre');
        $url = get_sub_field('url');
        $instagram = get_sub_field('instagram');
        $concept = get_sub_field('concept');
        
		$subPostId = get_sub_field('post_id');
		$post_url = get_permalink( $subPostId );

 if ($is_virtual_author) {
		echo '<a class="aLink" href="'.$post_url.'">';
}
        // 取得したサブ出展者情報を表示
		echo '<div class="genre">'. $subGenre . '　</div>';
		echo '<div class="exhibitorName">'. $subExhibitorName. '</div>';
if (( $subExhibitorName )&&($subBrandName) ){
		$subBrandName = "(".$subBrandName.")";
}

		echo '<div class="brandName">'. $subBrandName . '</div>';

            
		if ( have_rows('imageList') ) :
			while ( have_rows('imageList') ) : the_row();
				
				// 「imageList」のサブフィールド「image」（URL形式）を取得
				$image_url = get_sub_field('image');
				
			endwhile;
		endif; // End of imageList check

 if ($is_virtual_author) {
		echo '</a>';
}

		echo '</div><!-- parts -->';
    endwhile; // End of subExhibitor loop
	echo '</div><!-- subExhibitor -->'	;

endif; // End of subExhibitor check

?>
					</div>
<?php
			// ここに投稿の表示処理（例：タイトル、抜粋など）を記述
			// ※ この部分を省略してIDの取得だけに特化することも可能です
		}
		// メインクエリをリセット
		wp_reset_postdata();
	} else {
		// 投稿が見つからなかった場合の処理
		echo '該当する投稿は見つかりませんでした。';
	}

?>

				</div><!-- parts -->
				</a>
				
			</div>
		</div><!-- contents exhibitorInfo -->
		<div class="contents" id="exhibition">
			<div class="title fadeIn">
				展覽資訊<!--exhibition infomation -->
				<div class="vLine fadeIn"></div>
			</div>
			<div class="captionArea">
				<div class="logo fadeIn">
					<img src="<?php echo get_template_directory_uri(); ?>/image/common/shimasakuLogo.png">
				</div>
				<div class="caption fadeIn">
					<div class="text">
						「島作」是連結日本與台灣工藝的活動。<a href="https://islandcrafts.com.tw/">點擊此處了</a>解更多關於島作的資訊。
					</div>
					<div class="info">
						<div class="parts"><div class="label">日期</div><div class="text">2025.11.21（五）-11.23（日）</div></div>
						<div class="parts"><div class="label">時間</div><div class="text">10:30-17:30</div></div>
						<div class="parts"><div class="label">地點</div><div class="text">松山文創園區・北向製菸工廠</div></div>
					</div>
				</div>
			</div><!-- caption -->
			<div class="mapImage fadeIn">

<?php

	if ( $is_mobile ) {
		// モバイル版のクエリ
		echo '				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3614.706667849373!2d121.5606524!3d25.0440269!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442abbf5ad5ee49%3A0x154913cae7209f78!2z5YyX5ZCR6KO96I-45bel5bug!5e0!3m2!1sja!2sjp!4v1757573801335!5m2!1sja!2sjp" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
	} else {
		// PC版のクエリ
		echo '				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3614.706667849373!2d121.5606524!3d25.0440269!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442abbf5ad5ee49%3A0x154913cae7209f78!2z5YyX5ZCR6KO96I-45bel5bug!5e0!3m2!1sja!2sjp!4v1757573801335!5m2!1sja!2sjp" width="100%" height="800" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';

	}
?>
			</div>
		</div><!-- contents exhibition -->
		<div class="contents fadeIn" id="contact">
			<div class="title">
				聯絡阮<!-- contact us -->
				<div class="vLine"></div>
			</div>
			<div class="formArea">
				<form class="contactForm">
					<div class="caption"></div>
					<div class="parts">
						<div class="label">大名<!--your name--> *</div>
						<div class="data"><input class="text" type="text" name="cName" required></div>
					</div>
					<div class="parts">
						<div class="label">電子郵件<!--your email--> *</div>
						<div class="data"><input class="text"  type="email" name="mail" required></div>
					</div>
					<div class="parts">
						<div class="label">留言<!--Your Message--> *</div>
						<div class="data"><textarea id="message" name="message" rows="5" maxlength="200" required></textarea></div>
					</div>
					<div class="parts">
						<div class="label"></div>
						<div class="data"><button type="submit" name="submit_form"><!--送信する-->送出</button></div>
					</div>
				</form>
			</div><!--formArea  -->
		</div><!-- contents contact -->
	</div><!-- contentsWrapper -->
</div><!-- pageWrapper -->
</body>
</html>