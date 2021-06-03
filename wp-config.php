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
define( 'DB_NAME', 'legalWheat' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'rR*Xp>ZZ!K4zq(GM]>r2pgIDGRYSt%WA%W?/<607Q[IfaW]Lj*T-nKOxVCIdX+%u' );
define( 'SECURE_AUTH_KEY',  '`Dr3k_+G[)H.S{}2%Z`xWt?<b2,wdg1Y=z@Gj;@pl;Di{37@8(U;`9=1@=H.PE8s' );
define( 'LOGGED_IN_KEY',    '7E,}VE~0kr^w*GssYi4R$,,[HQ~|}H)xD}vvi%nhql$a7;+ln}|ySRK:E0e>#-f+' );
define( 'NONCE_KEY',        '4,t26T!ff&%uuN:Eh4D93&b7[toVMTeFLAFe_GrTnt)E#$ *V1TtC`qw#wBYM/ R' );
define( 'AUTH_SALT',        'b#6wTsg&:@V2n5,<t6g^HJ=Bb+je_p#f)F<dgK`z{l[t(A(<>?`D!yo:rq8jY?GL' );
define( 'SECURE_AUTH_SALT', '/`nA*(DTZ!VD<:&uvns)&rM&d(YX{3V`$>p^RHGb7SFe@N9]ScUAVxHm#;&ghw:W' );
define( 'LOGGED_IN_SALT',   'f?NB]4HeFHO{*B}:P=j5X.3G3tr{+jgZ6:lXI},DRD0*<ffRxzTY(48J`S2]Exnx' );
define( 'NONCE_SALT',       'gm&)3koijg}#l4],$N%K-jBT@[)^b=*kTBZD5]$JV4^S#`/-3NM=D-*{BfN;zAgR' );

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
