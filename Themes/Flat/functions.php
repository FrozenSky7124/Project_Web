<?php
$flatDefaultOptions = array(
  'use_logo' => false,
  'logo_name' => 'logo.gif',
  'header_search' => true,
  'use_google_search' => false,
  'custom_search_id' => '',
  'header_rss' => true,
  'header_twitter' => true,
  'twitter_url' => '#',
  'header_facebook' => true,
  'facebook_url' => '#',
  'show_information' => true,
  'information_title' => 'INFORMATION',
  'information_contents' => 'Change this sentence and title from admin Theme option page.',
  'author' => false,
  'bread_crumb' => false,
  'pagetop' => true,
  'time_stamp' => false,
);

$optionsSaved = false;
function flat_create_options() {
  // Default values
  $options = $GLOBALS['flatDefaultOptions'];

  // Overridden values
  $DBOptions = get_option('flat_options');
  if ( !is_array($DBOptions) ) $DBOptions = array();

  // Merge
  // Values that are not used anymore will be deleted
  foreach ( $options as $key => $value )
    if ( isset($DBOptions[$key]) )
      $options[$key] = $DBOptions[$key];
      update_option('flat_options', $options);
      return $options;
}

function flat_get_options() {
  static $return = false;
  if($return !== false)
    return $return;

    $options = get_option('flat_options');
      if(!empty($options) && count($options) == count($GLOBALS['flatDefaultOptions']))
      $return = $options;
      else $return = $GLOBALS['flatDefaultOptions'];
      return $return;
}

function flat_add_theme_options() {
  global $optionsSaved;
    if(isset($_POST['flat_save_options'])) {

      $options = flat_create_options();

      // logo
      if (isset($_POST['use_logo']) && $_POST['use_logo'] != '') {
      $options['use_logo'] = (bool)true;
      } else {
      $options['use_logo'] = (bool)false;
      }
      $options['logo_name'] = stripslashes($_POST['logo_name']);

      // show header search
      if ($_POST['header_search']) {
      $options['header_search'] = (bool)true;
      } else {
      $options['header_search'] = (bool)false;
      }

      if (isset($_POST['use_google_search']) && $_POST['use_google_search'] != '') {
      $options['use_google_search'] = (bool)true;
      } else {
      $options['use_google_search'] = (bool)false;
      }
      $options['custom_search_id'] = stripslashes($_POST['custom_search_id']);

      // show header rss
      if (isset($_POST['header_rss']) && $_POST['header_rss'] != '') {
      $options['header_rss'] = (bool)true;
      } else {
      $options['header_rss'] = (bool)false;
      }

      // show header twitter
      if (isset($_POST['header_twitter']) && $_POST['header_twitter'] != '') {
      $options['header_twitter'] = (bool)true;
      } else {
      $options['header_twitter'] = (bool)false;
      }

      $options['twitter_url'] = stripslashes($_POST['twitter_url']);

      // show header facebook
      if (isset($_POST['header_facebook']) && $_POST['header_facebook'] != '') {
      $options['header_facebook'] = (bool)true;
      } else {
      $options['header_facebook'] = (bool)false;
      }

      $options['facebook_url'] = stripslashes($_POST['facebook_url']);

      // information
      if (isset($_POST['show_information']) && $_POST['show_information'] != '') {
      $options['show_information'] = (bool)true;
      } else {
      $options['show_information'] = (bool)false;
      }

      $options['information_title'] = stripslashes($_POST['information_title']);
      $options['information_contents'] = stripslashes($_POST['information_contents']);

      // show author
      if (isset($_POST['author']) && $_POST['author'] != '') {
      $options['author'] = (bool)true;
      } else {
      $options['author'] = (bool)false;
      }

      // show bread crymb
      if (isset($_POST['bread_crumb']) && $_POST['bread_crumb'] != '') {
      $options['bread_crumb'] = (bool)true;
      } else {
      $options['bread_crumb'] = (bool)false;
      }

      // show pagetop link
      if (isset($_POST['pagetop']) && $_POST['pagetop'] != '') {
      $options['pagetop'] = (bool)true;
      } else {
      $options['pagetop'] = (bool)false;
      }

      // show time stamp
      if (isset($_POST['time_stamp']) && $_POST['time_stamp'] != '') {
      $options['time_stamp'] = (bool)true;
      } else {
      $options['time_stamp'] = (bool)false;
      }

      update_option('flat_options', $options);
      $optionsSaved = true;
    }

    add_theme_page(__('FLAT Theme Options', 'flat'), __('FLAT Theme Options', 'flat'), 'edit_themes', basename(__FILE__), 'flat_add_theme_page');
}

