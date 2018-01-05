<?php
/**
 * BuildUp Pro functions and definitions
 *
 * @package BuildUp Pro
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
function content($limit) {
$content = explode(' ', get_the_excerpt(), $limit);
if (count($content)>=$limit) {
array_pop($content);
$content = implode(" ",$content).'...';
} else {
$content = implode(" ",$content);
}
$content = preg_replace('/\[.+\]/','', $content);
$content = apply_filters('the_content', $content);
$content = str_replace(']]>', ']]&gt;', $content);
return $content;
}
//Excerpt limit function
function custom_excerpt_length( $length ) {
	return 100;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

if ( ! function_exists( 'buildup_pro_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function buildup_pro_setup() {

	if ( ! isset( $content_width ) )
		$content_width = 640; /* pixels */

	load_theme_textdomain( 'buildup-pro', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'title-tag' );
	add_filter('widget_text', 'do_shortcode');
	add_image_size('homepage-thumb',240,145,true);
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'buildup-pro' ),
		'footer' => __( 'Footer Menu', 'buildup-pro' ),
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );
	add_editor_style( 'editor-style.css' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
endif; // buildup_pro_setup
add_action( 'after_setup_theme', 'buildup_pro_setup' );

function buildup_pro_widgets_init() {

	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'buildup-pro' ),
		'description'   => __( 'Appears on blog page sidebar', 'buildup-pro' ),
		'id'            => 'sidebar-1',
		'before_widget' => '',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3><aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '<div class="clear"></div></aside>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar Main', 'buildup-pro' ),
		'description'   => __( 'Appears on page sidebar', 'buildup-pro' ),
		'id'            => 'sidebar-main',
		'before_widget' => '',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3><aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widget 1', 'buildup-pro' ),
		'description'   => __( 'Appears on footer', 'buildup-pro' ),
		'id'            => 'footer-1',
		'before_widget' => '<div id="%1$s" class="widget-column-1">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widget 2', 'buildup-pro' ),
		'description'   => __( 'Appears on footer', 'buildup-pro' ),
		'id'            => 'footer-2',
		'before_widget' => '<div id="%1$s" class="widget-column-2">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widget 3', 'buildup-pro' ),
		'description'   => __( 'Appears on footer', 'buildup-pro' ),
		'id'            => 'footer-3',
		'before_widget' => '<div id="%1$s" class="widget-column-3">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widget 4', 'buildup-pro' ),
		'description'   => __( 'Appears on footer', 'buildup-pro' ),
		'id'            => 'footer-4',
		'before_widget' => '<div id="%1$s" class="widget-column-4">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );


	register_sidebar( array(
		'name'          => __( 'Sidebar Contact Page', 'buildup-pro' ),
		'description'   => __( 'Appears on contact page', 'buildup-pro' ),
		'id'            => 'sidebar-contact',
		'before_widget' => '<aside class="widget-contact %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

}
add_action( 'widgets_init', 'buildup_pro_widgets_init' );

define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
require_once get_template_directory() . '/inc/options-framework.php';

function buildup_pro_scripts() {
	wp_enqueue_style( 'buildup-pro-gfonts-lato', '//fonts.googleapis.com/css?family=Lato:400,300,300italic,400italic,700,700italic' );

	if( of_get_option('bodyfontface',true) != '' ){
		wp_enqueue_style( 'buildup-pro-gfonts-body', '//fonts.googleapis.com/css?family='.rawurlencode(of_get_option('bodyfontface',true)) .'&subset=cyrillic,arabic,bengali,cyrillic,cyrillic-ext,devanagari,greek,greek-ext,gujarati,hebrew,latin-ext,tamil,telugu,thai,vietnamese,latin' );
	}
	if( of_get_option('logofontface',true) != '' ){
		wp_enqueue_style( 'buildup-pro-gfonts-logo', '//fonts.googleapis.com/css?family='.rawurlencode(of_get_option('logofontface',true)).'&subset=cyrillic,arabic,bengali,cyrillic,cyrillic-ext,devanagari,greek,greek-ext,gujarati,hebrew,latin-ext,tamil,telugu,thai,vietnamese,latin' );
	}
	if ( of_get_option('navfontface', true) != '' ) {
		wp_enqueue_style( 'buildup-pro-gfonts-nav', '//fonts.googleapis.com/css?family='.rawurlencode(of_get_option('navfontface',true)).'&subset=cyrillic,arabic,bengali,cyrillic,cyrillic-ext,devanagari,greek,greek-ext,gujarati,hebrew,latin-ext,tamil,telugu,thai,vietnamese,latin' );
	}
	if ( of_get_option('headfontface', true) != '' ) {
		wp_enqueue_style( 'buildup-pro-gfonts-heading', '//fonts.googleapis.com/css?family='.rawurlencode(of_get_option('headfontface',true)) .'&subset=cyrillic,arabic,bengali,cyrillic,cyrillic-ext,devanagari,greek,greek-ext,gujarati,hebrew,latin-ext,tamil,telugu,thai,vietnamese,latin');
	}
	if ( of_get_option('sectiontitlefontface', true) != '' ) {
		wp_enqueue_style( 'buildup-pro-gfonts-sectiontitle', '//fonts.googleapis.com/css?family='.rawurlencode(of_get_option('sectiontitlefontface',true)) .'&subset=cyrillic,arabic,bengali,cyrillic,cyrillic-ext,devanagari,greek,greek-ext,gujarati,hebrew,latin-ext,tamil,telugu,thai,vietnamese,latin');
	}
	if ( of_get_option('slidetitlefontface', true) != '' ) {
		wp_enqueue_style( 'buildup-pro-gfonts-slidetitle', '//fonts.googleapis.com/css?family='.rawurlencode(of_get_option('slidetitlefontface',true)) .'&subset=cyrillic,arabic,bengali,cyrillic,cyrillic-ext,devanagari,greek,greek-ext,gujarati,hebrew,latin-ext,tamil,telugu,thai,vietnamese,latin');
	}
	if ( of_get_option('slidedesfontface', true) != '' ) {
		wp_enqueue_style( 'buildup-pro-gfonts-slidedes', '//fonts.googleapis.com/css?family='.rawurlencode(of_get_option('slidedesfontface',true)) .'&subset=cyrillic,arabic,bengali,cyrillic,cyrillic-ext,devanagari,greek,greek-ext,gujarati,hebrew,latin-ext,tamil,telugu,thai,vietnamese,latin');
	}

	wp_enqueue_style( 'buildup-pro-basic-style', get_stylesheet_uri() );
	wp_enqueue_style( 'buildup-pro-editor-style', get_template_directory_uri().'/editor-style.css' );
	wp_enqueue_style( 'buildup-pro-base-style', get_template_directory_uri().'/css/default.css' );
	if ( is_home() || is_front_page() ) {
	wp_enqueue_style( 'buildup-pro-nivo-style', get_template_directory_uri().'/css/nivo-slider.css' );
	wp_enqueue_script( 'buildup-pro-nivo-slider', get_template_directory_uri() . '/js/jquery.nivo.slider.js', array('jquery') );
	}

	wp_enqueue_script( 'buildup-pro-customscripts', get_template_directory_uri() . '/js/custom.js', array('jquery') );
	wp_enqueue_style( 'buildup-pro-font-awesome-style', get_template_directory_uri().'/css/font-awesome.css' );	
	wp_enqueue_style( 'buildup-pro-animation', get_template_directory_uri().'/css/animation.css' );
	wp_enqueue_style( 'buildup-pro-hover', get_template_directory_uri().'/css/hover.css' );
	wp_enqueue_style( 'buildup-pro-hover-min', get_template_directory_uri().'/css/hover-min.css' );
	wp_enqueue_script( 'buildup-pro-testimonialsminjs', get_template_directory_uri().'/testimonialsrotator/js/jquery.quovolver.min.js', array('jquery') );
	wp_enqueue_style( 'buildup-pro-testimonialslider-style', get_template_directory_uri().'/testimonialsrotator/js/tm-rotator.css' );
	wp_enqueue_style( 'buildup-pro-responsive-style', get_template_directory_uri().'/css/responsive.css' );
	wp_enqueue_style( 'buildup-pro-owl-style', get_template_directory_uri().'/testimonialsrotator/js/owl.carousel.css' );
	wp_enqueue_script( 'buildup-pro-owljs', get_template_directory_uri().'/testimonialsrotator/js/owl.carousel.js', array('jquery') );

	wp_enqueue_script( 'buildup-pro-counterup', get_template_directory_uri().'/counter/js/jquery.counterup.min.js', array('jquery') );
	wp_enqueue_script( 'buildup-pro-waypoints', get_template_directory_uri().'/counter/js/waypoints.min.js', array('jquery') );


	// mixitup script
	wp_enqueue_style( 'buildup-pro-mixitup-style', get_template_directory_uri().'/mixitup/style-mixitup.css' );
	wp_enqueue_script( 'buildup-pro-jquery_013-script', get_template_directory_uri() . '/mixitup/jquery_013.js', array('jquery') );
	wp_enqueue_script( 'buildup-pro-jquery_003-script', get_template_directory_uri() . '/mixitup/jquery_003.js', array('jquery') );
	wp_enqueue_script( 'buildup-pro-screen-script', get_template_directory_uri() . '/mixitup/screen.js', array('jquery') );
	// prettyPhoto script
	wp_enqueue_style( 'buildup-pro-prettyphoto-style', get_template_directory_uri().'/mixitup/prettyPhotoe735.css' );
	wp_enqueue_script( 'buildup-pro-prettyphoto-script', get_template_directory_uri() . '/mixitup/jquery.prettyPhoto5152.js', array('jquery') );

	//Client Logo Rotator
	wp_enqueue_style( 'buildup-pro-flexiselcss', get_template_directory_uri().'/css/flexiselcss.css' );
	wp_enqueue_script( 'buildup-pro-flexisel', get_template_directory_uri() . '/js/jquery.flexisel.js', array('jquery') );

	if( of_get_option('scrollanimation',true) != true) {
		wp_enqueue_style( 'buildup-pro-animation-style', get_template_directory_uri().'/css/animation-style.css' );
		wp_enqueue_script( 'buildup-pro-custom-animation', get_template_directory_uri() . '/js/custom-animation.js', array('jquery') );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'buildup_pro_scripts' );

function media_css_hook(){

	?>

    	<script>
		jQuery(window).bind('scroll', function() {
	var wwd = jQuery(window).width();
	if( wwd > 939 ){
		var navHeight = jQuery( window ).height() - 575;
		<?php if( of_get_option('headstick',true) != true) { ?>
		if (jQuery(window).scrollTop() > navHeight) {
			jQuery(".header").addClass('fixed');
		}else {
			jQuery(".header").removeClass('fixed');
		}
		<?php } ?>
	}
});

<?php if ( is_home() || is_front_page() ) { ?>

		jQuery(window).load(function() {
        jQuery('#slider').nivoSlider({
        	effect:'<?php echo of_get_option('slideefect',true); ?>', //sliceDown, sliceDownLeft, sliceUp, sliceUpLeft, sliceUpDown, sliceUpDownLeft, fold, fade, random, slideInRight, slideInLeft, boxRandom, boxRain, boxRainReverse, boxRainGrow, boxRainGrowReverse
		  	animSpeed: <?php echo of_get_option('slideanim',true); ?>,
			pauseTime: <?php echo of_get_option('slidepause',true); ?>,
			directionNav: <?php echo of_get_option('slidenav',true); ?>,
			controlNav: <?php echo of_get_option('slidepage',true); ?>,
			pauseOnHover: <?php echo of_get_option('slidepausehover',true); ?>,
    });
});

<?php } ?>


jQuery(window).load(function() {
  jQuery('.owl-carousel').owlCarousel({
    loop:true,
	autoplay:<?php echo of_get_option('testimonialsautoplay',true); ?>,
	autoplayTimeout: <?php echo of_get_option('testimonialsrotatingspeed',true); ?>,
    margin:20,
    nav:false,
	dots: true,
	responsiveClass:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})
  });

jQuery(window).load(function() {
  jQuery('.recentproject_list').owlCarousel({
    loop:true,
	autoplay:<?php echo of_get_option('testimonialsautoplay',true); ?>,
	autoplayTimeout: <?php echo of_get_option('testimonialsrotatingspeed',true); ?>,
    margin:0,
    nav:false,
	dots:true,
	responsiveClass:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:4
        }
    }
})
  });


jQuery(document).ready(function() {
  jQuery('.link').on('click', function(event){
    var $this = jQuery(this);
    if($this.hasClass('clicked')){
      $this.removeAttr('style').removeClass('clicked');
    } else{
      $this.css('background','#7fc242').addClass('clicked');
    }
  });

});
		</script>
<?php
}
add_action('wp_head','media_css_hook');


