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
	$uname 		= isset($_POST['uname']) ? $_POST['uname'] : '';
	$phone		= isset($_POST['phone']) ? $_POST['phone'] : '';
	$email 		= isset($_POST['email']) ? $_POST['email'] : '';
	$content	= isset($_POST['content']) ? $_POST['content'] : '';

	// validation
	$hasErr = false;
	if (trim($uname) === '') {
		$name_err = "Vui lòng nhập họ tên";
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
		} 
	}

	if (trim($email) === '') {
		$email_err = "Vui lòng nhập email";
		$hasErr = true;
	} else if (!is_email($email)) {
		$email_err = "Email không đúng định dạng";
		$hasErr = true;
	}

	if (trim($content) === '') {
		$content_err = "Vui lòng nhập nội dung";
		$hasErr = true;
	} 

	$meta_data = array(
		'name' 	=> $uname, 
		'phone' => $phone
	);

	$postarr = array(
		'post_title' 	=> $email,
		'post_content'	=> $content,
		'post_type' 	=> 'contacts',
		'post_status'	=> 'publish',
		'meta_input'	=> $meta_data
	);

	if (!$hasErr) {
		$result = wp_insert_post($postarr);
		if (!is_wp_error($result) && $result != 0) {
			$success_msg = 'Gửi câu hỏi thành công!';
		} else {
			$error_msg = 'Gửi câu hỏi không thành công!';
		}
	}

}
?>

<div class="wrap">
	<?php woocommerce_breadcrumb(); ?>
	<div class="contact">
		<div class="container">
			<form action="" id="contactForm" method="POST">
				<div class="title-page">LIÊN HỆ</div>
				<?php
					if (!empty($success_msg)) {
						echo "<span class='success-msg'>" . $success_msg . "</span>";
					} else {
						if (!empty($error_msg)) {
							echo "<span class='error-msg-fail'>" . $error_msg . "</span>";
						} else {
							echo "<p class='header-text'>Vui lòng điền thông tin bên dưới để gửi câu hỏi về cho chúng tôi</p>";
						}
					}
				?>
				
				<br>
				<div class="row">
					<div class="col-25">
						<label for="uname"><i class="fa fa-heart"></i>&nbsp<b>Họ tên</b></label>
					</div>
					<div class="col-75">
						<input type="text" name="uname" value="<?php echo $uname ?>">
						<?php
							if (!empty($name_err)) echo "<span class='error-msg'>" . $name_err . "</span>";
						?>
					</div>
				</div>
				<div class="row">
					<div class="col-25">
						<label for="phone"><i class="fa fa-heart"></i>&nbsp<b>Số điện thoại</b></label>
					</div>
					<div class="col-75">
						<input type="text" name="phone" value="<?php echo $phone ?>">
						<?php
							if (!empty($phone_err)) echo "<span class='error-msg'>" . $phone_err . "</span>";
						?>
					</div>
				</div>
				<div class="row">
					<div class="col-25">
						<label for="email"><i class="fa fa-heart"></i>&nbsp<b>Email</b></label>
					</div>
					<div class="col-75">
						<input type="text" name="email" value="<?php echo $email ?>">
						<?php
							if (!empty($email_err)) echo "<span class='error-msg'>" . $email_err . "</span>";
						?>
					</div>
				</div>
				<div class="row">
					<div class="col-25">
						<label for="content"><i class="fa fa-heart"></i>&nbsp<b>Nội dung câu hỏi</b></label>
					</div>
					<div class="col-75">
						<textarea name="content" rows="5" ><?php echo $content ?></textarea>
						<?php
							if (!empty($content_err)) echo "<span class='error-msg'>" . $content_err . "</span>";
						?>
					</div>
				</div>
				<div class="row">
					<div class="col-25">
						<label for="policy"><i class="fa fa-heart"></i>&nbsp<b>Chính sách bảo mật</b></label>
					</div>
					<div class="col-75">
						<div class="policy">
							<a class="collapsible"><i class="fa fa-angle-up"></i></a>
							<div class="expand" >
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
                    <button type="submit" class="btnSubmit" >Đồng ý với "chính sách bảo mật" và gửi câu hỏi</button>
				</div>
			</form>
		</div>
    </div>
</div><!-- end .wrap -->
<script>
	jQuery(".collapsible").click(function() {
		jQuery(".fa-angle-up").toggleClass("fa-angle-down");
		jQuery(".expand").toggleClass("collapse");
	});
</script>
<?php
get_footer();
?>