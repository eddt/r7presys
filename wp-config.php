<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'r7wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'shiva69');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '#M#]_+=qB91)2xM[M`<5{NQI_i)hSoEw++-PyMBX/t *@?sn(US&=5U5]vu1g56U');
define('SECURE_AUTH_KEY',  'R1onjPn2:C}>k-zCCrs8wSr<JL_>N`3~2csc5}FsEt4h*@1F?zVmkFt5}`Hf^`1h');
define('LOGGED_IN_KEY',    'u6_kHdt*:$+Y>p.UQgeZFy(e?seh?6gX-k*W-to*X(p~$o3A3G^Fo#_=xa%Sc!S=');
define('NONCE_KEY',        'rp[xp-Tg{li%yt6M:(`Wfuk,6DE,zXGBC8X4F>!T3S:g(A3Y[7=kw(bGw%.zR72~');
define('AUTH_SALT',        '0I6T`h3,?=2:hNw~mdQzVq)yJH-<]_v54~gi*>r9xqmq#95rYj_Eg|3#Y7yfaGs0');
define('SECURE_AUTH_SALT', 'sa:Yp~ick,j@2_{;b*<6](Sp~7Z<C%%~V3|!hEQ!tq,{C*f)PJLyy7U4d-2xYqz_');
define('LOGGED_IN_SALT',   'Zlg*8x/xutbVMK(|mkeH|cpE7kCkO!k}9JS4[<wTk;4kK~,,kEWp Bu(Xi$P+V((');
define('NONCE_SALT',       'LVfU,B@EdF87n YO37#mRT+IUjM|h:.9O{0{J#j^u`K@lT&5qm}eeSKgtZR^GLZ7');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
