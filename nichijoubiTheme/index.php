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
				<div class="subTitle"><div class="vertical">japanese handcraft</div></div>
				<div class="image">
					<img src="<?php echo get_template_directory_uri(); ?>/image/common/nichijoubi_logo_bk.png">
				</div>
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

				
			</div>
	
		</div><!-- contents -->

	</div><!-- contentsWrapper -->
</div><!-- pageWrapper -->
</body>
</html>