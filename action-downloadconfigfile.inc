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

// Check permissions :)
//if (($sCertificateFile = openssl_get_filename ($GETid)) == '') html_error ("You are not authorized to download that certificate");

if (isset ($GETid))
{
 if     ($GETid == 'DH' )
 {
  $sFile = $openvpn['Server']['DH']['File'];
  $bFile = $openvpn['Server']['DH']['Exists'];
 }
 elseif ($GETid == 'CA' )
 {
  $sFile = $openssl['Server']['CA']['File'];
  $bFile = $openssl['Server']['CA']['Exists'];
 }
 elseif ($GETid == 'CRT')
 {
  $sFile = $openvpn['Server']['Certificate']['File'];
  $bFile = $openvpn['Server']['Certificate']['Exists'];
 }
 elseif ($GETid == 'KEY')
 {
  $sFile = $openvpn['Server']['Private_Key']['File'];
  $bFile = $openvpn['Server']['Private_Key']['Exists'];
 }
 elseif ($GETid == 'TLS')
 {
  $sFile = $openvpn['Server']['TLS_Auth']['File'];
  $bFile = $openvpn['Server']['TLS_Auth']['Exists'];
 }
 elseif ($GETid == 'CRL')
 {
  $sFile = $openvpn['Server']['CRL_Verify']['File'];
  $bFile = $openvpn['Server']['CRL_Verify']['Exists'];
 }
 else
 {
  $sFile = '';
  $bFile = '';
 }
 
 if ($sFile != '')
  if ($bFile)
   if (is_readable ($sFile))
    html_download ($sFile, basename ($sFile));
   else
    html_error ("Can't read the file '$sFile'.<br>Probably it should not be read by anybode except it's owner?");
  else
   html_error ("The file '$sFile' does not exist.");
 else
  html_error ('Wrong ID. Stop hacking.');
}
else
 html_error ('The ID is not defined. Stop hacking.');
?>
