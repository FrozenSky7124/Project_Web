<?php 
// Notice: If you want to add something in post area, please add into <div class="post_content">

get_header(); $options = get_option('flat_options'); 

?>

   <?php if ($options['bread_crumb']) : ?>
   <div id="bread_crumb">
    <ul class="clearfix">
     <li id="bc_home"><a href="<?php echo bloginfo('wpurl'); ?>/" title="<?php _e('HOME','flat'); ?>"><?php _e('HOME','flat'); ?></a></li>
     <li id="bc_cat"><?php the_category(' . '); ?></li>
     <li class="last"><?php the_title(); ?></li>
    </ul>
   </div>
   <?php endif; ?>

   <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

   <div class="post_wrap clearfix" id="single">
    <div class="post">
     <h3 class="title"><?php the_title(); ?></h3>
     <div class="post_content">
      <?php the_content(__('Read more', 'flat')); ?>
      <?php wp_link_pages(); ?>
     </div><!-- END .post_content -->
    </div>
    <div class="meta">
     <ul>
      <li class="post_date"><?php the_time(__('m/d. Y', 'flat')) ?></li>
      <?php if ($options['author']) : ?><li class="post_author"><?php the_author_posts_link(); ?></li><?php endif; ?>
      <li><?php the_category('</li><li>'); ?></li>
      <?php the_tags('<li>','</li><li>','</li>'); ?>
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
      <a class="back" href="<?php bloginfo('url'); ?>/"><?php _e("RETURN HOME","flat"); ?></a>
     </div>
    </div>
    <div class="meta">
    </div>
   </div>

   <?php endif; ?>

   <div id="comments_wrapper">
    <?php if (function_exists('wp_list_comments')) { comments_template('', true); } else { comments_template(); } ?>
   </div>

   <div id="previous_next_post">
    <div class="clearfix">
     <p id="previous_post"><?php previous_post_link('%link') ?></p>
     <p id="next_post"><?php next_post_link('%link') ?></p>
    </div>
   </div>

<?php get_footer(); ?>