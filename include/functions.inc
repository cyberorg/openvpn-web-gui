<?php
if (!defined ("LOCAL_SECURITY_KEY"))
 die ();

// ----------------------------------------------
function check_authorize ()
{
 if (!isset ($_SERVER['PHP_AUTH_USER']))
 { authenticate (); }
 else
 {
  $_SESSION['logged'] = true;
  $_SESSION['username'] = $_SERVER['PHP_AUTH_USER'];
  $_SESSION['password'] = $_SERVER['PHP_AUTH_PW'];
 }
}

// ----------------------------------------------
function authenticate ()
{
 global $config;

 header('WWW-Authenticate: Basic realm="'. $config['AUTH_REALM'] .'"');
 header('HTTP/1.0 401 Unauthorized');
 echo '<h2>You need the valid User Name to access the '. $config['AUTH_REALM'] .' !</h2>';
 exit;
}

// ----------------------------------------------
function session_defaults ()
{
 $_SESSION['logged']   = FALSE;
 $_SESSION['username'] = '';
 $_SESSION['password'] = '';
 $_SESSION['cookie']   = 0;
 $_SESSION['remember'] = FALSE;
}

// ----------------------------------------------
function load_plugins ()
{
 global $config;

 if (isset ($config['Plugins']))
 {
  foreach ($config['Plugins'] as $PluginName => $PluginData)
  {
   // Check if the config.inc for a plugin exists
   if (file_exists ('plugins/'. $PluginData['Folder'] .'/config.inc'))
   {
    include ('plugins/'. $PluginData['Folder'] .'/config.inc');

    // Check if claimed inc files do exist
    if (isset ($config['Plugins'][$PluginName]['Action']['Include']) &&
        !file_exists ('plugins/'. $PluginData['Folder'] .'/'.
                     $config['Plugins'][$PluginName]['Action']['Include']))
     $config['Plugins'][$PluginName]['Action']['Include'] = NULL;

    if (isset ($config['Plugins'][$PluginName]['Left']['Menu']) &&
        !file_exists ('plugins/'. $PluginData['Folder'] .'/'.
                     $config['Plugins'][$PluginName]['Left']['Menu']))
     $config['Plugins'][$PluginName]['Left']['Menu'] = NULL;

    if (isset ($config['Plugins'][$PluginName]['Left']['Status']) &&
        !file_exists ('plugins/'. $PluginData['Folder'] .'/'. 
                     $config['Plugins'][$PluginName]['Left']['Status']))
     $config['Plugins'][$PluginName]['Left']['Status'] = NULL;
   }
  }
 }
}

// ----------------------------------------------
function seconds_string ($seconds, $periods = null)
{ 
 $Wanted = '';

 // Define time periods
 if (!is_array ($periods))
 {
  $periods = array (
                    'years'     => 31556926,
                    'months'    => 2629743,
                    'weeks'     => 604800,
                    'days'      => 86400,
                    'hours'     => 3600,
                    'minutes'   => 60,
                    'seconds'   => 1
                    );
 }
 
 // Wanted
 if (empty ($seconds))
 { $Wanted = ''; }
 else
 {
  // Loop
  $seconds = (int) $seconds;
  foreach ($periods as $period => $value)
  {
   $count = floor ($seconds / $value);
 
   if     ($count == 0)
    continue;
   elseif ($count == 1)
    $Wanted .= ($count . ' ' . substr ($period, 0, strlen ($period) - 1) . ' ');
   else
    $Wanted .= ($count . ' ' . $period . ' ');

   $seconds = $seconds % $value;
  }
 }
 
 return rtrim ($Wanted);
}

// ----------------------------------------------
function chomp (&$string)
{
 if (is_array ($string))
 {
  foreach ($string as $i => $val)
  { $endchar = chomp ($string[$i]); }
 }
 else
 {
  $endchar = substr ("$string", strlen("$string") - 1, 1);
  if ($endchar == "\n")
  { $string = substr ("$string", 0, -1); }
 }
 return $endchar;
} 

// ----------------------------------------------
function str_strip_spaces ($aline)
{
 while (strpos ($aline, "\t") != FALSE) $aline = str_replace ("\t", ' ', $aline);
 while (strpos ($aline, '  ') != FALSE) $aline = str_replace ('  ', ' ', $aline);

 return $aline;
}

// Replaces all spaces in a string with underscores
function str_replace_spaces ($aline) {
	return str_replace(" ", "_", $aline);
}

