<?php
if (!defined ("LOCAL_SECURITY_KEY"))
 die ();

// ----------------------------------------------
function openssl_check_functions ()
{
 $Result   = '';
 $OpenSSLs = array
 (
  'openssl_csr_new',
  'openssl_csr_sign',
  'openssl_csr_export_to_file',
  'openssl_pkey_new',
  'openssl_pkey_get_private',
  'openssl_pkey_export_to_file',
  'openssl_x509_export_to_file'
 );

 foreach ($OpenSSLs as $Function)
 {
  $Result .= $Function . '<font color="black">:</font> ' . (function_exists ($Function) ?
                                '<font color="black">OK</font>' :
                                '<font color="red">DOES NOT EXIST</font>') . '<br>';
 }    

 return $Result;
}

// ----------------------------------------------
function openssl_load_database ($afile = '')
{
 global $config;
 global $openssl;

 $afile = ($afile == '' ? $config['openssl']['database'] : $afile);
 $lines = file ($afile);

 if (!is_array ($lines))
 {
  html_error ("The OpenSSL database is empty or does not exist!");
  exit;
 }

 foreach ($lines as $line_num => $line)
 {
  chomp ($line);
  $linetokens = explode ("\t", $line);

  // Ensure that all the fields are set
  if (count ($linetokens) == 6)
  {
   // Decode the openssl's database. See apps/apps.h
   $openssl['Database'][] = array ('Status'     => $linetokens[0],
                                   'ExpDate'    => $linetokens[1],
                                   'RevDate'    => $linetokens[2],
                                   'Serial'     => $linetokens[3],
                                   'File'       => $linetokens[4],
                                   'Name'       => $linetokens[5],
                                   'Country'    => openssl_get_country    ($linetokens[5]),
                                   'State'      => openssl_get_state      ($linetokens[5]),
                                   'City'       => openssl_get_city       ($linetokens[5]),
                                   'Company'    => openssl_get_company    ($linetokens[5]),
                                   'Department' => openssl_get_department ($linetokens[5]),
                                   'CN'         => openssl_get_CN         ($linetokens[5]),
                                   'Email'      => openssl_get_email      ($linetokens[5])
                                  );
  }
 }
}

// ----------------------------------------------
function openssl_write_database ($afile = '')
{
 global $config;
 global $openssl;

 $afile = ($afile == '' ? $config['openssl']['database'] : $afile);

 $atext = '';
 for ($i = 0; $i < count ($openssl['Database']); $i++)
 {
  $atext .= ($atext == '' ? '' : "\n");
  $atext .= $openssl['Database'][$i]['Status'] ."\t".
            $openssl['Database'][$i]['ExpDate'] ."\t".
            $openssl['Database'][$i]['RevDate'] ."\t".
            $openssl['Database'][$i]['Serial'] ."\t".
            $openssl['Database'][$i]['File'] ."\t".
            $openssl['Database'][$i]['Name'];
 }

 writefile ($afile, $atext, $afile .'.old');
}

// ----------------------------------------------
function openssl_write_database_attr ($atext = '', $afile = '')
{
 global $config;
 global $openssl;

 $afile = ($afile == '' ? $config['openssl']['database'] : $afile) .'.attr';
 $atext = ($atext == '' ? "unique_subject = yes\n"       : $atext);

 if (file_exists ($afile))
 {
  ob_start ();
  readfile ($afile);
  $atext = ob_get_contents ();
  ob_end_clean ();
 }

 writefile ($afile, $atext, $afile .'.old');
}

// ----------------------------------------------
// Returns the PEM file with spaces reduced and replaced to &nbsp;
function openssl_load_cert ($anid)
{
 global $config;

 do
 {
  $lines = file ($config['openssl']['pubfolder'] . $anid . '.pem');

  if (!is_array ($lines))
  {
   $Return = '';
   break;
  }

  foreach ($lines as $line_num => $line)
  {
   chomp ($line);
   $Return[] = str_replace (' ', '&nbsp;', htmlspecialchars (str_replace ('    ', ' ', $line)));
  }
 } while (FALSE);

 return $Return;
}

