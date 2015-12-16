<?php get_header(); $options = get_option('flat_options'); ?>

   <div class="post_wrap clearfix" id="no_post">
    <div class="post">
     <h3 class="title"><?php _e("Error 404 Not Found.","flat"); ?></h3>
     <div class="post_content">
      <a class="back" href="<?php bloginfo('wpurl'); ?>/"><?php _e("RETURN HOME","flat"); ?></a>
     </div>
    </div>
    <div class="meta">
    </div>
   </div><!-- END .post_wrap -->

<?php get_footer(); ?>