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
define('DB_NAME', 'web');

/** MySQL database username */
define('DB_USER', 'web');

/** MySQL database password */
define('DB_PASSWORD', 'web');

/** MySQL hostname */
define('DB_HOST', 'mysql:3306');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/** Define the URL */
//define('WP_SITEURL', 'http://localhost:8080');
//define('WP_HOME', 'http://localhost:8080');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '%i]ts@RX-[,VZ:/HVMT,3G:A]oN`~^TBmn6k-VUXOClk+<P1|a+SL(2z1QQ8$6&s');
define('SECURE_AUTH_KEY',  'JU j:]AMTmF>EPeX3A1bwMw-@),N[V_I? xs79&V?6Q(-=hr(QpGz-U697`|r)ze');
define('LOGGED_IN_KEY',    'b=}oYwb>z7w:zzyI$q81(8S:Jg1QWAKR+71$I%9~H+,G^U,G!X&MlDR-7TBuf{+,');
define('NONCE_KEY',        'gxO?+ tM,~og[mLkaS6`a5]1AX`co]10)ueR~$9G4GTuq ju<Q,/PjblQ08rz*Yz');
define('AUTH_SALT',        'v)8?|fr%Uf`9Bc!-0AM]|HH2|Y18yMC25|;V lmV ,QiXz6`M(C.flJHR0>(|kS3');
define('SECURE_AUTH_SALT', ']-]rcU`a<Qb>17P],t]yT[ws#.7v-lU3^B`$ME$l,VPO@ncf|um={L2Ie@XC(j{[');
define('LOGGED_IN_SALT',   'CEJLn1F5|OBNF0Zed2K5y{m[@/bsAw5$^9EkEfj5E?|z?y+7Ma47u4+93g]xSwRG');
define('NONCE_SALT',       'Y4pvS}?*Y>j8M|iC^)!RI:=)|g|zgZA-9i+xs?MJgZ+}^ga4>koj-i~L7hg; O9W');


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

/** Disallow file modifications */
define('DISALLOW_FILE_MODS',true);

/** Disallow file editing */
define('DISALLOW_FILE_EDIT',true);

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');