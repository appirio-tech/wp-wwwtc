<?php
# Database Configuration
define( 'DB_NAME', 'wp_wwwtc' );
define( 'DB_USER', 'wwwtc' );
define( 'DB_PASSWORD', 'DeT7DppvLuDaCtN3R4Mu' );
define( 'DB_HOST', '127.0.0.1' );
define( 'DB_HOST_SLAVE', '127.0.0.1' );
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', 'utf8_unicode_ci');
$table_prefix = 'wp_';

# Security Salts, Keys, Etc
define('AUTH_KEY',         'Z&_Fpc0`g -J+rDwC^t%Ezh?[%-uQSGQ)F*|LJ#yIJ|,oV6R1g/BI8?B{!e[_?B4');
define('SECURE_AUTH_KEY',  'NqZB1H xnx!8w-Y$lOTLW|c1b=]%#|DNJd|vr-N>DhBryN7qwjtbWYwPxD+3IwVB');
define('LOGGED_IN_KEY',    '1N07nubI|ZF&T+|E^+8H$m)J?`&gmbkGD?sONP~Q/6-4/0!@):E2}H?S0rI!KV Z');
define('NONCE_KEY',        'C[k*{iQAx)uYZ)V6*0$njWp[fftpy73VWG{5XxjK`Q|I/6n eotdW.Y@Y$RHg%bA');
define('AUTH_SALT',        'VZ;!)_/T1t_unnU/jWFkqr1q?E@$iRU@0M*+aT.()@z9bb;?3]:?%^(ZF/p-.Sxk');
define('SECURE_AUTH_SALT', 'sN&DD^wg0TV+/q{6::b@<u.nN+:-8_f7`IAeBR<tSY~^YiGcL2Ej|Hhmb6@yS>l-');
define('LOGGED_IN_SALT',   '@2e/e,T>,#I-[C!-RXIz#ZL_w;3X0Ujg)7,!J=M-atl$QrY<7d},iJyg#b%.*HG`');
define('NONCE_SALT',       'o>H|`S_F[k!k<e-FS0WKG%*]iJwkXt8S5Wt9S|<}g/uR?o|[a.v@M~PmBl<qBx`3');


# Localized Language Stuff

define( 'WP_CACHE', TRUE );

define( 'WP_AUTO_UPDATE_CORE', false );

define( 'PWP_NAME', 'wwwtc' );

define( 'FS_METHOD', 'direct' );

define( 'FS_CHMOD_DIR', 0775 );

define( 'FS_CHMOD_FILE', 0664 );

define( 'PWP_ROOT_DIR', '/nas/wp' );

define( 'WPE_APIKEY', 'f5e2097226ce628f6c9527a9777a39d3940a5e67' );

define( 'WPE_FOOTER_HTML', "" );

define( 'WPE_CLUSTER_ID', '10482' );

define( 'WPE_CLUSTER_TYPE', 'pod' );

define( 'WPE_ISP', true );

define( 'WPE_BPOD', false );

define( 'WPE_RO_FILESYSTEM', false );

define( 'WPE_LARGEFS_BUCKET', 'largefs.wpengine' );

define( 'WPE_SFTP_PORT', 22 );

define( 'WPE_LBMASTER_IP', '104.130.145.129' );

define( 'WPE_CDN_DISABLE_ALLOWED', false );

define( 'DISALLOW_FILE_MODS', FALSE );

define( 'DISALLOW_FILE_EDIT', FALSE );

define( 'DISABLE_WP_CRON', false );

define( 'WPE_FORCE_SSL_LOGIN', false );

define( 'FORCE_SSL_LOGIN', false );

/*SSLSTART*/ 
if ( isset($_SERVER['HTTP_X_WPE_SSL']) && $_SERVER['HTTP_X_WPE_SSL'] ) $_SERVER['HTTPS'] = 'on'; 
/*SSLEND*/

define( 'WPE_EXTERNAL_URL', false );

define( 'WP_POST_REVISIONS', FALSE );

define( 'WPE_WHITELABEL', 'wpengine' );

define( 'WP_TURN_OFF_ADMIN_BAR', false );

define( 'WPE_BETA_TESTER', false );

umask(0002);

$wpe_cdn_uris=array ( );

$wpe_no_cdn_uris=array ( );

$wpe_content_regexs=array ( );

$wpe_all_domains=array ( 0 => 'wwwtc.wpengine.com', 1 => 'www.topcoder.com', );

$wpe_varnish_servers=array ( 0 => 'pod-10482', );

$wpe_special_ips=array ( 0 => '104.130.136.174', );

$wpe_ec_servers=array ( );

$wpe_largefs=array ( );

$wpe_netdna_domains=array ( 0 =>  array ( 'match' => 'wwwtc.wpengine.com', 'secure' => false, 'dns_check' => '0', 'zone' => '3mg6i72eq4kn3tq0g11jccps', 'enabled' => true, ), 1 =>  array ( 'match' => 'www.topcoder.com', 'zone' => '3a72mb4dqcfnkgfimp04jgyy', 'enabled' => true, ), );

$wpe_netdna_domains_secure=array ( );

$wpe_netdna_push_domains=array ( );

$wpe_domain_mappings=array ( );

$memcached_servers=array ( 'default' =>  array ( 0 => 'unix:///tmp/memcached.sock', ), );

define( 'WP_SITEURL', 'http://wwwtc.wpengine.com' );

define( 'WP_HOME', 'http://wwwtc.wpengine.com' );

define( 'DOMAIN_CURRENT_SITE', 'wwwtc.wpengine.com' );

/*SSLSTART*/ if ( isset($_SERVER['HTTP_X_WPE_SSL']) && $_SERVER['HTTP_X_WPE_SSL'] ) $_SERVER['HTTPS'] = 'on'; /*SSLEND*/
define('WPLANG','en-EN');

# WP Engine ID


# WP Engine Settings




define( 'WP_ALLOW_MULTISITE', true );
define( 'MULTISITE', true );
define( 'SUBDOMAIN_INSTALL', true );
$base = '/';

define( 'PATH_CURRENT_SITE','/' );
define( 'SITE_ID_CURRENT_SITE', 1 );
define( 'BLOG_ID_CURRENT_SITE', 1 );


# That's It. Pencils down
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
require_once(ABSPATH . 'wp-settings.php');

define('UPLOADS', '/wp-content/media');

$_wpe_preamble_path = null; if(false){}


function siteURL()
{
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $domainName = $_SERVER['HTTP_HOST'].'/';
    return $protocol.$domainName;
}
define( 'SITE_URL', siteURL() );
