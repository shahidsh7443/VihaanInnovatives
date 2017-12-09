<?php
/**
 * @package BuildUp Pro
 * Setup the WordPress core custom functions feature.
 *
*/

add_action('buildup_pro_optionsframework_custom_scripts', 'buildup_pro_optionsframework_custom_scripts');
function buildup_pro_optionsframework_custom_scripts() { ?>
	<script type="text/javascript">
    jQuery(document).ready(function() {
    
        jQuery('#example_showhidden').click(function() {
            jQuery('#section-example_text_hidden').fadeToggle(400);
        });
        
        if (jQuery('#example_showhidden:checked').val() !== undefined) {
            jQuery('#section-example_text_hidden').show();
        }
        
    });
    </script><?php
}

// get_the_content format text
function get_the_content_format( $str ){
	$raw_content = apply_filters( 'the_content', $str );
	$content = str_replace( ']]>', ']]&gt;', $raw_content );
	return $content;
}
// the_content format text
function the_content_format( $str ){
	echo get_the_content_format( $str );
}

function is_google_font( $font ){
	$notGoogleFont = array( 'Arial', 'Comic Sans MS', 'FreeSans', 'Georgia', 'Lucida Sans Unicode', 'Palatino Linotype', 'Symbol', 'Tahoma', 'Trebuchet MS', 'Verdana' );
	if( in_array($font, $notGoogleFont) ){
		return false;
	}else{
		return true;
	}
}

// subhead section function
function sub_head_section( $more ) {
	$pgs = 0;
	do {
		$pgs++;
	} while ($more > $pgs);
	return $pgs;
}

//[clear]
function clear_func() {
	$clr = '<div class="clear"></div>';
	return $clr;
}
add_shortcode( 'clear', 'clear_func' );


//[column_content]Your content here...[/column_content]
function column_content_func( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'type' => '',	
	), $atts ) );
	$colPos = strpos($type, '_last');
	if($colPos === false){
		$cnt = '<div class="'.$type.'">'.do_shortcode($content).'</div>';
	}else{
		$type = substr($type,0,$colPos);
		$cnt = '<div class="'.$type.' last_column">'.do_shortcode($content).'</div>';
	}
	return $cnt;
}
add_shortcode( 'column_content', 'column_content_func' );


//[hr]
function hrule_func() {
	$hrule = '<div class="hr"></div>';
	return $hrule;
}
add_shortcode( 'hr', 'hrule_func' );

//[hr_top]
function back_to_top_func() {
	$back_top = '<div id="back-top">
		<a title="Top of Page" href="#top"><span></span></a>
	</div>';
	return $back_top;
}
add_shortcode( 'back-to-top', 'back_to_top_func' );


// [searchform]
function searchform_shortcode_func( $atts ){
	return get_search_form( false );
}
add_shortcode( 'searchform', 'searchform_shortcode_func' );

// accordion
function accordion_func( $atts, $content = null ) {
	$acc = '<div style="margin-top:10px;">'.get_the_content_format( do_shortcode($content) ).'<div class="clear"></div></div>';
	return $acc;
}
add_shortcode( 'accordion', 'accordion_func' );
function accordion_content_func( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'title' => 'Accordion Title',
	), $atts ) );
	$content = wpautop(trim($content));
	$acn = '<div class="accordion-box"><h2>'.$title.'</h2>
			<div class="acc-content">'.$content.'</div><div class="clear"></div></div>';
	return $acn;
}
add_shortcode( 'accordion_content', 'accordion_content_func' );


// remove excerpt more
function new_excerpt_more( $more ) {
	return '... ';
}
add_filter('excerpt_more', 'new_excerpt_more');

// get post categories function
function getPostCategories(){
	$categories = get_the_category();
	$catOut = '';
	$separator = ', ';
	$catOutput = '';
	if($categories){
		foreach($categories as $category) {
			$catOutput .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s", 'buildup-pro' ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
		}
		$catOut = ''.trim($catOutput, $separator);
	}
	return $catOut;
}

// replace last occurance of a string.
function str_lreplace($search, $replace, $subject){
	$pos = strrpos($subject, $search);
	if($pos !== false){
		$subject = substr_replace($subject, $replace, $pos, strlen($search));
	}
	return $subject;
}

// custom post type for Testimonials
function my_custom_post_testimonials() {
	$labels = array(
		'name'               => __( 'Testimonial','buildup-pro'),
		'singular_name'      => __( 'Testimonial','buildup-pro'),
		'add_new'            => __( 'Add Testimonial','buildup-pro'),
		'add_new_item'       => __( 'Add New Testimonial','buildup-pro'),
		'edit_item'          => __( 'Edit Testimonial','buildup-pro'),
		'new_item'           => __( 'New Testimonial','buildup-pro'),
		'all_items'          => __( 'All Testimonials','buildup-pro'),
		'view_item'          => __( 'View Testimonial','buildup-pro'),
		'search_items'       => __( 'Search Testimonials','buildup-pro'),
		'not_found'          => __( 'No testimonials found','buildup-pro'),
		'not_found_in_trash' => __( 'No testimonials found in the Trash','buildup-pro'), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Testimonials'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Manage Testimonials',
		'public'        => true,
		'menu_icon'		=> 'dashicons-format-quote',
		'menu_position' => null,
		'supports'      => array( 'title', 'editor', 'thumbnail'),
		'has_archive'   => true,
	);
	register_post_type( 'testimonials', $args );	
}
add_action( 'init', 'my_custom_post_testimonials' );

