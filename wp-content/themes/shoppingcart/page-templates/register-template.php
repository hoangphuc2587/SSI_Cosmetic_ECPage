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
	$lastname 		= isset($_POST['lastname']) ? $_POST['lastname'] : '';
	$firstname 		= isset($_POST['firstname']) ? $_POST['firstname'] : '';
	$username 		= isset($_POST['username']) ? $_POST['username'] : '';
	$email 			= isset($_POST['email']) ? $_POST['email'] : '';
	$phone			= isset($_POST['phone']) ? $_POST['phone'] : '';
	$password 		= isset($_POST['password']) ? $_POST['password'] : '';
	$password_conf 	= isset($_POST['password-confirm']) ? $_POST['password-confirm'] : '';
	$gender 		= isset($_POST['gender']) ? $_POST['gender'] : '';
	$day 			= isset($_POST['bd-day']) ? $_POST['bd-day'] : '';
	$month1 		= isset($_POST['bd-month']) ? $_POST['bd-month'] : '';
	$year 			= isset($_POST['bd-year']) ? $_POST['bd-year'] : '';
	
	// validation
	$hasErr = false;
	if (trim($lastname) === '') {
		$lastname_err = "Vui lòng nhập họ";
		$hasErr = true;
	} 

	if (trim($firstname) === '') {
		$firstname_err = "Vui lòng nhập tên";
		$hasErr = true;
	} 

	if (trim($username) === '') {
		$username_err = "Vui lòng nhập tên đăng nhập";
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

	if ($gender == null) {
		$gender_err = "Vui lòng chọn giới tính";
		$hasErr = true;
	}

	if ($day == '0' || $month1 == '0' || $year == '0') {
		$birthday_err = "Vui lòng nhập chọn ngày sinh";
		$hasErr = true;
	}
	
	$userdata = array(
		'user_login' 	=> $username,
		'user_email' 	=> $email,
		'user_pass' 	=> $password,
		'user_phone'	=> $phone,
		'role' 			=> 'customer',
		'first_name'	=> $firstname,
		'last_name'		=> $lastname,
		'gender'		=> $gender,
		'birthday'		=> $day . "/" . $month1 . "/" . $year,
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
			<h1>Đăng ký</h1>
			<p>Vui lòng điền đầy đủ thông tin để tạo tài khoản.</p>
			<hr>

			<div class="customer-name">
				<div class="lastname-field">
					<label for="lastname"><b>Họ</b></label>
					<input type="text" name="lastname" id="lastname" placeholder="Nguyen" value="<?php echo $lastname ?>">
					<?php
						if (!empty($lastname_err)) echo "<span class='error-msg'>" . $lastname_err . "</span>";
					?>
				</div>
				<div>
					<label for="firstname"><b>Tên</b></label>
					<input type="text" name="firstname" id="firstname" placeholder="Van A" value="<?php echo $firstname ?>">
					<?php
						if (!empty($firstname_err)) echo "<span class='error-msg'>" . $firstname_err . "</span>";
					?>
				</div>
			</div>

			<label for="username"><b>Tên đăng nhập</b></label>
			<input type="text" name="username" id="username" placeholder="Nhập tên đăng nhập" value="<?php echo $username ?>">
			<?php
				if (is_wp_error($result) && $result->get_error_code() == 'empty_user_login') {
					echo "<span class='error-msg'>Vui lòng nhập tên đăng nhập</span>";
				} else {
					if (!empty($username_err)) echo "<span class='error-msg'>" . $username_err . "</span>";
				}
				if (is_wp_error($result) && $result->get_error_code() == 'user_login_too_long') {
					echo "<span class='error-msg'>Username không được quá 60 ký tự</span>";
				}
				if (is_wp_error($result) && $result->get_error_code() == 'existing_user_login') {
					echo "<span class='error-msg'>Rất tiếc, Tên đăng nhập đã tồn tại!</span>";
				}
			?>

			<label for="email"><b>Email</b></label>
			<input type="text" name="email" id="email" placeholder="Nhập email" value="<?php echo $email ?>">
			<?php
				if (is_wp_error($result) && $result->get_error_code() == 'existing_user_email') {
					echo "<span class='error-msg'>Rất tiếc, Email đã tồn tại!</span>";
				} else {
					if (!empty($email_err)) echo "<span class='error-msg'>" . $email_err . "</span>";
				}
				
			?>

			<label for="phone"><b>SĐT</b></label>
			<input type="text" name="phone" id="phone" placeholder="Nhập số điện thoại" value="<?php echo $phone ?>">
			<?php
				if (!empty($phone_err)) echo "<span class='error-msg'>" . $phone_err . "</span>";
			?>

			<label for="password"><b>Mật khẩu</b></label>
			<input type="password" name="password" id="password" placeholder="Nhập mật khẩu" value="<?php echo $password ?>">
			<?php
				if (!empty($password_err)) echo "<span class='error-msg'>" . $password_err . "</span>";
			?>

			<label for="password-confirm"><b>Xác nhận mật khẩu</b></label>
			<input type="password" name="password-confirm" id="password-confirm" placeholder="Nhập lại mật khẩu" value="<?php echo $password_conf ?>">
			<?php
				if (!empty($password_conf_err))  echo "<span class='error-msg'>" . $password_conf_err . "</span>";
			?>

			<div class="gender">
				<label for="gender" class="gender-label"><b>Giới tính</b></label>
				<input type="radio" id="male" name="gender" value="male" <?php if ($gender === 'male') echo "checked" ?>>
				<label for="male" style="margin-right: 30px;">Nam</label>
				<input type="radio" id="female" name="gender" value="female" <?php if ($gender === 'female') echo "checked" ?>>
				<label for="female">Nữ</label><br>
			</div>
			<?php
				if (!empty($gender_err)) echo "<span class='error-msg'>" . $gender_err . "</span>";
			?>

			<div class="birthday">
				<label for="birthday" class="birthday-label"><b>Ngày sinh</b></label>
				<select id ="day" name = "bd-day" class="birthday-select birthday-day"></select>
				<input type="hidden" id="old-day" value="<?php echo $day ?>">
				<select id ="month" name = "bd-month" class="birthday-select" value="<?php echo $month1 ?>" onchange="change_month(this)"></select>
				<input type="hidden" id="old-month" value="<?php echo $month1 ?>">
				<select id ="year" name = "bd-year" class="birthday-select" value="<?php echo $year ?>" onchange="change_year(this)"></select>
				<input type="hidden" id="old-year" value="<?php echo $year ?>">
			</div>
			<?php
				if (!empty($birthday_err)) echo "<span class='error-msg'>" . $birthday_err . "</span>";
			?>

			<hr>
			<p>Khi bạn nhấn Đăng ký, bạn đã đồng ý thực hiện mọi giao dịch theo <a href="#">điều kiện sử dụng và chính sách của chúng tôi</a>.</p>
			<input type="submit" id="btn-submit" value="Đăng ký">	
			<p>Bạn đã có tài khoản? <a href="/login">Đăng nhập</a>.</p>
		</form>

		<script >
			var Days = [31,28,31,30,31,30,31,31,30,31,30,31]; // index => month [0-11]
			jQuery(document).ready(function() {

				var old_day = jQuery("#old-day").val();
				var old_month = jQuery("#old-month").val();
				var old_year = jQuery("#old-year").val();

				var option = '<option value="0"> Ngày </option>';
				var selectedDay = old_day != 0 ? old_day : "0";

				for (var i=1; i <= Days[0]; i++) {
					var text = i < 10 ? '0' + i : i;
					option += '<option value="'+ text + '">' + text + '</option>';
					
					
				}
				jQuery('#day').append(option);
				jQuery('#day').val(selectedDay);

				var option = '<option value="0"> Tháng </option>';
				var selectedMon = old_month != 0 ? old_month : "0";
				for (var i=1; i <= 12; i++){
					var text = i < 10 ? '0' + i : i;
					option += '<option value="'+ text + '">' + text + '</option>';
					
				}
				jQuery('#month').append(option);
				jQuery('#month').val(selectedMon);

				var d = new Date();
				var option = '<option value="0"> Năm </option>';
				selectedYear = old_year != 0 ? old_year : "0";
				for (var i = 1901; i <= d.getFullYear() - 1; i++) {
					option += '<option value="'+ i + '">' + i + '</option>';
				}
				jQuery('#year').append(option);
				jQuery('#year').val(selectedYear);
			});

			function change_year(select) {
				if (isLeapYear(jQuery(select).val())) {
					Days[1] = 29;
				}
				else {
					Days[1] = 28;
				}
				var day = jQuery('#day');
				var val = jQuery(day).val();
				jQuery(day).empty();
				var option = '<option value="0">Ngày</option>';
				for (var i=1; i <= Days[1]; i++) {
					var text = i < 10 ? '0' + i : i;
					option += '<option value="'+ text + '">' + text + '</option>';
				}
				jQuery(day).append(option);
				if( val > Days[1] )
				{
					val = "0";
				}
				jQuery(day).val(val);
			}

			function change_month(select) {
				var day = jQuery('#day');
				var val = jQuery(day).val();
				jQuery(day).empty();

				var option = '<option value="0">Ngày</option>';
				var month = parseInt(jQuery(select).val()) - 1;
				for (var i=1; i <= Days[month]; i++){ 
					var text = i < 10 ? '0' + i : i;
					option += '<option value="'+ text + '">' + text + '</option>';
				}

				jQuery(day).append(option);
				if (val > Days[month]) {
					val = '0';
				}
				jQuery(day).val(val);
			}

			function isLeapYear(year) {
				year = parseInt(year);
				if (year % 4 != 0) {
					return false;
				} else if (year % 400 == 0) {
					return true;
				} else if (year % 100 == 0) {
					return false;
				} else {
					return true;
				}
			}
		</script>
    </div>

</div><!-- end .wrap -->
<?php
get_footer();