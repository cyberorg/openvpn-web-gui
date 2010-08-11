<?php
if (!defined ("LOCAL_SECURITY_KEY"))
 die ();

// ----------------------------------------------
function openvpn_load_server_conf ()
{
 global $config;
 global $openvpn;
 global $openssl;

 $lines = file ($config['openvpn']['config']);

 if (!is_array ($lines))
 {
  html_error ("The OpenVPN configuration file is empty or does not exist!");
  exit;
 }

 foreach ($lines as $line_num => $line)
 {
  chomp ($line);
  $linetokens = explode (' ', str_strip_spaces ($line));

  switch (strtolower ($linetokens[0]))
  {
   case 'local':          $openvpn['Server']['Local'] =               $linetokens[1]; break;
   case 'proto':          $openvpn['Server']['Proto'] =               $linetokens[1]; break;
   case 'port':           $openvpn['Server']['Port'] =                $linetokens[1]; break;
   case 'dev':            $openvpn['Server']['Dev'] =                 $linetokens[1]; break;
   case 'mode':           $openvpn['Server']['Mode'] =                $linetokens[1]; break;
   case 'max-clients':    $openvpn['Server']['MaxClients'] =          $linetokens[1]; break;
   case 'status':
    $openvpn['Server']['Status']['Exists'] = if_file_exists ($linetokens[1], true);
    $openvpn['Server']['Status']['File']   = $linetokens[1];
    break;
   case 'status-version': $openvpn['Server']['Status']['Version'] =   $linetokens[1]; break;
   case 'ca':
    $openssl['Server']['CA']['Exists'] = if_file_exists ($linetokens[1], true);
    $openssl['Server']['CA']['File']   = $linetokens[1];
    break;
   case 'dh': 
    $openvpn['Server']['DH']['Exists'] = if_file_exists ($linetokens[1], true);
    $openvpn['Server']['DH']['File']   = $linetokens[1];
    break;
   case 'cert':
    $openvpn['Server']['Certificate']['Exists'] = if_file_exists ($linetokens[1], true);
    $openvpn['Server']['Certificate']['File']   = $linetokens[1]; 
    break;
   case 'key':            
    $openvpn['Server']['Private_Key']['Exists'] = if_file_exists ($linetokens[1], true);
    $openvpn['Server']['Private_Key']['File']   = $linetokens[1];
    break;
   case 'tls-auth':
    $openvpn['Server']['TLS_Auth']['Exists'] = if_file_exists ($linetokens[1], true);
    $openvpn['Server']['TLS_Auth']['File']   = $linetokens[1];
    $openvpn['Server']['TLS_Auth']['Key']    = $linetokens[2];
    break;
   case 'crl-verify':     
    $openvpn['Server']['CRL_Verify']['Exists'] = if_file_exists ($linetokens[1], true);
    $openvpn['Server']['CRL_Verify']['File']   = $linetokens[1];
    break;
  }
 }
}

// ----------------------------------------------
function openvpn_load_status ()
{
 global $config;
 global $openvpn;

 $stop_reading = FALSE;

 if (!isset ($openvpn['Server']['Status']['File']))
 {
  html_error ("The OpenVPN status file is not defined!");
  exit;
 }

 $lines = file (str_file_fullname ($config['openvpn']['folder'], $openvpn['Server']['Status']['File']));

 if (!is_array ($lines))
 {
  html_error ("The OpenVPN status file is empty or does not exist!");
  exit;
 }

 foreach ($lines as $line_num => $line)
 {
  chomp ($line);
  $linetokens = explode (',', $line);

  if      ($linetokens[0] == 'TITLE')
   $openvpn['Server']['Title'] = $linetokens[1];
  else if ($linetokens[0] == 'TIME')
  {
   $openvpn['Server']['DateTime'] = $linetokens[1]; 
   $openvpn['Server']['Time']     = $linetokens[2]; 
  }
  else if ($linetokens[0] == 'HEADER' && $linetokens[1] == 'CLIENT_LIST')
  {
   // We will need to know what field is what ?
  }
  else if ($linetokens[0] == 'HEADER' && $linetokens[1] == 'ROUTING_TABLE')
  {
   // We will need to know what field is what ?
  }
  else if ($linetokens[0] == 'CLIENT_LIST')
  {
   $openvpn['Client'][] = array ('CN'          => str_replace ('_', ' ', $linetokens[1]),
                                 'REALADDR'    => $linetokens[2],
                                 'VIRTADDR'    => $linetokens[3],
                                 'BYTESRCV'    => $linetokens[4],
                                 'BYTESSND'    => $linetokens[5],
                                 'SINCE'       => $linetokens[6],
                                 'SINCEUT'     => $linetokens[7],
                                 'Seconds_Ago' => seconds_string (time () - $linetokens[7])
                                );
  }
  else if ($linetokens[0] == 'ROUTING_TABLE')
  {
   $openvpn['Routing'][] = array ('VIRTADDR'    => $linetokens[1],
                                  'CN'          => str_replace ('_', ' ', $linetokens[2]),
                                  'REALADDR'    => $linetokens[3],
                                  'LAST'        => $linetokens[4],
                                  'Seconds_Ago' => seconds_string (time () - $linetokens[4])
                                 );
  }
 }
}

// ----------------------------------------------
function openvpn_find_connected ()
{
 global $openvpn;
 global $openssl;

 // find who is connected
 if (isset ($openvpn['Client']))
  $cnconnected = count ($openvpn['Client']);
 else
  $cnconnected = 0;
 $cntotal     = count ($openssl['Database']);

 if ($cnconnected > 0)
  for ($i = 0; $i < $cnconnected; $i++)
   for ($j = 0; $j < $cntotal; $j++)
    if ($openvpn['Client'][$i]['CN'] == $openssl['Database'][$j]['CN'])
    {
     $openssl['Database'][$j]['Connected'] = true;
     break;
    } 
}
?>
