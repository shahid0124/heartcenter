<?php
// Template Name: Contact
get_header(); global $smof_data; ?>
<?php
if( $smof_data['recaptcha_public'] && $smof_data['recaptcha_private'] && ! function_exists( 'recaptcha_get_html' ) ) {
	require_once('framework/recaptchalib.php');
}
//If the form is submitted
if(isset($_POST['submit'])) {
	//Check to make sure that the name field is not empty
	if(trim($_POST['contact_name']) == '' || trim($_POST['contact_name']) == 'Name (required)') {
		$hasError = true;
	} else {
		$name = trim($_POST['contact_name']);
	}

	//Subject field is not required
	if(function_exists('stripslashes')) {
		$subject = stripslashes(trim($_POST['url']));
	} else {
		$subject = trim($_POST['url']);
	}

	//Check to make sure sure that a valid email address is submitted
	$pattern = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';

	if(trim($_POST['email']) == '' || trim($_POST['email']) == 'Email (required)')  {
		$hasError = true;
	} else if ( preg_match($pattern, $_POST['email']) === 0 ) {
		$hasError = true;
	} else {
		$email = trim($_POST['email']);
	}

	//Check to make sure comments were entered
	if(trim($_POST['msg']) == '' || trim($_POST['msg']) == 'Message') {
		$hasError = true;
	} else {
		if(function_exists('stripslashes')) {
			$comments = stripslashes(trim($_POST['msg']));
		} else {
			$comments = trim($_POST['msg']);
		}
	}

	if($smof_data['recaptcha_public'] && $smof_data['recaptcha_private']) {
		$resp = recaptcha_check_answer ($smof_data['recaptcha_private'],
								$_SERVER["REMOTE_ADDR"],
								$_POST["recaptcha_challenge_field"],
								$_POST["recaptcha_response_field"]);
		if(!$resp->is_valid) {
			$hasError = true;
		}
	}

	//If there is no error, send the email
	if(!isset($hasError)) {
		$name = wp_filter_kses( $name );
		$email = wp_filter_kses( $email );
		$subject = wp_filter_kses( $subject );
		$comments = wp_filter_kses( $comments );
		
		if(function_exists('stripslashes')) {
			$subject = stripslashes($subject);
			$comments = stripslashes($comments);
		}		
		
		$emailTo = $smof_data['email_address']; //Put your own email address here
		$body = __('Name:', 'Avada')." $name \n\n";
		$body .= __('Email:', 'Avada')." $email \n\n";
		$body .= __('Subject:', 'Avada')." $subject \n\n";
		$body .= __('Comments:', 'Avada')."\n $comments";
		$headers = 'Reply-To: ' . $name . ' <' . $email . '>' . "\r\n";

		$mail = wp_mail($emailTo, $subject, $body, $headers);

		$emailSent = true;

		if($emailSent == true) {
			$_POST['contact_name'] = '';
			$_POST['email'] = '';
			$_POST['url'] = '';
			$_POST['msg'] = '';
		}
	}
}

$content_css = 'width:100%';
$sidebar_css = 'display:none';
$content_class = '';
$sidebar_exists = false;
$sidebar_left = '';
$double_sidebars = false;

$sidebar_1 = get_post_meta( $post->ID, 'sbg_selected_sidebar_replacement', true );
$sidebar_2 = get_post_meta( $post->ID, 'sbg_selected_sidebar_2_replacement', true );

if( $smof_data['pages_global_sidebar'] ) {
	if( $smof_data['pages_sidebar'] != 'None' ) {
		$sidebar_1 = array( $smof_data['pages_sidebar'] );
	} else {
		$sidebar_1 = '';
	}

	if( $smof_data['pages_sidebar_2'] != 'None' ) {
		$sidebar_2 = array( $smof_data['pages_sidebar_2'] );
	} else {
		$sidebar_2 = '';
	}
}

if( ( is_array( $sidebar_1 ) && ( $sidebar_1[0] || $sidebar_1[0] === '0' ) ) && ( is_array( $sidebar_2 ) && ( $sidebar_2[0] || $sidebar_2[0] === '0' ) ) ) {
	$double_sidebars = true;
}

if( is_array( $sidebar_1 ) &&
	( $sidebar_1[0] || $sidebar_1[0] === '0' )
) {
	$sidebar_exists = true;
} else {
	$sidebar_exists = false;
}

