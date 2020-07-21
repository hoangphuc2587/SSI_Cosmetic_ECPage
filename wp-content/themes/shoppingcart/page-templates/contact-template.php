<?php
/**
 * Template Name: Contact Template
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
	<div class="contact">
		<div class="container">
			<form action="" method="POST">
				<h1>LIÊN HỆ</h1>
				<p class="header-text">Vui lòng điền thông tin bên dưới để gửi câu hỏi về cho chúng tôi</p>
				<br>
				<div class="row">
					<div class="col-25">
						<label for="name"><i class="fa fa-heart"></i>&nbsp<b>Họ tên</b></label>
					</div>
					<div class="col-75">
						<input type="text" id="name" name="name" required>
					</div>
				</div>
				<div class="row">
					<div class="col-25">
						<label for="phone"><i class="fa fa-heart"></i>&nbsp<b>Số điện thoại</b></label>
					</div>
					<div class="col-75">
						<input type="text" id="phone" name="phone" required>
					</div>
				</div>
				<div class="row">
					<div class="col-25">
						<label for="email"><i class="fa fa-heart"></i>&nbsp<b>Email</b></label>
					</div>
					<div class="col-75">
						<input type="text" id="email" name="email" required>
					</div>
				</div>
				<div class="row">
					<div class="col-25">
						<label for="content"><i class="fa fa-heart"></i>&nbsp<b>Nội dung</b></label>
					</div>
					<div class="col-75">
						<textarea name="content" rows="5" required></textarea>
					</div>
				</div>
				<div class="row">
					<div class="col-25">
						<label for="policy"><i class="fa fa-heart"></i>&nbsp<b>Chính sách bảo mật</b></label>
					</div>
					<div class="col-75">
						<div class="policy">
							<a class="collapsible"><i class="fa fa-angle-down"></i></a>
							<div class="collapse">
								<ul>
									<li>
										Mục đích thu thập thông tin
										<div class="policy-info">
											<p>Việc thu thập dữ liệu khách hàng thực hiện chủ yếu trên Website này.</p>
											<p>Các thông tin: họ và tên, giới tính, ngày sinh, số điện thoại, email, địa chỉ.</p>
											<p>Mục đích:</p>
											<p>① Khách hàng bắt buộc đăng ký tài khoản để mua hàng.</p>
											<p>② Bán hàng và giao hàng.</p>
											<p>③ Xác định chính xác phần thanh toán và giao hàng cho khách.</p>
										</div>
									</li>
									<br>
									<li>
										Phạm vi sử dụng thông tin
										<div class="policy-info">
											<p>- Quản lí việc đặt hàng và giao hàng.</p>
											<p>- Thông báo về việc giao hàng.</p>
											<p>- Thực hiện thông báo và cập nhật các hoạt động tiếp thị, khuyến mãi, thông tin sản phẩm...</p>
											<p>- Giải quyết các yêu cầu, khiếu nại của khách hàng.</p>
											<p>- Chia sẻ thông tin liên lạc của khách hàng cho bộ phận giao hàng.</p>
										</div>
									</li>	
									<br>
									<li>
										Đơn vị quản lí thông tin
										<div class="policy-info">
											<p>CARICO CO., LTD</p>
											<p>579Yonezu-cho, Minami-ku, Hamamatsu-shi, Shizuoka</p>
											<p>079 2254402</p>
											<p>com_vn@cari-co.co.jp</p>
										</div>
									</li>
									<br>
									<li>
										Cam kết bảo mật thông tin cá nhân
										<div class="policy-info">
											<p>- Không sử dụng, không chuyển giao, cung cấp hay tiết lộ thông tin khi không có sự đồng ý của khách hàng. Trừ những trường hợp yêu cầu của các cơ quan pháp luật.</p>
											<p>- Trường hợp hệ thống bị xâm nhập dẫn đến mất dữ liệu hoặc lộ thông tin khách hàng, chúng tôi có trách nhiệm điều tra xử lí kịp thời và thông báo cho khách hàng được biết.</p>
											<p>- Chúng tôi không chịu trách nhiệm giải quyết mọi khiếu nại liên quan đến quyền lợi khách hàng nếu xét thấy các thông tin cá nhân của khách hàng cung cấp khi đăng kí ban đầu là không chính xác.</p>
										</div>
									</li>
								</ul>
								
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<input type="submit" class="btnSubmit" value='Đồng ý với "chính sách bảo mật" và gửi câu hỏi'>
				</div>
			</form>
		</div>
    </div>
</div><!-- end .wrap -->
<script>
	jQuery(".fa").on("click",function(){
		jQuery(this).toggleClass("fa-angle-down");
		jQuery(this).toggleClass("fa-angle-up");
	});	

	var coll = document.getElementsByClassName("collapsible");
	var i;

	for (i = 0; i < coll.length; i++) {
		coll[i].addEventListener("click", function() {
			this.classList.toggle("active");
			var content = this.nextElementSibling;
			if (content.style.display === "block") {
			content.style.display = "none";
			} else {
			content.style.display = "block";
			}
		});
	}
</script>
<?php
get_footer();
?>