// add meta box to testimonials
add_action( 'admin_init', 'my_testimonials_admin_function' );
function my_testimonials_admin_function() {
    add_meta_box( 'testimonials_meta_box',
        'Testimonials Info',
        'display_testimonials_meta_box',
        'testimonials', 'normal', 'high'
    );
}
// add meta box form to team
function display_testimonials_meta_box( $testimonials ) {
    // Retrieve current name of the Director and Movie Rating based on review ID
    $designation = esc_html( get_post_meta( $testimonials->ID, 'designation', true ) );   
    ?>
    <table width="100%">
        <tr>
            <td width="20%">client info (designation) </td>
            <td width="80%"><input type="text" name="designation" value="<?php echo $designation; ?>" /></td>
        </tr>      
    </table>
    <?php      
}
// save team meta box form data
add_action( 'save_post', 'add_testimonials_fields_function', 10, 2 );
function add_testimonials_fields_function( $testimonials_id, $testimonials ) {
    // Check post type for testimonials
    if ( $testimonials->post_type == 'testimonials' ) {
        // Store data in post meta table if present in post data
        if ( isset($_POST['designation']) ) {
            update_post_meta( $testimonials_id, 'designation', $_POST['designation'] );
        }        
    }
}


//Testimonials function
function testimonials_output_func( $atts ){
	extract( shortcode_atts( array( 
	'show' => '',
	),
	$atts ) ); 		
	wp_reset_query();
 	query_posts('post_type=testimonials&posts_per_page='.$show);
	if ( have_posts() ) :
	 $testimonialoutput = '<div id="clienttestiminials"><div class="owl-carousel">';	
		while ( have_posts() ) : the_post();
		if ( has_post_thumbnail()) {
				$large_imgSrc = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
				$imgUrl = $large_imgSrc[0];
		}else{
				$imgUrl = get_template_directory_uri().'/images/img_404.png';
		}	
		$designation = esc_html( get_post_meta( get_the_ID(), 'designation', true ) );		   
			$testimonialoutput .= '
				 <div class="item">
				 <div class="arrow_box">
				  '.content( of_get_option('testimonialsexcerptlength') ).'
					</div><div class="clear"></div>
					<div class="left">
					<h6>'.get_the_title().'</h6>	
					 <span>'.$designation.'</span>
					 </div>
					 <div class="right">
						 <div class="tmthumb"><img src="'.$imgUrl.'" alt=" " /></div>
					 </div>
				</div>';
		endwhile;
		 $testimonialoutput .= '</div></div>';
	else:
	  $testimonialoutput = 'People Say Is Empty!';			
	  endif;  
	wp_reset_query();	
	return $testimonialoutput;
}
add_shortcode( 'testimonials', 'testimonials_output_func' );



//Testimonials function
function testimonials_listing_output_func( $atts ){
	extract( shortcode_atts( array( 
	'show' => '',
	),
	$atts ) ); 		
	wp_reset_query();
 	query_posts('post_type=testimonials&posts_per_page='.$show);
	if ( have_posts() ) :
	 $testimonialoutput = '<div id="Tmnllist">';	
		while ( have_posts() ) : the_post();
		if ( has_post_thumbnail()) {
				$large_imgSrc = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
				$imgUrl = $large_imgSrc[0];
			}else{
				$imgUrl = get_template_directory_uri().'/images/img_404.png';
			}	
		$designation = esc_html( get_post_meta( get_the_ID(), 'designation', true ) );		   
			$testimonialoutput .= '
			    <div class="tmnllisting">
			 	<div class="tmnlthumb"><a href="'.get_permalink().'"><img src="'.$imgUrl.'" alt=" " /></a></div>
				 <h6><a href="'.get_permalink().'">'.get_the_title().'</a></h6>	
				 <span>'.$designation.'</span>
				  '.content( of_get_option('testimonialsexcerptlength') ).'
				</div>	';
		endwhile;
		 $testimonialoutput .= '</div>';
	else:
	  $testimonialoutput = '<div id="Tmnllist"> 
           
              <div class="tmnllisting">
                <div class="tmnlthumb"><a href="#"><img src="'.get_template_directory_uri()."/images/team1.jpg".'" alt="" /></a></div>
                   <h6><a href="#">Brandon Doe</a></h6>
				   <span>Ceo & Founder</span>
				   <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec laoreet magna diam, id ullamcorper lacus suscipit vehicula. In porta vehicula lacus, ac viverra ipsum volutpat quis. Aenean dapibus, nisl in efficitur iaculis.</p>
               </div>
			  
                <div class="tmnllisting">
                <div class="tmnlthumb"><a href="#"><img src="'.get_template_directory_uri()."/images/team2.jpg".'" alt="" /></a></div>
                   <h6><a href="#">Brandon Doe</a></h6>
				   <span>Ceo & Founder</span>
				   <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec laoreet magna diam, id ullamcorper lacus suscipit vehicula. In porta vehicula lacus, ac viverra ipsum volutpat quis. Aenean dapibus, nisl in efficitur iaculis.</p>
               </div>
			  
			     <div class="tmnllisting">
                <div class="tmnlthumb"><a href="#"><img src="'.get_template_directory_uri()."/images/team3.jpg".'" alt="" /></a></div>
                   <h6><a href="#">Brandon Doe</a></h6>
				   <span>Ceo & Founder</span>
				   <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec laoreet magna diam, id ullamcorper lacus suscipit vehicula. In porta vehicula lacus, ac viverra ipsum volutpat quis. Aenean dapibus, nisl in efficitur iaculis.</p>
               </div>
			  
			    <div class="tmnllisting">
                <div class="tmnlthumb"><a href="#"><img src="'.get_template_directory_uri()."/images/team4.jpg".'" alt="" /></a></div>
                   <h6><a href="#">Brandon Doe</a></h6>
				   <span>Ceo & Founder</span>
				   <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec laoreet magna diam, id ullamcorper lacus suscipit vehicula. In porta vehicula lacus, ac viverra ipsum volutpat quis. Aenean dapibus, nisl in efficitur iaculis.</p>
               </div>
			               
           
  </div>';			
	  endif;  
	wp_reset_query();	
	return $testimonialoutput;
}
add_shortcode( 'testimonials-listing', 'testimonials_listing_output_func' );