// ----------------------------------------------
function openssl_load_serial ($afile = '')
{
 global $config;

 $afile = ($afile == '' ? $config['openssl']['serial'] : $afile);

 $lines = file ($afile);
 
 if (!is_array ($lines))
 {
  html_error ("The OpenSSL serial file is empty or does not exist!");
  exit;
 }

 $Return = sscanf ($lines[0], "%X");

 return $Return[0];
}

// ----------------------------------------------
function openssl_write_serial ($iNumber, $afile = '')
{
 global $config;

 $afile = ($afile == '' ? $config['openssl']['serial'] : $afile);

 writefile ($afile, openssl_hex_serial ($iNumber) . "\n", $afile .'.old');
}

// ----------------------------------------------
// Supports up to 999,999 serials
function openssl_hex_serial ($iNumber)
{
 if ($iNumber < 100)
  $sString = sprintf ("%02X", $iNumber);
 elseif ($iNumber < 10000)
  $sString = sprintf ("%04X", $iNumber);
 else
  $sString = sprintf ("%06X", $iNumber);

 return $sString;
}

// ----------------------------------------------
// Builds User Private Key, CSR and Public Certificate
function openssl_build_key (&$anoutput, $adn, $validdays = NULL)
{
 global $config;
 global $openssl;

 $anoutput = '';
 $Return  = FALSE;

 // Allow to override default value
 $validdays = ($validdays == NULL ? $config['openssl']['default']['expiration'] : $validdays);

 do
 {
  if (!isset ($adn) ||
      !isset ($adn['countryName']) ||
      !isset ($adn['stateOrProvinceName']) ||
      !isset ($adn['localityName']) ||
      !isset ($adn['organizationName']) ||
      !isset ($adn['organizationalUnitName']) ||
      !isset ($adn['commonName']) ||
      !isset ($adn['emailAddress'])
     )
  { $anoutput .= "- ERROR on ". __LINE__ ." line: incomplete DN information\n"; break; }
  $anoutput .= "+ OK got the valid input\n";

  // Get the new User Private Key
  $UserPrivKey = openssl_pkey_new ( $config['openssl']['config']);
  if ($UserPrivKey == FALSE)
  { $anoutput .= "- ERROR on ". (__LINE__ - 2) ." line (openssl_pkey_new):\n  ". openssl_error_strings () ."  (that might usually mean that the openssl.cnf file is unavailable)"; break; }
  $anoutput .= "+ OK got the User Private Key\n";

  // Generate the User Certificate Request
  $UserReq = openssl_csr_new ($adn,
                              $UserPrivKey,
                              $config['openssl']['config']);
  if ($UserReq == FALSE)
  { $anoutput .= "- ERROR on ". (__LINE__ - 4) ." line (openssl_csr_new):\n  ". openssl_error_strings (); break; }
  $anoutput .= "+ OK generated the User Certificate Request\n";

  // Read the openssl serial
  $CAserial = openssl_load_serial ($config['openssl']['serial']);
  $anoutput .= "+ OK read current openssl serial (". openssl_hex_serial ($CAserial) .")\n";

  $UserPubCertFile   = $config['openssl']['pubfolder'] . str_replace_spaces($adn['commonName']) .'.crt';
  $UserCertReqFile   = $config['openssl']['reqfolder'] . str_replace_spaces($adn['commonName']) .'.csr';
  $UserPrivKeyFile   = $config['openssl']['prvfolder'] . str_replace_spaces($adn['commonName']) .'.key';

  // Read the openssl database
  openssl_load_database  ($config['openssl']['database']);
  $anoutput .= "+ OK read the openssl database (". count ($openssl['Database']) ." items)\n";

  // Get CA's Private Key
  $CAPrivKey = openssl_pkey_get_private (array($config['openssl']['CA']['priv'], ''));

  if ($CAPrivKey == FALSE)
  { $anoutput .= "- ERROR on ". (__LINE__ - 2) ." line (openssl_pkey_get_private)\n  ". openssl_error_strings (); break; }
  $anoutput .= "+ OK read the CA Private Key\n";

  // Get a CA-signed cert that lasts for 1 year
  $UserPubCert = openssl_csr_sign ($UserReq,
                                   $config['openssl']['CA']['pub'],
                                   $CAPrivKey,
                                   $validdays,
                                   $config['openssl']['config'],
                                   $CAserial);
  if ($UserPubCert == FALSE)
  { $anoutput .= "- ERROR on ". (__LINE__ - 7) ." line (openssl_csr_sign)\n  ". openssl_error_strings (); break; }
  $anoutput .= "+ OK signed the User Certificate Request with CA Private Key\n";

  // Add the new row into openssl database
  $openssl['Database'][] = array ('Status'     => 'V',
                                  'ExpDate'    => date ('ymdHis',
                                                        time() +
                                                        date ('Z') +
                                                        ($validdays * 24 * 60 * 60)) .'Z',
                                  'RevDate'    => '',
                                  'Serial'     => openssl_hex_serial ($CAserial),
                                  'File'       => str_replace_spaces($adn['commonName']) .'.crt',
                                  'Name'       => openssl_make_name ($adn)
                                 );

  // Create files

  $OldUMask = umask (0007);

  // Write User Private Key
  // Check to see if a password has been set  
  if (strlen($adn['password']) > 0) {
	// User either generated a random password or typed a password
	if (!openssl_pkey_export_to_file ($UserPrivKey, $UserPrivKeyFile, $adn['password'], $config['openssl']['config']))
	{ $anoutput .= "- ERROR on ". (__LINE__ - 1) ." line (openssl_pkey_export_to_file)\n  ". openssl_error_strings () ."  (That might mean that the key folder is not write enabled for www user)"; break; }
	$anoutput .= "+ OK wrote User Private Key into file $UserPrivKeyFile\n";
  } else {
	// User didn't input anything
        if (!openssl_pkey_export_to_file ($UserPrivKey, $UserPrivKeyFile, NULL, $config['openssl']['config']))
        { $anoutput .= "- ERROR on ". (__LINE__ - 1) ." line (openssl_pkey_export_to_file)\n  ". openssl_error_strings () ."  (That might mean that the key folder is not write enabled for www user)"; break; }
        $anoutput .= "+ OK wrote User Private Key into file $UserPrivKeyFile\n";	
  }

  // Write User Public Certificate
  if (!openssl_x509_export_to_file ($UserPubCert, $UserPubCertFile, FALSE))
  { $anoutput .= "- ERROR on ". (__LINE__ - 1) ." line (openssl_x509_export_to_file)\n  ". openssl_error_strings (); break; }
  $anoutput .= "+ OK wrote User Public Certificate into file $UserPubCertFile\n";

  // Write User Certificate Request
  if (!openssl_csr_export_to_file ($UserReq, $UserCertReqFile))
  { $anoutput .= "- ERROR on ". (__LINE__ - 1) ." line (openssl_csr_export_to_file)\n  ". openssl_error_strings (); break; }
  $anoutput .= "+ OK wrote User Certificate Request into file $UserCertReqFile\n";

  // Write new openssl database
  openssl_write_database ($config['openssl']['database']);
  openssl_write_database_attr ('', $config['openssl']['database']);
  $anoutput .= "+ OK wrote new openssl database\n";

  // Write new openssl serial
  openssl_write_serial ($CAserial + 1, $config['openssl']['serial']);
  $anoutput .= "+ OK wrote new openssl serial\n";

  // Write password to database file
  openssl_write_password (openssl_hex_serial($CAserial), $config['openssl']['passworddb'], $adn['password']);
  $anoutput .= "+ OK wrote new entry in password database\n";

  umask ($OldUMask);

  $Return = openssl_hex_serial ($CAserial);
 } while (FALSE);

 return $Return;
}

