<?php
/**
 * Template Name: Login Template
 *
 * @package Theme Freesia
 * @subpackage ShoppingCart
 * @since ShoppingCart 1.0
 */

global $user_ID;

if (!$user_ID) {
	// user in logged out state
	if ($_POST) {

		$username = isset($_POST['username']) ? $_POST['username'] : '';
		$password = isset($_POST['password']) ? $_POST['password'] : '';

		$login_array = array();
		$login_array['user_login'] = $username;
		$login_array['user_password'] = $password;
		
		$verify_user = wp_signon($login_array, true);
		if (!is_wp_error($verify_user)) {
			if (in_array('administrator', (array) $verify_user->roles)) {
				echo "<script>window.location = '".site_url()."/wp-admin'</script>";
			} else {
				echo "<script>window.location = '".site_url()."/my-account'</script>";
			}
			
		} else {
			// echo "<script>alert('Tên đăng nhập hoặc mật khẩu không đúng.')</script>";
		}
	
	} 
	get_header();
	?>
	<div class="wrap">
		<div class="login">
			<form action="" class="form-login" id="loginForm" method="POST">
				<h1>Login</h1>
				<?php
					if (is_wp_error($verify_user)) {
						echo "<p class='error-msg'>Tên đăng nhập hoặc mật khẩu không đúng!</p>";
					}
				?>
				<hr>

				<label for="username"><b>Username or Email address</b></label>
				<input type="text" name="username" id="username" value="<?php echo $username ?>" required>

				<label for="password"><b>Password</b></label>
				<input type="password" name="password" id="password" value="<?php echo $password ?>" required>

				<input type="submit" id="btn-submit" value="Login">
				
				<p>Not registered? <a href="/register">Create an account</a>.</p>
			</form>
		</div>
	</div><!-- end .wrap -->	
	<?php
	get_footer();

	
} else {
	// user in logged in state
	echo "<script>window.location = '".site_url()."/my-account'</script>";
}

?>