function flat_add_theme_page () {
  global $optionsSaved;

  $options = flat_get_options();
  if ( $optionsSaved )
   echo '<div id="message" class="updated fade"><p><strong>'.__('Theme options have been saved.', 'flat').'</strong></p></div>';
?>

<div class="wrap">

<h2><?php _e('FLAT Theme Options', 'flat'); ?></h2>

<form method="post" action="#" enctype="multipart/form-data">

<p><input class="button-primary" type="submit" name="flat_save_options" value="<?php _e('Save Changes', 'flat'); ?>" /></p>

<div class="flat_box">
 <p><?php _e('Check if you would like to use original image for logo instead of using plain text.<br />( Don\'t forget to upload image to, /wp-content/themes/flat/img/ )', 'flat'); ?></p>
 <p><input name="use_logo" type="checkbox" value="checkbox" <?php if($options['use_logo']) echo "checked='checked'"; ?> /> <?php _e('Yes', 'flat'); ?></p>
 <p><?php _e('Input your logo file name.', 'flat'); ?></p>
 <p><input type="text" name="logo_name" value="<?php echo($options['logo_name']); ?>" /></p>
</div>

<div class="flat_box">
 <p><?php _e('Show Information on sidebar.', 'flat'); ?></p>
 <p><input name="show_information" type="checkbox" value="checkbox" <?php if($options['show_information']) echo "checked='checked'"; ?> /><?php _e('Yes', 'flat'); ?></p>
 <br />
 <p><?php _e('Information title.', 'flat'); ?></p>
 <p><input type="text" name="information_title" value="<?php echo($options['information_title']); ?>" /></p>
 <br />
 <p><?php _e('Information contents. ( HTML tag is available. )', 'flat'); ?></p>
 <p><textarea name="information_contents" cols="70%" rows="5"><?php echo($options['information_contents']); ?></textarea></p>
</div>

<div class="flat_box">
 <p><?php _e('Show Search form on sidebar.', 'flat'); ?></p>
 <p><input name="header_search" type="checkbox" value="checkbox" <?php if($options['header_search']) echo "checked='checked'"; ?> /> <?php _e('Yes', 'flat'); ?></p>
 <br />
 <p><?php _e('Use <a href="http://www.google.com/cse/">Google Custom Search</a><br />(If you check this option,don\'t forget to write your Google Custom Search ID below.)', 'flat'); ?></p>
 <p><input name="use_google_search" type="checkbox" value="checkbox" <?php if($options['use_google_search']) echo "checked='checked'"; ?> /> <?php _e('Yes', 'flat'); ?></p>
 <p><?php _e('Input your Google Custom Search ID.', 'flat'); ?></p>
 <p><input type="text" name="custom_search_id" value="<?php echo($options['custom_search_id']); ?>" style="width:400px;" /></p>
</div>

<div class="flat_box">
 <p><?php _e('Show RSS button on sidebar.', 'flat'); ?></p>
 <p><input name="header_rss" type="checkbox" value="checkbox" <?php if($options['header_rss']) echo "checked='checked'"; ?> /> <?php _e('Yes', 'flat'); ?></p>
</div>

<div class="flat_box">
 <p><?php _e('Show Twitter button on sidebar.', 'flat'); ?></p>
 <p><input name="header_twitter" type="checkbox" value="checkbox" <?php if($options['header_twitter']) echo "checked='checked'"; ?> /> <?php _e('Yes', 'flat'); ?></p>
 <p><?php _e('Input your Twitter URL.', 'flat'); ?></p>
 <p><input type="text" name="twitter_url" value="<?php echo($options['twitter_url']); ?>" style="width:400px;" /></p>
</div>

<div class="flat_box">
 <p><?php _e('Show Facebook button on sidebar.', 'flat'); ?></p>
 <p><input name="header_facebook" type="checkbox" value="checkbox" <?php if($options['header_facebook']) echo "checked='checked'"; ?> /> <?php _e('Yes', 'flat'); ?></p>
 <p><?php _e('Input your Facebook URL.', 'flat'); ?></p>
 <p><input type="text" name="facebook_url" value="<?php echo($options['facebook_url']); ?>" style="width:400px;" /></p>
</div>

<div class="flat_box">
 <p><?php _e('Show author name.', 'flat'); ?></p>
 <p><input name="author" type="checkbox" value="checkbox" <?php if($options['author']) echo "checked='checked'"; ?> /><?php _e('Yes', 'flat'); ?></p>
 <br />
 <p><?php _e('Show bread crumb at single post page.', 'flat'); ?></p>
 <p><input name="bread_crumb" type="checkbox" value="checkbox" <?php if($options['bread_crumb']) echo "checked='checked'"; ?> /><?php _e('Yes', 'flat'); ?></p>
 <br />
 <p><?php _e('Show time on comment.', 'flat'); ?></p>
 <p><input name="time_stamp" type="checkbox" value="checkbox" <?php if($options['time_stamp']) echo "checked='checked'"; ?> /><?php _e('Yes', 'flat'); ?></p>
</div>

<div class="flat_box">
 <p><?php _e('Check if you want to show Return top button on right bottom of the site.', 'flat'); ?></p>
 <p><input name="pagetop" type="checkbox" value="checkbox" <?php if($options['pagetop']) echo "checked='checked'"; ?> /><?php _e('Yes', 'flat'); ?></p>
</div>

<p><input class="button-primary" type="submit" name="flat_save_options" value="<?php _e('Save Changes', 'flat'); ?>" /></p>

</form>

</div>

<?php }

