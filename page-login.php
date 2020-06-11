<?php

	/* Template Name: Login */

	get_header();

	$login  = (isset($_GET['login']) ) ? $_GET['login'] : 0;

?>

<?php
	$background_image = get_field('login_background_image');
	$title = get_field('login_title');
	$subtitle = get_field('login_subtitle');
	$paragraph = get_field('login_paragraph');
?>

<div class="hero hero-full">
	<img src="<?php echo $background_image['url']; ?>" alt="<?php echo $background_image['alt']; ?>">
	<div id="bg-overlay-login"></div>
	<div class="hero-center">
		<div class="container">
			<div class="row text-xs-center m-b-2">
				<div class="col-xs-12">
					<h2 style="color: white; letter-spacing: 1px;"><?php echo $title ?></h2>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-5">
					<div class="m-x-auto" style="max-width:30rem; width: 400px; margin: 0 auto;">
						<div class="bg-white z-depth-1 p-a-1">
							<?php
								$redirect_to  = (isset($_GET['redirect_to']) ) ? $_GET['redirect_to'] : 0;
							?>
							<form name="loginform" id="loginform" action="<?php echo home_url(); ?>/wp-login.php" method="post">		
								<fieldset class="login-username form-group">
									<label for="user_login" class="form-control-label">Username</label>
									<input type="text" name="log" id="user_login" class="form-control" value="" size="20" placeholder="Username" style="padding: 10px;">
								</fieldset>
								<p class="login-password form-group">
									<label for="user_pass" class="form-control-label">Password</label>
									<input type="password" name="pwd" id="user_pass" class="form-control" value="" size="20" placeholder="Password" style="padding: 10px;">
								</fieldset>				
								<div class="login-remember switch pull-xs-left">
									<label class="form-control-label">
										<input name="rememberme" type="checkbox" id="rememberme" value="forever">
										<span class="indicator"></span>
										<span class="label">Remember Me</span>
									</label>
								</div>
								<div class="login-submit text-xs-right">
									<input type="submit" name="wp-submit" id="wp-submit" class="btn btn-primary" value="Log In">
									<?php if( $redirect_to ): ?>
									<input type="hidden" name="redirect_to" value="<?php echo $redirect_to ?>">
									<?php endif; ?>
								</div>
							</form>
						<?php
							if( $login === 'failed' ) {
								echo '<div class="alert alert-danger">The login details you entered are incorrect. Please try again.</div>';
							} elseif( $login === 'empty' ) {
								echo '<div class="alert alert-danger">Please enter both your username and password to login.</div>';
							} elseif( $login === 'false' ) {
								echo '<div class="alert alert-info">You are now logged out.</div>';
							} elseif( $login === 'media' ) {
								echo '<div class="alert alert-info">Want to login? Request access to the media centre.</div>';
							} elseif( is_user_logged_in() ) {
								echo '<div class="alert alert-info">You are already logged in. <a href="' . wp_logout_url() . '">Log out?</a></div>';
							}
						?>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-7" style="border-left: 2px solid white;">
					<h3 style="color: white;"><?php echo $subtitle ?></h3>
					<hr style="border-top: 2px solid white;">
					<span style="color: white;"><?php echo $paragraph ?></span>


					<h4 style="margin-top: 3rem; color: white;">Request login details</h4>
					<form class="icaal-contact-form" data-form="media_request">
		                <div class="row">
		                	<div class="col-12 col-md-6 text-left-lg-up icaal-contact-form-wrap">
		                    	<input name="first_name" type="text" placeholder="First Name*" >
		                  	</div>
		                  	<div class="col-12 col-md-6 text-left-lg-up icaal-contact-form-wrap">
		                    	<input name="last_name" type="text" placeholder="Last Name*" >
		                  	</div>
		                  	<div class="col-12 col-md-6 text-left-lg-up icaal-contact-form-wrap">
		                    	<input name="email" type="email" placeholder="Email Address*">
		                  	</div>
			                <div class="col-12 col-md-6 text-left-lg-up icaal-contact-form-wrap">
			                    <input name="phone" type="tel" placeholder="Phone Number*" style="width: 100%; height: 44px;margin-bottom: 1rem; padding: 10px;">
			              	</div>
			              	<div class="clearfix"></div>
		                  	<div class="col-12 col-md-6 text-left-lg-up icaal-contact-form-wrap">
		                    	<input name="postcode" type="text" placeholder="Postcode*">
		                  	</div>
		                  	<div class="col-12 col-md-6 text-left-lg-up icaal-contact-form-wrap">
		                    	<input name="business_name" type="text" placeholder="Business Name">
		                  	</div>
		                  	<div class="col-sm-12 text-left-lg-up">
		                    	<p class="m-b-0" style="color: white;">
		                      		* indicates required fields
		                    	</p>
		                  	</div>
		                  	<div class="col-sm-12 text-left-lg-up" style="display: inline-flex; align-items: center; justify-content: flex-end;">
		                    	<a href="#" target="_blank" style="margin-right: .5rem;">Privacy Policy</a>
		                    	<input class="submit btn <?php echo $material == 'timber' ? 'btn-primary-aj' : 'btn-primary-aws' ?> is-valid mb-0" type="submit" value="Submit"><br />
		                  	</div>
		                  	<div class="col-sm-12 icaal-contact-form-wrap">
		                    	<div class="response"></div>
		                  	</div>
		                </div>
		              </form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