// ----------------------------------------------
function openssl_error_strings ()
{
 $sString = '';
 while ($msg = openssl_error_string ())
  $sString .= $msg ."\n";

 return $sString;
}

// ----------------------------------------------
function openssl_make_name ($adn)
{
 $sString = '';

 if (strlen ($adn['countryName'])            > 0) $sString .= '/C='           . $adn['countryName'];
 if (strlen ($adn['stateOrProvinceName'])    > 0) $sString .= '/ST='          . $adn['stateOrProvinceName'];
 if (strlen ($adn['localityName'])           > 0) $sString .= '/L='           . $adn['localityName'];
 if (strlen ($adn['organizationName'])       > 0) $sString .= '/O='           . $adn['organizationName'];
 if (strlen ($adn['organizationalUnitName']) > 0) $sString .= '/OU='          . $adn['organizationalUnitName'];
 if (strlen ($adn['commonName'])             > 0) $sString .= '/CN='          . $adn['commonName'];
 if (strlen ($adn['emailAddress'])           > 0) $sString .= '/emailAddress='. $adn['emailAddress'];

 return $sString;
}

// ----------------------------------------------
function openssl_get_country ($aline)
{ return str_get_sometag ($aline . '/', '\/C=([^/]*)\/'); }

// ----------------------------------------------
function openssl_get_state ($aline)
{ return str_get_sometag ($aline . '/', '\/ST=([^/]*)\/'); }