// register function
add_action('admin_menu', 'flat_create_options');
add_action('admin_menu', 'flat_add_theme_options');

// for localization
load_textdomain('flat', dirname(__FILE__).'/languages/' . get_locale() . '.mo');

// CSS for admin page
add_action('admin_print_styles', 'flat_admin_CSS');
function flat_admin_CSS() {
	wp_enqueue_style('flatAdminCSS', get_bloginfo('stylesheet_directory').'/admin/admin.css');
}

// javascript for admin page
add_action('admin_print_scripts', 'flat_admin_script');
function flat_admin_script() {
	wp_enqueue_script('flatAdminScript', get_bloginfo('template_url').'/admin/script.js');
}

// to use wp_nav_menu() in WordPress3.0
if(function_exists('register_nav_menu')) {
	register_nav_menu('main', 'Header Menu');
}

// check if there is more then one page
function show_posts_nav() {
global $wp_query;
return ($wp_query->max_num_pages > 1);
};


// Sidebar widget
if ( function_exists('register_sidebar') ) {
    register_sidebar(array(
        'before_widget' => '<div class="side_box" id="%1$s">'."\n",
        'after_widget' => "</div>\n",
        'before_title' => '<h3 class="side_title">',
        'after_title' => "</h3>\n",
        'name' => 'top',
        'id' => 'top'
    ));
    register_sidebar(array(
        'before_widget' => '<div class="side_box_short" id="%1$s">'."\n",
        'after_widget' => "</div>\n",
        'before_title' => '<h3 class="side_title">',
        'after_title' => "</h3>\n",
        'name' => 'left',
        'id' => 'left'
    ));
    register_sidebar(array(
        'before_widget' => '<div class="side_box_short" id="%1$s">'."\n",
        'after_widget' => "</div>\n",
        'before_title' => '<h3 class="side_title">',
        'after_title' => "</h3>\n",
        'name' => 'right',
        'id' => 'right'
    ));
    register_sidebar(array(
        'before_widget' => '<div class="side_box" id="%1$s">'."\n",
        'after_widget' => "</div>\n",
        'before_title' => '<h3 class="side_title">',
        'after_title' => "</h3>\n",
        'name' => 'bottom',
        'id' => 'bottom'
    ));
}

