<?php
/**
 * Twenty Nineteen functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

/**
 * Twenty Nineteen only works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

if ( ! function_exists( 'twentynineteen_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function twentynineteen_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Twenty Nineteen, use a find and replace
		 * to change 'twentynineteen' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'twentynineteen', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1568, 9999 );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'menu-1' => __( 'Primary', 'twentynineteen' ),
				'footer' => __( 'Footer Menu', 'twentynineteen' ),
				'social' => __( 'Social Links Menu', 'twentynineteen' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 190,
				'width'       => 190,
				'flex-width'  => false,
				'flex-height' => false,
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style-editor.css' );

		// Add custom editor font sizes.
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => __( 'Small', 'twentynineteen' ),
					'shortName' => __( 'S', 'twentynineteen' ),
					'size'      => 19.5,
					'slug'      => 'small',
				),
				array(
					'name'      => __( 'Normal', 'twentynineteen' ),
					'shortName' => __( 'M', 'twentynineteen' ),
					'size'      => 22,
					'slug'      => 'normal',
				),
				array(
					'name'      => __( 'Large', 'twentynineteen' ),
					'shortName' => __( 'L', 'twentynineteen' ),
					'size'      => 36.5,
					'slug'      => 'large',
				),
				array(
					'name'      => __( 'Huge', 'twentynineteen' ),
					'shortName' => __( 'XL', 'twentynineteen' ),
					'size'      => 49.5,
					'slug'      => 'huge',
				),
			)
		);

		// Editor color palette.
		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => __( 'Primary', 'twentynineteen' ),
					'slug'  => 'primary',
					'color' => twentynineteen_hsl_hex( 'default' === get_theme_mod( 'primary_color' ) ? 199 : get_theme_mod( 'primary_color_hue', 199 ), 100, 33 ),
				),
				array(
					'name'  => __( 'Secondary', 'twentynineteen' ),
					'slug'  => 'secondary',
					'color' => twentynineteen_hsl_hex( 'default' === get_theme_mod( 'primary_color' ) ? 199 : get_theme_mod( 'primary_color_hue', 199 ), 100, 23 ),
				),
				array(
					'name'  => __( 'Dark Gray', 'twentynineteen' ),
					'slug'  => 'dark-gray',
					'color' => '#111',
				),
				array(
					'name'  => __( 'Light Gray', 'twentynineteen' ),
					'slug'  => 'light-gray',
					'color' => '#767676',
				),
				array(
					'name'  => __( 'White', 'twentynineteen' ),
					'slug'  => 'white',
					'color' => '#FFF',
				),
			)
		);

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );
	}
endif;
add_action( 'after_setup_theme', 'twentynineteen_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function twentynineteen_widgets_init() {

	register_sidebar(
		array(
			'name'          => __( 'Footer', 'twentynineteen' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your footer.', 'twentynineteen' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

}
add_action( 'widgets_init', 'twentynineteen_widgets_init' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width Content width.
 */
