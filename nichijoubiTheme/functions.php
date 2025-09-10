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

/**
 * サムネイルの生成
 */
function genTopThumnail() {

	$outputCode = "";

	$width = $_POST['width'];
	$height = $_POST['height'];
	
	// 投稿データの取得
	$args = array(
		'post_type'      => 'post', // 投稿タイプを指定
		'category_name'  => 'exhibitor', // カテゴリのスラッグ
		'posts_per_page' => -1, // 全ての投稿を取得
	);
	
	// 新しいWP_Queryインスタンスを作成
	$exhibitor_posts = new WP_Query($args);
	
	// 投稿IDを格納するための空の配列を初期化
	$arPostID = array();
	
	// ループ開始
	if ($exhibitor_posts->have_posts()) {
		while ($exhibitor_posts->have_posts()) {
			$exhibitor_posts->the_post();
	
			// 現在の投稿IDを配列に順次追加
			$arPostID[] = get_the_ID();
	
			// ここに投稿の表示処理（例：タイトル、抜粋など）を記述
			// ※ この部分を省略してIDの取得だけに特化することも可能です
		}
		// メインクエリをリセット
		wp_reset_postdata();
	} else {
		// 投稿が見つからなかった場合の処理
		echo '該当する投稿は見つかりませんでした。';
	}

	// 画像情報を取得

	// 画像情報に紐づく投稿番号を取得
	

	// line数を決定
	$lineNumber = intval($width / 300)+1;
	// block数を決定
	$blockNumber =  intval($height / (300 * 0.6666) )+1;

	$outputCode .= '<div class="thumbnailWrapper">';
	for($i = 0; $i < $lineNumber; $i++){
		$outputCode .= '<div class="linePats">';

		for($j = 0; $j < $blockNumber; $j++){

			$blockSerialNumber = getRandomNumber4Block($blockNumber*$lineNumber)+1;
			$outputCode .= '<div class="block" data-blockSerialNumber="'.$blockSerialNumber.'">';
			$randumIndex = getRandomNumber4Post(count($arPostID));
			
			$post_id = $arPostID[$randumIndex]; // 例: 投稿IDが123の場合

			// テキストフィールドの値を取得
			$exhibitor_name = get_field('exhibitorName', $post_id);
			$brand_name = get_field('brandName', $post_id);
			$profile = get_field('profile', $post_id);

			// 取得した値を使って何かを出力

			$arImageList = array();
			// 繰り返しフィールドの値を取得
			if ( have_rows('imageList', $post_id) ) {
				while ( have_rows('imageList', $post_id) ) {
					the_row();
					// サブフィールドの画像フィールドの値を取得
					$image = get_sub_field('image');
					$arImageList[] = $image;
				}
			}
			getRandomNumber4Img(count($arImageList) - 1,true);

			for ($k = count($arImageList) - 1; $k >= 0; $k--) {
				$randaomIndex = getRandomNumber4Img(count($arImageList) - 1,false);
				$outputCode .= '<div class="image">';
				$outputCode .= '<img class="thumbnailImg" src="'.$arImageList[$randaomIndex].'" data-postID="'.$post_id.'" data-slideNumber="'.($k+1).'" data-ImageCount="'.count($arImageList).'">';
				$outputCode .= '</div>';
				
			}
			
			$outputCode .= '</div>';
		}

		$outputCode .= '</div>';
	}
	$outputCode .= '</div>';

	echo $outputCode;
	die();
}
// ログインユーザー向け
add_action('wp_ajax_genTopThumnail', 'genTopThumnail');

// 非ログインユーザー向け
add_action('wp_ajax_nopriv_genTopThumnail', 'genTopThumnail');

// ランダム正数取得
function getRandomNumber4Post(int $maxNumber, bool $reset = false) {
    static $numbers4post = [];

    // リセットフラグが true の場合は初期化して終了
    if ($reset) {
        $numbers4post = [];
        return null; // この行が if ブロック内にあるべき
    }

    // 配列が空なら新しい周期として初期化
    if (empty($numbers4post)) {
        $numbers4post = range(0, $maxNumber);
        shuffle($numbers4post);
    }

    // 配列の先頭から1つ要素を取り出して返却
    return array_shift($numbers4post);
}


function getRandomNumber4Img(int $maxNumber, bool $reset = false) {
    static $numbers4Img = [];
//	var_dump("call getRandomNumber4Img");
//	var_dump("<br>");

    // Reset the array if the $reset flag is true
    if ($reset) {
        $numbers4Img = [];
        return null;
    }

    // Initialize and shuffle the array if it's empty
    if (empty($numbers4Img)) {
//		var_dump("shuffle");
        $numbers4Img = range(0, $maxNumber);
        shuffle($numbers4Img);
    }
    
    // Return the next number from the array
    return array_shift($numbers4Img);
}

function getRandomNumber4Block(int $maxNumber, bool $reset = false) {
    static $numbers4Block = [];
//	var_dump("call getRandomNumber4Img");
//	var_dump("<br>");

    // Reset the array if the $reset flag is true
    if ($reset) {
        $numbers4Block = [];
        return null;
    }

    // Initialize and shuffle the array if it's empty
    if (empty($numbers4Block)) {
//		var_dump("shuffle");
        $numbers4Block = range(0, $maxNumber);
        shuffle($numbers4Block);
    }
    
    // Return the next number from the array
    return array_shift($numbers4Block);
}
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

// 管理バーを非表示にする
add_filter('show_admin_bar', '__return_false');