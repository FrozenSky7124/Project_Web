  </div><!-- END #left_col -->

  <div id="container"></div>

  <?php if(!is_page_template('page-noside.php')) { ?>
  <div id="right_col">
   <?php get_sidebar(); ?>
  </div>
  <?php }; ?>

  <div id="footer">
   <ul id="copyright">
    <li><?php _e('Copyright &copy;&nbsp; ', 'flat'); ?><a href="<?php bloginfo('wpurl'); ?>/"><?php bloginfo('name'); ?></a></li>
    <li><?php _e('Theme designed by <a class="target_blank" href="http://www.mono-lab.net/">mono-lab</a>','flat'); ?></li>
    <li class="last"><?php _e('Powered by <a class="target_blank" href="http://wordpress.org/">WordPress</a>','flat'); ?></li>
   </ul>
  </div>

 </div><!-- END #main_content -->

 <?php $options = get_option('flat_options'); ?>
 <?php if ($options['pagetop']) : ?>
 <p id="return_top"><a href="#header">return top</a></p>
 <?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>