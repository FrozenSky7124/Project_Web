<?php get_header(); ?>
		<div class="span-24" id="contentwrap">
			<div class="span-16">
				<div id="content">	
                <?php if(is_home()) { include (TEMPLATEPATH . '/featured.php'); } ?>		
					<?php if (have_posts()) : ?>	
						<?php while (have_posts()) : the_post(); ?>
						
						<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
						
                            			<div class="entry-head">
							<h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
							<div class="postdate">
							[<?php the_time('Y-m-d') ?>]&nbsp;&nbsp;
							[<?php the_category(', ') ?>]
							<?php if (current_user_can('edit_post', $post->ID)) { ?> <img src="<?php bloginfo('template_url'); ?>/images/edit.png" /> <?php edit_post_link('Edit', '', ''); } ?>
							</div>
			
						</div>
			
							<div class="entry">
<?php if ( function_exists("has_post_thumbnail") && has_post_thumbnail() ) { the_post_thumbnail(array(660,225), array("class" => "alignleft post_thumbnail")); } ?>
								<?php the_content('<strong> &raquo;&raquo;&raquo; </strong>'); ?>
							</div>

<div class="postmeta"><img src="<?php bloginfo('template_url'); ?>/images/comments.png" /><?php comments_popup_link('木有评论...&nbsp;&nbsp; | &nbsp;&nbsp;', '评论：1条 &nbsp;&nbsp; | &nbsp;&nbsp;', '评论：%条 &nbsp;&nbsp; | &nbsp;&nbsp;'); ?><?php if(get_the_tags()) { ?> <img src="<?php bloginfo('template_url'); ?>/images/tag.png" /> <?php  the_tags('标签： ', ', '); } ?> <div style="float:right"><?php  if(function_exists('the_views')) { the_views(); } ?></div> </div>

						</div><!--/post-<?php the_ID(); ?>-->
				
				<?php endwhile; ?>
				<div class="navigation">
					<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } else { ?>
					<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
					<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
					<?php } ?>
				</div>
				<?php else : ?>
					<h2 class="center">Not Found</h2>
					<p class="center">Sorry, but you are looking for something that isn't here.</p>
					<?php get_search_form(); ?>
			
				<?php endif; ?>
				</div>
			</div>
		
		<?php get_sidebars(); ?>
	</div>
<?php get_footer(); ?>