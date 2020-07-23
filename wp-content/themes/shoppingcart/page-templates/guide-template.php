<?php
/**
 * Template Name: Guide Template
 *
 * Displays the guide page template.
 *
 * @package Theme Freesia
 * @subpackage ShoppingCart
 * @since ShoppingCart 1.0
 */

get_header(); ?>
<div class="wrap">

<!-- <ul class="my-breadcrumb">
	<li></li>
</ul> -->
<?php woocommerce_breadcrumb(); ?>
<div id="guide-buy-page">
	<div class="title-page" id="gp_muahang">Hướng dẫn mua hàng</div>
	<div class="content-page">
		<div class="content-left">
			<ul>
				<li><a href="#gp_muahang"><i class="fa fa-heart"></i>Mua hàng</a></li>
				<li><a href="#gp_doitra"><i class="fa fa-heart"></i>Đổi trả</a></li>
				<li><a href="#gp_vanchuyen"><i class="fa fa-heart"></i>Vận chuyển</a></li>
			</ul>
		</div>
		<div class="content-right">
			<ul>
				<li>
					<span class="area-title">Cách thức mua hàng</span>
					<div class="par-item">Tìm kiếm sản phẩm<br>
					- Tìm từ danh sách sản phẩm<br>
					- Tìm từ trang TOP</div>

					<div class="par-item">Kiểm tra thông tin sản phẩm<br>
					- Xem thông tin chi tiết sản phẩm (giá cả, dung lượng, cách sử dụng...)<br>
					- Xem thông tin sản phẩm (phần mô tả)</div>

					<div class="par-item">Ấn nút “MUA HÀNG”<br>
					- Nhập số lượng</div>

					<div class="par-item">Đăng kí tài khoản<br>
					- Nhập các thông tin cần thiết như tên, tuổi, giới tính, số điện thoại, email...</div>

					<div class="par-item">Đăng nhập<br>
					- Nhập email và mật khẩu để đăng nhập.</div>

					<div class="par-item">Bổ sung các thông tin<br>
					- Địa chỉ<br>
					- Chọn cách thức thanh toán (Thanh toán khi giao hàng COD / Chuyển khoản)<br>
					- Mã phiếu giảm giá (nếu có)</div>

					<div class="par-item" id="gp_doitra">Kiểm tra thông tin ở trang “Thanh toán”<br>
					- Kiểm tra thông tin đã nhập<br>
					- Ấn nút “Đặt hàng”</div>
				</li>
				<li>
					<span class="area-title">Đổi trả</span>
					<div class="par-item">Điều kiện đổi trả<br>
					- Sản phẩm bị hỏng do lỗi nhà sản xuất<br>
					- Sản phẩm giao bị sai về mặt hàng, số lượng và mẫu mã sản phẩm so với đơn đặt hàng.</div>

					<div class="par-item">Thời hạn đổi trả<br>
					- Trong vòng 48 giờ kể từ khi quí khách nhận được hàng.</div>

					<div class="par-item">Qui trình đổi trả<br>
					- Liên lạc với Carico<br>
					- Gửi trả hàng về cho Carico<br>
					- Sau khi nhận được hàng trả về, chúng tôi sẽ đổi trả hàng hoặc hoàn tiền cho quí khách trong vòng 07 ngày làm việc.</div>

					<div class="par-item">Chi phí đổi trả<br>
					- Chúng tôi chịu hoàn toàn chi phí chỉ với các trường hợp đổi trả hàng thỏa “Điều kiện đổi trả”</div>

					<div class="par-item" id="gp_vanchuyen">Trường hợp không được đổi trả<br>
					- Chúng tôi từ chối yêu cầu nhận lại hàng đã giao và hoàn tiền với lí do khách hàng thay đổi ý định mua hàng.<br>
					* Tùy trường hợp, có thể sẽ bị xóa tài khoản thành viên.</div>
				</li>
				<li>
					<span class="area-title">Vận chuyển</span>
					<div class="par-item">Chi phí vận chuyển</div>

					<div class="par-item">Trong nội thành Tp.HCM: 30.000Đ/ đơn hàng<br>
					- Trừ các quận ABC</div>

					<div class="par-item">Trong nội thành Hà Nội: 40.000Đ/ đơn hàng<br>
					- Trừ các quận ABC</div>

					<div class="par-item">Khu vực khác<br>
					- Đà Nẵng<br>
					- Hải Phòng<br>
					- .......</div>

					<div class="par-item">Miễn phí vận chuyển<br>
					- Với các đơn hàng trên 500.000Đ<br>
					- Đang trong chương trình miễn phí giao hàng</div>
				</li>
			</ul>
		</div>
	</div>
</div>

</div>
<?php
get_footer();