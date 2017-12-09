<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package BuildUp Pro
 */
?>
<div id="sidebar" <?php if( is_page_template('blog-post-left-sidebar.php')){?> style="float:left;"<?php } ?>>
    
    <?php if ( ! dynamic_sidebar( 'sidebar-main' ) ) : ?>
       <h3 class="widget-title"><?php _e( 'Category', 'buildup-pro' ); ?></h3>
       <aside id="categories" class="widget">
            <ul>
                <?php wp_list_categories('title_li=');  ?>
            </ul>
        </aside>
        
       <h3 class="widget-title"><?php _e( 'Archives', 'buildup-pro' ); ?></h3>
        <aside id="archives" class="widget">
            <ul>
                <?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
            </ul>
        </aside>    
    <?php endif; // end sidebar widget area ?>
	
</div><!-- sidebar -->