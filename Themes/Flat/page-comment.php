<?php
/*
Template Name:Page with comment
*/
?>
<?php get_header(); $options = get_option('flat_options'); ?>

   <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

   <div class="post_wrap clearfix" id="single">
    <div class="post">
     <h3 class="title"><?php the_title(); ?></h3>
     <div class="post_content">
      <?php the_content(__('Read more', 'flat')); ?>
      <?php wp_link_pages(); ?>
     </div>
    </div>
    <div class="meta">
     <ul>
      <li class="post_date"><?php the_time(__('m/d. Y', 'flat')) ?></li>
      <li class="post_comment"><?php comments_popup_link(__('Write comment', 'flat'), __('1 comment', 'flat'), __('% comments', 'flat')); ?></li>
      <?php /* edit_post_link(__('EDIT', 'flat'), '<li class="post_edit">', '</li>' ); */ ?>
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

   <div id="comments_wrapper">
    <?php if (function_exists('wp_list_comments')) { comments_template('', true); } else { comments_template(); } ?>
   </div>

<?php get_footer(); ?>