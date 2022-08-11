<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
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
define( 'DB_NAME', 'dailyinf_blog' );
/** MySQL database username */
define( 'DB_USER', 'dailyinf_wpkhush' );
/** MySQL database password */
define( 'DB_PASSWORD', 'Khush@111' );
/** MySQL hostname */
define( 'DB_HOST', 'localhost' );
/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );
/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );
/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'q? ja#2y0zLZYGX4%X&<*+CY9{w0}B:<SAX]:8$9ZS+X$:u|2f`Xl]~bI8[[R4^_' );
define( 'SECURE_AUTH_KEY',  'mC?~CwHb8~]Kq#IqE(4=(*3q!#cw!{A$DxrP(yRSM]e@@&9rX1J)nc^U4uTE5}f#' );
define( 'LOGGED_IN_KEY',    'P~GzWe4~Gxv1Q G/ZRMGqan= ewxGb^E*|{JVc#zFtjN#oLzAZ)(Vt5KgUil.,j<' );
define( 'NONCE_KEY',        'XOh9p#@-;LIzk25[sSg14!u)II`QA>-jLo8TEU/&Yg-=C1$=I@WXq3x(2/i3ay->' );
define( 'AUTH_SALT',        'x,c3Z.GWe,nyD@w]_1 ~y#$4%b;GSTkwxStl6(Si|XUQ5ll1=|E+E<:8Cd$R1JvD' );
define( 'SECURE_AUTH_SALT', 'vuQyQ90$1+1Tr2DAv%rt|J38C-.a6M.a7dX+,Q{[R39uR^6^ulk|tO@KV=<kRNSn' );
define( 'LOGGED_IN_SALT',   '<_QiNlt%qV3_P{{g1zc1r-jZ1ym0Zzm[Cc+%P[.//wJyQDmxt{a8yzcLB7Lrk^JB' );
define( 'NONCE_SALT',       '@mc9ub3I0Q54,~b|y8g|hQQ!/y!ZvPjtc|(R>L2fju)BQf2Ta_T?JxQh6j 3@77A' );
/**#@-*/
/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';
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
/* Add any custom values between this line and the "stop editing" line. */
/* That's all, stop editing! Happy publishing. */
/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}
/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';