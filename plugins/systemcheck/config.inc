<?php
if (!defined ("LOCAL_SECURITY_KEY"))
 die ();

// The name of plugin should match the registration in the project's config.inc

// Action Name is used in index.php, and in top-menu.tpl
$config['Plugins']['systemcheck']['Action']['Name']      = 'SysCheck';
// Action Include is the main plug-in's file, called from index.php
$config['Plugins']['systemcheck']['Action']['Include']   = 'action.inc';

// Left Menu is used in left-menu.tpl in the Common menu
$config['Plugins']['systemcheck']['Left']['Menu']        = 'left.tpl';
// Left Status is used in left-menu.tpl in the Status subwindow
$config['Plugins']['systemcheck']['Left']['Status']      = 'status.tpl';

// Top Label is used in top-menu.tpl, when comparing with the current label
$config['Plugins']['systemcheck']['Top']['Compare']      = 'SYSCHECK';
// Top Label is used in top-menu.tpl, inside the anchor
$config['Plugins']['systemcheck']['Top']['Label']        = 'System Check';
// Top Tooltip is the tooltip for the anchor
$config['Plugins']['systemcheck']['Top']['Tooltip']      = 'Check some system and PHP settings';
// Top Suffix might be used in the anchor's HREF, after ?Action={$TopMenuLabel}
$config['Plugins']['systemcheck']['Top']['Suffix']       = '&What=PHP';

?>