//Testimonials function
function testimonials_rotator_output_func( $atts ){
	extract( shortcode_atts( array( 
	'show' => '',
	),
	$atts ) ); 		
	wp_reset_query();
 	query_posts('post_type=testimonials&posts_per_page='.$show);
	if ( have_posts() ) :
	 $testimonialoutput = '<div id="testimonials"><div class="quotes">';	
		while ( have_posts() ) : the_post();	
		$designation = esc_html( get_post_meta( get_the_ID(), 'designation', true ) );		   
			$testimonialoutput .= '
			  <div> '.content( of_get_option('testimonialsexcerptlength') ).'
				  <h6><a href="'.get_permalink().'">'.get_the_title().'</a></h6>
				  <span>'.$designation.'</span>					
              </div>
			';
		endwhile;
		 $testimonialoutput .= '</div></div>';
	else:
	  $testimonialoutput = '<div id="testimonials"><div class="quotes">
           
               <div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec laoreet magna diam, id ullamcorper lacus suscipit vehicula. In porta vehicula lacus, ac viverra ipsum volutpat quis. Aenean dapibus, nisl in efficitur iaculis.</p>
				   <h6><a href="#">Brandon Doe</a></h6>
				   <span>Ceo & Founder</span>				  
               </div>
			  
                 <div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec laoreet magna diam, id ullamcorper lacus suscipit vehicula. In porta vehicula lacus, ac viverra ipsum volutpat quis. Aenean dapibus, nisl in efficitur iaculis.</p>
				   <h6><a href="#">Brandon Doe</a></h6>
				   <span>Ceo & Founder</span>				  
               </div>
           
  </div></div>';			
	  endif;  
	wp_reset_query();	
	return $testimonialoutput;
}
add_shortcode( 'sidebar-testimonials', 'testimonials_rotator_output_func' );


