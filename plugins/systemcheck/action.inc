<?php
if (!defined ("LOCAL_SECURITY_KEY"))
 die ();

include_once ('include/openvpn-functions.inc');
include_once ('include/openssl-functions.inc');

openvpn_load_server_conf ();
if (!isset ($openvpn['Server'])) html_error ("The OpenVPN server has no configuration file");

openvpn_load_status ();
if (!isset ($openvpn['Server']['Title'])) html_error ("The OpenVPN server has no status file");

// load Smarty library
require('Smarty.class.php');
$smarty = new Smarty;

// Inherited from the Web GUI project
$smarty->assign  ('Company_Name',  $config['Company_Name']);
$smarty->assign  ('Company_Logo',  $config['Company_Logo']);
$smarty->assign  ('URL_Home_Page', $config['URL_Home_Page']);
$smarty->assign  ('Server',        $openvpn['Server']);
$smarty->assign  ('Seconds_Ago',   time () - $openvpn['Server']['Time']);
$smarty->assign  ('PluginPath',    $config['PluginsAbsolutePath']);
$smarty->assign  ('Plugins',       $config['Plugins']);

// Action-specific. action and Page vars should reflect the plugin config.inc's corresponding ones
$smarty->assign  ('title',         'OpenVPN Web GUI : System Check');
$smarty->assign  ('OpenSSLStatus', openssl_check_functions ());
$smarty->assign  ('ZLibStatus',    zlib_check_functions ());
$smarty->assign  ('action',        'SYSCHECK');
$smarty->assign  ('Page',          'file:'. $config['PluginsAbsolutePath'] .'systemcheck/action.tpl');

// Display
$smarty->display ('page.tpl');
?>
