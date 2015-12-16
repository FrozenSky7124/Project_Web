<?php session_start(); 
/**
* Template Name: Contact Form
*/

get_header();
?>
<div class="span-24" id="contentwrap">
	<div class="span-16">
		<div id="content">	

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="post" id="post-<?php the_ID(); ?>">
			<h2 class="title"><?php the_title(); ?></h2>
				<div class="entry">
<?php if ( function_exists("has_post_thumbnail") && has_post_thumbnail() ) { the_post_thumbnail(array(600,225), array("class" => "alignleft post_thumbnail")); } ?>
					<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
	
					<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
	
				</div>
			</div>
			<?php endwhile; endif; ?>
		
            <div class="contact-form">
                <?php
                
                    if ($_POST['contact_form_submit'] ) {
                        if(!$_POST['contact_form_name'] || !$_POST['contact_form_email'] || !$_POST['contact_form_subject'] || !$_POST['contact_form_question'] || !$_POST['contact_form_message']) {
                            ?><div class="error"><?php _e('Please fill in all required fields!','themater'); ?></div><?php
                        } elseif(!is_email($_POST['contact_form_email'])) {
                            ?><div class="error"><?php _e('Invalid email!','themater'); ?></div><?php
                        } elseif(($_SESSION['contact_form_number_one'] + $_SESSION['contact_form_number_two']) != $_POST['contact_form_question']) {
                            ?><div class="error"><?php _e('You entered the wrong number in captcha!','themater'); ?></div><?php
                        } else {
                            if(function_exists('get_theme_option')) {
                                $contact_form_email_option = get_theme_option('contact_form_email');
                            }
                            $contact_form_email = !empty($contact_form_email_option) ? $contact_form_email_option : get_option('admin_email');
                            wp_mail($theme->get_option('contact_form_email'), sprintf( '[%s] ' . esc_html($_POST['contact_form_subject']), get_bloginfo('name') ), esc_html($_POST['contact_form_message']),'From: "'. esc_html($_POST['contact_form_name']) .'" <' . esc_html($_POST['contact_form_email']) . '>');
                            unset($_POST);
                            ?><div class="message"><?php _e('Thanks for contacting us.','themater'); ?></div><?php
                        }
                        if ( isset($_SESSION['contact_form_number_one'] ) ) unset( $_SESSION['contact_form_number_one'] );
                        if ( isset($_SESSION['contact_form_number_two'] ) ) unset( $_SESSION['contact_form_number_two'] );
                    }
                    
                    if ( !isset($_SESSION['contact_form_number_one'] ) ) $_SESSION['contact_form_number_one'] = $contact_form_number_one = rand(1, 9);
                	else $contact_form_number_one = $_SESSION['contact_form_number_one'];
                	
                	if ( !isset($_SESSION['contact_form_number_two'] ) ) $_SESSION['contact_form_number_two'] = $contact_form_number_two = rand(1, 9);
                	else $contact_form_number_two = $_SESSION['contact_form_number_two'];
                ?>
                
                <form method="post" action="">
                    <input type="hidden" name="contact_form_submit" value="true" />
                    <div class="contact-form-label alignleft <?php if($_POST && !$_POST['contact_form_name']) { echo 'contact-form-required'; } ?>"><?php _e('Name','themater'); ?>:</div>
                    <div class="contact-form-input"><input type="text" name="contact_form_name" value="<?php if ( isset($_POST['contact_form_name']) ) { echo esc_attr($_POST['contact_form_name']); } ?>" /></div>
                    
                    <div class="contact-form-label alignleft <?php if($_POST && !$_POST['contact_form_email']) { echo 'contact-form-required'; } ?>"><?php _e('Email','themater'); ?>:</div>
                    <div class="contact-form-input"><input type="text" name="contact_form_email" value="<?php if ( isset($_POST['contact_form_email']) ) { echo esc_attr($_POST['contact_form_email']); } ?>" /></div>
                    
                    <div class="contact-form-label alignleft <?php if($_POST && !$_POST['contact_form_question']) { echo 'contact-form-required'; } ?>"><?php echo $contact_form_number_one; ?> + <?php echo $contact_form_number_two; ?> = ?</div>
                    <div class="contact-form-input"><input type="text" name="contact_form_question" value="" /></div>
                    
                    <div class="contact-form-label alignleft <?php if($_POST && !$_POST['contact_form_subject']) { echo 'contact-form-required'; } ?>"><?php _e('Subject','themater'); ?>:</div>
                    <div class="contact-form-input"><input type="text" name="contact_form_subject" value="<?php if ( isset($_POST['contact_form_subject']) ) { echo esc_attr($_POST['contact_form_subject']); } ?>" /></div>
                    
                    <div class="contact-form-label alignleft <?php if($_POST && !$_POST['contact_form_message']) { echo 'contact-form-required'; } ?>"><?php _e('Message','themater'); ?>:</div>
                    <div class="contact-form-input"><textarea name="contact_form_message" ><?php if ( isset($_POST['contact_form_message']) ) { echo esc_textarea($_POST['contact_form_message']); } ?></textarea></div>
                    
                    <div class="contact-form-label alignleft">&nbsp;</div>
                    <div class="contact-form-input" style="text-align: center;"><input type="submit" value="<?php _e('Submit','themater'); ?>" /></div>
                </form>
                
            </div>

<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>

		</div>
	</div>
	

<?php get_sidebars(); ?>

</div>
<?php get_footer(); ?>