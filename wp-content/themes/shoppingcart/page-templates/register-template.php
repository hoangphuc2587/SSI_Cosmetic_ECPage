<?php
/**
 * Template Name: Register Template
 *
 * @package Theme Freesia
 * @subpackage ShoppingCart
 * @since ShoppingCart 1.0
 */

get_header();

if ($_POST) {
	
	$username 		= isset($_POST['username']) ? $_POST['username'] : '';
	$email 			= isset($_POST['email']) ? $_POST['email'] : '';
	$phone			= isset($_POST['phone']) ? $_POST['phone'] : '';
	$password 		= isset($_POST['password']) ? $_POST['password'] : '';
	$password_conf 	= isset($_POST['password-confirm']) ? $_POST['password-confirm'] : '';
	
	// validation
	$hasErr = false;
	if (trim($username) === '') {
		$username_err = "Vui lòng nhập username";
		$hasErr = true;
	} 

	if (trim($email) === '') {
		$email_err = "Vui lòng nhập email";
		$hasErr = true;
	} else if (!is_email($email)) {
		$email_err = "Email không đúng định dạng";
		$hasErr = true;
	}

	if (trim($phone) === '') {
		$phone_err = "Vui lòng nhập số điện thoại";
		$hasErr = true;
	} else {
		// check phone valid
		if (!isPhoneNumber($phone)) {
			$phone_err = "Số điện thoại không hợp lệ";
			$hasErr = true;
		} else {
			// check phone existed
			if (isPhoneNumberExist($phone)) {
				$phone_err = "Số điện thoại đã tồn tại";
				$hasErr = true;
			}
		}

	}
	

	if (trim($password) === '') {
		$password_err = "Vui lòng nhập mật khẩu";
		$hasErr = true;
	} else {
		if (trim($password_conf) === '') {
			$password_conf_err = "Vui lòng nhập lại mật khẩu";
			$hasErr = true;
		} else {
			if (strcmp($password, $password_conf) !== 0) {
				$password_conf_err = "Mật khẩu không trùng khớp";
				$hasErr = true;
			}
		}
	}
	
	$userdata = array(
		'user_login' 	=> $username,
		'user_email' 	=> $email,
		'user_pass' 	=> $password,
		'user_phone'	=> $phone,
		'role' 			=> 'customer'
	);

	if (!$hasErr) {
		$result = wp_insert_user($userdata);
		if (!is_wp_error($result) && $result) {
			echo "<script>window.location = '".site_url()."/login'</script>";
		} 
	}
}
?>

<div class="wrap">
	<div class="register">
		<form action="" id="registerUserForm" class="form-register" method="POST">
			<h1>Register</h1>
			<p>Please fill in this form to create an account.</p>
			<hr>

			<label for="username"><b>Username</b></label>
			<input type="text" name="username" id="username" placeholder="John" value="<?php echo $username ?>">
			<?php
				if (is_wp_error($result) && $result->get_error_code() == 'empty_user_login') {
					echo "<span class='error-msg'>Vui lòng nhập Username</span>";
				} else {
					if (!empty($username_err)) echo "<span class='error-msg'>" . $username_err . "</span>";
				}
				if (is_wp_error($result) && $result->get_error_code() == 'user_login_too_long') {
					echo "<span class='error-msg'>Username không được quá 60 ký tự</span>";
				}
				if (is_wp_error($result) && $result->get_error_code() == 'existing_user_login') {
					echo "<span class='error-msg'>Xin lỗi, Username đã tồn tại!</span>";
				}
			?>

			<label for="email"><b>Email</b></label>
			<input type="text" name="email" id="email" placeholder="john@doe.com" value="<?php echo $email ?>">
			<?php
				if (is_wp_error($result) && $result->get_error_code() == 'existing_user_email') {
					echo "<span class='error-msg'>Xin lỗi, Email đã tồn tại!</span>";
				} else {
					if (!empty($email_err)) echo "<span class='error-msg'>" . $email_err . "</span>";
				}
				
			?>

			<label for="phone"><b>Phone</b></label>
			<input type="text" name="phone" id="phone"  value="<?php echo $phone ?>">
			<?php
				if (!empty($phone_err)) echo "<span class='error-msg'>" . $phone_err . "</span>";
			?>

			<label for="password"><b>Password</b></label>
			<input type="password" name="password" id="password" value="<?php echo $password ?>">
			<?php
				if (!empty($password_err)) echo "<span class='error-msg'>" . $password_err . "</span>";
			?>

			<label for="password-confirm"><b>Confirm password</b></label>
			<input type="password" name="password-confirm" id="password-confirm" value="<?php echo $password_conf ?>">
			<?php
				if (!empty($password_conf_err))  echo "<span class='error-msg'>" . $password_conf_err . "</span>";
			?>
			<hr>

			<p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

			<input type="submit" id="btn-submit" value="Register">	

			<p>Already have an account? <a href="/login">Sign in</a>.</p>
		</form>
    </div>

</div><!-- end .wrap -->
<?php
get_footer();