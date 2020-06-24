<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'sunsetyarn' );

/** MySQL database username */
define( 'DB_USER', 'sunset' );

/** MySQL database password */
define( 'DB_PASSWORD', 'Suns3tY@rn' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '30T(CMNdD*A_;mnL.~Q|E>04Xh,uwgrH5n=l0k<q@NO2)6_yJF||Li)+2T#bF8hg' );
define( 'SECURE_AUTH_KEY',  'Oc2H<,oL0Ol#W_EobMSP+Y94s,m7,Vlve]3u(/Q!11j?OA+sT[Z_R|mVDS3AMh,R' );
define( 'LOGGED_IN_KEY',    'b.ZzV/0MYg=F Qq-!pHC3RCEyK7hcZAMy;P@YK??J^h:gNr:@^9:W^--Q:c<Y3bg' );
define( 'NONCE_KEY',        '&!vl,ox4*_vj3S{=QR90j=${v+<lW!J)}0|JfCMr;a}6dz]XAk%qBfJGr&OZ}/7f' );
define( 'AUTH_SALT',        'SO.6CFbSm~_u_dD])H)7(?h6H>MFt:*xf!e/J+77):`{q6IW.f<<r]RKVh0V;=]B' );
define( 'SECURE_AUTH_SALT', '{TNRczW`,UL^#Trka:}1PmBDzpof(<vrLk_84%!^$%]H$UR:|;R/5W3n$]&,6|^P' );
define( 'LOGGED_IN_SALT',   '{~ToNj%!v[$Qtl@Eb}>Yc#XG;@KLEkSdU}:?(IT[h,1pee}0FevAkCSx9;{y)4{5' );
define( 'NONCE_SALT',       'NF;,SS+x5lV|3Y@om4dxRzaLm1#%:tfb*+k~YEl!!D%MdaEzS:,kjm]s};%E+jh)' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'sy_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
