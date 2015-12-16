<?php
/*
Themater Shorcodes Generator
Based on DW Shortcode Bootstrap by DesignWall (http://www.designwall.com)
License: GNU General Public License v2.0
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

define('THEMATER_SHORTCODES_DIR', get_template_directory() . '/lib/shortcodes');
define('THEMATER_SHORTCODES_URL', get_template_directory_uri() . '/lib/shortcodes');

class ThematerShortcodes{
	
	function __construct()
	{
	   if(!is_admin()){
			 	wp_enqueue_style("dws_bootstrap", THEMATER_SHORTCODES_URL . '/css/bootstrap.css');
				wp_enqueue_style("dws_shortcodes", THEMATER_SHORTCODES_URL . '/css/shortcodes.css');
				wp_enqueue_script('dws_bootstrap', THEMATER_SHORTCODES_URL . '/js/bootstrap.js',array('jquery'));
		} else {
			wp_enqueue_style("dws_admin_style", THEMATER_SHORTCODES_URL . '/css/admin.css');
            add_action('admin_head', array(&$this, 'loadHead') );
		}
        
        add_shortcode('row', array($this, 'shortcode_row'));
        add_shortcode('col', array($this, 'shortcode_span'));
        add_shortcode('notification', array($this, 'shortcode_notice'));
        add_shortcode('button', array($this, 'shortcode_buttons'));
        add_shortcode('label', array($this, 'shortcode_labels'));
        
        add_shortcode('tabs', array($this, 'shortcode_tabs'));
        add_shortcode('thead', array($this, 'shortcode_thead'));
        add_shortcode('tab', array($this, 'shortcode_tab'));
        add_shortcode('dropdown', array($this, 'shortcode_dropdown'));
        add_shortcode('tcontents', array($this, 'shortcode_tcontents'));
        add_shortcode('tcontent', array($this, 'shortcode_tcontent'));
        
        add_shortcode('collapse', array($this, 'shortcode_collapse'));
        add_shortcode('citem', array($this, 'shortcode_citem'));
        
        add_shortcode('icon', array($this, 'shortcode_icons'));

		if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
	    	return;
		}
	 
		if ( get_user_option('rich_editing') == 'true' ) {
			add_filter( 'mce_external_plugins', array(&$this, 'mce_plugins') );
			add_filter( 'mce_buttons', array(&$this, 'mce_buttons') );
		}

	}
    
    function mce_plugins($plugins)
	{
		 
		$plugins['dws_grid'] = THEMATER_SHORTCODES_URL . '/js/plugins/grid.js';
		$plugins['dws_alerts'] = THEMATER_SHORTCODES_URL . '/js/plugins/alert.js';
		$plugins['dws_buttons'] = THEMATER_SHORTCODES_URL . '/js/plugins/buttons.js';
		$plugins['dws_labels'] = THEMATER_SHORTCODES_URL . '/js/plugins/labels.js';
		$plugins['dws_tabs'] = THEMATER_SHORTCODES_URL . '/js/plugins/tabs.js';
		$plugins['dws_icons'] = THEMATER_SHORTCODES_URL . '/js/plugins/icons.js';
		$plugins['dws_collapse'] = THEMATER_SHORTCODES_URL . '/js/plugins/collapse.js';
		return $plugins;
	}
    
	function mce_buttons($buttons)
	{
		array_push($buttons, 'dws_grid');
		array_push($buttons, 'dws_alerts');
		array_push($buttons, 'dws_buttons');
		array_push($buttons, 'dws_labels');
		array_push($buttons, 'dws_icons');
		array_push($buttons, 'dws_tabs');
		array_push($buttons, 'dws_collapse');
		return $buttons;
	}
    
    function loadHead()
	{
		echo "<script type='text/javascript'> var themater_shortcodes_url = \"" . THEMATER_SHORTCODES_URL . "\"; </script> \n";
	}
    
    /**
     * Row
     */
    function shortcode_row($params, $content = null){
    	extract(shortcode_atts(array(
    		'class' => 'row-fluid'
    	), $params));
    	$content = preg_replace('/<br class="nc".\/>/', '', $content);
    	$result = '<div class="'.$class.'">';
    	$result .= do_shortcode($content );
    	$result .= '</div>'; 
    	return force_balance_tags( $result );
    }
    

    /**
     * Col span
     */
    function shortcode_span($params,$content=null){
    	extract(shortcode_atts(array(
    		'class' => 'span1'
    		), $params));
    
    	$result = '<div class="'.$class.'">';
    	$result .= do_shortcode($content );
    	$result .= '</div>'; 
    	return force_balance_tags( $result );
    }

    /**
     * Notification
     */
    function shortcode_notice($params, $content = null){
    	extract(shortcode_atts(array(
    		'type' => 'unknown'
    	), $params));
    	$content = preg_replace('/<br class="nc".\/>/', '', $content);
    	$result = '<div class="alert alert-'.$type.'">';
    	$result .= '<button class="close" type="button" data-dismiss="alert">×</button>';
    	$result .= do_shortcode($content );
    	$result .= '</div>'; 
    	return force_balance_tags( $result );
    }
	
    /**
     * Button
     */
    function shortcode_buttons($params, $content = null){
    	extract(shortcode_atts(array(
    		'size' => 'default',
    		'type' => 'default',
    		'value' => 'button',
    		'href' => "#"
    	), $params));
    
    	$content = preg_replace('/<br class="nc".\/>/', '', $content);
    	$result = '<a class="btn btn-'.$size.' btn-'.$type.'" href="'.$href.'">'.$value.'</a>';
    	return force_balance_tags( $result );
    }
    
    /**
     * Labels & Badges
     */
    function shortcode_labels($params, $content = null){
    	extract(shortcode_atts(array(
    		'type' => 'label',
            'style' => 'default',
    		'title' => 'Title'
    	), $params));
    
    	$content = preg_replace('/<br class="nc".\/>/', '', $content);
    	$result = '<span class="'.$type.' ' . $type . '-' . $style . '">'.$title.'</span>';
    	return force_balance_tags( $result );
    }
    
    /**
     * Tabs
     */
    //-------------- 
    //	[tabs]
    //		[thead]
    //			[tab href="#link" title="title"]
    //			[dropdown title="title"]
    //				[tab href="#link" title="title"]
    //			[/dropdown]
    //		[/thead]
    //		[tcontents]
    //			[tcontent id="link"]
    //			[/tcontent]
    //		[/tcontents]
    //	[/tabs]
    //	---------------
    //	
    
    function shortcode_tabs($params, $content = null){
    	$content = preg_replace('/<br class="nc".\/>/', '', $content);
    	$result = '<div class="tab_wrap">';
    	$result .= do_shortcode($content );
    	$result .= '</div>'; 
    	return force_balance_tags( $result );
    }
    
    function shortcode_thead($params, $content = null){
    	$content = preg_replace('/<br class="nc".\/>/', '', $content);
    	$result = '<ul class="nav nav-tabs">';
    	$result .= do_shortcode($content );
    	$result .= '</ul>'; 
    	return force_balance_tags( $result );
    }
    
    function shortcode_tab($params, $content = null){
    	extract(shortcode_atts(array(
    		'href' => '#',
    		'title' => '',
    		'class' => ''
     		), $params));
    	$content = preg_replace('/<br class="nc".\/>/', '', $content);
    
    	$result = '<li class="'.$class.'">';
    	$result .= '<a data-toggle="tab" href="'.$href.'">'.$title.'</a>';
    	$result .= '</li>'; 
    	return force_balance_tags( $result );
    }

    function shortcode_dropdown($params, $content = null){
    	global $dws_timestamp;
    	extract(shortcode_atts(array(
    		'title' => '',
    		'id' => '',
    		'class' => '',
    		), $params));
    	$content = preg_replace('/<br class="nc".\/>/', '', $content);
    	$result = '<li class="dropdown">';
    	$result .= '<a class="'.$class.'" id="'.$id.'" class="dropdown-toggle" data-toggle="dropdown">'.$title.'<b class="caret"></b></a>';
    	$result .='<ul class="dropdown-menu">';
    	$result .= do_shortcode($content);
    	$result .= '</ul></li>'; 
    	return force_balance_tags( $result );
    }
    
    function shortcode_tcontents($params, $content = null){
    	$content = preg_replace('/<br class="nc".\/>/', '', $content);
    	$result = '<div class="tab-content">';
    	$result .= do_shortcode($content );
    	$result .= '</div>'; 
    	return force_balance_tags( $result );
    }
    
    function shortcode_tcontent($params, $content = null){
    	extract(shortcode_atts(array(
    		'id' => '',
    		'class'=>'',
    		), $params));
    	$content = preg_replace('/<br class="nc".\/>/', '', $content);
    	$class= ($class=='active')?'active in':'';
    	$result = '<div class="tab-pane fade '.$class.'" id='.$id.'>';
    	$result .= do_shortcode($content );
    	$result .= '</div>'; 
    	return force_balance_tags( $result );
    }
    
    /**
     * Collapse
     */
    
    function shortcode_collapse($params, $content = null){
    	extract(shortcode_atts(array(
    		'id'=>''
     		), $params));
    	$content = preg_replace('/<br class="nc".\/>/', '', $content);
    	$result = '<div class="accordion" id="'.$id.'">';
    	$result .= do_shortcode($content );
    	$result .= '</div>'; 
    	return force_balance_tags( $result );
    }
    
    function shortcode_citem($params, $content = null){
    	extract(shortcode_atts(array(
    		'id'=>'',
    		'title'=>'Collapse title',
    		'parent' => ''
     		), $params));
    	$content = preg_replace('/<br class="nc".\/>/', '', $content);
    	$result = ' <div class="accordion-group">';
    	$result .= ' <div class="accordion-heading">';
    	$result .= '<a class="accordion-toggle" data-toggle="collapse" data-parent="#'.$parent.'" href="#'.$id.'">';
    	$result .= $title;
    	$result .= '</a>';
    	$result .= '</div>';
    	$result .= '<div id="'.$id.'" class="accordion-body collapse">';
    	$result .= '<div class="accordion-inner">';
    	$result .= do_shortcode($content );
    	$result .= '</div>'; 
    	$result .= '</div>'; 
    	$result .= '</div>'; 
    	return force_balance_tags( $result );
    }

    /**
     * Button
     */
    function shortcode_icons($params, $content = null){
    	extract(shortcode_atts(array(
    		'name' => 'default'
    	), $params));
    
    	$content = preg_replace('/<br class="nc".\/>/', '', $content);
    	$result = '<i class="'.$name.'"></i>';
    	return force_balance_tags( $result );
    }
    

}
$themater_shortcodes = new ThematerShortcodes();