// ----------------------------------------------
// Returns $afile only if it is the full name, or prefixed by $apath
function str_file_fullname ($apath, $afile)
{
 if (substr ($afile, 0, 1) != '/')
  $afile = ($apath . $afile);

 return $afile;
}

// ----------------------------------------------
// Returns $afile only if it is the full name, or prefixed by $apath
function str_openssldata_to_string ($adata)
{
 $Return = '';
 $amonth = array ('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');

 if (substr ($adata, -1, 1) == 'Z')
 {
  $Return = sprintf ("%s %d %s%02d, %02d:%02d:%02d",
                     $amonth [substr ($adata, 2, 2) - 1],
                     substr ($adata, 4, 2),
                    (substr ($adata, 0, 2) > 50 ? '19' : '20'),
                     substr ($adata, 0, 2),
                     substr ($adata, 6, 2),
                     substr ($adata, 8, 2),
                     substr ($adata, 10, 2));
 }

 return $Return;
}

// ----------------------------------------------
function str_get_sometag ($aline, $sometag)
{
 if (eregi ($sometag, $aline, $anarray))
  return $anarray[1];
 else
  return '';
}

// ----------------------------------------------
// Writes content into file
// Optionally sames old file into backup file.
// The Backup File has to reside on the same partition!
function writefile ($afile, $adata, $abackup = NULL)
{
 // Move the old file into Backup one
 if ($abackup != NULL)
 {
  if (file_exists ($afile))
  {
   if (file_exists ($abackup))
    if (!unlink ($abackup))
     exit;
   if (!rename ($afile, $abackup))
    exit;
  }
 }

 $fp = fopen ($afile, "w", 0);
 if (!$fp)
  exit;

 fputs  ($fp, $adata);
 fclose ($fp);
}


// ----------------------------------------------
// Guess the full file name
function if_file_exists (&$sFileName, $bFix = FALSE)
{
 global $config;

 if (strpos ($sFileName, '/') == FALSE)
 {
  $sLongFileName = $config['openvpn']['folder'] . $sFileName;
  if (file_exists ($sLongFileName) && $bFix)
   $sFileName = $sLongFileName;
 }

 return file_exists ($sFileName);
}

// ----------------------------------------------
function zlib_check_functions ()
{
 $Result   = '';
 $ZLibs = array
 (
  'gzcompress'
 );

 foreach ($ZLibs as $Function)
 {
  $Result .= $Function . '<font color="black">:</font> ' . (function_exists ($Function) ?
                                '<font color="black">OK</font>' :
                                '<font color="red">DOES NOT EXIST</font>') . '<br>';
 }    

 return $Result;
}

// ----------------------------------------------
function html_dump ($aname, $athing)
{
 echo '<pre><b><font color="blue">'. $aname .'</font></b>: ';
 print_r ($athing);
 echo "</pre><br>\n";
}

// ----------------------------------------------
function html_error ($amessage, $ifexit = true)
{
 global $config;

 require('Smarty.class.php');
 $smarty = new Smarty;
 $smarty->assign  ('Company_Name', $config['Company_Name']);
 $smarty->assign  ('title',        'OpenVPN Web GUI : error');
 $smarty->assign  ('action',       'ERROR');
 $smarty->assign  ('message',      $amessage);
 $smarty->display ('action-error.tpl');

 if ($ifexit)
  exit;
}

// ----------------------------------------------
function html_postredir ($url)
{
 header ('HTTP/1.1 303 REDIRECT');
 header ('Location: '. $url);
#header ('Status: 303');	// if 1st header generates 500, then commend it out and use this one as 2nd
}

// ----------------------------------------------
function html_download ($sFile, $sName)
{
 header   ('Content-type: application/octet-stream');
 header   ('Content-Disposition: attachment; filename="'. $sName . '"');
 readfile ($sFile);
}

// ----------------------------------------------
function html_download_data ($sData, $sName)
{
 header ('Content-type: application/octet-stream');
 header ('Content-Disposition: attachment; filename="'. $sName . '"');
 echo $sData;
}

// Fill out OpenVPN config file
function openvpn_config_replace ($sData, $sCN) {
	return str_replace('%CN%', str_replace_spaces($sCN), $sData);
}

// Generate random password
function createRandomPassword() { 

    $chars = "abcdefghijkmnopqrstuvwxyz023456789"; 
    srand((double)microtime()*1000000); 
    $i = 0; 
    $pass = '' ; 

    while ($i <= 8) { 
        $num = rand() % 33; 
        $tmp = substr($chars, $num, 1); 
        $pass = $pass . $tmp; 
        $i++; 
    } 

    return $pass; 

} 
?>
