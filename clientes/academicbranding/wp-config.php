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
define( 'DB_NAME', "bd_academic" );

/** MySQL database username */
define( 'DB_USER', "bd_academic" );

/** MySQL database password */
define( 'DB_PASSWORD', "oioz2019" );

/** MySQL hostname */
define( 'DB_HOST', "mysql796.umbler.com" );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '1zpig4CGFuo1VUQlqTKPGatcasHmyX8QXY3H4Mo28EIk4926XCxRWLv52XFEp9VjU/q4cWxOhKvK9f43bGIrJw==');
define('SECURE_AUTH_KEY',  'BZxzEdhiafU9VlsUwp6Veg/KMdpMc5xX/nLaCp2+k7k6py2kVk4Atg5Anh9RRoF/r9jZ3TG53mlKpWgG2k/Hrg==');
define('LOGGED_IN_KEY',    'cE0ZnsLilG2H6bg/sMVDqk7hRjVHbcgLD58EJcb7UUd7K0DY6y7Jwhu5ajnyp3EXuh5FIIovTxZ0/cUEz9+riw==');
define('NONCE_KEY',        '3s4GzdSUYSWO7ZDtMYNFdeB8nk5Z2fH5w4jqMJGnc3TpF4FqDjSikfLFuT9ETIT56Yg0D/Zeh9W3uS3OPNfxyQ==');
define('AUTH_SALT',        'bUo947//zVrC6rrPMOIDjhNNvrvW2U2FtHHW37GYV0DFoB91xSraXN3zVRNW+nrG+/lQjJwbZ1uc8w9PM4PXqg==');
define('SECURE_AUTH_SALT', 'KYwA+Jrz0YL7kHnm8abiaw8zYqR0cLlmp8ekYnQkonO77wLjCHI7fNiwx2aqxtXLqSn4xOlkuMzijeBs+L+k9A==');
define('LOGGED_IN_SALT',   'RQ6nyfQH3KbYIVSK9fIwgS0+K3q2VWZ+RAcviVwX7vPIkiC9Ib1nAEwm/HEpl/ax8gZAxUa3T+gJ1SJNKIYMLw==');
define('NONCE_SALT',       'hnnEeVez3FtzbWfVuIzkelQafW5uJQ7GTCVYkz7Z5tCKSgfL/jmTGkLNHfGmIT3WfTnKnKwsYGmK4uhoA15kLg==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
