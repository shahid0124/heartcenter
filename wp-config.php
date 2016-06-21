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
define('DB_NAME', 'heartcenter');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         '!*bu[tiY+,L%Wf&<B3 /,O|is_B0lB~^i4`|b>yaKw1a.ra;X66c%!^M_NcI}hpw');
define('SECURE_AUTH_KEY',  'yEM+UR#gQ??~m/YI5U+LKPXl]vkB)nA#s^(YS8I(y(+S*/jx1}]lYX%_v@$d#^5a');
define('LOGGED_IN_KEY',    'bJi& P[5POUDSc>vxc##5N&d+W1ex5*<|3O2K%DK2`Y>SNCVFz%9LzjPhC&{/e7*');
define('NONCE_KEY',        'O9Lk0_/Puh6K_b[Yj-!]QNhDWT)$ IOWA-|Gdxa# yLp_{<5#I5[[-_<LQ$6&Dlf');
define('AUTH_SALT',        'YLAB6nT8VZw7-LLJ7ug}?({rpM4[2nr@<[C8&i16P#qs*yP`#MQunc<5E[]nRxwp');
define('SECURE_AUTH_SALT', 'kks?yTp0IVMqUx,)xySZ+Jw)Hde>!Jk|&Pz(`)1?(0nd|d@tP@=1bdy5w954*/Ln');
define('LOGGED_IN_SALT',   'wHaHpG^1!$tNW3rjC.f[{`$/m8-Z,-1B:j4-j|J?,&+*+3XLz5@?dcy[KMA`~q`i');
define('NONCE_SALT',       'HA;8~&6M)V1pzw[HI$?r$eG *E-^;OWm=Oemmgy~iCX}ThzPcauxFR8_R`sz/=gp');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp';

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
