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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'ssi_cosmetic');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'WGvP8f~2|*dZKdmuzYHD|)sBNRd;|r2|`~#S8+OzK2Wm1sE1vR{wz}hr)C-T@(>(');
define('SECURE_AUTH_KEY',  '+a/Zdu~NLd2;)da?~]f&e&>A6$o:y`]:wy,xFMug)PiCYb9k}]$q(7dgBTq^ZQOQ');
define('LOGGED_IN_KEY',    'yf^-1Ya?oJp%G$L$S6.vO~TpK@vkNQL^.e9)Yc-UmRyh`6~]SX u?ql7eo.lJDpX');
define('NONCE_KEY',        ';K_<hiM]?TH`qReg*n5$HgLTy0JBbI]<_bv,RTUkH2%V{R@]g^G2rWHws,.AD+<r');
define('AUTH_SALT',        '9r!o9l`+R2;Y:#Vba6^j2YGb<#]]odyjt![aOp$s|s#uw*vSYbN7V}@dr7_?v#Na');
define('SECURE_AUTH_SALT', '25CpqCfxjLCwY5Kf%#=sOMyQ6Co.KAFn`Yho*H!Gj>n^JpW[=8-JM7XjqDY{Obb1');
define('LOGGED_IN_SALT',   'nZPej<YYAnWlW#S1(x$6J2mM&mCI8<*Ia>a-ug+=JZk`ju}x.+,pzB(8RkCYywD:');
define('NONCE_SALT',       '<Lq-780OT]Fmhz?a|F4SMOto3*Md$8iMu@Oh-s^.sa;=(tn5Zd!Jn6R|3,C|yeP0');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
