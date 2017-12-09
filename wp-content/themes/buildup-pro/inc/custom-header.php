<?php
/**
 * @package BuildUp Pro
 * Setup the WordPress core custom header feature.
 *
 * @uses buildup_pro_header_style()
 * @uses buildup_pro_admin_header_style()
 * @uses buildup_pro_admin_header_image()

 */
function buildup_pro_custom_header_setup() {
add_theme_support( 'custom-header', apply_filters( 'buildup_pro_custom_header_args', array(
		//'default-image'          => get_template_directory_uri().'/images/inner-banner.jpg',
		'default-text-color'     => 'fff',
		'width'                  => 1420,
		'height'                 => 287,
		'wp-head-callback'       => 'buildup_pro_header_style',
		'admin-head-callback'    => 'buildup_pro_admin_header_style',
		'admin-preview-callback' => 'buildup_pro_admin_header_image',
	) ) );
}
add_action( 'after_setup_theme', 'buildup_pro_custom_header_setup' );

if ( ! function_exists( 'buildup_pro_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see buildup_pro_custom_header_setup().
 */
function buildup_pro_header_style() {
	$header_text_color = get_header_textcolor();
	?>
	<style type="text/css">
	<?php
		//Check if user has defined any header image.
		if ( get_header_image() ) :
	?>
		.innerbanner123{
			background: url(<?php echo get_header_image(); ?>) no-repeat #111;
			background-position: center top;
		}
	<?php endif; ?>	
	</style>
	<?php
}
endif; // buildup_pro_header_style

if ( ! function_exists( 'buildup_pro_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @see buildup_pro_custom_header_setup().
 */
function buildup_pro_admin_header_style() {?>
	<style type="text/css">
	.appearance_page_custom-header #headimg { border: none; }
	</style><?php
}
endif; // buildup_pro_admin_header_style


add_action( 'admin_head', 'admin_header_css' );
function admin_header_css(){ ?>
	<style>pre{white-space: pre-wrap;}</style><?php
}


if ( ! function_exists( 'buildup_pro_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @see buildup_pro_custom_header_setup().
 */
function buildup_pro_admin_header_image() {
	$style = sprintf( ' style="color:#%s;"', get_header_textcolor() );
?>
	<div id="headimg">
		<?php if ( get_header_image() ) : ?>
		<img src="<?php header_image(); ?>" alt="">
		<?php endif; ?>
	</div>
<?php      
}
endif; // buildup_pro_admin_header_image 


define('GRACE_URL','http://www.gracethemes.com');  
define('GRACE_THEME_URL','https://www.gracethemes.com/themes');