<?php
// UNCOMMENT WHEN NEEDED --> error_reporting(E_ERROR | E_WARNING | E_PARSE);
// UNCOMMENT WHEN NEEDED --> require_once dirname(__FILE__).'/config.php';

//// Sets a Default Profile Photo
add_filter( 'avatar_defaults', 'default_gravatar' );
function default_gravatar ($avatar_defaults) {
	$myavatar = get_site_url().'/wp-content/uploads/gravatar.jpg';
	$avatar_defaults[$myavatar] = "Custom Gravatar";
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
add_filter( 'login_headerurl', 'my_login_logo_url' );
function my_login_logo_url() {
    return home_url();
}

add_filter( 'login_headertitle', 'my_login_logo_url_title' );
function my_login_logo_url_title() {
    return '[Company Name]';
}

add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );
function my_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/style-login.css' );
    wp_enqueue_script( 'custom-login', get_stylesheet_directory_uri() . '/style-login.js' );
}
//// WordPress Login, Registration, and Forgot Password Screen Style Sheet END

//// Hides Menu Items on the Left Side of the WP Admin Page START
// UNCOMMENT WHEN NEEDED --> add_action( 'admin_menu', 'wpmania_custom_menu_page_removing', 999 );
function wpmania_custom_menu_page_removing() {
	if ( is_admin() && ! current_user_can( 'administrator' ) && ! ( defined( 'DOING_AJAX' ) && DOING_AJAX ) ) {
		remove_menu_page( 'index.php' ); //Dashboard
		//remove_menu_page( 'jetpack' ); //Jetpack*
		// remove_menu_page( 'edit.php' ); //Posts
		// remove_menu_page( 'upload.php' ); //Media
		// remove_menu_page( 'edit.php?post_type=page' ); //Pages
		// remove_menu_page( 'edit-comments.php' ); //Comments
		// remove_menu_page( 'themes.php' ); //Appearance
		// remove_menu_page( 'plugins.php' ); //Plugins
		// remove_menu_page( 'users.php' ); //Users
		// remove_menu_page( 'tools.php' ); //Tools
		// remove_menu_page( 'options-general.php' ); //Settings
	}
}
//// Hides Menu Items on the Left Side of the WP Admin Page END

//// WordPress Custom Registration Screen START
/// Add New Form Fields
// UNCOMMENT WHEN NEEDED --> add_action( 'register_form', 'myplugin_register_form' );
function myplugin_register_form() {
	// Additional Custom Classes
	//  $MainClass = new MainClass();
	$first_name = ( ! empty( $_POST['first_name'] ) ) ? trim( $_POST['first_name'] ) : '';
?>
	<p style="display:inline-block; width:40%">
		<label for="first_name"><?php _e( 'First Name', 'mydomain' ) ?><br />
		<input type="text" name="first_name" id="first_name" class="input" value="<?php echo esc_attr( wp_unslash( $first_name ) ); ?>" maxlength="24" /></label>
	</p>
	<p style="display:inline-block; width:60%">
		<label for="member_area"><?php _e( 'Member Area', 'mydomain' ) ?><br />
		<select name="member_area" id="member_area" class="input">
			<?php
				// foreach ($MainClass->GlobalClass->MemberAreasArray() as $key => $value) { echo '<option value="'.$key.'">'.$value.'</option>'; }
			?>
		</select>
		</label>
	</p>
<?php
}
/// Form Validation
// UNCOMMENT WHEN NEEDED --> add_filter( 'registration_errors', 'myplugin_registration_errors', 10, 3 );
function myplugin_registration_errors( $errors, $sanitized_user_login, $user_email ) {
	if ( empty( $_POST['first_name'] ) || ! empty( $_POST['first_name'] ) && trim( $_POST['first_name'] ) == '' ) {
		$errors->add( 'first_name_error', __( '<strong>ERROR</strong>: Please enter your first name.', 'mydomain' ) );
	}
	return $errors;
}
/// Insert Info Into Database Table UserMeta
// UNCOMMENT WHEN NEEDED --> add_action( 'user_register', 'myplugin_user_register' );
function myplugin_user_register( $user_id ) {
	$first_name = ( ! empty( $_POST['first_name'] ) ) ? trim( $_POST['first_name'] ) : '';
	
	if ( ! empty( $_POST['first_name'] ) ) {
		update_user_meta( $user_id, 'first_name', trim( $_POST['first_name'] ) );
	}
}
//// WordPress Custom Registration Screen END

//// Displays Custom User Information START
// UNCOMMENT WHEN NEEDED --> add_action('show_user_profile', 'custom_user_profile_fields', 10, 1);
// UNCOMMENT WHEN NEEDED --> add_action('edit_user_profile', 'custom_user_profile_fields', 10, 1);
function custom_user_profile_fields($profileuser) {
	$MainClass = new MainClass();
?>
	<table class="form-table">
		<tr>
			<th><label for="job_title"><?php _e('Job Title'); ?></label></th>
			<td>
				<input type="text" name="job_title" id="job_title" value="<?php echo esc_attr( get_the_author_meta( 'job_title', $profileuser->ID ) ); ?>" class="regular-text" />
				<br><span class="description"><?php _e('', 'text-domain'); ?></span>
			</td>
		</tr>
		<tr>
			<th><label for="department"><?php _e('Fire Department'); ?></label></th>
			<td>
				<select name="department" id="department">
				<?php
					foreach ($MainClass->GlobalClass->DepartmentsArray() as $key => $value) { 
						if ( $key == esc_attr( get_the_author_meta( 'department', $profileuser->ID ) ) ) {
							echo '<option value="'.$key.'" selected="selected">'.$value.'</option>';
						} else {
							echo '<option value="'.$key.'">'.$value.'</option>';
						} 
					}
				?>
				</select>
				<br><span class="description"><?php _e('', 'text-domain'); ?></span>
			</td>
		</tr>
	</table>
<?php 
} 
//// Displays Custom User Information END
/// Updates Custom User Information in the Database
// UNCOMMENT WHEN NEEDED --> add_action('personal_options_update', 'update_extra_profile_fields'); 
function update_extra_profile_fields($user_id) {
	if ( current_user_can('edit_user',$user_id) )
	{
		update_user_meta($user_id, 'job_title', $_POST['job_title']);
	}
}
//// WordPress Custom User Profile Screen END
?>



<?php
// Adds Google Analytics Code
add_action('wp_head', 'add_googleanalytics');
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