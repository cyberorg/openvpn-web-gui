<?php
define ("LOCAL_SECURITY_KEY", true);

session_name ('openvpn-web-gui-session');
session_start ();

include_once ('config.inc');
include_once ('include/functions.inc');

if (!isset ($_SESSION['username']))
{ session_defaults(); }

//check_authorize ();
load_plugins ();

$GETAction = (isset ($_REQUEST['Action']) ? ($_REQUEST['Action']) : 'Status');
$GETid     = (isset ($_REQUEST['id'])     ? ($_REQUEST['id'])     : NULL);

if     ($GETAction == 'Status')
 include ('action-status.inc');
elseif ($GETAction == 'Certificates')
 include ('action-certificates.inc');
elseif ($GETAction == 'ViewCertificate' && isset ($GETid))
 include ('action-viewcertificate.inc');
elseif ($GETAction == 'DownloadCertificate' && isset ($GETid))
 include ('action-downloadcertificate.inc');
elseif ($GETAction == 'NewCertificate' && isset ($GETid))
 include ('action-buildcertificate.inc');
elseif ($GETAction == 'NewCertificate')
 include ('action-newcertificate.inc');
elseif ($GETAction == 'Config')
 include ('action-config.inc');
elseif ($GETAction == 'DownloadConfigFile' && isset ($GETid))
 include ('action-downloadconfigfile.inc');
elseif ($GETAction == 'Test')
 phpinfo ();
else
{
 foreach ($config['Plugins'] as $Plugin)
 {
  if ($GETAction == $Plugin['Action']['Name'] && isset ($Plugin['Action']['Include']))
   include ('plugins/'. $Plugin['Folder'] .'/'. $Plugin['Action']['Include']);
 }
}

?>