//custom post type for Our Team
function my_custom_post_team() {
	$labels = array(
		'name'               => __( 'Our Team', 'buildup-pro' ),
		'singular_name'      => __( 'Our Team', 'buildup-pro' ),
		'add_new'            => __( 'Add New', 'buildup-pro' ),
		'add_new_item'       => __( 'Add New Team Member', 'buildup-pro' ),
		'edit_item'          => __( 'Edit Team Member', 'buildup-pro' ),
		'new_item'           => __( 'New Member', 'buildup-pro' ),
		'all_items'          => __( 'All Members', 'buildup-pro' ),
		'view_item'          => __( 'View Members', 'buildup-pro' ),
		'search_items'       => __( 'Search Team Members', 'buildup-pro' ),
		'not_found'          => __( 'No Team members found', 'buildup-pro' ),
		'not_found_in_trash' => __( 'No Team members found in the Trash', 'buildup-pro' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Our Team'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Manage Team',
		'public'        => true,
		'menu_position' => null,
		'menu_icon'		=> 'dashicons-groups',
		'supports'      => array( 'title', 'editor', 'thumbnail' ),
		'rewrite' => array('slug' => 'our-team'),
		'has_archive'   => true,
	);
	register_post_type( 'team', $args );
}
add_action( 'init', 'my_custom_post_team' );

// add meta box to team
add_action( 'admin_init', 'my_team_admin_function' );
function my_team_admin_function() {
    add_meta_box( 'team_meta_box',
        'Member Info',
        'display_team_meta_box',
        'team', 'normal', 'high'
    );
}
// add meta box form to team
function display_team_meta_box( $team ) {
    // Retrieve current name of the Director and Movie Rating based on review ID
    $designation = esc_html( get_post_meta( $team->ID, 'designation', true ) );
    $facebook = get_post_meta( $team->ID, 'facebook', true );
	$facebooklink = esc_url( get_post_meta( $team->ID, 'facebooklink', true ) );
    $twitter = get_post_meta( $team->ID, 'twitter', true );
	$twitterlink = esc_url( get_post_meta( $team->ID, 'twitterlink', true ) );
    $linkedin = get_post_meta( $team->ID, 'linkedin', true );
	$linkedinlink = esc_url( get_post_meta( $team->ID, 'linkedinlink', true ) );
	$pint = get_post_meta( $team->ID, 'google', true );
	$googlelink = esc_url( get_post_meta( $team->ID, 'googlelink', true ) );
    $dribbble = get_post_meta( $team->ID, 'dribbble', true );
	$dribbblelink = get_post_meta( $team->ID, 'dribbblelink', true );
    ?>
    <table width="100%">
        <tr>
            <td width="20%">Designation </td>
            <td width="80%"><input type="text" name="designation" value="<?php echo $designation; ?>" /></td>
        </tr>
        <tr>
            <td width="20%">Social link 1</td>
            <td width="40%"><input type="text" name="facebook" value="<?php echo $facebook; ?>" /></td>
            <td width="40%"><input style="width:500px;" type="text" name="facebooklink" value="<?php echo $facebooklink; ?>" /></td>
        </tr>
        <tr>
            <td width="20%">Social Link 2</td>
            <td width="40%"><input type="text" name="twitter" value="<?php echo $twitter; ?>" /></td>
            <td width="40%"><input style="width:500px;" type="text" name="twitterlink" value="<?php echo $twitterlink; ?>" /></td>
        </tr>
        <tr>
            <td width="20%">Social Link 3</td>
            <td width="40%"><input type="text" name="linkedin" value="<?php echo $linkedin; ?>" /></td>
            <td width="40%"><input style="width:500px;" type="text" name="linkedinlink" value="<?php echo $linkedinlink; ?>" /></td>
        </tr>
        <tr>
            <td width="20%">Social Link 4</td>
            <td width="40%"><input type="text" name="dribbble" value="<?php echo $dribbble; ?>" /></td>
            <td width="40%"><input style="width:500px;" type="text" name="dribbblelink" value="<?php echo $dribbblelink; ?>" /></td>
        </tr>
        <tr>
            <td width="20%">Social Link 5</td>
            <td width="40%"><input type="text" name="google" value="<?php echo $pint; ?>" /></td>
            <td width="40%"><input style="width:500px;" type="text" name="googlelink" value="<?php echo $googlelink; ?>" /></td>
        </tr>
        <tr>
        	<td width="100%" colspan="3"><label style="font-size:12px;"><strong>Note:</strong> Icon name should be in lowercase without space. More social icons can be found at: http://fortawesome.github.io/Font-Awesome/icons/</label> </td>
        </tr>
    </table>
    <?php                
}
// save team meta box form data
add_action( 'save_post', 'add_team_fields_function', 10, 2 );
function add_team_fields_function( $team_id, $team ) {
    // Check post type for testimonials
    if ( $team->post_type == 'team' ) {
        // Store data in post meta table if present in post data
        if ( isset($_POST['designation']) ) {
            update_post_meta( $team_id, 'designation', $_POST['designation'] );
        }
        if ( isset($_POST['facebook']) ) {
            update_post_meta( $team_id, 'facebook', $_POST['facebook'] );
        }
		if ( isset($_POST['facebooklink']) ) {
            update_post_meta( $team_id, 'facebooklink', $_POST['facebooklink'] );
        }
        if ( isset($_POST['twitter']) ) {
            update_post_meta( $team_id, 'twitter', $_POST['twitter'] );
        }
		if ( isset($_POST['twitterlink']) ) {
            update_post_meta( $team_id, 'twitterlink', $_POST['twitterlink'] );
        }
        if ( isset($_POST['linkedin']) ) {
            update_post_meta( $team_id, 'linkedin', $_POST['linkedin'] );
        }
		if ( isset($_POST['linkedinlink']) ) {
            update_post_meta( $team_id, 'linkedinlink', $_POST['linkedinlink'] );
        }
        if ( isset($_POST['dribbble']) ) {
            update_post_meta( $team_id, 'dribbble', $_POST['dribbble'] );
        }
		if ( isset($_POST['dribbblelink']) ) {
            update_post_meta( $team_id, 'dribbblelink', $_POST['dribbblelink'] );
        }
		if ( isset($_POST['google']) ) {
            update_post_meta( $team_id, 'google', $_POST['google'] );
        }
		if ( isset($_POST['googlelink']) ) {
            update_post_meta( $team_id, 'googlelink', $_POST['googlelink'] );
        }
    }
}

function ourteamposts_func( $atts ) {
   extract( shortcode_atts( array(
		'show' => '',
		'teammemberlength' => '',
	), $atts ) );
	  extract( shortcode_atts( array( 'show' => '',), $atts ) ); $postoutput = ''; wp_reset_query();
	$bposts = '<div class="section-teammember">';
	$args = array( 'post_type' => 'team', 'posts_per_page' => $show, 'post__not_in' => get_option('sticky_posts'), 'orderby' => 'date', 'order' => 'desc' );
	query_posts( $args );
	$n = 0;
	if ( have_posts() ) {
		while ( have_posts() ) { 
			the_post();
			$n++; if( $n%4 == 0 ) $nomargn = ' last'; else $nomargn = '';
			$designation = esc_html( get_post_meta( get_the_ID(), 'designation', true ) );
			$facebook = get_post_meta( get_the_ID(), 'facebook', true );
			$facebooklink = get_post_meta( get_the_ID(), 'facebooklink', true );
			$twitter = get_post_meta( get_the_ID(), 'twitter', true );
			$twitterlink = get_post_meta( get_the_ID(), 'twitterlink', true );
			$linkedin = get_post_meta( get_the_ID(), 'linkedin', true );
			$linkedinlink = get_post_meta( get_the_ID(), 'linkedinlink', true );
			$dribbble = get_post_meta( get_the_ID(), 'dribbble', true );
			$dribbblelink = get_post_meta( get_the_ID(), 'dribbblelink', true );
			$pint = get_post_meta( get_the_ID(), 'google', true );
			$googlelink = get_post_meta( get_the_ID(), 'googlelink', true );
			$large_imgSrc = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
			if ( !empty($large_imgSrc)) {
				$imgUrl = $large_imgSrc[0];
			}else{
				$imgUrl = get_template_directory_uri().'/images/img_404.png';
			}
			$bposts .= '<div class="team_column">';
			$bposts .= '
			<div class="ourteam-thumb"><a href="'.get_permalink().'" title="'.get_the_title().'"><img src="'.$imgUrl.'" alt=" " /></a></div>
			
				<div class="teammember-content">
				
				<a href="'.get_permalink().'" title="'.get_the_title().'"><h5>'.get_the_title().'</h5></a>
				<span class="member-designation">'.$designation.'</span>
				 
				 <p>'.wp_trim_words( get_the_content(), $teammemberlength, '' ).'</p>
				 ';
					
			$bposts .= '<div class="member-social-icon">';
								if( $facebook != '' ){
									$bposts .= '<a href="'.$facebooklink.'" title="'.$facebook.'" target="_blank"><i class="fa fa-'.$facebook.' fa-lg"></i></a>';
								}
								if( $twitter != '' ){
									$bposts .= '<a href="'.$twitterlink.'" title="'.$twitter.'" target="_blank"><i class="fa fa-'.$twitter.' fa-lg"></i></a>';
								}
								if( $linkedin != '' ){
									$bposts .= '<a href="'.$linkedinlink.'" title="'.$linkedin.'" target="_blank"><i class="fa fa-'.$linkedin.' fa-lg"></i></a>';
								}
								if( $dribbble != '' ){
									$bposts .= '<a href="'.$dribbblelink.'" title="'.$dribbble.'" target="_blank"><i class="fa fa-'.$dribbble.' fa-lg"></i></a>';
								}
								if( $pint != '' ){
									$bposts .= '<a href="'.$googlelink.'" title="'.$pint.'" target="_blank"><i class="fa fa-'.$pint.' fa-lg"></i></a><div class="clear"></div>';
								}
				$bposts .= '</div>';
			$bposts .= '<div class="clear"></div></div></div>';
		}
	}else{
		$bposts .= '
<div class="team_column"><div class="ourteam-thumb"><a title="Michael Smart" href="#"><img alt="" src="'.get_template_directory_uri().'/images/team1.jpg"></a></div><div class="teammember-content"><a title="Michael Smart" href="#"><h5>Michael Smart</h5></a><span class="member-designation">Chief Engineer</span><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took</p><div class="member-social-icon"><a target="_blank" title="facebook" href="#"><i class="fa fa-facebook fa-lg"></i></a><a target="_blank" title="twitter" href="#"><i class="fa fa-twitter fa-lg"></i></a><a target="_blank" title="skype" href="#"><i class="fa fa-skype fa-lg"></i></a></div><div class="clear"></div></div></div><div class="team_column"><div class="ourteam-thumb"><a title="Alexander McDoe" href="#"><img alt=" " src="'.get_template_directory_uri().'/images/team2.jpg"></a></div><div class="teammember-content"><a title="Alexander McDoe" href="#"><h5>Alexander McDoe</h5></a><span class="member-designation">Project Manager</span><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took</p><div class="member-social-icon"><a target="_blank" title="facebook" href="#"><i class="fa fa-facebook fa-lg"></i></a><a target="_blank" title="twitter" href="#"><i class="fa fa-twitter fa-lg"></i></a><a target="_blank" title="skype" href="#"><i class="fa fa-skype fa-lg"></i></a><a target="_blank" title="youtube" href="#"><i class="fa fa-youtube fa-lg"></i></a></div><div class="clear"></div></div></div><div class="team_column"><div class="ourteam-thumb"><a title="Stefan Fransis" href="#"><img alt="" src="'.get_template_directory_uri().'/images/team3.jpg"></a></div><div class="teammember-content"><a title="Stefan Fransis" href="#"><h5>Stefan Fransis</h5></a><span class="member-designation">Architect</span><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took</p><div class="member-social-icon"><a target="_blank" title="facebook" href="#"><i class="fa fa-facebook fa-lg"></i></a><a target="_blank" title="twitter" href="#"><i class="fa fa-twitter fa-lg"></i></a><a target="_blank" title="skype" href="#"><i class="fa fa-skype fa-lg"></i></a></div><div class="clear"></div></div></div><div class="team_column"><div class="ourteam-thumb"><a title="Brad Hassan" href="#"><img alt=" " src="'.get_template_directory_uri().'/images/team4.jpg"></a></div><div class="teammember-content"><a title="Brad Hassan" href="#"><h5>Brad Hassan</h5></a><span class="member-designation">Service Engineer</span><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took</p><div class="member-social-icon"><a target="_blank" title="facebook" href="#"><i class="fa fa-facebook fa-lg"></i></a><a target="_blank" title="twitter" href="#"><i class="fa fa-twitter fa-lg"></i></a><a target="_blank" title="skype" href="#"><i class="fa fa-skype fa-lg"></i></a><a target="_blank" title="youtube" href="#"><i class="fa fa-youtube fa-lg"></i></a></div><div class="clear"></div></div></div>';
		}
	wp_reset_query();
	$bposts .= '<div class="clear"></div></div>';
    return $bposts;
}
add_shortcode( 'our-team', 'ourteamposts_func' );

// Social Icon Shortcodes
function buildup_pro_social_area($atts,$content = null){
  return '<div class="social-icons">'.do_shortcode($content).'</div>';
 }
add_shortcode('social_area','buildup_pro_social_area');

function buildup_pro_social($atts){
 extract(shortcode_atts(array(
  'icon' => '',
  'link' => ''
 ),$atts));
  return '<a href="'.$link.'" target="_blank" class="fa fa-'.$icon.'" title="'.$icon.'"></a>';
 }
add_shortcode('social','buildup_pro_social');


function contactform_func( $atts ) {
    $atts = shortcode_atts( array(
        'to_email' => get_bloginfo('admin_email'),
		'title' => 'Contact enquiry - '.home_url( '/' ),
    ), $atts );

	$cform = "<div class=\"main-form-area\" id=\"contactform_main\">";

	$cerr = array();
	if( isset($_POST['c_submit']) && $_POST['c_submit']=='Submit' ){
		$name 			= trim( $_POST['c_name'] );
		$email 			= trim( $_POST['c_email'] );
		$phone 			= trim( $_POST['c_phone'] );
		$website		= trim( $_POST['c_website'] );
		$comments 		= trim( $_POST['c_comments'] );
		$captcha 		= trim( $_POST['c_captcha'] );
		$captcha_cnf	= trim( $_POST['c_captcha_confirm'] );

		if( !$name )
			$cerr['name'] = 'Please enter your name.';
		if( ! filter_var($email, FILTER_VALIDATE_EMAIL) ) 
			$cerr['email'] = 'Please enter a valid email.';
		if( !$phone )
			$cerr['phone'] = 'Please enter your phone number.';
		if( !$comments )
			$cerr['comments'] = 'Please enter your message.';
		if( !$captcha || (md5($captcha) != $captcha_cnf) )
			$cerr['captcha'] = 'Please enter the correct answer.';

		if( count($cerr) == 0 ){
			$subject = $atts['title'];
			$headers = "From: ".$name." <" . strip_tags($email) . ">\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

			$message = '<html><body>
							<table>
								<tr><td>Name: </td><td>'.$name.'</td></tr>
								<tr><td>Email: </td><td>'.$email.'</td></tr>
								<tr><td>Phone: </td><td>'.$phone.'</td></tr>
								<tr><td>Website: </td><td>'.$website.'</td></tr>
								<tr><td>Message: </td><td>'.$comments.'</td></tr>
							</table>
						</body>
					</html>';
			mail( $atts['to_email'], $subject, $message, $headers);
			$cform .= '<div class="success_msg">Thank you! A representative will get back to you very shortly.</div>';
			unset( $name, $email, $phone, $website, $comments, $captcha );
		}else{
			$cform .= '<div class="error_msg">';
			$cform .= implode('<br />',$cerr);
			$cform .= '</div>';
		}
	}

	$capNum1 	= rand(1,4);
	$capNum2 	= rand(1,5);
	$capSum		= $capNum1 + $capNum2;
	$sumStr		= $capNum1." + ".$capNum2 ." = ";

	$cform .= "<form name=\"contactform\" action=\"#contactform_main\" method=\"post\">
			<p><input type=\"text\" name=\"c_name\" value=\"". ( ( empty($name) == false ) ? $name : "" ) ."\" placeholder=\"Name\" /></p>
			<p><input type=\"email\" name=\"c_email\" value=\"". ( ( empty($email) == false ) ? $email : "" ) ."\" placeholder=\"Email\" /></p><div class=\"clear\"></div>
			<p><input type=\"tel\" name=\"c_phone\" value=\"". ( ( empty($phone) == false ) ? $phone : "" ) ."\" placeholder=\"Phone\" /></p>
			<p><input type=\"url\" name=\"c_website\" value=\"". ( ( empty($website) == false ) ? $website : "" ) ."\" placeholder=\"Website with prefix http://\" /></p><div class=\"clear\"></div>
			<p><textarea name=\"c_comments\" placeholder=\"Message\">". ( ( empty($comments) == false ) ? $comments : "" ) ."</textarea></p><div class=\"clear\"></div>";
	$cform .= "<p><span class=\"capcode\">$sumStr</span><input type=\"text\" placeholder=\"Captcha\" value=\"". ( ( empty($captcha) == false ) ? $captcha : "" ) ."\" name=\"c_captcha\" /><input type=\"hidden\" name=\"c_captcha_confirm\" value=\"". md5($capSum)."\"></p><div class=\"clear\"></div>";
	$cform .= "<p class=\"sub\"><input type=\"submit\" name=\"c_submit\" value=\"Submit\" class=\"search-submit\" /></p>
		</form>
	</div>";

    return $cform;
}
add_shortcode( 'contactform', 'contactform_func' );


//custom post type for Our photogallery
function my_custom_post_photogallery() {
	$labels = array(
		'name'               => __( 'Photo Gallery','buildup-pro' ),
		'singular_name'      => __( 'Photo Gallery','buildup-pro' ),
		'add_new'            => __( 'Add New','buildup-pro' ),
		'add_new_item'       => __( 'Add New Image ','buildup-pro' ),
		'edit_item'          => __( 'Edit Image','buildup-pro' ),
		'new_item'           => __( 'New Image','buildup-pro' ),
		'all_items'          => __( 'All Images','buildup-pro' ),
		'view_item'          => __( 'View Image','buildup-pro' ),
		'search_items'       => __( 'Search Images','buildup-pro' ),
		'not_found'          => __( 'No images found','buildup-pro' ),
		'not_found_in_trash' => __( 'No images found in the Trash','buildup-pro' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Photo Gallery'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Manage Photo Gallery',
		'public'        => true,
		'menu_position' => 23,
		'supports'      => array( 'title', 'thumbnail' ),
		'has_archive'   => true,
	);
	register_post_type( 'photogallery', $args );
}
add_action( 'init', 'my_custom_post_photogallery' );


//  register gallery taxonomy
register_taxonomy( "gallerycategory", 
	array("photogallery"), 
	array(
		"hierarchical" => true, 
		"label" => "Gallery Category", 
		"singular_label" => "Photo Gallery", 
		"rewrite" => true
	)
);

add_action("manage_posts_custom_column",  "photogallery_custom_columns");
add_filter("manage_edit-photogallery_columns", "photogallery_edit_columns");
function photogallery_edit_columns($columns){
	$columns = array(
		"cb" => '<input type="checkbox" />',
		"title" => "Gallery Title",
		"pcategory" => "Gallery Category",
		"view" => "Image",
		"date" => "Date",
	);
	return $columns;
}
function photogallery_custom_columns($column){
	global $post;
	switch ($column) {
		case "pcategory":
			echo get_the_term_list($post->ID, 'gallerycategory', '', ', ','');
		break;
		case "view":
			the_post_thumbnail('thumbnail');
		break;
		case "date":

		break;
	}
}


//[photogallery filter="false" show="8"]
function photogallery_shortcode_func( $atts ) {
	extract( shortcode_atts( array(
		'show' => -1,
		'filter' => 'true'
	), $atts ) );
	$pfStr = '';

	$pfStr .= '<div class="photobooth">';
	if( $filter == 'true' ){
		$pfStr .= '<ul class="portfoliofilter clearfix"><li><a class="selected" data-filter="*" href="#">'.of_get_option('galleryshowallbtn').'</a><span></span></li>';
		$categories = get_categories( array('taxonomy' => 'gallerycategory') );
		foreach ($categories as $category) {
			$pfStr .= '<li><a data-filter=".'.$category->slug.'" href="#">'.$category->name.'</a></li>';
		}
		$pfStr .= '</ul>';
	}

	$pfStr .= '<div class="row fourcol portfoliowrap"><div class="portfolio">';
	$j=0;
	query_posts('post_type=photogallery&posts_per_page='.$show); 
	if ( have_posts() ) : while ( have_posts() ) : the_post(); 
	$j++;
		$videoUrl = get_post_meta( get_the_ID(), 'video_file_url', true);
		$imgSrc = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
		$terms = wp_get_post_terms( get_the_ID(), 'gallerycategory', array("fields" => "all"));
		$slugAr = array();
		foreach( $terms as $tv ){
			$slugAr[] = $tv->slug;
		}
		if ( $imgSrc[0]!='' ) {
			$imgUrl = $imgSrc[0];
		}else{
			$imgUrl = get_template_directory_uri().'/images/img_404.png';
		}
		$pfStr .= '<div class="entry '.implode(' ', $slugAr).'">
						<div class="holderwrap">
							<a href="'.( ($videoUrl) ? $videoUrl : $imgSrc[0] ).'" data-rel="prettyPhoto[bkpGallery]">
								<figure class="effect-bubba">						
								<img src="'.$imgSrc[0].'"/>
								<h5>'.get_the_title().'</h5>
								<figcaption></figcaption>
								</figure>
							</a>
						</div>
					</div>';
		unset( $slugAr );
	endwhile; else: 
		$pfStr .= '<p>Sorry, photo gallery is empty.</p>';
	endif; 
	wp_reset_query();
	$pfStr .= '</div></div>';
	$pfStr .= '</div>';
	return $pfStr;
}
add_shortcode( 'photogallery', 'photogallery_shortcode_func' );

/*toggle function*/
function toggle_func( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'title' => 'Click here to toggle content',
	), $atts ) );
	$tog_content = "<div class=\"toggle_holder\"><h3 class=\"slide_toggle\"><a href=\"#\">{$title}</a></h3>
					<div class=\"slide_toggle_content\">".get_the_content_format( $content )."</div></div>";

	return $tog_content;
}
add_shortcode( 'toggle_content', 'toggle_func' );

