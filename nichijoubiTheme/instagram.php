<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/Insta.css?<?php echo file_date(get_template_directory() . '/css/Insta.css'); ?>" type="text/css" />

<script>	
</script>

<?php
    //アクセストークンからインスタのデータをjsonで取得
    //$json = file_get_contents("https://api.instagram.com/v1/users/self/media/recent/?access_token=2259778023.afc4515.83e31efb61414b2bb01679a366921378");
    //$json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
 
    //$arr = json_decode($json,true);
 
    // JSONをPHPの配列に変換
    //foreach( $arr as $key => $value ){
    //           $arr[$key] = $value;
    //}
 
    //最新の投稿から8つ目までをループ表示
    for($i=0;$i<8;$i++){
		$Link = $arr['data'][$i]['link'];
		$imgSrc = $arr['data'][$i]['images']['standard_resolution']['url'];
		
		echo '<div class="ContentsInstagramList"><a href="'.$Link.'" target="_blank" ><img class="ContentsInstagramListImage" src="'.$imgSrc.'"></a></div>';
    }
?>