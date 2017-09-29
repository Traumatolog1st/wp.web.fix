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
define('DB_NAME', 'js.web');

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
define('AUTH_KEY',         'Rgal+]e[VnD!A]-y,ju}[YP@jPf.x,IN^I,axpfc}|~M{Q.Ryqo+3VAfYF?qNqKc');
define('SECURE_AUTH_KEY',  'bluPwl%!a0Acf2n?.trK&Ze*w#loR(}ECULWRM(9lN>~n2=[H]zL=+xX2dkx;0Kg');
define('LOGGED_IN_KEY',    'l(qhS(sGvh[_k#H@}xN(w>NBT?BEeWzpgAHWgi<0ycDgdOsW=B(LS|Si}.C1[_|B');
define('NONCE_KEY',        '=Rx;:cEGud3UHCa6CrIVz,]8~4cs]6/?U]yg*qKjmxS4W(!8ue&&<ai]=*h;Um!:');
define('AUTH_SALT',        'I>7/m}wv?Ig0SmhO_^_qln0G i@3C;_{t;(0,Kv/LXN&tNKX?$9d}1?_V{KiuR? ');
define('SECURE_AUTH_SALT', '^,v<bN?}OWtX2NG*]!P_Ob<iYWInM|-vX. &xs;@A^$0b1C6.:<UY=U;m:JVR#[[');
define('LOGGED_IN_SALT',   ']w5_Ji+8sfWm/ILla]a&7Dfh x9dnUs?&HVR4lHFFLqfUrsBP2DND4Vmh>CN4 G<');
define('NONCE_SALT',       'a$:C(wa,)6e,RWEg@g#+Ia;9]k~Ckg0k)<$ O|qQ>uo|Qgt}U&iG/k:}8j<L@P+b');

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