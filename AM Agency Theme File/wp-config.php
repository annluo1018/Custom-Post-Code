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
define( 'DB_NAME', 'AM Agency' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         '135cLUpE|GnK~`lLN_//#w[rDS}pG_YGnVS%-!$(^yhTQ}o`=,kbE07n%4^vE_^`' );
define( 'SECURE_AUTH_KEY',  'm0dB51*chT6JiK,y=Y(# W8v63rcm5:YGt4p7OtV7<)1 s99g#=5Dl$;rm&n9q(P' );
define( 'LOGGED_IN_KEY',    'XJkVKy9q@5@Y2N-S>/;PRcOH{ AU~`a_^x#dmZAmUl &gT5`rS9~=K{U!R{+jg*0' );
define( 'NONCE_KEY',        't&`8yP]g=PRBYRvL6g/^kXkzyy4J,<DB@XT^S)z,?lSy8MN__<fLSatc~?2:b=6c' );
define( 'AUTH_SALT',        'H$?-yt`HJWpw t@ fl;gA11GMVV3K]GvEGE|E/LV{azu~/[SqdVjBArrLEK0az*c' );
define( 'SECURE_AUTH_SALT', 'Zq&yf?cZ,p)3:o/]L&<3|r/oX&*U{gCZSOmRX=%UFj&9E7pB]x3Q eO`Vn/uL[H]' );
define( 'LOGGED_IN_SALT',   'E,LS8B(09pVn?No~_wDbnJE_*9QpMv*|/Ms`wotG=w{^,wZ%nE2xhqF:GSo~^U8w' );
define( 'NONCE_SALT',       'uD9j<j| )OQu)P_:J,red UNcd|FH:Lu`$VsUyE5bJG`?-Kf$#$%?c^>_O2yaR8F' );

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
