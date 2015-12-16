<?php
    add_theme_support( 'woocommerce' );
    
    wp_enqueue_script( 'mobilemenu', get_template_directory_uri() . '/lib/js/jquery.mobilemenu.js', array('jquery') );

    add_action('wp_footer', 'themater_menu_js'); 
    
    function themater_menu_js()
    {

       $return .= "<script type='text/javascript'>\n";
            $return .= '/* <![CDATA[ */' . "\n";
        
            $return .= "if (jQuery('#pagemenucontainer').length > 0) {
               jQuery('#pagemenucontainer').mobileMenu({
                    defaultText: 'Menu',
                    className: 'menu-primary-responsive',
                    containerClass: 'menu-primary-responsive-container',
                    subMenuDash: '&ndash;'
                });
            } else if (jQuery('#pagemenu').length > 0) {
                jQuery('#pagemenu').mobileMenu({
                    defaultText: 'Menu',
                    className: 'menu-primary-responsive',
                    containerClass: 'menu-primary-responsive-container',
                    subMenuDash: '&ndash;'
                });
            } \n";
            
             $return .= "if (jQuery('#navcontainer').length > 0) {
                jQuery('#navcontainer').mobileMenu({
                    defaultText: 'Navigation',
                    className: 'menu-secondary-responsive',
                    containerClass: 'menu-secondary-responsive-container',
                    subMenuDash: '&ndash;'
                });
            } else if (jQuery('#nav').length > 0) {
                jQuery('#nav').mobileMenu({
                    defaultText: 'Navigation',
                    className: 'menu-secondary-responsive',
                    containerClass: 'menu-secondary-responsive-container',
                    subMenuDash: '&ndash;'
                });
            } else if (jQuery('.navcontainer').length > 0) {
                jQuery('.navcontainer').mobileMenu({
                    defaultText: 'Navigation',
                    className: 'menu-secondary-responsive',
                    containerClass: 'menu-secondary-responsive-container',
                    subMenuDash: '&ndash;'
                });
            } \n";
 
        $return .= '/* ]]> */' . "\n";
        $return .= '</script>' . "\n";
            echo $return;
    }
?>