if( ! $sidebar_exists ) {
	$content_css = 'width:100%';
	$sidebar_css = 'display:none';
	$sidebar_exists = false;
} elseif(get_post_meta($post->ID, 'pyre_sidebar_position', true) == 'left') {
	$content_css = 'float:right;';
	$sidebar_css = 'float:left;';
	$content_class = 'portfolio-one-sidebar';
	$sidebar_exists = true;
	$sidebar_left = 1;
} elseif(get_post_meta($post->ID, 'pyre_sidebar_position', true) == 'right') {
	$content_css = 'float:left;';
	$sidebar_css = 'float:right;';
	$content_class = 'portfolio-one-sidebar';
	$sidebar_exists = true;
} elseif(get_post_meta($post->ID, 'pyre_sidebar_position', true) == 'default' || ! metadata_exists( 'post', $post->ID, 'pyre_sidebar_position' )) {
	$content_class = 'portfolio-one-sidebar';
	if($smof_data['default_sidebar_pos'] == 'Left') {
		$content_css = 'float:right;';
		$sidebar_css = 'float:left;';
		$sidebar_exists = true;
		$sidebar_left = 1;
	} elseif($smof_data['default_sidebar_pos'] == 'Right') {
		$content_css = 'float:left;';
		$sidebar_css = 'float:right;';
		$sidebar_exists = true;
		$sidebar_left = 2;
	}
}

if(get_post_meta($post->ID, 'pyre_sidebar_position', true) == 'right') {
	$sidebar_left = 2;
}

if( $smof_data['pages_global_sidebar'] ) {
	if( $smof_data['pages_sidebar'] != 'None' ) {
		$sidebar_1 = $smof_data['pages_sidebar'];

		if( $smof_data['default_sidebar_pos'] == 'Right' ) {
			$content_css = 'float:left;';
			$sidebar_css = 'float:right;';	
			$sidebar_left = 2;
		} else {
			$content_css = 'float:right;';
			$sidebar_css = 'float:left;';
			$sidebar_left = 1;
		}			
	}

	if( $smof_data['pages_sidebar_2'] != 'None' ) {
		$sidebar_2 = $smof_data['pages_sidebar_2'];
	}

	if( $smof_data['pages_sidebar'] != 'None' && $smof_data['pages_sidebar_2'] != 'None' ) {
		$double_sidebars = true;
	}
} else {
	$sidebar_1 = '0';
	$sidebar_2 = '0';
}

