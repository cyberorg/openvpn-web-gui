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
// ...

$GETidDEC = $_GET['id'];

// Load and convert Common Name field to download files
$tmpArray = openssl_get_database_contents($GETidDEC);

$sExt = '.crt';
if (isset ($_REQUEST['Type']))
 if     ($_REQUEST['Type'] == 'CRT') $sExt = '.crt';
 elseif ($_REQUEST['Type'] == 'KEY') $sExt = '.key';
 elseif ($_REQUEST['Type'] == 'CSR') $sExt = '.csr';
 elseif ($_REQUEST['Type'] == 'ZIP') $sExt = '.zip';

if ($sExt == '.zip')
{
 include_once ('include/zip.lib.php');
 $zipData = new zipfile ();

 // Add the certificate files
 foreach (array ('.crt', '.key', '.csr') as $Ext2zip)
 {
  if ($config['Download']['ZIP'][$Ext2zip])
  {
   $File2zip  = openssl_get_filename (str_replace_spaces($tmpArray['CN']), $Ext2zip);
   $File2name = str_replace_spaces($tmpArray['CN']) . $Ext2zip;

   if (is_file ($File2zip))
    $zipData->addFile (implode ('', file ($File2zip)), $File2name);
  }
 }

	// Should we add TA/CA files?
	if ($config['Download']['ZIP']['.ca']) {
		if (is_file ($config['openssl']['CA']['pub'])) {
			$zipData->addFile (implode ('', file ($config['openssl']['CA']['pub'])), 'ca.crt');
		}
	}
        if ($config['Download']['ZIP']['.ta']) {
                if (is_file ($config['openssl']['TA']['pub'])) {
                        $zipData->addFile (implode ('', file ($config['openssl']['TA']['pub'])), 'ta.key');
                }
        }

	// Check and see if we should fix a config file
	if ($config['Download']['ZIP']['Config_Generic']) {
		if (is_file ($config['Download']['ZIP']['Config_Generici_Loc'])) {
			$zipData->addFile (openvpn_config_replace(implode ('', file ($config['Download']['ZIP']['Config_Generici_Loc'])), str_replace_spaces($tmpArray['CN'])), basename($config['Download']['ZIP']['Config_Generici_Loc']));
		}
	}


 // Add the extra files
 foreach ($config['Download']['ZIP']['Others'] as $File2zip)
 {
  if (is_file ('downloads/'. $File2zip))
   $zipData->addFile (implode ('', file ('downloads/'. $File2zip)), $File2zip);
 }

 // Flush the ZIP file to the client
 html_download_data ($zipData -> file (), str_replace_spaces($tmpArray['CN']) .'_OVPN.zip');
}
else
{
$sCertificateFile = openssl_get_filename (str_replace_spaces($tmpArray['CN']), $sExt);
if (!$sCertificateFile) {
	html_error ("Can't find requested file " . str_replace_spaces($tmpArray['CN']));
}

 // Download
html_download ($sCertificateFile, str_replace_spaces($tmpArray['CN']) . $sExt);
//html_dump ('$GLOBALS', $GLOBALS);

//html_error($openssl['Database'][4]['CN']);
//$tmpArray = openssl_get_database_contents($GETidDEC[0]);
//html_error(tmpArray['CN']);
}

?>
