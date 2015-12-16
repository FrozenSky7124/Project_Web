<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<link rel="shortcut icon" href="/favicon.ico" />
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php
global $page, $paged; wp_title( '|', true, 'right' ); bloginfo( 'name' );
$site_description = get_bloginfo( 'description', 'display' ); if ( $site_description && ( is_home() || is_front_page() ) ) echo " | $site_description";
if ( $paged >= 2 || $page >= 2 ) echo ' | ' . sprintf( __( 'Page %s', 'flat' ), max( $paged, $page ) );
?></title>
<meta name="description" content="<?php if (!is_paged() && is_front_page()): echo bloginfo('description'); else: echo the_title(); endif; ?>" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" /> 
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/comment-style.css" type="text/css" />
<?php if (strtoupper(get_locale()) == 'JA') ://to fix the font-size for japanese font ?>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/japanese.css" type="text/css" />
<?php endif; ?>

<?php wp_enqueue_script( 'jquery' ); ?>
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?> 
<?php wp_head(); ?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/scroll.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jscript.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/comment.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/rollover.js"></script>
<!--[if lt IE 9]>
<script type="text/javascript" src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/ie7.js"></script>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/ie7.css" type="text/css" />
<![endif]-->

</head>

<body<?php if(is_page_template('page-noside.php')) { echo ' id="no_side"'; }; ?>>

 <div id="header">
  <div class="header_menu">
  <?php if (function_exists('wp_nav_menu')) { wp_nav_menu( array( 'sort_column' => 'menu_order', 'container' => '' ) ); } else { ?>
   <ul>
    <?php wp_list_pages('title_li='); ?>
   </ul>
  <?php }; ?>
  </div>
  <?php $options = get_option('flat_options'); if ($options['use_logo']) { ?>
  <h1 id="logo_image"><a href="<?php echo bloginfo('wpurl'); ?>/"><img src="<?php bloginfo('template_url'); ?>/img/<?php echo $options['logo_name']; ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" /></a></h1>
  <?php } else { ?>
  <h1 id="logo_text"><a href="<?php bloginfo('wpurl'); ?>/"><?php bloginfo('name'); ?></a></h1>
  <h2 id="site_description"><?php bloginfo('description'); ?></h2>
  <?php }; ?>
 </div>

 <div id="main_content" class="clearfix">

  <div id="left_col">