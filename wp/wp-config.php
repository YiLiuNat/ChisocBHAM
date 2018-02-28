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
define('DB_NAME', 'uobchine_wp235');

/** MySQL database username */
define('DB_USER', 'uobchine_wp235');

/** MySQL database password */
define('DB_PASSWORD', 'S2@pK(I81z');

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
define('AUTH_KEY',         'mqqodeogskzsvllpxakum98voz9aqolprrvesompvniiwrwtxskulaulbhopsdag');
define('SECURE_AUTH_KEY',  '7g4877wxejcxtgxitzs3dvztz3sub1yvk6nrmxkndwbceqiq7odixwg0tp9vrxbr');
define('LOGGED_IN_KEY',    'yecbvih6z8hvpan3izr1hxgmyeqm888ur8p63htvjvvrnsedz1fz5pd4qzdocpga');
define('NONCE_KEY',        'wbm4etldbmkxdbmfrdq8e1bmkx0xg9ssprxgjku1p4fsi07dei9cmmdzlhd7pob7');
define('AUTH_SALT',        'thle9um3ieggryr5pds2omh8pv4m6t6mthcwdnsrrqb0xtvxkusmvcjzdsiqyjbt');
define('SECURE_AUTH_SALT', 'ic6nhgnri3uovbzm8t3zcavbry8kzwuvy2qnisxfbv2ngwva0dp4qp9w1lfw0uig');
define('LOGGED_IN_SALT',   'zldrduo5cqnlfkvxc1s0ianufp2zhbrysngcrwwil5nanhydjhzfythl6lgehl7z');
define('NONCE_SALT',       'w9msvktumjffou0dlhdj7yeqq4pzepdko2nf9jmqxrmr4nrjfbi57t3jkefrzh7i');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wpmw_';

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
define('WP_DEBUG', true);
ini_set('display_errors','Off');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
