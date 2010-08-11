<?php
if (!defined ("LOCAL_SECURITY_KEY"))
 die ();

include_once ('include/openvpn-functions.inc');
include_once ('include/openssl-functions.inc');

openvpn_load_server_conf ();
if (!isset ($openvpn['Server'])) html_error ("The OpenVPN server has no configuration file");

openvpn_load_status ();
if (!isset ($openvpn['Server']['Title'])) html_error ("The OpenVPN server has no status file");

openssl_load_database ();

// load Smarty library
require('Smarty.class.php');
$smarty = new Smarty;

// Decoration
$smarty->assign  ('Company_Name',  $config['Company_Name']);
$smarty->assign  ('Company_Logo',  $config['Company_Logo']);
$smarty->assign  ('URL_Home_Page', $config['URL_Home_Page']);
$smarty->assign  ('title',         'OpenVPN Web GUI : server configuration');

// Status Bar
$smarty->assign  ('Server',        $openvpn['Server']);
$smarty->assign  ('Seconds_Ago',   time () - $openvpn['Server']['Time']);

// Action
$smarty->assign  ('action',        'CONFIG');

// Action-Specific
if (isset ($openvpn['Client']))
 $smarty->assign ('Client',        $openvpn['Client']);
if (isset ($openssl['Server']))
 $smarty->assign ('Openssl',       $openssl['Server']);
if (isset ($openssl['Database']))
 $smarty->assign ('Certificates',  $openssl['Database']);

// Display
$smarty->assign  ('PluginPath',    $config['PluginsAbsolutePath']);
$smarty->assign  ('Plugins',       $config['Plugins']);
$smarty->assign  ('Page',          'action-config.tpl');
$smarty->display ('page.tpl');
//html_dump ('$config', $config);
?>
