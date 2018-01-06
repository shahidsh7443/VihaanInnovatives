<?php if ( is_home() || is_front_page() ) { ?>


<?php $hidewelcome = of_get_option('hidewelcomesection', '1'); ?>
		<?php if($hidewelcome == ''){ ?>
<section id="welcomearea" <?php if( of_get_option('hidefourbxsec', true) != '' ) { ?>style="padding-bottom:50px"<?php } ?>>
    <div class="container">  
        <div class="welcomebx">
            <?php if( of_get_option('welcomebox',false) ) { ?>
        	<?php $queryvar = new wp_query('page_id='.of_get_option('welcomebox',true));				
			while( $queryvar->have_posts() ) : $queryvar->the_post(); ?>         	    
                <div class="one_half">
                    <?php if( of_get_option('welcomeboximage', true) != '') { ?>	
                        <div class="whothumbbx"><img alt="" src="<?php echo esc_url( of_get_option( 'welcomeboximage', true )); ?>" / ></div>
                    <?php } ?>
                </div>
                <div class="one_half last_column">
                    <h2 class="section_title"><?php the_title(); ?></h2>
                    <h5><?php echo of_get_option('whosubtitle'); ?></h5> 
                    <?php echo content( of_get_option('welcomepagelength') ); ?>    
                    <div class="custombtn"><a class="morebutton" href="<?php the_permalink(); ?>"><?php echo of_get_option('whowearereadmore'); ?></a></div>     
					<?php // the_content();?>
                </div>
                <div class="clear"></div>               
             <?php endwhile; wp_reset_postdata(); ?>
        <?php } else { ?> 
        
<div class="one_half"> <div class="whothumbbx"><img src="<?php echo get_template_directory_uri(); ?>/images/whoweare.jpg" /></div></div>   
<div class="one_half last_column">
<h2 class="section_title"><?php _e('Who We <span>Are</span> ','buildup-pro'); ?></h2>           
<h5><?php _e('LEADERS IN CONSTRUCTION INDUSTRY!'); ?></h5>
<p><?php _e('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Why do we use it?','buildup-pro'); ?></p>   
<div class="custombtn"><a class="morebutton" href="#" target""="">OUR HISTORY</a></div>             

</div>   
<div class="clear"></div>

		<?php } ?>
        </div>  
    </div><!-- .container -->
</section><!-- #welcomearea -->
<?php } ?> 



<?php $hidefourbxsec = of_get_option('hidefourbxsec', '1'); ?>
<?php if($hidefourbxsec == ''){ ?>                    
<section id="pagearea">
  <div class="container"> 
		<?php
			$title_arr = array( esc_attr__('CONCRETE TRANSPORT','buildup-pro'), esc_attr__('INTERIOR DESIGN','buildup-pro'),  esc_attr__('ENGINEERING TEAM','buildup-pro'), esc_attr__('SMART TECHNOLOGY','buildup-pro'));
			$boxArr = array();
			   if( of_get_option('box1',true) != '' ){
				$boxArr[] = of_get_option('box1',false);
			   }
			   if( of_get_option('box2',true) != '' ){
				$boxArr[] = of_get_option('box2',false);
			   }
			   if( of_get_option('box3',true) != '' ){
				$boxArr[] = of_get_option('box3',false);
			   }
			   if( of_get_option('box4',true) != '' ){
				$boxArr[] = of_get_option('box4',false);
			   }
			   if( of_get_option('box5',true) != '' ){
				$boxArr[] = of_get_option('box5',false);
			   }
			    if( of_get_option('box6',true) != '' ){
				$boxArr[] = of_get_option('box6',false);
			   }			   			  
			
			
			if (!array_filter($boxArr)) {
			for($fx=1; $fx<=4; $fx++) {
			?>
            <div class="fourbox <?php if($fx % 4 == 0) { echo "last_column"; } ?>">
             
            <div class="thumbbx"><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/services-icon<?php echo $fx; ?>.jpg" alt="" /></a></div>
             <div class="pagecontent">
             <a href="#"><h6><?php echo $title_arr[$fx-1]; ?></h3></a>             
             <p><?php _e('Lorem Ipsum proin gravida nibh velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum', 'buildup-pro') ?></p> 
             <?php if( of_get_option('readmorebutton',true) != '') { ?>
               <a class="pagemore" href="<?php the_permalink(); ?>"><?php echo of_get_option('readmorebutton'); ?></a>      
			 <?php } ?>
             </div>
         	</div>
			<?php 
			} 
			} else {			
				$box_column = array('no_column','one_column','two_column','three_column','four_column','five_column','six_column');
				$fx = 1;				
				$queryvar = new wp_query(array('post_type' => 'page', 'post__in' => $boxArr, 'posts_per_page' => 6, 'orderby' => 'post__in' ));				
				while( $queryvar->have_posts() ) : $queryvar->the_post(); ?> 
        	    <div class="fourbox <?php echo $box_column[count($boxArr)]; ?> <?php if($fx % count($boxArr) == 0) { echo "last_column"; } ?>">
				<?php if( of_get_option('boximg'.$fx, true) != '') { ?>	
                <div class="thumbbx"> <a href="<?php the_permalink(); ?>"><img alt="" src="<?php echo esc_url( of_get_option( 'boximg'.$fx, true )); ?>" / ></a></div>
                <?php } ?>
                <div class="pagecontent">
                 <a href="<?php the_permalink(); ?>"><h6><?php the_title(); ?></h6></a>
                  <?php echo content( of_get_option('pageboxlength') ); ?>                                    
				  <?php if( of_get_option('readmorebutton',true) != '') { ?>
                   <a class="pagemore" href="<?php the_permalink(); ?>"><?php echo of_get_option('readmorebutton'); ?></a>      
				  <?php } ?>
                </div>
        	   </div>
             <?php 
			 $fx++; 
			 endwhile;
			 wp_reset_postdata();
			 }		
		 ?>  
        <div class="clear"></div>
    </div><!-- .container -->
</section><!-- #pagearea -->
<?php } ?>

<?php } ?>