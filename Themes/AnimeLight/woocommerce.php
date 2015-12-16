<?php get_header(); ?>
<div class="span-24" id="contentwrap">

	<div id="content">	

		<div class="woocommerce">
           <?php if(function_exists('woocommerce_content')) { woocommerce_content(); } ?>
       </div>
       
	</div>
    
</div>
<?php get_footer(); ?>