function tabs_func( $atts, $content = null ) {
	$tabs = '<div class="tabs-wrapper"><ul class="tabs">'.do_shortcode($content).'</ul></div>';
	return $tabs;
}
add_shortcode( 'tabs', 'tabs_func' );

function tab_func( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'title' => 'Tab Title',
	), $atts ) );
	$rand = rand(100,999);
	$tab = '<li><a rel="tab'.$rand.'" href="javascript:void(0)">'.$title.'</a><div id="tab'.$rand.'" class="tab-content">'.get_the_content_format($content).'</div></li>';
	return $tab;
}
add_shortcode( 'tab', 'tab_func' );

// Button Shortcode
// [button name="" align="" link="" target="_self"]
function readmorebtn_fun($atts){
	extract(shortcode_atts(array(
	'name'	=> '',
	'align'	=> '',
	'link'	=> '#',
	'target'=> '',
	), $atts));
	return '<div class="custombtn" style="text-align:'.$align.'">	
	   <a class="morebutton" href="'.$link.'" target"'.$target.'">'.$name.'</a>	   	   
	</div>';
	}
add_shortcode('button','readmorebtn_fun');

// Button Shortcode
function readmorebtn_style2_fun($atts){
	extract(shortcode_atts(array(
	'name'	=> '',
	'align'	=> '',
	'link'	=> '#',
	'target'=> '',	
	), $atts));
	return '<div class="custombtn" style="text-align:'.$align.'">	
	   <a class="buttonstyle1" href="'.$link.'" target"'.$target.'">'.$name.'</a>	   	   
	</div>';
	}