function twentynineteen_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'twentynineteen_content_width', 640 );
}
add_action( 'after_setup_theme', 'twentynineteen_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function twentynineteen_scripts() {
	wp_enqueue_style( 'twentynineteen-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );

	wp_style_add_data( 'twentynineteen-style', 'rtl', 'replace' );

	if ( has_nav_menu( 'menu-1' ) ) {
		wp_enqueue_script( 'twentynineteen-priority-menu', get_theme_file_uri( '/js/priority-menu.js' ), array(), '1.0', true );
		wp_enqueue_script( 'twentynineteen-touch-navigation', get_theme_file_uri( '/js/touch-keyboard-navigation.js' ), array(), '1.0', true );
	}

	wp_enqueue_style( 'twentynineteen-print-style', get_template_directory_uri() . '/print.css', array(), wp_get_theme()->get( 'Version' ), 'print' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'twentynineteen_scripts' );

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function twentynineteen_skip_link_focus_fix() {
	// The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'twentynineteen_skip_link_focus_fix' );

/**
 * Enqueue supplemental block editor styles.
 */
function twentynineteen_editor_customizer_styles() {

	wp_enqueue_style( 'twentynineteen-editor-customizer-styles', get_theme_file_uri( '/style-editor-customizer.css' ), false, '1.0', 'all' );

	if ( 'custom' === get_theme_mod( 'primary_color' ) ) {
		// Include color patterns.
		require_once get_parent_theme_file_path( '/inc/color-patterns.php' );
		wp_add_inline_style( 'twentynineteen-editor-customizer-styles', twentynineteen_custom_colors_css() );
	}
}
add_action( 'enqueue_block_editor_assets', 'twentynineteen_editor_customizer_styles' );

/**
 * Display custom color CSS in customizer and on frontend.
 */
function twentynineteen_colors_css_wrap() {

	// Only include custom colors in customizer or frontend.
	if ( ( ! is_customize_preview() && 'default' === get_theme_mod( 'primary_color', 'default' ) ) || is_admin() ) {
		return;
	}

	require_once get_parent_theme_file_path( '/inc/color-patterns.php' );

	$primary_color = 199;
	if ( 'default' !== get_theme_mod( 'primary_color', 'default' ) ) {
		$primary_color = get_theme_mod( 'primary_color_hue', 199 );
	}
	?>

	<style type="text/css" id="custom-theme-colors" <?php echo is_customize_preview() ? 'data-hue="' . absint( $primary_color ) . '"' : ''; ?>>
		<?php echo twentynineteen_custom_colors_css(); ?>
	</style>
	<?php
}
add_action( 'wp_head', 'twentynineteen_colors_css_wrap' );

/**
 * SVG Icons class.
 */
require get_template_directory() . '/classes/class-twentynineteen-svg-icons.php';

/**
 * Custom Comment Walker template.
 */
require get_template_directory() . '/classes/class-twentynineteen-walker-comment.php';

/**
 * Enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * SVG Icons related functions.
 */
require get_template_directory() . '/inc/icon-functions.php';

/**
 * Custom template tags for the theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * css for キャッシュ.
 */
 function file_date($filename){
  if (file_exists($filename)) {
    return date('Y-m-d-His', filemtime($filename));
  }
}
/**
 * テンプレート階層化
 */
add_filter('page_template_hierarchy', 'my_page_templates');
function my_page_templates($templates) {
    global $wp_query;
 
    $template = get_page_template_slug();
    $pagename = $wp_query->query['pagename'];
 
    if (! $template && $pagename) {
        $decoded = urldecode($pagename);
 
        if ($decoded == $pagename) {
            array_unshift($templates, "page/{$pagename}.php");
        }
    }
 
    return $templates;
}

//--------------------
// Original Function
//--------------------
function DEBUG_OUT($str,$option){

	if("TRUE"==$option){
		echo $str;
	}
}
// For Debug switch.
global $DebugOption;
//$DebugOption = "TRUE";
$DebugOption = "FALSE";
function add_my_ajaxurl() {
?>
    <script>
        var ajaxurl = '<?php echo admin_url( 'admin-ajax.php'); ?>';
    </script>
<?php
}
add_action( 'wp_head', 'add_my_ajaxurl', 1 );

//-------------------------------------------------------------------------------------
// contact
//-------------------------------------------------------------------------------------
function contact(){
 	session_start();
	$result = "";
	//----------------
	// send mail.
	//----------------
	//言語,エンコード設定
	mb_language("ja");
	mb_internal_encoding("UTF-8");
	
	//宛先
	$address="info@kichi.co.jp";
//	$address="su@ma-su.info";
	$to = $address;
	//送信者
	$from = $_POST['email'];
	//件名
	$subject = "ホームページの問い合わせ";
	//本文
	$text = "ホームページから問い合わせがありました。\n";
	$text .= "\n";
	$text .= "名前:".$_POST['personalName']."\n";
	$text .= "メールアドレス:".$_POST['email']."\n";
	$text .= "電話番号:".$_POST['telephone']."\n";
	$contactTypeText = $_POST['contactTypeText'];

	$text .= "問い合わせ種別:".$contactTypeText."\n";
	$text .= "内容:".$_POST['query']."\n";
	
	//ヘッダー設定
	$header = "Content-Type: multipart/mixed;boundary=\"__BOUNDARY__\"\n";
	$header .= "Return-Path: " . $_POST['email'] . " \n";
	$header .= "From: " . $from ." \n";
	$header .= "Sender: " . $from ." \n";
	$header .= "Reply-To: " . $_POST['email'] . " \n";
	
	//本文設定
	$body = "--__BOUNDARY__\n";
	$body .= "Content-Type: text/plain; charset=\"ISO-2022-JP\"\n\n";
	$body .= $text . "\n\n";
	$body .= "--__BOUNDARY__\n";
			
	//送信
	if(mb_send_mail( $to, $subject, $body, $header)){
		$result ="true";
	}
	else{
		$result ="false";
	}
	$result ="OK?";

	echo $result;
	// dieしておかないと末尾に余計なデータ「0」が付与されるので注意
	die();// dieしておかないと末尾に余計なデータ「0」が付与されるので注意
}
add_action( 'wp_ajax_contact', 'contact' );
add_action( 'wp_ajax_nopriv_contact', 'contact' );

//--------------------------------
// 塗料金額の取得.
//--------------------------------
function getPaintPrice(){
	$type = $_POST['type'];
	$volume = $_POST['volume'];
	$postId = $_POST['postId'];
	$retPrice = 0;

	error_log(print_r("Func  In getPaintPrice _____", true));
	error_log(print_r("Param In type  :".$type, true));
	error_log(print_r("Param In volume:".$volume, true));
	error_log(print_r("Param In postId:".$postId, true));

	// search table.
	// ACFで作成したテーブルフィールドの値を取得
	$table_data = get_field('price', $postId );

	// error_log(print_r($table_data, true));

	foreach ($table_data['body'] as $row) {
		
		error_log(print_r($row[0]['c']."と".$type."を比較", true));

		if ($row[0]['c'] == $type) {
			$retPrice = $row[2]['c'];
			break;
		}
	}

	$retPrice *= $volume;

	echo $retPrice;

	die();		// dieしておかないと末尾に余計なデータ「0」が付与されるので注意
}
add_action( 'wp_ajax_getPaintPrice', 'getPaintPrice' );
add_action( 'wp_ajax_nopriv_getPaintPrice', 'getPaintPrice' );

//--------------------------------
// 塗料のカートへの追加
//--------------------------------
function addToCartPaint(){
	$color = $_POST['color'];
	$type = $_POST['type'];
	$volume = $_POST['volume'];
	$price = $_POST['price'];
	$colorParam  = $_POST['colorParam'];

	error_log(print_r("Func  In addToCartPaint _____", true));
	error_log(print_r("Param In color  :".$color, true));
	error_log(print_r("Param In type  :".$type, true));
	error_log(print_r("Param In volume  :".$volume, true));
	error_log(print_r("Param In price  :".$price, true));

	session_start();
	if (!isset($_SESSION['cartPaint']['cartCnt'])) {
		$_SESSION['cartPaint']['cartCnt'] = 0;
	}
	$cartCnt = $_SESSION['cartPaint']['cartCnt'];
	$_SESSION['cartPaint'][$cartCnt]['color'] = $color;
	$_SESSION['cartPaint'][$cartCnt]['type'] = $type;
	$_SESSION['cartPaint'][$cartCnt]['volume'] = $volume;
	$_SESSION['cartPaint'][$cartCnt]['price'] = $price;
	$_SESSION['cartPaint'][$cartCnt]['colorParam'] = $colorParam;

	$_SESSION['cartPaint']['cartCnt']++;

	error_log(print_r("Param Out cartCnt  :".$_SESSION['cartPaint']['cartCnt'], true));

	die();		// dieしておかないと末尾に余計なデータ「0」が付与されるので注意
}
add_action( 'wp_ajax_addToCartPaint', 'addToCartPaint' );
add_action( 'wp_ajax_nopriv_addToCartPaint', 'addToCartPaint' );

function func_contact1(){
	
	$companyName = $_POST['会社名'];
	$personInCharge = $_POST['ご担当者様'];
	$telphone = $_POST['連絡先電話番号'];
	$email = $_POST['連絡先メールアドレス'];
	$addr = $_POST['addr'];
	$project = $_POST['project'];
	$designerName = $_POST['designerName'];
	$plannedConstructionPeriod = $_POST['plannedConstructionPeriod'];
	$contentOfInquiry = $_POST['お問い合わせ内容'];
	$referral = $_POST['referral'];
	$otherDetailInput = $_POST['otherDetailInput'];

	error_log(print_r("Func  In func_contact1 _____", true));
	error_log(print_r("Param In companyName  :".$companyName, true));
	error_log(print_r("Param In personInCharge  :".$personInCharge, true));
	error_log(print_r("Param In telphone  :".$telphone, true));
	error_log(print_r("Param In email  :".$email, true));
	error_log(print_r("Param In addr  :".$addr, true));
	error_log(print_r("Param In project  :".$project, true));
	error_log(print_r("Param In designerName  :".$designerName, true));
	error_log(print_r("Param In plannedConstructionPeriod  :".$plannedConstructionPeriod, true));
	error_log(print_r("Param In contentOfInquiry  :".$contentOfInquiry, true));
	error_log(print_r("Param In referral  :".$referral, true));
	error_log(print_r("Param In otherDetailInput  :".$otherDetailInput, true));
	error_log(print_r("Func Out func_contact1 _____", true));

		// send mail 
	// mb_language の設定
	mb_language("Japanese");
	mb_internal_encoding("UTF-8");
	
	// 宛先
	$to = "info@coat-color.com";
//	$to = "su@ma-su.info";

	// 件名
	$subject = "ホームページの「工務店・施工業者様向け」フォームより問い合わせがありました";
	
	// 本文
	$message = "";
	$message .= "会社名:".$companyName."\n";
	$message .= "ご担当者様:".$personInCharge."\n";
	$message .= "連絡先電話番号:".$telphone."\n";
	$message .= "連絡先メールアドレス:".$email."\n";
	$message .= "所在地:".$addr."\n";
	$message .= "プロジェクト名:".$project."\n";
	$message .= "設計者名:".$designerName."\n";
	$message .= "施工予定時期:".$plannedConstructionPeriod."\n";
	$message .= "お問い合わせ内容:".$contentOfInquiry."\n";
	$message .= "お問い合わせのきっかけ:".$referral."\n";
if("その他"==$referral){
	$message .= "その他を選んだ方の詳細:".$otherDetailInput."\n";
}

	// 送信元
	$from = $email;
	
	// 送信元の名前（任意）
	$from_name = $personInCharge."様";
	
	// ヘッダー設定
	$header = "MIME-Version: 1.0\n";
	$header .= "Content-Type: text/plain; charset=UTF-8\n";
	$header .= "Content-Transfer-Encoding: 8bit\n"; // Change 7bit to 8bit for UTF-8
	$header .= "From: " . mb_encode_mimeheader($from_name, "UTF-8") . " <{$from}>\n";
	$header .= "Reply-To: {$from}\n";
	
	// メール送信
	if (mb_send_mail($to, $subject, $message, $header)) {
		$debuglog = "メールが送信されました。";
	} else {
		$debuglog = "メールの送信に失敗しました。";
	}

	echo $debuglog;
	die();
}
add_action( 'wp_ajax_func_contact1', 'func_contact1' );
add_action( 'wp_ajax_nopriv_func_contact1', 'func_contact1' );
	

function func_contact2(){
	
	$companyName = $_POST['店舗・オフィス名'];
	$personInCharge = $_POST['ご担当者様'];
	$telphone = $_POST['連絡先電話番号'];
	$email = $_POST['連絡先メールアドレス'];
	$addr = $_POST['addr'];
	$designerName = $_POST['designerName'];
	$plannedConstructionPeriod = $_POST['plannedConstructionPeriod'];
	$contentOfInquiry = $_POST['お問い合わせ内容'];
	$selectedBusinessTypes = implode(",", $_POST["businessType"]);
	$selectedServiceTypes = implode(",", $_POST["serviceType"]);
	$BT_otherDetailInput = $_POST['BT_otherDetailInput'];
	$ST_otherDetailInput = $_POST['ST_otherDetailInput'];

//	$selectedBusinessTypes = isset($_POST['businessType']) ? $_POST['businessType'] : [];
//	$selectedServiceTypes = isset($_POST['serviceType']) ? $_POST['serviceType'] : [];
	$referral = $_POST['referral'];
	$rb_otherDetailInput = $_POST['rb_otherDetailInput'];


		// send mail 
	// mb_language の設定
	mb_language("Japanese");
	mb_internal_encoding("UTF-8");
	
	// 宛先
	$to = "info@coat-color.com";
//	$to = "su@ma-su.info";
	
	// 件名
	$subject = "ホームページの「店舗・オフィス 個人オーナー様向け」フォームより問い合わせがありました";
	
	// 本文
	$message = "";
	$message .= "店舗・オフィス名:".$companyName."\n";
	$message .= "ご担当者様:".$personInCharge."\n";
	$message .= "連絡先電話番号:".$telphone."\n";
	$message .= "連絡先メールアドレス:".$email."\n";
	$message .= "所在地:".$addr."\n";
	$message .= "業態:".$selectedBusinessTypes."\n";
if (strpos($selectedBusinessTypes, "その他") !== false) {
	$message .= "その他を選んだ方の詳細:".$BT_otherDetailInput."\n";
} else {

}
	$message .= "ご希望のサービス:".$selectedServiceTypes."\n";
if (strpos($selectedServiceTypes, "その他") !== false) {
	$message .= "その他を選んだ方の詳細:".$ST_otherDetailInput."\n";
} else {

}

	$message .= "お問い合わせ内容:".$contentOfInquiry."\n";
	$message .= "お問い合わせのきっかけ:".$referral."\n";
if("その他"==$referral){
	$message .= "その他を選んだ方の詳細:".$rb_otherDetailInput."\n";
}

	// 送信元
	$from = $email;
	
	// 送信元の名前（任意）
	$from_name = $personInCharge."様";
	
	// ヘッダー設定
	$header = "MIME-Version: 1.0\n";
	$header .= "Content-Type: text/plain; charset=UTF-8\n";
	$header .= "Content-Transfer-Encoding: 8bit\n"; // Change 7bit to 8bit for UTF-8
	$header .= "From: " . mb_encode_mimeheader($from_name, "UTF-8") . " <{$from}>\n";
	$header .= "Reply-To: {$from}\n";
	
	// メール送信
	if (mb_send_mail($to, $subject, $message, $header)) {
		$debuglog = "メールが送信されました。";
	} else {
		$debuglog = "メールの送信に失敗しました。";
	}
	$debuglog= $companyName.$personInCharge.$telphone.$email.$addr.$project.$designerName.$plannedConstructionPeriod.$contentOfInquiry.$referral.$contentOfInquiry.$otherDetailInput;

	echo $debuglog;
	die();
}
add_action( 'wp_ajax_func_contact2', 'func_contact2' );
add_action( 'wp_ajax_nopriv_func_contact2', 'func_contact2' );
	

function func_contact3(){
	
	$companyName = $_POST['会社名・事務所名'];
	$personInCharge = $_POST['ご担当者様'];
	$telphone = $_POST['連絡先電話番号'];
	$email = $_POST['連絡先メールアドレス'];
	$addr = $_POST['addr'];
	$project = $_POST['project'];
	$contractor = $_POST['contractor'];
	$plannedConstructionPeriod = $_POST['plannedConstructionPeriod'];
	$contentOfInquiry = $_POST['お問い合わせ内容'];
	$referral = $_POST['referral'];
	$otherDetailInput = $_POST['rb_otherDetailInput'];

	error_log(print_r("Func  In func_contact1 _____", true));
	error_log(print_r("Param In companyName  :".$companyName, true));
	error_log(print_r("Param In personInCharge  :".$personInCharge, true));
	error_log(print_r("Param In telphone  :".$telphone, true));
	error_log(print_r("Param In email  :".$email, true));
	error_log(print_r("Param In addr  :".$addr, true));
	error_log(print_r("Param In project  :".$project, true));
	error_log(print_r("Param In designerName  :".$contractor, true));
	error_log(print_r("Param In plannedConstructionPeriod  :".$plannedConstructionPeriod, true));
	error_log(print_r("Param In contentOfInquiry  :".$contentOfInquiry, true));
	error_log(print_r("Param In referral  :".$referral, true));
	error_log(print_r("Param In otherDetailInput  :".$otherDetailInput, true));
	error_log(print_r("Func Out func_contact1 _____", true));


		// send mail 
	// mb_language の設定
	mb_language("Japanese");
	mb_internal_encoding("UTF-8");
	
	// 宛先

	$to = "info@coat-color.com";
//	$to = "su@ma-su.info";

	// 件名
	$subject = "ホームページの「デザイナー・設計者様向け」フォームより問い合わせがありました";
	
	// 本文
	$message = "";
	$message .= "会社名・事務所名:".$companyName."\n";
	$message .= "ご担当者様:".$personInCharge."\n";
	$message .= "連絡先電話番号:".$telphone."\n";
	$message .= "連絡先メールアドレス:".$email."\n";
	$message .= "所在地:".$addr."\n";
	$message .= "プロジェクト名:".$project."\n";
	$message .= "施工業者名:".$contractor."\n";
	$message .= "施工予定時期:".$plannedConstructionPeriod."\n";
	$message .= "お問い合わせ内容:".$contentOfInquiry."\n";
	$message .= "お問い合わせのきっかけ:".$referral."\n";
if("その他"==$referral){
	$message .= "その他を選んだ方の詳細:".$otherDetailInput."\n";
}

	// 送信元
	$from = $email;
	
	// 送信元の名前（任意）
	$from_name = $personInCharge."様";
	
	// ヘッダー設定
	$header = "MIME-Version: 1.0\n";
	$header .= "Content-Type: text/plain; charset=UTF-8\n";
	$header .= "Content-Transfer-Encoding: 8bit\n"; // Change 7bit to 8bit for UTF-8
	$header .= "From: " . mb_encode_mimeheader($from_name, "UTF-8") . " <{$from}>\n";
	$header .= "Reply-To: {$from}\n";
	
	// メール送信
	if (mb_send_mail($to, $subject, $message, $header)) {
		$debuglog = "メールが送信されました。";
	} else {
		$debuglog = "メールの送信に失敗しました。";
	}

	echo $debuglog;
	die();
}
add_action( 'wp_ajax_func_contact3', 'func_contact3' );
add_action( 'wp_ajax_nopriv_func_contact3', 'func_contact3' );
	

function func_contact4(){
	
	$companyName = $_POST['店舗・オフィス名'];
	$personInCharge = $_POST['ご担当者様'];
	$telphone = $_POST['連絡先電話番号'];
	$email = $_POST['連絡先メールアドレス'];
	$addr = $_POST['addr'];
	$designerName = $_POST['designerName'];
	$plannedConstructionPeriod = $_POST['plannedConstructionPeriod'];
	$contentOfInquiry = $_POST['お問い合わせ内容'];
	$selectedBusinessTypes = implode(",", $_POST["businessType"]);
	$selectedServiceTypes = implode(",", $_POST["serviceType"]);
	$BT_otherDetailInput = $_POST['BT_otherDetailInput'];
	$ST_otherDetailInput = $_POST['ST_otherDetailInput'];

//	$selectedBusinessTypes = isset($_POST['businessType']) ? $_POST['businessType'] : [];
//	$selectedServiceTypes = isset($_POST['serviceType']) ? $_POST['serviceType'] : [];
	$referral = $_POST['referral'];
	$rb_otherDetailInput = $_POST['rb_otherDetailInput'];


		// send mail 
	// mb_language の設定
	mb_language("Japanese");
	mb_internal_encoding("UTF-8");
	
	// 宛先
	$to = "info@coat-color.com";
//	$to = "su@ma-su.info";
	
	// 件名
	$subject = "ホームページの「住宅 個人オーナー様 向け」フォームより問い合わせがありました";
	
	// 本文
	$message = "";
	$message .= "お名前".$companyName."\n";
	$message .= "連絡先電話番号:".$telphone."\n";
	$message .= "連絡先メールアドレス:".$email."\n";
	$message .= "ご住所:".$addr."\n";
	$message .= "ご希望のサービス:".$selectedServiceTypes."\n";
if (strpos($selectedServiceTypes, "その他") !== false) {
	$message .= "その他を選んだ方の詳細:".$ST_otherDetailInput."\n";
} else {

}
	$message .= "お問い合わせ内容:".$contentOfInquiry."\n";
	$message .= "お問い合わせのきっかけ:".$referral."\n";
if("その他"==$referral){
	$message .= "その他を選んだ方の詳細:".$rb_otherDetailInput."\n";
}

	// 送信元
	$from = $email;
	
	// 送信元の名前（任意）
	$from_name = $companyName."様";
	
	// ヘッダー設定
	$header = "MIME-Version: 1.0\n";
	$header .= "Content-Type: text/plain; charset=UTF-8\n";
	$header .= "Content-Transfer-Encoding: 8bit\n"; // Change 7bit to 8bit for UTF-8
	$header .= "From: " . mb_encode_mimeheader($from_name, "UTF-8") . " <{$from}>\n";
	$header .= "Reply-To: {$from}\n";
	
	// メール送信
	if (mb_send_mail($to, $subject, $message, $header)) {
		$debuglog = "メールが送信されました。";
	} else {
		$debuglog = "メールの送信に失敗しました。";
	}
	$debuglog= $companyName.$personInCharge.$telphone.$email.$addr.$project.$designerName.$plannedConstructionPeriod.$contentOfInquiry.$referral.$contentOfInquiry.$otherDetailInput;

	echo $debuglog;
	die();
}
add_action( 'wp_ajax_func_contact4', 'func_contact4' );
add_action( 'wp_ajax_nopriv_func_contact4', 'func_contact4' );
	
/*
//--------------------------------
// 
//--------------------------------
function (){
	die();		// dieしておかないと末尾に余計なデータ「0」が付与されるので注意
}
add_action( 'wp_ajax_', '' );
add_action( 'wp_ajax_nopriv_', '' );
*/


/**
 * wp_headの余白削除
 */
add_filter( 'show_admin_bar', '__return_false' );

function shimasaku_create_form_table() {
	global $wpdb;
	$table_name = $wpdb->prefix . 'shimasakuFormData';

	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE $table_name (
		id bigint(20) NOT NULL AUTO_INCREMENT,
		p_name varchar(255) NOT NULL,
		brandname varchar(255),
		p_emailaddress varchar(255) NOT NULL,
		home_URL varchar(255),
		instagram_URL varchar(255),
		concept text NOT NULL,
		profile text NOT NULL,
		Philosophy text NOT NULL,
		message text NOT NULL,
		profileImage text,
		studioImage text,
		productImage text,
		imagecut text,
		submission_date datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
		PRIMARY KEY  (id)
	) $charset_collate;";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );
}
add_action( 'after_setup_theme', 'shimasaku_create_form_table' );

// アップロードディレクトリの作成
function shimasaku_create_upload_dir() {
	$upload_dir = get_template_directory() . '/upload';
	if ( ! file_exists( $upload_dir ) ) {
		wp_mkdir_p( $upload_dir );
	}
}
add_action( 'init', 'shimasaku_create_upload_dir' );

function shimasaku_handle_form_submission() {
	// フォームが送信され、かつNonceが検証された場合のみ処理を実行
	if (isset($_POST['submit_form']) && wp_verify_nonce($_POST['shimasaku_form_nonce_field'], 'shimasaku_form_nonce')) {

		global $wpdb;
		$table_name = $wpdb->prefix . 'shimasakuFormData';

		// フォームデータのサニタイズ
		$p_name = sanitize_text_field($_POST['p_name']);
		$brandname = sanitize_text_field($_POST['brandname']);
		$p_emailaddress = sanitize_email($_POST['p_emailaddress']);
		$home_URL = esc_url_raw($_POST['home_URL']);
		$instagram_URL = esc_url_raw($_POST['instagram_URL']);
		$concept = sanitize_textarea_field($_POST['concept']);
		$profile = sanitize_textarea_field($_POST['profile']);
		$Philosophy = sanitize_textarea_field($_POST['Philosophy']);
		$message = sanitize_textarea_field($_POST['message']);

		// ファイルアップロード処理の準備
		$uploaded_files = [];
		$file_fields = ['profileImage', 'studioImage', 'productImage', 'imagecut'];
		// WordPressのアップロードディレクトリ情報を取得
		$upload_dir_info = wp_upload_dir();
		// shimasaku_uploads ディレクトリの絶対パスとURLを定義
		$shimasaku_base_dir_path = trailingslashit($upload_dir_info['basedir']) . 'shimasaku_uploads/';
		$shimasaku_base_dir_url = trailingslashit($upload_dir_info['baseurl']) . 'shimasaku_uploads/';

		// ユーザー名に基づくディレクトリ名の生成（全角文字対応 + 日付と時間）
		$clean_p_name = preg_replace('/[^\p{L}\p{N}_-]/u', '', $p_name); // Unicode対応で文字を許可
		$current_datetime = current_time('YmdHis'); // WordPressのタイムゾーン設定に従う
		if (empty($clean_p_name)) {
			$user_folder_name = 'user_' . $current_datetime;
		} else {
			$user_folder_name = $clean_p_name . '_' . $current_datetime;
		}
		
		// ユーザー用アップロードディレクトリのフルパス
		$user_upload_dir = trailingslashit($shimasaku_base_dir_path) . $user_folder_name;
		
		// ユーザー用アップロードディレクトリが存在しない場合は作成
		if (!file_exists($user_upload_dir)) {
			wp_mkdir_p($user_upload_dir); // WordPressの関数で再帰的にディレクトリを作成
		}

		// 各ファイルフィールドの処理
		foreach ($file_fields as $field_name) {
			$current_files_urls = [];
			// 編集モードの場合、既存のファイルURLを取得
			if (isset($_POST['edit_id']) && !empty($_POST['edit_id'])) {
				// 既存のファイルURLはDBから取得せず、常に新規アップロードを促すため、この部分は不要だが、
				// もし将来的に既存ファイルを保持するロジックに戻す場合は必要になる
				// 今回の要件では、edit_idがあってもcurrent_files_urlsは空のままになる
			}

			// 新規ファイルがアップロードされたかチェック
			if (!empty($_FILES[$field_name]['name'][0])) {
				$sub_dir_path = trailingslashit($user_upload_dir) . $field_name; // サブディレクトリのフルパス (サーバーパス)
				$sub_dir_url = trailingslashit($shimasaku_base_dir_url) . $user_folder_name . '/' . $field_name; // ★追加: サブディレクトリのURL

				// サブディレクトリが存在しない場合は作成
				if (!file_exists($sub_dir_path)) {
					wp_mkdir_p($sub_dir_path);
				}

				$files_to_upload = [];
				// 複数ファイルの情報を整理
				foreach ($_FILES[$field_name]['name'] as $key => $value) {
					if ($_FILES[$field_name]['error'][$key] == 0) {
						$files_to_upload[] = [
							'name' => $_FILES[$field_name]['name'][$key],
							'type' => $_FILES[$field_name]['type'][$key],
							'tmp_name' => $_FILES[$field_name]['tmp_name'][$key],
							'error' => $_FILES[$field_name]['error'][$key],
							'size' => $_FILES[$field_name]['size'][$key],
						];
					}
				}

				$field_uploaded_urls = [];
				foreach ($files_to_upload as $file) {
					// ユニークなファイル名を生成し、保存先パスを決定
					$filename = wp_unique_filename($sub_dir_path, sanitize_file_name($file['name']));
					$destination_path = trailingslashit($sub_dir_path) . $filename; // ファイルのフルパス (サーバーパス)
					$destination_url = trailingslashit($sub_dir_url) . $filename; // ★修正: ファイルのフルURL

					// ファイルを一時ディレクトリから最終保存場所へ移動
					if (move_uploaded_file($file['tmp_name'], $destination_path)) {
						// サイトのURLを基準としたパスをDBに保存 (画像はURLとして保存)
						$field_uploaded_urls[] = $destination_url; // ★修正: 正しいURLを保存
					}
				}
				// 新規アップロードされたファイルURLと既存のファイルURLを結合
				$uploaded_files[$field_name] = array_merge($current_files_urls, $field_uploaded_urls);
			} else {
				// 新規ファイルがアップロードされない場合は既存のファイルを保持
				// 今回の要件では、編集モードでも既存ファイルは表示しないため、ここも空のままになる
				$uploaded_files[$field_name] = $current_files_urls;
			}
			// 配列をカンマ区切りの文字列に変換して保存（空の要素は削除）
			$uploaded_files[$field_name] = implode(',', array_filter($uploaded_files[$field_name]));
		}

		// データベースに保存するデータ配列
		$data = [
			'p_name' => $p_name,
			'brandname' => $brandname,
			'p_emailaddress' => $p_emailaddress,
			'home_URL' => $home_URL,
			'instagram_URL' => $instagram_URL,
			'concept' => $concept,
			'profile' => $profile,
			'Philosophy' => $Philosophy,
			'message' => $message,
			'profileImage' => $uploaded_files['profileImage'],
			'studioImage' => $uploaded_files['studioImage'],
			'productImage' => $uploaded_files['productImage'],
			'imagecut' => $uploaded_files['imagecut'],
			'updateFolder' => $user_folder_name, // フォルダ名のみを保存
		];

		$record_id = 0; // DBレコードID初期化

		// DBへの保存または更新
		if (isset($_POST['edit_id']) && !empty($_POST['edit_id'])) {
			// 編集時は既存のトークンを再利用
			$edit_id = intval($_POST['edit_id']);
			$wpdb->update(
				$table_name,
				$data,
				array('id' => $edit_id)
			);
			$record_id = $edit_id;
			// 既存のトークンを取得
			$edit_token = $wpdb->get_var($wpdb->prepare("SELECT edit_token FROM %s WHERE id = %d", $table_name, $record_id));
		} else {
			// 新規作成時のみトークンを生成
			// より安全なランダムな文字列を生成 (例: 32バイトのランダム文字列をSHA256ハッシュ化)
			$edit_token = hash('sha256', uniqid(mt_rand(), true));
			$data['edit_token'] = $edit_token; // データ配列にトークンを追加

			$wpdb->insert(
				$table_name,
				$data
			);
			$record_id = $wpdb->insert_id;
		}

		// メール送信処理
		$admin_email = 'contact@nichijoubi.com'; // ★修正: フォーム作成者のメールアドレス
		$site_name = get_bloginfo('name');
		
		// 再編集用のURLを生成 (IDではなくトークンを使用)
		$edit_url = add_query_arg('edit_token', $edit_token, home_url('/form/'));
		
		// メール文の表示名をマッピング
		$display_names = [
			'p_name' => '名前',
			'brandname' => 'ブランド名',
			'p_emailaddress' => 'メールアドレス',
			'home_URL' => 'ホームページURL',
			'instagram_URL' => 'Instagram URL',
			'concept' => 'コンセプト文',
			'profile' => 'プロフィール文',
			'Philosophy' => 'ものづくりに対する想いやこだわり',
			'message' => '作品を手に取ってくださる方に伝えたいこと',
			'profileImage' => 'プロフィール写真',
			'studioImage' => '製作写真、工房の写真',
			'productImage' => '商品写真',
			'imagecut' => 'イメージカット',
			// edit_token と updateFolder は表示しないため、ここには含めない
		];

		// 回答者へのメール
		$to_respondent = $p_emailaddress;
		$subject_respondent = '[' . $site_name . '] お問い合わせありがとうございます';
		$message_respondent = "{$p_name}様\n\nお問い合わせありがとうございます。以下の内容で承りました。\n\n";
		$message_respondent .= "------ 回答内容 ------\n";
		foreach ($data as $key => $value) {
			// 表示名が定義されている項目のみ処理
			if (isset($display_names[$key])) {
				$display_name = $display_names[$key];
				// 画像URLは複数行で表示
				if (strpos($key, 'Image') !== false) {
					$message_respondent .= $display_name . ":\n";
					$image_urls = explode(',', $value);
					foreach ($image_urls as $url) {
						if (!empty($url)) {
							$message_respondent .= " - " . $url . "\n";
						}
					}
				} else { // その他のテキストフィールド
					$message_respondent .= $display_name . ": " . $value . "\n";
				}
			}
		}
		$message_respondent .= "----------------------\n\n";
		$message_respondent .= "回答内容を再編集する場合は、以下のURLにアクセスしてください。\n";
		$message_respondent .= $edit_url . "\n\n";
		$message_respondent .= "引き続きよろしくお願いいたします。\n";

		wp_mail($to_respondent, $subject_respondent, $message_respondent);

		// フォーム作成者 (管理者) へのメール
		$to_admin = $admin_email;
		$subject_admin = '[' . $site_name . '] 新しいフォーム回答がありました';
		$message_admin = "新しいフォーム回答がありました。詳細は以下をご確認ください。\n\n";
		$message_admin .= "------ 回答内容 ------\n";
		foreach ($data as $key => $value) {
			// 表示名が定義されている項目のみ処理
			if (isset($display_names[$key])) {
				$display_name = $display_names[$key];
				// 画像URLは複数行で表示
				if (strpos($key, 'Image') !== false) {
					$message_admin .= $display_name . ":\n";
					$image_urls = explode(',', $value);
					foreach ($image_urls as $url) {
						if (!empty($url)) {
							$message_admin .= " - " . $url . "\n";
						}
					}
				} else { // その他のテキストフィールド
					$message_admin .= $display_name . ": " . $value . "\n";
				}
			}
		}
		$message_admin .= "----------------------\n\n";
		$message_admin .= "この回答を編集する場合は、以下のURLにアクセスしてください。\n";
		$message_admin .= $edit_url . "\n";

		wp_mail($to_admin, $subject_admin, $message_admin);

		wp_redirect(add_query_arg('status', 'success', wp_get_referer()));
		exit;
	}
}
// WordPressの 'init' アクションフックにこの関数を登録
add_action('init', 'shimasaku_handle_form_submission');
/**
 * WordPressが送信するメールの送信元アドレスを変更する
 */
function shimasaku_custom_mail_from( $email ) {
	// ここに設定したいメールアドレスを指定
	return 'contact@nichijoubi.com';
}
add_filter( 'wp_mail_from', 'shimasaku_custom_mail_from' );

/**
 * WordPressが送信するメールの送信元名を変更する (任意)
 * Friendly Name に「日常美」を設定
 */
function shimasaku_custom_mail_from_name( $name ) {
	// ここに設定したい送信元名（全角文字も可）を指定
	return '日常美'; // "日常美" に変更
}
add_filter( 'wp_mail_from_name', 'shimasaku_custom_mail_from_name' );


/**
 * javascriptにてテーマフォルダのURLを渡す
 */
function enqueue_my_scripts() {
	// スクリプトを登録
	wp_enqueue_script('custom-script', get_template_directory_uri() . '/js/custom.js', array('jquery'), null, true);

	// テーマフォルダのURLを渡す
	wp_localize_script('custom-script', 'themeParams', array(
		'themeUrl' => get_template_directory_uri(),
	));
}
add_action('wp_enqueue_scripts', 'enqueue_my_scripts');