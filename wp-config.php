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
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'gymfitness' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
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
define( 'AUTH_KEY',         'twldbwC!1&@,+68n1m9,~{Z?SJ5?`^Zo|#Ct(6|e05[P||L=0s%Z_x7%LFAjI)*P' );
define( 'SECURE_AUTH_KEY',  '>EN?s%V9Z3$wp41Q>zfzqa^6ooIA_7y^iFX:S|b@YTE_$#B&h)hs$G%)U_e`km&I' );
define( 'LOGGED_IN_KEY',    'cFKPU-Mp0Gqv*P%tR*-3Bp^LO_n+{-:!6>$lo4K}G9 MY-,Bw>PL#?ntc{M#)A(Z' );
define( 'NONCE_KEY',        '/??TUjP)sUP~6K]Q@^X@0D{1hbKM~2IGnKh~(4F{.,GNCR?^F9,l0,$D1=:d^~|L' );
define( 'AUTH_SALT',        '~0=4%?oSMw*$Rc~~$ZdVBJH8ZWK+yX?sMD#oLReb9H5oZR_6}Igl@G=R+5I@:+_#' );
define( 'SECURE_AUTH_SALT', '^]<!}39/nfQ)ZT`g[`Apf{#vFt*i@,P]:mU;|%1!2T &B{fgu%5zpbX5>E~BUY:1' );
define( 'LOGGED_IN_SALT',   '9X9vSB7B4WC;zMdryJpxB&uL5RSFU4RdxRZp_9uLh X%Ner HolgY8.^s^(W+% 6' );
define( 'NONCE_SALT',       '|MwhSz8Ht9Q[cK)LwzhY+j(r.pbOJ*Od[Tv&UsNf1bE6QcpMbi)ylRig,9s5^m#k' );

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
define('FS_METHOD','direct');