add_shortcode('buttonstyle2','readmorebtn_style2_fun');

// space Shortcode
// [space height="20px"]
function space_fun($atts){
	extract(shortcode_atts(array(
	'height'	=> '',	
	), $atts));
	return '<div class="space" style="height:'.$height.'"></div>';
	}
add_shortcode('space','space_fun');

// space Shortcode
function subtitle_fun($atts){
	extract(shortcode_atts(array(
	'size'	=> '',
	'color'	=> '',
	'margin'	=> '',
	'description'	=> '',
	'align'	=> '',
	), $atts));
	return '<div class="subtitle" style="font-size:'.$size.'; color:'.$color.'; margin:'.$margin.'; text-align='.$align.'">'.$description.'</div>';
	}
add_shortcode('subtitle','subtitle_fun');



// Latest Post

function latestpostsoutput_func( $atts ){
   extract( shortcode_atts( array(
		'show' => '',
		'catid' => '',
	), $atts ) );
	$postoutput = '';
	wp_reset_query();
	$n = 0;
	query_posts(  array( 'posts_per_page'=>$show, 'cat'=>$catid,  'post__not_in' => get_option('sticky_posts') )  );
	if ( have_posts() ) :
		while ( have_posts() ) : the_post();
			$n++;
			if( $n%2==0 )  $rightside = 'rightside';	else $rightside = ' ';
			if ( has_post_thumbnail()) {
				$large_imgSrc = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
				$imgUrl = $large_imgSrc[0];
			}else{
				$imgUrl = get_template_directory_uri().'/images/img_404.png';
			}
			$postoutput .= '
			<div class="news-box '.$rightside.'">
				<div class="news-thumb ">
					<a href="'.get_the_permalink().'"><img src="'.$imgUrl.'" alt="" /></a>
				</div>
				<div class="news">
					<h5>'.get_the_title().'</h5>
					<p>'.wp_trim_words( get_the_content(), of_get_option('newscontentlength'), '...' ).'</p>
					<div class="view-all-btn"><a href="'.get_permalink().'">'.of_get_option('readmoretext').'</a></div>
				</div>
			</div>';	
			$postoutput .= ''.(($n%2==0) ? '<div class="clear"></div>' : '');	
		endwhile;
	endif;
	wp_reset_query();
	return $postoutput;
}
add_shortcode( 'latestposts', 'latestpostsoutput_func' );


