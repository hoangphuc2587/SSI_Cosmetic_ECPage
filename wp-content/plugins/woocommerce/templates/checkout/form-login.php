<?php
/**
 * Checkout login form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.8.0
 */

defined( 'ABSPATH' ) || exit;

if ( is_user_logged_in() || 'no' === get_option( 'woocommerce_enable_checkout_login_reminder' ) ) {
	return;
}

global $user_ID;

if (!$user_ID) {
    // user in logged out state
    if (!session_id()) {
    session_start();
    }
    $_SESSION['link_redirect_after_login'] = 1;
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
        
        $verify_user = wp_signon($login_array, true);
        if (!is_wp_error($verify_user)) {
            if (in_array('administrator', (array) $verify_user->roles)) {
                echo "<script>window.location = '".site_url()."/wp-admin'</script>";
            } else {
                echo "<script>window.location = '".site_url()."/checkout'</script>";
            }
            unset($_SESSION['link_redirect_after_login']);
            
        } else {
            // echo "<script>alert('Tên đăng nhập hoặc mật khẩu không đúng.')</script>";
        }
    
    } 
    get_header();
    ?>
    <style type="text/css">
        .page-header{
            display: none !important;
        }

        #content{
            padding-bottom: 0px !important;
        }

    </style>
    <div class="wrap">
        <div class="login">
            <form action="" class="form-login" id="loginForm" method="POST">
                <h5 style="color:#ff0000;text-align: center;font-size: 16px;">Bạn phải đăng nhập để thanh toán.</h5>
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
                <p style="margin-bottom: 10px;"><a style="text-decoration: none;" href="/my-account/lost-password/">Quên mật khẩu ?</a></p>
                <p>Bạn chưa có tài khoản? <a style="text-decoration: none;" href="/register">Đăng ký</a>.</p>
            </form>
        </div>
    </div><!-- end .wrap -->    
    <?php
    get_footer();

    
} else {
    // user in logged in state
    echo "<script>window.location = '".site_url()."/checkout'</script>";
}

