<?php get_header(); $options = get_option('flat_options'); ?>

   <?php if ( have_posts() ) : ?>

   <div id="archive_headline">
    <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
    <?php if (is_category()) { ?>
    <h2><?php printf(__('Archive for the &#8216;<span id="keyword"> %s </span>&#8217; Category', 'flat'), single_cat_title('', false)); ?></h2>

    <?php } elseif( is_tag() ) { ?>
    <h2><?php printf(__('Posts Tagged &#8216;<span id="keyword"> %s </span>&#8217;', 'flat'), single_tag_title('', false) ); ?></h2>

    <?php } elseif (is_day()) { ?>
    <h2><?php printf(__('Archive for &#8216;<span id="keyword"> %s </span>&#8217;', 'flat'), get_the_time(__('F jS, Y', 'flat'))); ?></h2>

    <?php } elseif (is_month()) { ?>
    <h2><?php printf(__('Archive for &#8216;<span id="keyword"> %s </span>&#8217;', 'flat'), get_the_time(__('F, Y', 'flat'))); ?></h2>

    <?php } elseif (is_year()) { ?>
    <h2><?php printf(__('Archive for &#8216;<span id="keyword"> %s </span>&#8217;', 'flat'), get_the_time(__('Y', 'flat'))); ?></h2>

    <?php } elseif (is_author()) { ?>
    <h2><?php _e('Author Archive', 'flat'); ?></h2>

    <?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
    <h2><?php _e('Blog Archives', 'flat'); ?></h2>
    <?php } ?>
   </div><!-- END #archive_headline -->

   <?php while ( have_posts() ) : the_post(); ?>

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
      <?php /* edit_post_link(__('EDIT', 'flat'), '<li class="post_edit">', '</li>' ); */ ?>
	  <li> <?php if(function_exists('the_views')) { the_views(); } ?> </li>
     </ul>
    </div>
   </div>

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