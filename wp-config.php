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
define( 'DB_NAME', 'tuyenminh-wp' );

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
define( 'AUTH_KEY',         '$lQ1Fjvu`dbT&7?^R5A:V7/qx_hG#^L%b:<6@ J{$q;Cf0L4>{+{],wZ6q5PYu|f' );
define( 'SECURE_AUTH_KEY',  'Le,w.q:397}r{gzE%lq_s[QgHW1nGi^n$N!-91ep35O@D#(Ml+w:Q_u.49p-2KX_' );
define( 'LOGGED_IN_KEY',    'Yfr@GrFS3* X]^^#c^6HEzQbb)&WCi)7B*v)#,`l>,B^/0Ofg|<Tv>>mY!S.JU^z' );
define( 'NONCE_KEY',        'V/wX:<>7wDl_0iov x*vxdDU1XQD)KYe:k`3y^lgBHh`%[MlWuVuJjis1t-LA#S,' );
define( 'AUTH_SALT',        'M=cMA?CYY*J5^Sp$Oiut}tk!Yj5Qp~jF$p2jji :Z+A;&L<8}[.@O+(An6Kmc7=Q' );
define( 'SECURE_AUTH_SALT', 'xV#stg@tcb};NJe7@Egi.9.`C  dK/F$FZ!=G*LgqATkcGe<Y*tN*f.M&lppq8b]' );
define( 'LOGGED_IN_SALT',   '=C.q|)%kBPUyArGv&Sj<STd4LjLio_-b&X:; 2Cl+y.E+=Fw~pg?j=[f{o]Zs|dy' );
define( 'NONCE_SALT',       '!v|NPudDktkK{+dn~b]Y^e(10ow>WvgSnNc,)Z#:</A*8T)pch[YF|o7vAf-Z(Yt' );

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
