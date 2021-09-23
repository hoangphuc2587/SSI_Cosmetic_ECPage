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
	if (!session_id()) {
        session_start();
    }	
	// user in logged out state
	$rp_cookie = 'wp-userlogin-' . COOKIEHASH;
	$cookie_name = 'wp-resetpass-' . COOKIEHASH;
	$username = isset($_COOKIE[$rp_cookie]) ? $_COOKIE[$rp_cookie] : '';
	$password = isset($_COOKIE[$cookie_name]) ? $_COOKIE[$cookie_name] : '';
	if ($_POST) {        
		$username = isset($_POST['username']) ? $_POST['username'] : (isset($_COOKIE[$rp_cookie]) ? $_COOKIE[$rp_cookie] : '');
		$password = isset($_POST['password']) ? $_POST['password'] : (isset($_COOKIE[$cookie_name]) ? $_COOKIE[$cookie_name] : '') ;

		$login_array = array();
		$login_array['user_login'] = $username;
		$login_array['user_password'] = $password;

		$page_redirect = 'my-account';
		if (isset($_SESSION['link_redirect_after_login']) && $_SESSION['link_redirect_after_login'] == 1){
            $page_redirect = 'checkout';
		}
		
		$verify_user = wp_signon($login_array, true);
		if (!is_wp_error($verify_user)) {
			if (in_array('administrator', (array) $verify_user->roles)) {
				echo "<script>window.location = '".site_url()."/wp-admin'</script>";
			} else {
				echo "<script>window.location = '".site_url()."/".$page_redirect."'</script>";
			}
			unset($_SESSION['link_redirect_after_login']);
			
		} else {
			// echo "<script>alert('Tên đăng nhập hoặc mật khẩu không đúng.')</script>";
		}
	
	} 
	get_header();
	?>
	<div class="wrap">
		<div class="login">
			<form action="" class="form-login" id="loginForm" method="POST">
				<h1>Đăng nhập</h1>
				<?php
					if (is_wp_error($verify_user)) {
						echo "<p class='error-msg'>Tên đăng nhập, email hoặc mật khẩu không chính xác!</p>";
					}
				?>
				<hr>

				<label for="username"><b>Tên đăng nhập hoặc Email</b></label>
				<input type="text" name="username" id="username" value="<?php echo $username ?>">

				<label for="password"><b>Mật khẩu</b></label>
				<input type="password" name="password" id="password" value="<?php echo $password ?>">

				<input type="submit" id="btn-submit" value="Đăng nhập">
				<p style="margin-bottom: 10px"><a href="/my-account/lost-password/">Quên mật khẩu ?</a></p>
				<p>Bạn chưa có tài khoản? <a href="/register">Đăng ký</a>.</p>
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