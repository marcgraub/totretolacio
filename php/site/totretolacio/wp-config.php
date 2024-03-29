<?php
/** 
 * Les configuracions bàsiques del WordPress.
 *
 * Aquest fitxer té les següents configuracions: configuració de MySQL, prefix de taules,
 * claus secretes, idioma del WordPress i ABSPATH. Trobaràs més informació 
 * al Còdex (en anglès): {@link http://codex.wordpress.org/Editing_wp-config.php Editant
 * el wp-config.php}. Les dades per a configurar MySQL les pots obtenir del
 * teu proveïdor d'hostatjament de web.
 *
 * Aquest fitxer és usat per l'script de creació de wp-config.php durant la
 * instal·lació. No cal que usis el web, pots simplement copiar aquest fitxer
 * sota el nom "wp-config.php" i omplir-lo amb els teus valors.
 *
 * @package WordPress
 */
define("WP_CACHE", true);
// ** Configuració de MySQL - Pots obtenir aquestes informacions del teu proveïdor de web ** //
/** El nom de la base de dades per al WordPress */
define('DB_NAME', rtrim(file_get_contents('/run/secrets/wordpress_db_name')));

/** El teu nom d'usuari a MySQL */
define('DB_USER', rtrim(file_get_contents('/run/secrets/wordpress_db_user')));

/** La teva contrasenya a MySQL */
define('DB_PASSWORD', rtrim(file_get_contents('/run/secrets/wordpress_db_password')));

/** Nom del host de MySQL */
define('DB_HOST', 'db');

/** Joc de caràcters usat en crear taules a la base de dades. */
define('DB_CHARSET', 'utf8mb4');

/** Tipus d'ordenació en la base de dades. No ho canvïis si tens cap dubte. */
define('DB_COLLATE', '');

define('FORCE_SSL_ADMIN', true);

define('WP_HOME', rtrim(file_get_contents('/run/secrets/wordpress_home')));
define('WP_SITEURL', rtrim(file_get_contents('/run/secrets/wordpress_site_url')));
/**#@+
 * Claus úniques d'autentificació.
 *
 * Canvia-les per frases úniques diferents!
 * Les pots generar usant el {@link http://api.wordpress.org/secret-key/1.1/ servei de claus secretes de WordPress.org}
 *
 * @since 2.6.0
 */
define('AUTH_KEY', rtrim(file_get_contents('/run/secrets/wordpress_auth_key')));
define('SECURE_AUTH_KEY', rtrim(file_get_contents('/run/secrets/wordpress_secure_auth_key')));
define('LOGGED_IN_KEY', rtrim(file_get_contents('/run/secrets/wordpress_logged_in_key')));
define('NONCE_KEY', rtrim(file_get_contents('/run/secrets/wordpress_nonce_key')));
define('AUTH_SALT', rtrim(file_get_contents('/run/secrets/wordpress_auth_salt')));
define('SECURE_AUTH_SALT', rtrim(file_get_contents('/run/secrets/wordpress_secure_auth_salt')));
define('LOGGED_IN_SALT', rtrim(file_get_contents('/run/secrets/wordpress_logged_in_salt')));
define('NONCE_SALT', rtrim(file_get_contents('/run/secrets/wordpress_nonce_salt')));
/**#@-*/

/**
 * Prefix de taules per a la base de dades del WordPress.
 *
 * Pots tenir múltiples instal·lacions en una única base de dades usant prefixos
 * diferents. Només xifres, lletres i subratllats!
 */
$table_prefix  = 'wp_';


/**
 * Per a desenvolupadors: WordPress en mode depuració.
 *
 * Canvieu això si voleu que es mostren els avisos durant el desenvolupament.
 * És molt recomanable que les extensions i el desenvolupadors de temes facien servir WP_DEBUG
 * al seus entorns de desenvolupament.
 */
define('WP_DEBUG', false);

// Això és tot, prou d'editar - que bloguis de gust!

/** Ruta absoluta del directori del Wordpress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Assigna les variables del WordPress vars i fitxers inclosos. */
require_once(ABSPATH . 'wp-settings.php');
