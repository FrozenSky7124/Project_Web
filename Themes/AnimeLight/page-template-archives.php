<?php
/**
* Template Name: Archives
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
<?php if ( function_exists("has_post_thumbnail") && has_post_thumbnail() ) { the_post_thumbnail(array(660,225), array("class" => "alignleft post_thumbnail")); } ?>
					<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
	
					<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
	
				</div>
			</div>
			<?php endwhile; endif; ?>
		
            
            <div class="sitemap">
            
                <div>
                    <h2><?php _e('The Last 20 Posts', 'themater'); ?></h2>
                    
                    <ul class="sitemap-list">
                        <?php wp_get_archives('type=postbypost&limit=20&show_post_count=1'); ?>
                    </ul>
                    
                </div>
                
                <div class="clearfix">
                    
                    <div class="alignleft sitemap-col-archives">
                        <h2><?php _e('Categories', 'themater'); ?></h2>
                        <ul class="sitemap-list">
                            <?php wp_list_categories('title_li=&show_count=1'); ?>
                        </ul>
                    </div>
                    
                    <div class="alignleft sitemap-col-archives">
                        <h2><?php _e('Monthly Archives', 'themater'); ?></h2>
                        <ul class="sitemap-list">
                            <?php wp_get_archives('type=monthly&show_post_count=1'); ?>
                        </ul>
                    </div>
                </div>
                
            </div>

<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>

		</div>
	</div>
	

<?php get_sidebars(); ?>

</div>
<?php get_footer(); ?>