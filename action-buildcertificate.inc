<?php
if (!defined ("LOCAL_SECURITY_KEY"))
 die ();

include_once ('include/openvpn-functions.inc');
include_once ('include/openssl-functions.inc');

$PUTcountryName            = (isset ($_REQUEST['Country'])    ? ($_REQUEST['Country'])    : NULL);
$PUTstateOrProvinceName    = (isset ($_REQUEST['Province'])   ? ($_REQUEST['Province'])   : NULL);
$PUTlocalityName           = (isset ($_REQUEST['City'])       ? ($_REQUEST['City'])       : NULL);
$PUTorganizationName       = (isset ($_REQUEST['Company'])    ? ($_REQUEST['Company'])    : NULL);
$PUTorganizationalUnitName = (isset ($_REQUEST['Department']) ? ($_REQUEST['Department']) : NULL);
$PUTcommonName             = (isset ($_REQUEST['CommonName']) ? ($_REQUEST['CommonName']) : NULL);
$PUTemailAddress           = (isset ($_REQUEST['Email'])      ? ($_REQUEST['Email'])      : NULL);
$PUTvalidity               = (isset ($_REQUEST['Expiration']) ? ($_REQUEST['Expiration']) : NULL);
$PUTpassword               = (isset ($_REQUEST['Password'])   ? ($_REQUEST['Password'])   : NULL);
$PUTgeneratepassword       = (isset ($_REQUEST['RandomPassword'])    ? ($_REQUEST['RandomPassword'])    : NULL);

$Debug = '';

// Test to see if we need to generate a random password
if (isset($PUTgeneratepassword)) {
	$PUTpassword = createRandomPassword();
}

$Result = openssl_build_key ($Debug,
                             array ('countryName'            => $PUTcountryName,
                                    'stateOrProvinceName'    => $PUTstateOrProvinceName,
                                    'localityName'           => $PUTlocalityName,
                                    'organizationName'       => $PUTorganizationName,
                                    'organizationalUnitName' => $PUTorganizationalUnitName,
                                    'commonName'             => $PUTcommonName,
                                    'emailAddress'           => $PUTemailAddress,
                                    'password'               => $PUTpassword
                                   ),
                             $PUTvalidity
                            );

if ($Result != FALSE)
{
# header ('Location: '. $_SERVER["PHP_SELF"] .'?Action=ViewCertificate&id='. $Result);
 html_postredir ($_SERVER["PHP_SELF"] .'?Action=ViewCertificate&id='. $Result);
}
else
{
 echo '<pre>'. $Debug .'</pre>';
}
?>
