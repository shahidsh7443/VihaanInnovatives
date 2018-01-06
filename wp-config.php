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
define('DB_NAME', 'vihaaninnovative');

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
define('AUTH_KEY',         'gaxP/qXS7;S!AI?`F)e2P*1)_4T)l^C`KM8VFN?fX=/u4TN,B?fNeAKLjZ|!/56L');
define('SECURE_AUTH_KEY',  '`0L U$2w>$v0nZ-QZx(%O_kL`l(|bpJD]dhigc?ZnO~ HOmr!ku)wFLz&?2/V,a;');
define('LOGGED_IN_KEY',    '<gK7C^WH.rTX>%wOF-^v|^y3grP06|VmYT[MoAFvv7r/J:u6u<FkT^l)8w-^+y)S');
define('NONCE_KEY',        'Op$L)p+9f0rn;(RR)hqvQSRWqdr;CWh#h37_4X@{^sP$=uv3`4u1Oa6/ASz5.gqw');
define('AUTH_SALT',        'g|>DABU#,:w>x3%2Et7cO)RA0aJw#SHA?9>QH#=fq{p!_hUe]4,r6!NLoI`0Q8>Y');
define('SECURE_AUTH_SALT', 'QAo:m5m|ExGEr[WizLp/rxQ:A,7;o$B_T%(1#kgc$f(Qg8)}PX1-GW9*}+Q-3Y`8');
define('LOGGED_IN_SALT',   'A!K,xxrF~`?S]l-[pHJMC{rJdNR^*Y.oO7aa&47W,7utGa@IY5ql4LB{{|X5{73@');
define('NONCE_SALT',       'y<,g^PdA]y$tN}h*]b8w/2AGZ5Y>7A[#JmL*cFqzLe!Q`K]^p__4VL9M({pU*dz.');

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
define('WP_HOME','http://localhost/razorbee/vihaaninnovative/');
define('WP_SITEURL','http://localhost/razorbee/vihaaninnovative/');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