function buildup_pro_custom_head_codes() {
	if ( function_exists('of_get_option') ){
		if ( of_get_option('style2', true) != '' ) {
			echo "<style>". esc_html( of_get_option('style2', true) ) ."</style>
			";
		}
		echo "<style>";
		if ( of_get_option('bodyfontcolor', true) != '' ) {
			echo 'body, .contact-form-section .address,  .accordion-box .acc-content{color:'. esc_html( of_get_option('bodyfontcolor', true) ) .';}';
		}
		if( of_get_option('bodyfontface', true) != '' || of_get_option('bodyfontsize',true) != ''){
			echo "body{font-family:".of_get_option('bodyfontface')."; font-size:".of_get_option('bodyfontsize',true).";}";
		}
		if( of_get_option('logofontface',true) != '' || of_get_option('logofontcolor',true) != '' || of_get_option('logofontsize',true) != ''){
			echo ".logo h1 {font-family:".of_get_option('logofontface').";color:".of_get_option('logofontcolor',true).";font-size:".of_get_option('logofontsize',true)."}";
		}
		if( of_get_option('logotaglinecolor',true) != '' ){
			echo ".tagline{color:".of_get_option('logotaglinecolor',true).";}";
		}
		if( of_get_option('logoheight',true) != '' ){
			echo ".logo img{height:".of_get_option('logoheight',true)."px;}";
		}
		if ( of_get_option('navdpbgcolor', true) != '' ) {
			echo ".sitenav ul li:hover > ul{background-color:".of_get_option('navdpbgcolor', true).";}";
		}
		if ( of_get_option('navlibdcolor', true) != '') {
			echo ".sitenav ul li ul li{border-color:".of_get_option('navlibdcolor', true).";}";
		}
		if ( of_get_option('navfontface', true) != '' || of_get_option('navfontsize',true) != '' ) {
			echo '.sitenav ul{font-family:\''. esc_html( of_get_option('navfontface', true) ) .'\', sans-serif;font-size:'.of_get_option('navfontsize',true).'}';
		}
		if ( of_get_option('navfontcolor', true) != '' ) {
			echo '.sitenav ul li a, .sitenav ul li.current_page_item ul.sub-menu li a, .sitenav ul li.current-menu-parent ul.sub-menu li a{color:'. esc_html( of_get_option('navfontcolor', true) ) .';}';
		}
		if( of_get_option('sectiontitlefontface',true) != '' || of_get_option('sectitlesize',true) != '' || of_get_option('sectitlecolor',true) != '' ){
			echo "h2.section_title{ font-family:".of_get_option('sectiontitlefontface',true)."; font-size:".of_get_option('sectitlesize',true)."; color:".of_get_option('sectitlecolor',true)."; }";
		}
		if( of_get_option('sectitleunderlinecolor',true) != '' ){
			echo "h2.section_title::after{ background-color:".of_get_option('sectitleunderlinecolor',true)."; }";
		}

		if( of_get_option('allimagesborder',true) != '' ){
			echo ".recentproject_list .item:hover .pro-thumb::after, .team_column:hover .ourteam-thumb::after{ border-color:".of_get_option('allimagesborder',true)."; }";
		}



		if ( of_get_option('linkhovercolor', true) != '' ) {
			echo 'a:hover, .slide_toggle a:hover{color:'. esc_html( of_get_option('linkhovercolor', true) ) .';}';
		}
		if( of_get_option('foottitlecolor', true) != '' || of_get_option('ftfontsize', true) != '' || of_get_option('footertitleborder', true) != '' ){
			echo ".footer h5{color:".of_get_option('foottitlecolor', true)."; font-size:".of_get_option('ftfontsize', true).";  border-color:".of_get_option('footertitleborder', true)."; }";
		}
		if( of_get_option('copycolor', true) != ''){
			echo ".copyright-txt{color:".of_get_option('copycolor',true)."}";
		}
		if( of_get_option('designcolor', true) != ''){
			echo ".design-by{color:".of_get_option('designcolor',true)."}";
		}
		if ( of_get_option('headertopbgcolor', true) != '' || of_get_option('headertopfontcolor', true) != '' ) {
			echo ".header-top{background-color:".of_get_option('headertopbgcolor',true)."; color:".of_get_option('headertopfontcolor',true).";}";
		}


		$headerhex = of_get_option('headerbgcolor',true);
		list($r,$g,$b) = sscanf($headerhex,'#%02x%02x%02x');
		if ( of_get_option('colorscheme', true) != '' ) {
			echo ".header{background-color:rgba(".$r.",".$g.",".$b.",".of_get_option('headeropacity',true).");}";
		}
		if( of_get_option('fontawesomeiconcolor',true) != '' ){
			echo ".themefeatures .one_third .fa{ color:".of_get_option('fontawesomeiconcolor',true).";}";
		}
		if( of_get_option('fontawesomeiconcolorhv',true) != '' ){
			echo ".themefeatures .one_third:hover .fa{ color:".of_get_option('fontawesomeiconcolorhv',true).";}";
		}
		if( of_get_option('socialfontcolor',true) != '' ){
			echo ".header-top .social-icons a{ color:".of_get_option('socialfontcolor',true).";}";
		}
		if( of_get_option('btntxtcolor', true) != ''){
			echo ".button, #commentform input#submit, input.search-submit, .post-password-form input[type=submit], p.read-more a, .pagination ul li span, .pagination ul li a, .headertop .right a, .wpcf7 form input[type='submit'], #sidebar .search-form input.search-submit{color:". of_get_option('btntxtcolor', true) ."; }";
		}
		if( of_get_option('btnbghvcolor',true) != '' || of_get_option('btntxthvcolor', true) != '' ){
			echo ".button:hover, #commentform input#submit:hover, input.search-submit:hover, .post-password-form input[type=submit]:hover, p.read-more a:hover, .pagination ul li .current, .pagination ul li a:hover,.headertop .right a:hover, .wpcf7 form input[type='submit']:hover{background-color:".of_get_option('btnbghvcolor',true)."; color:". esc_html( of_get_option('btntxthvcolor', true) ) .";}";
		}
		if( of_get_option('btnbgcolor',true) != '' || of_get_option('btntxtcolor', true) != ''){
			echo "a.morebutton{background-color:".of_get_option('btnbgcolor',true)."; color:". of_get_option('btntxtcolor', true) ."; }";
		}
		if( of_get_option('btnbghvcolor',true) != '' || of_get_option('btntxthvcolor', true) != '' ){
			echo "a.morebutton:hover{background-color:".of_get_option('btnbghvcolor',true)."; color:". esc_html( of_get_option('btntxthvcolor', true) ) .";}";
		}
		if( of_get_option('btnbghvcolor',true) != '' || of_get_option('btntxthvcolor', true) != ''){
			echo "a.buttonstyle1{background-color:".of_get_option('btnbghvcolor',true)."; color:". of_get_option('btntxthvcolor', true) ."; }";
		}
		if( of_get_option('btnbgcolor',true) != '' || of_get_option('btntxtcolor', true) != '' ){
			echo "a.buttonstyle1:hover{background-color:".of_get_option('btnbgcolor',true)."; color:". esc_html( of_get_option('btntxtcolor', true) ) .";}";
		}
		if ( of_get_option('widgetboxbgcolor', true) != '' || of_get_option('widgetboxfontcolor', true) != '' ) {
		echo "aside.widget, #sidebar .search-form input.search-field{ background-color:".of_get_option('widgetboxbgcolor', true)."; color:".of_get_option('widgetboxfontcolor', true).";  }";
		}
		if ( of_get_option('footerbgcolor', true) != '' || of_get_option('footdesccolor', true) != '' ) {
		echo "#footer-wrapper{background-color:".of_get_option('footerbgcolor', true)."; color:".of_get_option('footdesccolor', true).";}";
		}

		if ( of_get_option('footerbgimage', true) != '') {
		echo "#footer-wrapper{background: url(".of_get_option('footerbgimage', true).") no-repeat;}";
		}

		if ( of_get_option('footdesccolor', true) != '' ) {
			echo ".contactdetail a{color:".of_get_option('footdesccolor', true)."; }";
		}

		$copyhex = of_get_option('copybgcolor',true);
		list($r,$g,$b) = sscanf($copyhex,'#%02x%02x%02x');
		if ( of_get_option('copybgcolor', true) != '' ) {
			echo ".copyright-wrapper{background-color:rgba(".$r.",".$g.",".$b.",".of_get_option('copybgopacity',true).");}";
		}



		if( of_get_option('sldpagebg',true) != ''){
			echo ".nivo-controlNav a{background-color:".of_get_option('sldpagebg',true)."}";
		}
		if( of_get_option('sldpagehvbd',true) != ''){
			echo ".nivo-controlNav a{border-color:".of_get_option('sldpagehvbd',true)."}";
		}
		if( of_get_option('sidebarliaborder', true) != '' ){
			echo "#sidebar ul li{border-color:".of_get_option('sidebarliaborder',true)."}";
		}
		if( of_get_option('sidebarfontcolor',true) != '' ){
			echo "#sidebar ul li a{color:".of_get_option('sidebarfontcolor',true)."; }";
		}
		if ( of_get_option('slidetitlefontface', true) != '' || of_get_option('slidetitlecolor', true) != '' || of_get_option('slidetitlefontsize', true) != '') {
		echo ".nivo-caption h2{ font-family:".of_get_option('slidetitlefontface', true)."; color:".of_get_option('slidetitlecolor', true)."; font-size:".of_get_option('slidetitlefontsize', true).";}";
		}
		if ( of_get_option('slidedesfontface', true) != '' || of_get_option('slidedesccolor', true) != '' || of_get_option('slidedescfontsize', true) != '') {
		echo ".nivo-caption p{font-family:".of_get_option('slidedesfontface', true)."; color:".of_get_option('slidedesccolor', true)."; font-size:".of_get_option('slidedescfontsize', true).";}";
		}
		if ( of_get_option('copylinkshover', true) != '' ) {
		echo ".copyright-wrapper a:hover{ color: ".of_get_option('copylinkshover', true)."; }";
		}
/* Heading */
		if( of_get_option('headfontface', true) != '' ){
			echo "h1,h2,h3,h4,h5,h6{ font-family:".of_get_option('headfontface',true)."; }";
		}
		if ( of_get_option('h1fontsize', true) != '' || of_get_option('h1fontcolor', true) != '' ) {
			echo "h1{ font-size:".of_get_option('h1fontsize', true)."; color:".of_get_option('h1fontcolor', true).";}";
		}
		if ( of_get_option('h2fontsize', true) != '' || of_get_option('h2fontcolor', true) != '' ) {
			echo "h2{ font-size:".of_get_option('h2fontsize', true)."; color:".of_get_option('h2fontcolor', true).";}";
		}
		if ( of_get_option('h3fontsize', true) != '' || of_get_option('h3fontcolor', true) != '' ) {
			echo "h3{ font-size:".of_get_option('h3fontsize', true)."; color:".of_get_option('h3fontcolor', true).";}";
		}
		if ( of_get_option('h4fontsize', true) != '' || of_get_option('h4fontcolor', true) != '' ) {
			echo "h4{ font-size:".of_get_option('h4fontsize', true)."; color:".of_get_option('h4fontcolor', true).";}";
		}
		if ( of_get_option('h5fontsize', true) != '' || of_get_option('h5fontcolor', true) != '' ) {
			echo "h5{font-size:".of_get_option('h5fontsize', true)."; color:".of_get_option('h5fontcolor', true).";}";
		}
		if ( of_get_option('h6fontsize', true) != '' || of_get_option('h6fontcolor', true) != '' ) {
			echo "h6{ font-size:".of_get_option('h6fontsize', true)."; color:".of_get_option('h6fontcolor', true).";}";
		}
/* Custom editable */
		if ( of_get_option('footsocialcolor', true) != '' ) {
			echo ".footer .social-icons a{ color:".of_get_option('footsocialcolor', true)."; border-color:".of_get_option('footsocialcolor', true).";}";
		}
		$sliderarrowhex = of_get_option('sldarrowbg',true);
		list($r,$g,$b) = sscanf($sliderarrowhex,'#%02x%02x%02x');
		if ( of_get_option('sldarrowbg', true) != '' ) {
			echo ".nivo-directionNav a{background-color:rgba(".$r.",".$g.",".$b.",".of_get_option('sldarrowopacity',true).");}";
		}
		$slidercaphex = of_get_option('slidercapbg',true);
		list($r,$g,$b) = sscanf($slidercaphex,'#%02x%02x%02x');
		if ( of_get_option('slidercapbg', true) != '' ) {
			echo ".nivo-caption{background-color:rgba(".$r.",".$g.",".$b.",".of_get_option('slidercapbgpacity',true).");}";
		}
		if ( of_get_option('galleryfiltercolor', true) != '') {
			echo "ul.portfoliofilter li a{ color:".of_get_option('galleryfiltercolor', true).";}";
		}
		if ( of_get_option('gallerytitlecolorhv', true) != '' ) {
			echo ".holderwrap h5{ color:".of_get_option('gallerytitlecolorhv', true)."; }";
		}
		if ( of_get_option('gallerytitlecolorhv', true) != '' ) {
			echo "figure.effect-bubba figcaption::before, figure.effect-bubba figcaption::after{ border-color:".of_get_option('gallerytitlecolorhv', true)."; }";
		}
		if ( of_get_option('latestpoststtlcolor', true) != '' || of_get_option('newsbxbgcolor', true) != '' ) {
			echo ".news-box h5{ color:".of_get_option('latestpoststtlcolor', true)."; }";
			echo ".news{ background:".of_get_option('newsbxbgcolor', true)."; }";
			echo ".news:after{ border-right-color:".of_get_option('newsbxbgcolor', true)."; }";
			echo ".rightside .news:after{ border-left-color:".of_get_option('newsbxbgcolor', true)."; }";
		}


		// Top Four Boxes CSS
		if ( of_get_option('fourbxbgcolor', true) != '' || of_get_option('hometopfourbxcolor', true) != '' ) {
			echo ".fourbox{ background-color:".of_get_option('fourbxbgcolor', true)."; color:".of_get_option('hometopfourbxcolor', true)."; }";
		}
		if ( of_get_option('hometopfourbxtitlecolor', true) != '' ) {
			echo ".fourbox h6{ color:".of_get_option('hometopfourbxtitlecolor', true)."; }";
		}


		if ( of_get_option('hometopfourbxreadmore', true) != '' || of_get_option('topfourbxreadmorecolor', true) != '' ) {
			echo ".pagemore{ background-color:".of_get_option('hometopfourbxreadmore', true)."; color:".of_get_option('topfourbxreadmorecolor', true)."; }";
		}
		if ( of_get_option('hometopfourbxreadmorehv', true) != '' || of_get_option('hometopfourbxtitlecolorhv', true) != '' ) {
			echo ".fourbox:hover .pagemore{ background-color:".of_get_option('hometopfourbxtitlecolorhv', true)."; color:".of_get_option('hometopfourbxreadmorehv', true)."; }";
		}
		//Team Member CSS
		if ( of_get_option('teambxfontcolor', true) != '' || of_get_option('teamsocialcolor', true) != '' || of_get_option('teamsocialiconbg', true) != '' || of_get_option('ourteambgcolor', true) != '' ) {
			echo ".team_column, .teammember-content h5{color:".of_get_option('teambxfontcolor', true).";}";
			echo ".teammember-content a{color:".of_get_option('teambxfontcolor', true).";}";
			echo ".member-social-icon a{color:".of_get_option('teamsocialcolor', true)." !important; background-color:".of_get_option('teamsocialiconbg', true)." !important;}";
			echo ".team_column{background:".of_get_option('ourteambgcolor', true).";}";

		}

		if ( of_get_option('teamdesignationcolor', true) != '' ) {
			echo ".team_column:hover .teammember-content span, .team_column:hover .teammember-content h5, .team_column:hover p{color:".of_get_option('teamdesignationcolor', true).";}";
		}

		//Testimonials CSS

		if ( of_get_option('testidotsbgcolor', true) != '' ) {
			echo ".owl-controls .owl-dot{ background-color:".of_get_option('testidotsbgcolor', true)."; }";
		}
		if ( of_get_option('testimonialdescriptioncolor', true) != '' || of_get_option('testiboxbgcolor', true) != ''  ) {
			echo "#clienttestiminials .item, #clienttestiminials span{ color:".of_get_option('testimonialdescriptioncolor', true).";}";
			echo ".arrow_box{ background:".of_get_option('testiboxbgcolor', true).";}";
			echo ".arrow_box{ border-color:".of_get_option('testiboxbdcolor', true).";}";
			echo ".arrow_box:after{ border-top-color:".of_get_option('testiboxbgcolor', true).";}";
			echo ".arrow_box:before{ border-top-color:".of_get_option('testiboxbdcolor', true).";}";
		}
		if ( of_get_option('testimonialtitlecolor', true) != '' ) {
			echo "#clienttestiminials h6 a, #clienttestiminials h6{ color:".of_get_option('testimonialtitlecolor', true)."; }";
		}
		if ( of_get_option('skillbarbgcolor', true) != '' ) {
			echo ".skill-bg{ background-color:".of_get_option('skillbarbgcolor', true)."; }";
		}
		if ( of_get_option('footerpoststitlecolor', true) != '' ) {
			echo "ul.recent-post li a{ color:".of_get_option('footerpoststitlecolor', true)."; }";
		}
		if ( of_get_option('countertitlecolor', true) != '' ) {
			echo ".counterlist h6{ color:".of_get_option('countertitlecolor', true)."; }";
		}
		if ( of_get_option('counterdesccolor', true) != '' ) {
			echo ".counterlist .counter{ color:".of_get_option('counterdesccolor', true)."; }";
			echo ".counter::after{ background-color:".of_get_option('counterdesccolor', true)."; }";
		}
		if ( of_get_option('whychoosecolor', true) != '' || of_get_option('whychoosehvcolor', true) != '' || of_get_option('whychoosebgcolor', true) != '' ) {
			echo ".whychooseusbox:hover .whychooseus-title h6, .whychooseusbox:hover .whychooseus-description{ color:".of_get_option('whychoosehvcolor', true)."; }";
			echo ".whychooseusbox .whychooseus-description{ color:".of_get_option('whychoosecolor', true)."; }";
			echo ".whychooseusbox{ background-color:".of_get_option('whychoosebgcolor', true)."; }";
		}
		//Color scheme for one click background color
		if ( of_get_option('colorscheme', true) != '' ) {
			echo ".themefeatures .one_third:hover,
			.button,
			#commentform input#submit,
			input.search-submit,
			.post-password-form input[type='submit'],
			p.read-more a,
			.pagination ul li span,
			.pagination ul li a,
			.headertop .right a,
			.wpcf7 form input[type='submit'],
			#sidebar .search-form input.search-submit,
			.nivo-controlNav a.active,
			.fourbox:hover .pagemore,
			.counterlist:hover .cntimage,
			.counterlist:hover .cntbutton,
			.offer-1-column .offimgbx,
			.hvr-rectangle-out::before,
			.vacation-wrap,
			.home-post-comment,
			.toggle a,
			.holderwrap,
			.owl-controls .owl-dot.active,
			h3.widget-title,
			.box2,
			.button,
			#commentform input#submit,
			input.search-submit,
			.post-password-form input[type=submit],
			p.read-more a,
			.pagination ul li span,
			.pagination ul li a,
			.headertop .right a,
			.wpcf7 form input[type='submit'],
			#sidebar .search-form input.search-submit,
			.team_column:hover,
			.nivo-controlNav a.active,
			h1.entry-title:after, a.morebutton, .whychooseusbox:hover, #bytheme h2.section_title:after, .owl-carousel .owl-item{ background-color:".of_get_option('colorscheme', true)."; }";
		}


		$sliderarrowhex = of_get_option('colorscheme',true);
		list($r,$g,$b) = sscanf($sliderarrowhex,'#%02x%02x%02x');
		if ( of_get_option('colorscheme', true) != '' ) {
			echo ".themefeatures .one_half:hover{background-color:rgba(".$r.",".$g.",".$b.",".of_get_option('sldarrowopacity',true).");}";
		}

		//Color scheme for one click font color
		if ( of_get_option('colorscheme', true) != '' ) {
			echo ".sitenav ul li a:hover,
			.sitenav ul li.current_page_item a,
			.sitenav ul li.current_page_item ul li a:hover,
			.sitenav ul li:hover,
			.header-top .social-icons a:hover, .social-icons a:hover, .cntbutton,
			.offcontnt .pricedv,
			.fourbox:hover h6,
			.vacation-wrap a.bookatour, h2.section_title span,
			.sitenav ul li a:hover,
			.sitenav ul li.current_page_item a,
			.sitenav ul li.current_page_item ul li a:hover,
			.sitenav ul li.current-menu-parent a,
			.sitenav ul li:hover,
			.sitenav ul li.current_page_item ul.sub-menu li a:hover,
			.sitenav ul li.current-menu-parent ul.sub-menu li a:hover,
			.sitenav ul li.current-menu-parent ul.sub-menu li.current_page_item a,
			.sitenav ul li:hover,
			.contactdetail a:hover, .footer h5 span, .footer ul li a:hover, .footer ul li.current_page_item a, div.recent-post a:hover, a, .slide_toggle a, #sidebar ul li a:hover, .copyright-wrapper a, .footer .social-icons a:hover, .counterlist,  .themefeatures .one_half .fa,.member-social-icon a:hover,
			ul.portfoliofilter li:hover a,
			ul.portfoliofilter li a.selected{ color:".of_get_option('colorscheme', true)."; }";
		}


		//Color scheme for one click border color
		if ( of_get_option('colorscheme', true) != '' ) {
			echo ".team_column:hover .teamrectangle{ border-bottom-color:".of_get_option('colorscheme', true)." ; }";
			echo ".footer .social-icons a:hover, .whychooseusborder, .counterlist .counter-cen{ border-color:".of_get_option('colorscheme', true)." ; }";
			echo ".rightside:hover .news::after{ border-left-color:".of_get_option('colorscheme', true)." ; }";
			echo ".news-box.rightside:hover .news::after{ border-right:none !important; }";
			echo ".news-box:hover .news::after{ border-right-color:".of_get_option('colorscheme', true)." ; }";
		}

		echo "</style>";
	}
}
add_action('wp_head', 'buildup_pro_custom_head_codes');