/*Clients Logo function*/
function buildup_pro_client_logos($atts, $content = null){
	return '<ul id="flexiselDemo3">'.do_shortcode($content).'</ul>';
	}
add_shortcode('client_lists','buildup_pro_client_logos');

function buildup_pro_client($atts){
	extract(shortcode_atts(array(
	'image'	=> '',	
	'link'	=> '#'	
	), $atts));
	return '<li><a href="'.$link.'" target="_blank"><img src="'.$image.'" /></a></li>';
	}
add_shortcode('client','buildup_pro_client');

/*Recent Project  function*/
// recentproject recent_list
function recentproject_list($atts, $content = null){
	return '<div class="recentproject_list">'.do_shortcode($content).'</div>';
	}
add_shortcode('recentproject_list','recentproject_list');

// [recentproject_list] [recentproject] [/recentproject_list]
function recentproject($atts){
	extract(shortcode_atts(array(
	'image'	=> '',	
	'link'	=> '',
	'title'	=> '',	
	), $atts));
	return '
			<div class="item">
				<a href="'.$link.'" target="_blank"><div class="pro-thumb"><img src="'.$image.'" /></div></a>
				'.( ($title!='') ? '<h3>'.$title.'</h3>' : '' ).'
			</div>
		
		';
	}
add_shortcode('recentproject','recentproject');

