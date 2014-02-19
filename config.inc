<?php
if (!defined ("LOCAL_SECURITY_KEY"))
 die ();

// OPENVPN-WEB-GUI ________________________

// Change: your company name
$config['Company_Name']          = 'Random Company';
$config['Company_Logo']          = 'img/OpenVPN-small.gif';
// Change: your company home page
$config['URL_Home_Page']         = 'https://github.com/cyberorg/openvpn-web-gui';
$config['AUTH_REALM']            = $config['Company_Name'] .' OpenVPN Web GUI v0.0.2';
// What files to include into ZIP
$config['Download']['ZIP']['.crt']    = true;
$config['Download']['ZIP']['.key']    = true;
$config['Download']['ZIP']['.csr']    = false;
$config['Download']['ZIP']['.ta']    = false;
$config['Download']['ZIP']['.ca']    = true;
// Should we adjust a generic config?
$config['Download']['ZIP']['Config_Generic']    = False;
$config['Download']['ZIP']['Config_Generici_Loc']    = '/etc/openvpn/easy-rsa/config.ovpn';
// All the following files should be placed into downloads folder
$config['Download']['ZIP']['Others'] = array ();
//$config['Download']['ZIP']['Others'] = array ('readme.txt', 'install.cmd', 'tls-auth.key');

// OPENVPN-WEB-GUI PLUG-INS _______________

// Use the real absolute path here.
//$config['PluginsAbsolutePath'] = '/usr/local/www/data-dist/openvpn/plugins/';

// If there are no plugins
$config['Plugins'] = NULL;
// Otherwise, follow this example:
//$config['Plugins']['PLUGINMANE']['Folder'] = 'FOLDERNAME';

// The post-install helper plugin. Shows if PHP5 has the neccessary functions available
//$config['Plugins']['systemcheck']['Folder'] = 'systemcheck';

// OPENVPN ________________________________

// Change: the configuration directory
$config['openvpn']['folder']     = '/etc/openvpn/';
// Change: configuration and status file names
$config['openvpn']['config']     = $config['openvpn']['folder'] .'server.conf';
$config['openvpn']['status']     = '/var/log/openvpn/openvpn-status.log';
// OPENSSL ________________________________

// Change: openssl keys directory
$config['openssl']['folder']     = '/etc/openvpn/easy-rsa/2.0/keys/';
// Change: different folders for Public Certificates, Certificate Requests and Private Keys.
// NOTE: openssl somehow respects only newpem folder (for Public Certificates).
$config['openssl']['pubfolder']  = '/etc/openvpn/easy-rsa/2.0/keys/';
$config['openssl']['reqfolder']  = '/etc/openvpn/easy-rsa/2.0/keys/';
$config['openssl']['prvfolder']  = '/etc/openvpn/easy-rsa/2.0/2.0/keys/';
// Change: openssl CA private and public keys
$config['openssl']['CA']['priv'] = 'file://' . $config['openssl']['folder'] .'ca.key';
$config['openssl']['CA']['pub']  = 'file://' . $config['openssl']['folder'] .'ca.crt';
// Change: openssl TA public key
$config['openssl']['TA']['pub']  = $config['openssl']['folder'] .'ta.key';
// Change: openssl serial file
$config['openssl']['serial']     = $config['openssl']['folder'] .'serial';
// Change: openssl database
$config['openssl']['database']   = $config['openssl']['folder'] .'index.txt';
// Change: openssl configuration
$config['openssl']['config']     = array ('config'      => '/etc/openvpn/easy-rsa/2.0/openssl.cnf');
                                          //'encrypt_key' => 0);
// Change: password database location
$config['openssl']['passworddb'] = $config['openssl']['folder'] .'passwords.db';
// NEW OPENSSL CERTIFICATE DEFAULTS _________

// Change all of them as it is done in your easy-rsa/vars
$config['openssl']['default']['expiration']             = 3560;
$config['openssl']['default']['countryName']            = 'US';
$config['openssl']['default']['stateOrProvinceName']    = 'Indiana';
$config['openssl']['default']['localityName']           = 'Indianapolis';
$config['openssl']['default']['organizationName']       = 'Company Name';
$config['openssl']['default']['organizationalUnitName'] = 'Please type in plant location';
$config['openssl']['default']['commonName']             = 'John Doe';
$config['openssl']['default']['emailAddress']           = '<insertemailhere>@domain.com';
$config['openssl']['default']['password']		= '';
?>
