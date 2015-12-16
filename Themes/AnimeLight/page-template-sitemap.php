<?php
/**
* Template Name: Sitemap
*/

get_header();
?>
<div class="span-24" id="contentwrap">
	<div class="span-16">
		<div id="content">	

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="post" id="post-<?php the_ID(); ?>">
			<h2 class="title"><?php the_title(); ?></h2>
				<div class="entry">
<?php if ( function_exists("has_post_thumbnail") && has_post_thumbnail() ) { the_post_thumbnail(array(300,225), array("class" => "alignleft post_thumbnail")); } ?>
					<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
	
					<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
	
				</div>
			</div>
			<?php endwhile; endif; ?>
		
            <div class="sitemap">
            
                <div class="clearfix">
                    <div class="alignleft sitemap-col">
                        <h2><?php _e('Pages', 'themater'); ?></h2>
                        <ul class="sitemap-list">
                            <?php wp_list_pages('title_li='); ?>
                        </ul>
                    </div>
                    
                    <div class="alignleft sitemap-col">
                        <h2><?php _e('Categories', 'themater'); ?></h2>
                        <ul class="sitemap-list">
                            <?php wp_list_categories('title_li='); ?>
                        </ul>
                    </div>
                    
                    <div class="alignleft sitemap-col">
                        <h2><?php _e('Archives', 'themater'); ?></h2>
                        <ul class="sitemap-list">
                            <?php wp_get_archives('type=monthly&show_post_count=0'); ?>
                        </ul>
                    </div>
                </div>
                
                <div>
                    <h2><?php _e('Posts per category', 'themater'); ?></h2>
                    
                    <?php
			    
			            $cats = get_categories();
			            foreach ( $cats as $cat ) {
			    
			            query_posts( 'cat=' . $cat->cat_ID );
			
			        ?>
	        
	        			<h3><?php echo $cat->cat_name; ?></h3>
			        	<ul class="sitemap-list">	
	    	        	    <?php while ( have_posts() ) { the_post(); ?>
	        	    	    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
	            		    <?php } wp_reset_query(); ?>
			        	</ul>
	    
	    		    <?php } ?>
                    
                </div>
                
            </div>

<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>

		</div>
	</div>
	

<?php get_sidebars(); ?>

</div>
<?php get_footer(); ?>