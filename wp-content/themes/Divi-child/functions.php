<?php
// UNCOMMENT WHEN NEEDED --> error_reporting(E_ERROR | E_WARNING | E_PARSE);
// UNCOMMENT WHEN NEEDED --> require_once dirname(__FILE__).'/config.php';

//// Sets a Default Profile Photo
add_filter( 'avatar_defaults', 'default_gravatar' );
function default_gravatar ($avatar_defaults) {
	$myavatar = get_stylesheet_directory_uri().'/gravatar.png';
	//$myavatar = get_site_url().'/wp-content/uploads/gravatar.png';
	$avatar_defaults[$myavatar] = "Sunset Yarn Gravatar";
	return $avatar_defaults;
}
//// Sets Custom Footer on Admin Side
add_filter('admin_footer_text', 'change_admin_footer');
function change_admin_footer() {
	echo '<span id="footer-note">Copyright ' . date('Y') . ' <a href="'. home_url() .'" target="_blank">Sunset Yarn, LLC</a>.</span>';
}
//// Loads Child Stylesheet
add_action( 'wp_enqueue_scripts', 'load_stylesheets');
function load_stylesheets() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'parent-style' ) );
}
?>
<?php
//// Login Page Redirect
/*
add_filter( 'login_redirect', 'acme_login_redirect', 10, 3 );
function acme_login_redirect( $redirect_to, $request, $user  ) {
	return ( is_array( $user->roles ) && in_array( 'administrator', $user->roles ) ) ? admin_url() : site_url('/members-area/');
}
*/

//// WordPress Login, Registration, and Forgot Password Screen Style Sheet START
//add_filter( 'login_headerurl', 'my_login_logo_url' );
function my_login_logo_url() {
    return home_url();
}

//add_filter( 'login_headertitle', 'my_login_logo_url_title' );
function my_login_logo_url_title() {
    return 'Sunset Yarn, LLC';
}

//add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );
function my_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/style-login.css' );
    wp_enqueue_script( 'custom-login', get_stylesheet_directory_uri() . '/style-login.js' );
}
//// WordPress Login, Registration, and Forgot Password Screen Style Sheet END
?>

<?php
// Adds Google Analytics Code
//add_action('wp_head', 'add_googleanalytics');
function add_googleanalytics() { ?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<!--
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-XXXXXXXX-X"></script>
<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());
	gtag('config', 'UA-XXXXXXXX-X');
</script>
-->
<?php } ?>
