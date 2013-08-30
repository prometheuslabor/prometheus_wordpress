<?php

/**
* Define type of server
*
* Depending on the type other stuff can be configured
* Note: Define them all, don't skip one if other is already defined
*/

define( 'DB_CREDENTIALS_PATH', dirname( ABSPATH ) ); // cache it for multiple use
define( 'WP_LOCAL_SERVER', file_exists( DB_CREDENTIALS_PATH . '/local-config.php' ) );
define( 'WP_DEV_SERVER', file_exists( DB_CREDENTIALS_PATH . '/dev-config.php' ) );
define( 'WP_STAGING_SERVER', file_exists( DB_CREDENTIALS_PATH . '/staging-config.php' ) );

/**
* Load DB credentials
*/

if ( WP_LOCAL_SERVER )
    require DB_CREDENTIALS_PATH . '/local-config.php';
elseif ( WP_DEV_SERVER )
    require DB_CREDENTIALS_PATH . '/dev-config.php';
elseif ( WP_STAGING_SERVER )
    require DB_CREDENTIALS_PATH . '/staging-config.php';
else
    require DB_CREDENTIALS_PATH . '/production-config.php';

/**
* Authentication Unique Keys and Salts.
*
* Change these to different unique phrases!
* You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
* You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
*
* @since 2.6.0
*/
if ( ! defined( 'AUTH_KEY' ) )
	define('AUTH_KEY',         'k9jdd10whtw1ee390cfksiztuusbxumfv6nwvqikapekqxugyro7dpcaylgtbgn9');
if ( ! defined( 'SECURE_AUTH_KEY' ) )
	define('SECURE_AUTH_KEY',  'b5mo0fzv9fsvqoog5piezahtfux6ftepvsapvjltnozfewuxahl2gh0zsmeip8pr');
if ( ! defined( 'LOGGED_IN_KEY' ) )
	define('LOGGED_IN_KEY',    '3digyh3rizt1zlknk1ioheymdzgl7wiq3qrkedpy0gpbkgxh9bweqcxcfeb92g30');
if ( ! defined( 'NONCE_KEY' ) )
	define('NONCE_KEY',        'upchlt16zkppehhrcxxue6ezharww75peottfeclp7tgtqandpypeo0vncjkkzlw');
if ( ! defined( 'AUTH_SALT' ) )
	define('AUTH_SALT',        'tejluzpyz0a8ofd7vrodqnbxwqtmovmkq55hdiqxmgfx94boyc3lljrgwgckb388');
if ( ! defined( 'SECURE_AUTH_SALT' ) )
	define('SECURE_AUTH_SALT', '5beu2pmfq6qzdtr6lketbz0msxtp1weicofyva1txthu2idxquj20ftm20tgqqok');
if ( ! defined( 'LOGGED_IN_SALT' ) )
	define('LOGGED_IN_SALT',   '9zxoulepbx2jgpc3bvzyxt6whpoq5q607prj1gipkxzeliekzctgmcxbj2afp9by');
if ( ! defined( 'NONCE_SALT' ) )
	define('NONCE_SALT',       'ehzgcufi01sml59pgklwabbws6ececzzkncqjoswuw2o7qobjkajcnwdq3vrouc6');

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
* Change this to localize WordPress.  A corresponding MO file for the chosen
* language must be installed to wp-content/languages. For example, install
* de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
* language support.
*/
define ('WPLANG', '');

/**
* For developers: WordPress debugging mode.
*
* Change this to true to enable the display of notices during development.
* It is strongly recommended that plugin and theme developers use WP_DEBUG
* in their development environments.
*/

if ( WP_LOCAL_SERVER || WP_DEV_SERVER ) {

    define( 'WP_DEBUG', true );
    define( 'WP_DEBUG_LOG', true ); // Stored in wp-content/debug.log
    define( 'WP_DEBUG_DISPLAY', true );

    define( 'SCRIPT_DEBUG', true );
    define( 'SAVEQUERIES', true );

} else if ( WP_STAGING_SERVER ) {

    define( 'WP_DEBUG', true );
    define( 'WP_DEBUG_LOG', true ); // Stored in wp-content/debug.log
    define( 'WP_DEBUG_DISPLAY', false );

} else {

    define( 'WP_DEBUG', false );
}

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
