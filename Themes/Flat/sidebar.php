<?php $options = get_option('flat_options'); ?>

<?php if ($options['show_information']) : ?>
<div id="info_area<?php if(!$options['header_search'] && !$options['header_rss'] && !$options['header_twitter'] && !$options['header_facebook']) { echo '2'; }; ?>">
 <div class="side_box clearfix" id="info_content">
  <h3 class="side_title"><?php echo ($options['information_title']); ?></h3>
  <div class="desc">
   <?php echo ($options['information_contents']); ?>
  </div>
 </div>
</div>
<?php endif; ?>

<?php if($options['header_search'] || $options['header_rss'] || $options['header_twitter'] || $options['header_facebook']) { ?>
<div class="side_box clearfix" id="side_meta_content">

 <?php if($options['header_rss'] || $options['header_twitter'] || $options['header_facebook']) { ?>
 <ul id="social_link" class="clearfix">
  <?php if ($options['header_rss']) : ?>
  <li class="rss_button"><a class="target_blank" href="<?php bloginfo('rss2_url'); ?>">rss</a></li>
  <?php endif; ?>
  <?php if ($options['header_twitter']) : ?>
  <li class="twitter_button"><a class="target_blank" href="<?php echo $options['twitter_url']; ?>">twitter</a></li>
  <?php endif; ?>
  <?php if ($options['header_facebook']) : ?>
  <li class="facebook_button"><a class="target_blank" href="<?php echo $options['facebook_url']; ?>">facebook</a></li>
  <?php endif; ?>
 </ul>
 <?php }; ?>

 <?php if ($options['header_search']) : ?>
 <div id="search_area">
  <?php if ($options['use_google_search']) { ?>
  <form action="http://www.google.com/cse" method="get" id="searchform">
   <div>
    <input id="search_button" class="rollover" type="image" src="<?php bloginfo('template_url'); ?>/img/search_button<?php if($options['header_rss'] || $options['header_twitter'] || $options['header_facebook']) { echo '1'; } else { echo '2'; }; ?>.gif" name="sa" alt="<?php _e('SEARCH','flat'); ?>" title="<?php _e('SEARCH','flat'); ?>" />
    <input type="hidden" name="cx" value="<?php echo $options['custom_search_id']; ?>" />
    <input type="hidden" name="ie" value="UTF-8" />
   </div>
   <div><input id="search_input" type="text" value="<?php _e('SEARCH','flat'); ?>" name="q" onfocus="if (this.value == '<?php _e('SEARCH','flat'); ?>') this.value = '';" onblur="if (this.value == '') this.value = '<?php _e('SEARCH','flat'); ?>';" /></div>
  </form>
  <?php } else { ?>
  <form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
   <div><input id="search_button" class="rollover" type="image" src="<?php bloginfo('template_url'); ?>/img/search_button<?php if($options['header_rss'] || $options['header_twitter'] || $options['header_facebook']) { echo '1'; } else { echo '2'; }; ?>.gif" alt="<?php _e('SEARCH','flat'); ?>" title="<?php _e('SEARCH','flat'); ?>" /></div>
   <div><input id="search_input" type="text" value="<?php _e('SEARCH','flat'); ?>" name="s" onfocus="if (this.value == '<?php _e('SEARCH','flat'); ?>') this.value = '';" onblur="if (this.value == '') this.value = '<?php _e('SEARCH','flat'); ?>';" /></div>
  </form>
  <?php }; ?>
 </div>
 <?php endif; ?>

</div>
<?php }; ?>

<?php if(is_active_sidebar('top')||is_active_sidebar('bottom')||is_active_sidebar('left')||is_active_sidebar('right')){ ?>

<div id="side_top">

 <?php dynamic_sidebar('top'); ?>
</div>
<div id="side_middle" class="clearfix">
 <div id="side_left">
  <?php dynamic_sidebar('left'); ?>
 </div>
 <div id="side_right">
  <?php dynamic_sidebar('right'); ?>
 </div>
</div>
<div id="side_bottom">
 <?php dynamic_sidebar('bottom'); ?>
</div>

<?php } else { ?>

<div id="side_top">
 <div class="side_box">
  <h3 class="side_title"><?php _e('RECENT ENTRY','flat'); ?></h3>
  <ul>
   <?php $myposts = get_posts('numberposts=5'); foreach($myposts as $post) : ?>
   <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
   <?php endforeach; ?>
  </ul>
 </div>
</div>
<div id="side_middle" class="clearfix">
 <div id="side_left">
  <div class="side_box_short">
   <h3 class="side_title"><?php _e('CATEGORY','flat'); ?></h3>
   <ul>
    <?php wp_list_categories('title_li=&orderby=name'); ?>
   </ul>
  </div>
 </div>
 <div id="side_right">
  <div class="side_box_short">
   <h3 class="side_title"><?php _e('ARCHIVES','flat'); ?></h3>
   <ul>
    <?php wp_get_archives('type=monthly'); ?>
   </ul>
  </div>
 </div>
</div><!-- END #side_middle -->
<div id="side_bottom">
 <div class="side_box">
  <h3 class="side_title"><?php _e('LINKS','flat'); ?></h3>
  <ul>
   <?php wp_list_bookmarks('title_li=&categorize=0'); ?>
  </ul>
 </div>
</div>

<?php }; ?>