if($double_sidebars == true) {
	$content_css = 'float:left;';
	$sidebar_css = 'float:left;';
	$sidebar_2_css = 'float:left;';
} else {
	$sidebar_left = 1;
}
?>
	<div style="width:100%;" id="content" style="<?php echo $content_css; ?>">
		<?php while(have_posts()): the_post(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php echo avada_render_rich_snippets_for_pages(); ?>
			<?php echo avada_featured_images_for_pages(); ?>	
			<div class="post-content">
				
<?php the_content(); ?>		
                 <div style="width: 100%;">
<div id="contact_info-widget-2" class="widget contact_info" style="float: left; width: 40%;">
<div class="heading">
<h3>Contact Info Washington Office</h3>
</div>
<div class="contact-info-container">
<p class="address">Cell Bionics Institute/Kill Pain<br>
Office 502 West Broad Street (Route 7)
Falls Church, VA 22046</p>
<p class="phone">Phone: (703) 894-2224</p>
<p class="fax">Fax: (703) 997-2566</p>
<p class="email">Email: <a href="mailto:paininfo@killpain.com">paininfo@killpain.com</a></p>

</div>
<div id="text-16" class="widget widget_text">
<div class="textwidget"><iframe style="border: 0;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12422.246921680451!2d-77.188924821806!3d38.88826797527484!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89b7b4c410f736b5%3A0xa2dbf9c72ea811bf!2sKillPain!5e0!3m2!1sen!2sus!4v1463726426110" width="100%" height="200" frameborder="0" allowfullscreen="allowfullscreen"></iframe></div>
</div>
</div>
<div id="contact_info-widget-2" class="widget contact_info" style="float: left; margin-left: 10%; width: 40%;">
<div class="heading">
<h3>Contact Info New York Office</h3>
</div>
<div class="contact-info-container">
<p class="address">Omni Surgery Center<br>
498 French Road, Utica, NY 13502</p>
<p class="phone" style="margin-top: 30px;">Phone: 315 765 8448</p>
<p class="fax">Fax: 315 732 1702</p>
<p class="email">Email: <a href="mailto: info@killpain.com"> info@killpain.com</a></p>

</div>
<div id="text-17" class="widget widget_text">
<div class="textwidget"><iframe style="border: 0;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2913.828813421943!2d-75.28228908501397!3d43.08709419687041!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89d941124d375017%3A0x54b098da7508af5e!2s498+French+Rd%2C+Utica%2C+NY+13502!5e0!3m2!1sen!2sus!4v1463726600314" width="100%" height="200" frameborder="0" allowfullscreen="allowfullscreen"></iframe></div>
</div>
</div>
</div>
				
			</div>
	     
			<form id="cf" action="" method="post" class="avada-contact-form">

					<div id="comment-input">

						<input type="text" name="contact_name" id="author" value="<?php if(isset($_POST['contact_name']) && !empty($_POST['contact_name'])) { echo esc_html( $_POST['contact_name'] ); } ?>" placeholder="<?php echo __('Name (required)', 'Avada'); ?>" size="22" tabindex="1" aria-required="true" class="input-name">

						<input type="text" name="email" id="email" value="<?php if(isset($_POST['email']) && !empty($_POST['email'])) { echo esc_html( $_POST['email'] ); } ?>" placeholder="<?php echo __('Email (required)', 'Avada'); ?>" size="22" tabindex="2" aria-required="true" class="input-email">

						<input type="text" name="url" id="url" value="<?php if(isset($_POST['url']) && !empty($_POST['url'])) { echo esc_html( $_POST['url'] ); } ?>" placeholder="<?php echo __('Subject', 'Avada'); ?>" size="22" tabindex="3" class="input-website">

					</div>

					<div id="comment-textarea">

						<textarea name="msg" id="comment" cols="39" rows="4" tabindex="4" class="textarea-comment" placeholder="<?php echo __('Message', 'Avada'); ?>"><?php if(isset($_POST['msg']) && !empty($_POST['msg'])) { echo esc_html( $_POST['msg'] ); } ?></textarea>

					</div>

					<?php if($smof_data['recaptcha_public'] && $smof_data['recaptcha_private']): ?>

					<div id="comment-recaptcha">

					<?php echo recaptcha_get_html($smof_data['recaptcha_public'], null, is_ssl() ); ?>

					</div>

					<?php endif; ?>

					<div id="comment-submit-container">

						<p><div><input name="submit" type="submit" id="submit" tabindex="5" value="<?php echo __('Submit Form', 'Avada'); ?>" class="<?php echo sprintf( 'comment-submit btn btn-default button default small fusion-button button-small button-default button-%s button-%s', strtolower( $smof_data['button_shape'] ), strtolower( $smof_data['button_type'] ) ); ?>"></div></p>
					</div>

			</form>
      
			<?php if(isset($hasError)) { //If errors are found ?>
					<?php echo "Please check if you've filled all the fields with valid information.";  ?>				
					<br />
				<?php } ?>

	

		<?php endwhile; ?>
	</div>
     			
		</div>
	<?php if( $sidebar_exists == true ): ?>
	<?php wp_reset_query(); ?>
	<div id="sidebar" class="sidebar" style="<?php echo $sidebar_css; ?>">
		<?php
		if($sidebar_left == 1) {
			generated_dynamic_sidebar($sidebar_1);
		}
		if($sidebar_left == 2) {
			generated_dynamic_sidebar_2($sidebar_2);
		}
		?>
	</div>
	<?php if( $double_sidebars == true ): ?>
	<div id="sidebar-2" class="sidebar" style="<?php echo $sidebar_2_css; ?>">
		<?php
		if($sidebar_left == 1) {
			generated_dynamic_sidebar_2($sidebar_2);
		}
		if($sidebar_left == 2) {
			generated_dynamic_sidebar($sidebar_1);
		}
		?>
	</div>
	
	<?php endif; ?>
	<?php endif; ?>
 
<?php get_footer(); ?>
   