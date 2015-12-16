<?php get_header(); $options = get_option('flat_options'); ?>

   <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

   <div class="post_wrap clearfix">
    <div class="post">
     <h3 class="title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
     <div class="post_content">
      <?php the_content(__('Read more', 'flat')); ?>
      <?php wp_link_pages(); ?>
     </div>
     <div class="post_meta clearfix">
      <ul class="post-category clearfix">
      <li><?php the_category('</li><li>'); ?></li>
      </ul>
      <?php the_tags('<ul class="post-tag clearfix"><li>','</li><li>','</li></ul>'); ?>
     </div>
    </div>
    <div class="meta">
     <ul>
      <li class="post_date"><?php the_time(__('m/d. Y', 'flat')) ?></li>
      <?php if ($options['author']) : ?><li class="post_author"><?php the_author_posts_link(); ?></li><?php endif; ?>
      <li class="post_comment"><?php comments_popup_link(__('Write comment', 'flat'), __('1 comment', 'flat'), __('% comments', 'flat')); ?></li>
      <?php /*edit_post_link(__('EDIT', 'flat'), '<li class="post_edit">', '</li>' ); */ ?>
	  <li> <?php if(function_exists('the_views')) { the_views(); } ?> </li>
     </ul>
    </div>
   </div><!-- END .post_wrap -->

   <?php endwhile; else: ?>

   <div class="post_wrap clearfix" id="no_post">
    <div class="post">
     <h3 class="title"><?php _e("Sorry, but you are looking for something that isn't here.","flat"); ?></h3>
     <div class="post_content">
      <a class="back" href="<?php bloginfo('wpurl'); ?>/"><?php _e("RETURN HOME","flat"); ?></a>
     </div>
    </div>
    <div class="meta">
    </div>
   </div>

   <?php endif; ?>

   <div id="page_navi">
    <?php include('navigation.php'); ?>
   </div>

<?php get_footer(); ?>