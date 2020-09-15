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
define( 'DB_NAME', 'ssi_cosmetic' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
//define( 'DB_HOST', '192.168.2.200' );
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
define( 'AUTH_KEY',         '>/7u+I:_y0UFq]z9Jc8F2fxVt ~+YZ3*TSc!&BbS]:K|~JZ>rmU*=CL?Y7wOUlN7' );
define( 'SECURE_AUTH_KEY',  'dVE?`u,q($xjgcDNsZ6 Dr.r=H>SJN[8l|JUNJOQ{:y!e3[NV{X# @)qnAsC3l5]' );
define( 'LOGGED_IN_KEY',    '!`n^K?39_i92dPmSF/Fu&alP86J`=SS4N.&-xr`4a7J.H|?R}H}8.at@-1oVc5]$' );
define( 'NONCE_KEY',        'AR>@MwY;|dt<x2n$(>@j0C6%j<8~zKiqAC?1MT _0ULqbQA,apg1I[2&ElAH8)Yb' );
define( 'AUTH_SALT',        '*@c!8n?2773R&<o%Ps#YnDA<BS363gpV`3COM+h V1b,yDF}?wb%y2e9UD9Sqe;*' );
define( 'SECURE_AUTH_SALT', '|VK8BEvLb`r;|fMl!Z#}k^{KM`rabkcPMH1uqp&U()MB|4~FH+; Ml4MKIh%7)Y?' );
define( 'LOGGED_IN_SALT',   'vppa@gv*K pDyuC@_ZGziNt<n%@}aVd;RyYW/-Q,rA>#GF7H{w5w?)$LE]$^]]-M' );
define( 'NONCE_SALT',       '`}:Unf&XzZ5rsE>}16sPQ6)X]5p4$Q-hl@BH!2$A$%_Djq/#,p}qPBHwJD3[s?.Y' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
