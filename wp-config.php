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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          '; %F/B/`nR4FUgauj3V0 iT9h{pjP#i$2A-:|}.y&x&r<n:++rIfmm)N62j,%!:Z' );
define( 'SECURE_AUTH_KEY',   '5M5~atFn3[+&tMIN:LFzJB2T-5d]SLfA|S6kmc6U!3q>y<XBXTnZY3MyIhAWFilS' );
define( 'LOGGED_IN_KEY',     'OjD=aGs; Qe& U(XyoiC|TdJ1fe3vk,;l^J%,/`VtGD8-}24~xxjgD_~egW0QgJq' );
define( 'NONCE_KEY',         'zC$}zb~0-^)BIS]&1C~Oqs^.hj?68`/&]+r<rh^nL6OJuR5eLH%e?{&JAM*>_LId' );
define( 'AUTH_SALT',         '^GW`/?TQbb1XJ> %zzC;)nAz_1z|^M,wzgveW_T&3~L[lHovns)G.h7bcdNWw5|$' );
define( 'SECURE_AUTH_SALT',  't[8vjY]tu@1wtriC218JtQJ/kN}q]_j* yk>%]qTY:Z/2h}mA}Wxz=7*wm(iB}5W' );
define( 'LOGGED_IN_SALT',    '%5q-o;-9:B M1o|zCTScE:4Jms!URv2<MWG2kNR^c^p/e;7UYd$ [0^y{U*3dF%B' );
define( 'NONCE_SALT',        'tIWtUL-toaXxWz]Wt&S=%g>S7K]&x6HkBm>FeV;,=w+|9oYknIE&kw1D)dQ4h^X~' );
define( 'WP_CACHE_KEY_SALT', 'fjW*-G~6<(WW& {kssO&k7:%qp^Ie]!&uoPUZL*qvoYcxp(;Be9hK/_N;1a)5BXK' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