// add shortcode for skills
function buildup_pro_skills($buildup_pro_skill_var){
	extract( shortcode_atts(array(
		'title' 	=> 'title',
		'percent'	=> 'percent',
		'bgcolor'	=> 'bgcolor',
	), $buildup_pro_skill_var));
	
	return '<div class="skillbar clearfix " data-percent="'.$percent.'%">
			<div class="skillbar-title"><span>'.$title.'</span></div>
			<div class="skill-bg"><div class="skillbar-bar" style="background:'.$bgcolor.'"></div></div>
			<div class="skill-bar-percent">'.$percent.'%</div>
			</div>';
}

add_shortcode('skill','buildup_pro_skills');


// Button Shortcode
function custom_counter_func($atts){
	extract(shortcode_atts(array(
	'iconname'	=> '',
	'value'	=> '',	
	'title'	=> ''	
	), $atts));
	return '
		<div class="counterlist">
			<div class="counter-cen">
			<i class="fa fa-'.$iconname.'"></i>	
			<div class="counter">'.$value.'</div>
			</div>
			<h6>'.$title.'</h6>	   	   
		</div>
		';
	}
add_shortcode('counter','custom_counter_func');

// Offer Sale Shortcode
function buildup_pro_offersale_func($atts){
	extract(shortcode_atts(array(
	'image'	=> '',	
	'subtitle'	=> '',	
	'title'	=> '',
	'description'	=> ''			
	), $atts));
	return '<div class="offer-1-column">
		<div class="offimgbx"><img src="'.$image.'" /></div>		    
	    <div class="offdesc">
			<h6>'.$subtitle.'</h6>	
			<h5>'.$title.'</h5>	
			<p>'.$description.'</p>
		</div>     	   
	</div>';
	}
add_shortcode('offer-sale','buildup_pro_offersale_func');

// Offer Sale Shortcode
function buildup_pro_offerservices_func($atts){
	extract(shortcode_atts(array(
	'image'	=> '',
	'oldprice'	=> '',		
	'newprice'	=> '',	
	'title'	=> '',
	'description'	=> ''			
	), $atts));
	return '<div class="offer-2-column">
		<div class="offerimgbox"><img src="'.$image.'" /></div>		    
	    <div class="offcontnt">
			<div class="pricedv"><span>'.$oldprice.'</span>'.$newprice.'</div>	
			<h4>'.$title.'</h5>	
			<p>'.$description.'</p>
		</div>     	   
	</div>';
	}
add_shortcode('offer-services','buildup_pro_offerservices_func');

// [servicesbox image="image" title="title" description="description"]
function servicesboxarea($atts){
		extract( shortcode_atts(array(
			'image' => '',
			'title' => '',
			'description' => '',
			'bgcolor' => '',
			'color' => '',
		), $atts));
		return '
			 <div class="servicesbox" '.( ($bgcolor!='') ? 'style="background:'.$bgcolor.'"' : '').' >
				'.( ($image!='') ? '<div class="services-thumb"><img src="'.$image.'"/></div>' : '').'
				'.( ($title!='') ? '<div class="services-title"><h4 style="color:'.$color.'">'.$title.'</h4></div>' : '').'
				'.( ($description!='') ? '<div class="services-description" style="color:'.$color.'">'.$description.'</div>' : '').'
			 </div>
		';
}
add_shortcode('servicesbox','servicesboxarea');

// [whychooseus icon="" title="" description="" link=""]
function whychooseus($atts){
		extract( shortcode_atts(array(
			'icon' => '',
			'title' => '',
			'description' => '',
			'link' => '',
		), $atts));
		return '
			<div class="whychooseusbox">
				<a href="'.$link.'">
					<div class="whychooseusborder">
					<div class="whychooseus-thumb"><i class="fa fa-'.$icon.'"></i></div>
						<div class="whychooseustitledes">
						<div class="whychooseus-title"><h6>'.$title.'</h6></div>
						<div class="whychooseus-description">'.$description.'</div>	
						</div>
					</div>
				</a>
			</div>
		';
}
add_shortcode('whychooseus','whychooseus');

define('GRACE_THEME_DOC','https://www.gracethemes.com/documentation/buildup-doc/');