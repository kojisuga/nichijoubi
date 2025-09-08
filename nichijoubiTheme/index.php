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
	
    $('.block').each(function() {
        const $block = $(this);
        const $images = $block.find('.thumbnailImg');
        const totalImages = $images.length;
        let loadedImages = 0;

        // 画像の読み込み完了をチェック
        $images.on('load', function() {
            loadedImages++;
            // すべての画像の読み込みが完了したら
            if (loadedImages === totalImages) {
                // 親要素の .block にクラスを追加
                $block.css("opacity","1");
            }
        }).each(function() {
            // キャッシュから読み込まれた場合に備えて、手動で load イベントをトリガー
            if (this.complete) {
                $(this).css("opacity","1");
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
			
		
	
		</div><!-- contents -->

	</div><!-- contentsWrapper -->
</div><!-- pageWrapper -->
</body>
</html>