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
openvpn_find_connected ();

// load Smarty library
require('Smarty.class.php');
$smarty = new Smarty;

// Decoration
$smarty->assign ('Company_Name',  $config['Company_Name']);
$smarty->assign ('Company_Logo',  $config['Company_Logo']);
$smarty->assign ('URL_Home_Page', $config['URL_Home_Page']);
$smarty->assign ('title',         'OpenVPN Web GUI : OpenSSL certificate');

// Status Bar
$smarty->assign ('Server',        $openvpn['Server']);
$smarty->assign ('Seconds_Ago',   time () - $openvpn['Server']['Time']);
$smarty->assign ('Certificates',  $openssl['Database']);

// Action
$smarty->assign ('action',        'CERTIFICATES');
$smarty->assign ('subaction',     'VIEW');

// Action-Specific

$GETidDEC = $_GET['id'];

$tmpArray = openssl_get_database_contents($GETidDEC);
$tmpCN = str_replace_spaces($tmpArray['CN']);

$tmpArray['ExpDate'] = str_openssldata_to_string ($tmpArray['ExpDate']);
$tmpArray['RevDate'] = str_openssldata_to_string ($tmpArray['RevDate']);
$smarty->assign ('Certificate',        $tmpArray);
$smarty->assign ('CertificateFileCRT', openssl_get_filename ($tmpCN, '.crt'));
$smarty->assign ('CertificateFileKEY', openssl_get_filename ($tmpCN, '.key'));
$smarty->assign ('CertificateFileCSR', openssl_get_filename ($tmpCN, '.csr'));
$smarty->assign ('Password', openssl_read_password($GETidDEC, $config['openssl']['passworddb']));
// Display
$smarty->assign  ('PluginPath',    $config['PluginsAbsolutePath']);
$smarty->assign  ('Plugins',       $config['Plugins']);
$smarty->assign  ('Page',          'action-viewcertificate.tpl');
$smarty->display ('page.tpl');
?>
