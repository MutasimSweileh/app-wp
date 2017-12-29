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
 //$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
 $url = parse_url(getenv('JAWSDB_URL'));
 $server = $url["host"];
 $username = $url["user"];
 $password = $url["pass"];
 $database = substr($url["path"], 1);
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', $database);

/** MySQL database username */
define('DB_USER', $username);

/** MySQL database password */
define('DB_PASSWORD', $password);

/** MySQL hostname */
define('DB_HOST', $server);

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');
//define('FORCE_SSL_ADMIN', true);

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '*1:ab-4RuKAR=$#JsIge_++LwrfQv/x1M<>#7dS0uagw/8h}Y13J[yNfY99k}-_2');
define('SECURE_AUTH_KEY',  'RICodK}l+9m>pE1bGQ9(V009Rl+j-8KlS?,zj lY#B9TU|6-uy,P)r{=94E.+$Tf');
define('LOGGED_IN_KEY',    'jE^+q>hDEDVJ1m-~ ~zQP<m ~+4q><Fx8K:RC]BP*9uQI5gh<dO(Af=?3wwa&ucE');
define('NONCE_KEY',        'E=cr*[X}h}Dh;IUWmqnmJ-1u(lpHcB!iloa$;-|E7(8>8evavH2l1B)6Ar[m$DFi');
define('AUTH_SALT',        'u0Gu`j{B%f#X|d5~7F3IJ3+<W gSt+Xeu@p<WQMlj|59IumGc3@4_!$?TE:sUM]O');
define('SECURE_AUTH_SALT', 'A$9?FzM+j5R(Y/J!TC+fm!>7M6:abmTk_+~WY`[hCYp 7uP_yt #FI*bjdl|EVs1');
define('LOGGED_IN_SALT',   'MojI+{O&Ll34bp-`M%ER9;#-LtZND=EpF?PDn&A+(WP?FV60}F{L=Y9l0 oLqg+f');
define('NONCE_SALT',       '/2<%pn4JM`JYIEc_!b*TK+|[bPx.0WIXGe&A%gZ6+3DL+z`g8QqiPcU{H`q>=!.$');

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
if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(__FILE__) . '/');
}

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