function buildup_pro_pagination() {
	global $wp_query;
	$big = 12345678;
	$page_format = paginate_links( array(
	    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	    'format' => '?paged=%#%',
	    'current' => max( 1, get_query_var('paged') ),
	    'total' => $wp_query->max_num_pages,
	    'type'  => 'array'
	) );
	if( is_array($page_format) ) {
		$paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
		echo '<div class="pagination"><div><ul>';
		echo '<li><span>'. $paged . ' of ' . $wp_query->max_num_pages .'</span></li>';
		foreach ( $page_format as $page ) {
			echo "<li>$page</li>";
		}
		echo '</ul></div></div>';
	}
}
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/**
 * Load custom functions file.
 */
require get_template_directory() . '/inc/custom-functions.php';

function buildup_pro_custom_blogpost_pagination( $wp_query ){
	$big = 999999999; // need an unlikely integer
	if ( get_query_var('paged') ) { $pageVar = 'paged'; }
	elseif ( get_query_var('page') ) { $pageVar = 'page'; }
	else { $pageVar = 'paged'; }
	$pagin = paginate_links( array(
		'base' 			=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' 		=> '?'.$pageVar.'=%#%',
		'current' 		=> max( 1, get_query_var($pageVar) ),
		'total' 		=> $wp_query->max_num_pages,
		'prev_text'		=> '&laquo; Prev',
		'next_text' 	=> 'Next &raquo;',
		'type'  => 'array'
	) );
	if( is_array($pagin) ) {
		$paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
		echo '<div class="pagination"><div><ul>';
		echo '<li><span>'. $paged . ' of ' . $wp_query->max_num_pages .'</span></li>';
		foreach ( $pagin as $page ) {
			echo "<li>$page</li>";
		}
		echo '</ul></div></div>';
	}
}
// get slug by id
function buildup_pro_get_slug_by_id($id) {
	$post_data = get_post($id, ARRAY_A);
	$slug = $post_data['post_name'];
	return $slug;
}
