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
define('DB_NAME', 'louisandco');

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
define('AUTH_KEY',         '|D&8XK?G;}+XEx}52]$$Q-C<b0`,TqXYv*H6v+,k:afoA2B+_lFA%.a?I29w|32X');
define('SECURE_AUTH_KEY',  'L-I<>+}-QRt<Sm^R;`iG?ku /MX!<$AF!-neCa,]1vF|RLfM/3iPTiBCQ$9DMb3m');
define('LOGGED_IN_KEY',    '=>jB/V9{U~Y>pGI|-keW-FtjFnX8=l%t~qyw!W=<qK&iP^dQ0yq+55gN,y(`vhNV');
define('NONCE_KEY',        '!V6&&+Sf|^I`bS?B1,Nf_LxKrtb=nr,89RJu#`{D(5-v^i+%*7U/_rS[.3V`YgU`');
define('AUTH_SALT',        ']hW7FCmYI-=nLg4cO#-n?@/+-uZ6S*o7Y% Ep@@60zQz-:v^9t9I(j+L=EC^%B<>');
define('SECURE_AUTH_SALT', '?}4lV_2Yh1XGsZ%NUTg!${>bQtzhh^u/G+Dmh <2 Z.lYW]q3/c7:1!>/m!P}wO1');
define('LOGGED_IN_SALT',   'Vjas,&~K/Cl9qp9:mal?{T>|z(Jq<:vSLC7VQD!2%2<M~f`0O 5q*@&+M&EIK{/c');
define('NONCE_SALT',       ')i%+PTS,^]<*PH-d6zmQ[x*/aVRUAW_*j]-yNBcZK7_FcB m-Cc&KPB_{4<)b>w^');

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
