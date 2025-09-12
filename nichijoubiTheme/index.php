<!DOCTYPE html>
<head>
<meta></meta>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/main.css?<?php echo file_date(get_template_directory() . '/css/main.css'); ?>" type="text/css" />

<?php require "common.php"; ?> 																	<!-- Call common.php ---->
<script src="//code.jquery.com/jquery-3.2.1.min.js"></script>

<script>
jQuery(document).ready(function($) {
    // 画面サイズを取得

	console.log("ready");
    const viewportHeight = window.innerHeight;
    const viewportWidth = window.innerWidth;

    // AJAXリクエストでPHPに値を送信
	$.ajax({
		type: 'POST',
		url: ajaxurl,
		data: {
			'action' : 'genTopThumnail',
			'width' : viewportWidth,
			'height' : viewportHeight,
		},
		success: function( response ){
			$('#top').html(response);
			viewThumbnail();
			
		}
	});
});

function viewThumbnail(){

	const readyTime = new Date().getTime();
	console.log(`document.ready: ${readyTime} ms`);
	let loadBlocks = 0;

$('.block').each(function() {
	const $block = $(this);
	const $images = $block.find('.thumbnailImg[data-slideNumber="1"], .thumbnailImg[data-slideNumber="2"]');
	const totalImages = $images.length;
	let loadedImages = 0;

	// スライドショー開始関数（元のコードのまま）
	function startSlideshow() {
		const $allImages = $block.find('.thumbnailImg');
		const totalSlides = $allImages.length;
		let currentSlide = 0;
		$allImages.css('opacity', '0');
		$allImages.eq(0).css('opacity', '1');
		setInterval(function() {
			$allImages.eq(currentSlide).animate({
				opacity: 0
			}, 1000);
			currentSlide = (currentSlide + 1) % totalSlides;
			$allImages.eq(currentSlide).animate({
				opacity: 1
			}, 1000);
		}, 7500);
	}

	// 初回読み込みとキャッシュからの読み込みを処理する関数
	function handleImageLoad() {
		console.log("execute handleImageLoad");
		loadedImages++;
		if (loadedImages === totalImages) {
			loadBlocks++;
			console.log(loadBlocks + "番目のブロック読み込み完了");
			const slideshowStartTime = new Date().getTime();
			const timeDifference = slideshowStartTime - readyTime;
			console.log(`\n時間差分: ${timeDifference} ms`);
			Idealtime = 300 * loadBlocks;
			Gqptime = Idealtime - timeDifference;
			if (Gqptime <= 0) {
				delayTime = 0;
			} else {
				delayTime = Gqptime;
			}
			$block.css("opacity", "1");
			setTimeout(function() {
				startSlideshow(); // スライドショーを開始
			}, delayTime);
		}
	}
	function randomLoad(){
		console.log("execute randomLoad");
		loadedImages++;
		loadBlocks++;
		targetBlock = $(".thumbnailWrapper").find('.block[data-blockserialnumber="'+loadBlocks+'"]');

		console.log(targetBlock);

		const slideshowStartTime = new Date().getTime();
		const timeDifference = slideshowStartTime - readyTime;
		Idealtime = 300 * loadBlocks;
		Gqptime = Idealtime - timeDifference;
		if (Gqptime <= 0) {
			delayTime = 0;
		} else {
			delayTime = Gqptime;
		}
		targetBlock.css("opacity", "1");
		setTimeout(function(block) {
			
			console.log(delayTime);
			startSlideshow(); // スライドショーを開始
		}, delayTime, targetBlock); // ★ setTimeoutの第3引数でtargetBlockを渡す
	}


	// 画像の読み込み完了をチェック
	// キャッシュからの読み込みを検知
	$images.each(function() {
		// `complete`プロパティを使って、画像がすでに読み込まれているかチェック
		if (this.complete) {
			console.log("キャッシュから読み込み: " + $(this).attr('src'));
			// キャッシュからの読み込み時にも同じ処理を実行
			randomLoad(); 
		} else {
			console.log("サーバーから新規読み込み: " + $(this).attr('src'));
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
			<div class="linePats"><div class="block"></div><!-- block --><div class="block"></div><!-- block --><div class="block"></div><!-- block --><div class="block"></div><!-- block --><div class="block"></div><!-- block --><div class="block"></div><!-- block --><div class="block"></div><!-- block --><div class="block"></div><!-- block --><div class="block"></div><!-- block -->
			</div><!-- linePats -->
		
	
		</div><!-- contents -->
		<div class="contents" id="about">
			<div class="logo">
				<div class="image">
					<img src="<?php echo get_template_directory_uri(); ?>/image/common/nichijoubi_logo_bk.png">
				</div>
				<div class="subTitle"><div class="vertical">japanese handcraft</div></div>
			</div><!-- logo -->
			<div class="message">
				<div class="vertical twMode">
					我們的日常生活中，衣、食、住的每一件「物品」，都是與我們一同度過歲月的夥伴。<br>
					<br>
					每一件物品，都蘊藏著一段故事。<br>
					<br>
					素材來自何方？擁有著什麼樣的特性？<br>
					創作者又是懷抱著怎樣的意想製作而成？<br>
					<br>
					每一件物品，也都有其獨特的個性。<br>
					<br>
					當我們了解它們的個性，思考在日常生活中該如何使用與細心呵護， 便能在使用的過程中，與它們建立深厚的連結。透過這份用心與珍惜， 物品得以長久陪伴我們，並隨著時間的流轉愈加增添美麗。<br>
					<br>
					這樣的日常美景，能悄然孕育出幸福的瞬間，引領我們走向一種細緻而舒心的生活方式， 也讓我們的心靈感受到溫柔與豐盈。<br>
					<br>
					我們所追求的，是這樣一種生活的美好。並以此為初心，投入每一件物品的製作。<br>
				</div>


				<div id="exhibitorInfo">
					<div class="instroduction">
						<div class="teamName">
							日常美 — Nichijoubi
						</div>
						<div class="concept">
							是一個延續日本精緻手工傳統的職人集體。
							我們將於 2025年11月 参加「島作」展出。
							非常期待與台灣的各位見面
						</div>

					</div>


<?php

	// 投稿データの取得
	$args = array(
		'post_type'      => 'post', // 投稿タイプを指定
		'category_name'  => 'exhibitor', // カテゴリのスラッグ
		'posts_per_page' => -1, // 全ての投稿を取得
	);
	// 新しいWP_Queryインスタンスを作成
	$exhibitor_posts = new WP_Query($args);
	
	// ループ開始
	if ($exhibitor_posts->have_posts()) {
		while ($exhibitor_posts->have_posts()) {
			$exhibitor_posts->the_post();
	
			// ここでACFフィールドの値を取得
			$brandName = get_field('brandName');
			$exhibitorName = get_field('exhibitorName');
			$genre = get_field('genre');

?>
					<a href="">
					<div class="parts">
						<div class="genre">
							<?php echo $genre; ?>
						</div>
						<div class="exhibitorName">
							<?php echo $exhibitorName; ?>
						</div>
						<div class="brandName">
							<?php echo $brandName; ?>
						</div>

<?php
if ( have_rows('subExhibitor') ) :
		echo '<div class=" subExhibitor">';
 // 各サブ出展者のデータをループで処理
    while ( have_rows('subExhibitor') ) : the_row();
        echo '<div class="parts">';
        // 「subExhibitor」のサブフィールドを取得
        $subExhibitorName = get_sub_field('exhibitorName');
        $subBrandName = get_sub_field('brandName');
        $subGenre = get_sub_field('genre');
        $url = get_sub_field('url');
        $instagram = get_sub_field('instagram');
        $concept = get_sub_field('concept');
        
        // 取得したサブ出展者情報を表示
		echo '<div class="genre">'. $subGenre . '</div>';
if ( $subExhibitorName ){
		echo '<div class="exhibitorName">'. $subExhibitorName. '</div>';
}
		echo '<div class="brandName">'. $subBrandName . '</div>';

            
		if ( have_rows('imageList') ) :
			while ( have_rows('imageList') ) : the_row();
				
				// 「imageList」のサブフィールド「image」（URL形式）を取得
				$image_url = get_sub_field('image');
				
			endwhile;
		endif; // End of imageList check
		
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
		</div><!-- contents about -->
		<div class="contents" id="exhibition">
			<div class="title">
				exhibition infomation
				<div class="vLine"></div>
			</div>
			<div class="captionArea">
				<div class="logo">
					<img src="<?php echo get_template_directory_uri(); ?>/image/common/shimasakuLogo.png">
				</div>
				<div class="caption">
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
			<div class="mapImage">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3614.706667849373!2d121.5606524!3d25.0440269!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442abbf5ad5ee49%3A0x154913cae7209f78!2z5YyX5ZCR6KO96I-45bel5bug!5e0!3m2!1sja!2sjp!4v1757573801335!5m2!1sja!2sjp" width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			</div>
		</div><!-- contents exhibition -->
		<div class="contents" id="contact">
			<div class="title">
				contact us
				<div class="vLine"></div>
			</div>
			<div class="formArea">
				<form class="contactForm">
					<div class="caption"></div>
					<div class="parts">
						<div class="label">your name *</div>
						<div class="data"><input type="text" name="cName" required></div>
					</div>
					<div class="parts">
						<div class="label">your email *</div>
						<div class="data"><input type="email" name="mail" required></div>
					</div>
					<div class="parts">
						<div class="label">Your Message *</div>
						<div class="data"><textarea id="message" name="message" rows="5" maxlength="200" required></textarea></div>
					</div>
					<div class="parts">
						<div class="label"></div>
						<div class="data"><button type="submit" name="submit_form">送信する</button></div>
					</div>
				</form>
			</div><!--formArea  -->
		</div><!-- contents contact -->
	</div><!-- contentsWrapper -->
</div><!-- pageWrapper -->
</body>
</html>