// Original custom comments function is written by mg12 - http://www.neoease.com/

if (function_exists('wp_list_comments')) {
	// comment count
	add_filter('get_comments_number', 'comment_count', 0);
	function comment_count( $commentcount ) {
		global $id;
		$_commnets = get_comments('post_id=' . $id);
		$comments_by_type = &separate_comments($_commnets);
		return count($comments_by_type['comment']);
	}
}


function custom_comments($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	global $commentcount;
	if(!$commentcount) {
		$commentcount = 0;
	}
?>

 <li class="comment <?php if($comment->comment_author_email == get_the_author_meta('email')) {echo 'admin-comment';} else {echo 'guest-comment';} ?>" id="comment-<?php comment_ID() ?>">
  <div class="comment-meta">
   <div class="comment-meta-left">
  <?php if (function_exists('get_avatar') && get_option('show_avatars')) { echo get_avatar($comment, 35); } ?>
  
    <ul class="comment-name-date">
     <li class="comment-name">
<?php if (get_comment_author_url()) : ?>
<a id="commentauthor-<?php comment_ID() ?>" class="url <?php if($comment->comment_author_email == get_the_author_meta('email')) {echo 'admin-url';} else {echo 'guest-url';} ?>" href="<?php comment_author_url() ?>" rel="external nofollow">
<?php else : ?>
<span id="commentauthor-<?php comment_ID() ?>">
<?php endif; ?>

<?php comment_author(); ?>

<?php if(get_comment_author_url()) : ?>
</a>
<?php else : ?>
</span>
<?php endif;  $options = get_option('flat_options'); ?>
     </li>
     <li class="comment-date"><?php echo get_comment_time(__('F jS, Y', 'flat')); if ($options['time_stamp']) : echo get_comment_time(__(' g:ia', 'flat')); endif; ?></li>
    </ul>
   </div>

   <ul class="comment-act">
<?php if (function_exists('comment_reply_link')) { 
        if ( get_option('thread_comments') == '1' ) { ?>
    <li class="comment-reply"><?php comment_reply_link(array_merge( $args, array('add_below' => 'comment-content', 'depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text' => '<span><span>'.__('REPLY','flat').'</span></span>'))) ?></li>
<?php   } else { ?>
    <li class="comment-reply"><a href="javascript:void(0);" onclick="MGJS_CMT.reply('commentauthor-<?php comment_ID() ?>', 'comment-<?php comment_ID() ?>', 'comment');"><?php _e('REPLY', 'flat'); ?></a></li>
<?php   }
      } else { ?>
    <li class="comment-reply"><a href="javascript:void(0);" onclick="MGJS_CMT.reply('commentauthor-<?php comment_ID() ?>', 'comment-<?php comment_ID() ?>', 'comment');"><?php _e('REPLY', 'flat'); ?></a></li>
<?php } ?>
    <li class="comment-quote"><a href="javascript:void(0);" onclick="MGJS_CMT.quote('commentauthor-<?php comment_ID() ?>', 'comment-<?php comment_ID() ?>', 'comment-content-<?php comment_ID() ?>', 'comment');"><?php _e('QUOTE', 'flat'); ?></a></li>
    <?php edit_comment_link(__('EDIT', 'flat'), '<li class="comment-edit">', '</li>'); ?>
   </ul>

  </div>
  <div class="comment-content" id="comment-content-<?php comment_ID() ?>">
  <?php if ($comment->comment_approved == '0') : ?>
   <span class="comment-note"><?php _e('Your comment is awaiting moderation.', 'flat'); ?></span>
  <?php endif; ?>
  <?php comment_text(); ?>
  </div>

<?php } ?>
