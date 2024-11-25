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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'mysite' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '-Ne0/%T<Wisq|YHia+qW/vzPS`UkDs@boz$+wuiA9xF&M8/{P-v^(9 :#+[jeW1v' );
define( 'SECURE_AUTH_KEY',  'fSa)Fqet.##7Ar)>n/XWc@^M{!fab.peM[uIPI4]yMBO:hxBQms])qE_{GA[y<KZ' );
define( 'LOGGED_IN_KEY',    '@f;/eU:y2}0F5.K}HB`edOQH*;}HL[;Fc61<$mh~d){I=X;~,Rbr{ KKi*^AN~c6' );
define( 'NONCE_KEY',        'dOnZ%#-}!NSZu z*AAz,u%%x$W7po_fkND/%gt^P1zt> x[z{_:DWdxaT7lP_po:' );
define( 'AUTH_SALT',        '5%4YR.=3M!pAps<5=zsfb9Jnm8Y4T_]rnDxhF{9j4wj |bf/7Sy6u2=`:gbfdsVf' );
define( 'SECURE_AUTH_SALT', '|BYmY,.+} w}Q;e`m(6qNxIWO<YqQ?Srwb0oE5Qi4J$)(]Sq?fBH4ZF1i,!?{#t3' );
define( 'LOGGED_IN_SALT',   '@@K_g@7^`7KLJI _X*;<t!u2:mB)>B`I^^hb 5js,R9:&#o9ytjP*IW85G:;l:s,' );
define( 'NONCE_SALT',       'En6IamBaswnLN:mH!k)9CDeH>.9QFQLmb4+lsu;Db<,AMXuY-bs2D@9S-F:O7b;9' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