// ----------------------------------------------
function openssl_get_city ($aline)
{ return str_get_sometag ($aline . '/', '\/L=([^/]*)\/'); }

// ----------------------------------------------
function openssl_get_company ($aline)
{ return str_get_sometag ($aline . '/', '\/O=([^/]*)\/'); }

// ----------------------------------------------
function openssl_get_department ($aline)
{ return str_get_sometag ($aline . '/', '\/OU=([^/]*)\/'); }

// ----------------------------------------------
function openssl_get_CN ($aline)
{ return str_get_sometag ($aline . '/', '\/CN=([^/]*)\/'); }

// ----------------------------------------------
function openssl_get_email ($aline)
{ return str_get_sometag ($aline . '/', '\/emailAddress=([^/]*)\/'); }

// ----------------------------------------------
// Guess the full file name
function openssl_get_filename ($iSerial, $sExt)
{
	global $config;

 	$result = '';
	$sReturn = $config['openssl']['folder'] . $iSerial . $sExt;
	if (file_exists ($sReturn)) {
		$result = $sReturn;
	}

	if (!$result) {
		$sReturn = $config['openssl']['pubfolder'] . $iSerial . $sExt;
		if (file_exists ($sReturn)) {
			$result = $sReturn;
		}
	}

	if (!$result) {
        	$sReturn = $config['openssl']['reqfolder'] . $iSerial . $sExt;
	        if (file_exists ($sReturn)) {
	                $result = $sReturn;
	        }
	}

	if (!$result) {
	        $sReturn = $config['openssl']['prvfolder'] . $iSerial . $sExt;
	        if (file_exists ($sReturn)) {
	                $result = $sReturn;
	        }
	}


	return $result;
}

// Search through database array to find wanted user (by serial)
function openssl_get_database_contents ($iSerial) {
	global $openssl;
	
	foreach ($openssl['Database'] as $tmpValue) {
		if ($tmpValue['Serial'] == $iSerial) {
			$tmpArray = array ('Status'     => $tmpValue['Status'],
                                   'ExpDate'    => $tmpValue['ExpDate'],
                                   'RevDate'    => $tmpValue['RevDate'],
                                   'Serial'     => $tmpValue['Serial'],
                                   'File'       => $tmpValue['File'],
                                   'Name'       => $tmpValue['Name'],
                                   'Country'    => $tmpValue['Country'],
                                   'State'      => $tmpValue['State'],
                                   'City'       => $tmpValue['City'],
                                   'Company'    => $tmpValue['Company'],
                                   'Department' => $tmpValue['Department'],
                                   'CN'         => $tmpValue['CN'],
                                   'Email'      => $tmpValue['Email']
			);
			break;
		}
	}

	// Only return data if a match was found
	if ($tmpArray) {
		return $tmpArray;
	};
}

// Write the users password to a text file
function openssl_write_password($iSerial, $filename, $password) {
	$tmpFile = fopen($filename, 'a');
	fwrite($tmpFile,$iSerial . ',' . $password . "\n");
	fclose($tmpFile);
}

// Read a password from the database
function openssl_read_password($iSerial, $filename) {
	$tmpFile = file($filename);
	$returnvalue = NULL;
	foreach ($tmpFile as $value) {
		$tmpArray = explode(',', $value);
		if ($tmpArray[0] == $iSerial) {
			$returnvalue = $tmpArray[1];
			break;
		}
	}
	
	return $returnvalue;
}
?>
