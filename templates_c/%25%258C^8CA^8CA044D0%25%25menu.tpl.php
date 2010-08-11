<?php /* Smarty version 2.6.26, created on 2010-08-03 12:30:42
         compiled from menu.tpl */ ?>
<table bgcolor="#AFAFFF" border="0" width="100%" cellpadding="2" cellspacing="0">
<tr><td colspan="7" align="right"><img src="img/1x1.gif" height="1" width="100%"></td></tr>

<tr valign="middle">

<td nowrap width="1%" style="border-bottom:1px solid black">
&nbsp;<img src="<?php echo $this->_tpl_vars['Company_Logo']; ?>
" width="16" height="16" border="0" alt="" valign="middle">&nbsp;
</td>

<!-- Action = Status -->
<?php echo ''; ?><?php if ($this->_tpl_vars['action'] == 'STATUS'): ?><?php echo '<td nowrap width="1%" style="border-bottom:1px solid '; ?><?php echo $this->_config[0]['vars']['confBodyBgColor']; ?><?php echo '" bgcolor="'; ?><?php echo $this->_config[0]['vars']['confBodyBgColor']; ?><?php echo '">&nbsp;'; ?><?php else: ?><?php echo '<td nowrap width="1%" style="border-bottom:1px solid black" bgcolor="#CFCFFF">&nbsp;<a href="'; ?><?php echo $_SERVER['PHP_SELF']; ?><?php echo '?Action=Status" title="View the status of OpenVPN server">'; ?><?php endif; ?><?php echo '<b>Status</b>'; ?><?php if ($this->_tpl_vars['action'] != 'STATUS'): ?><?php echo '</a>'; ?><?php endif; ?><?php echo '&nbsp;</td>'; ?>


<td style="border-bottom:1px solid black"><img src="img/1x1.gif" width="2" height="1"></td>

<!-- Action = Config -->
<?php echo ''; ?><?php if ($this->_tpl_vars['action'] == 'CONFIG'): ?><?php echo '<td nowrap width="1%" style="border-bottom:1px solid '; ?><?php echo $this->_config[0]['vars']['confBodyBgColor']; ?><?php echo '" bgcolor="'; ?><?php echo $this->_config[0]['vars']['confBodyBgColor']; ?><?php echo '">&nbsp;'; ?><?php else: ?><?php echo '<td nowrap width="1%" style="border-bottom:1px solid black" bgcolor="#CFCFFF">&nbsp;<a href="'; ?><?php echo $_SERVER['PHP_SELF']; ?><?php echo '?Action=Config" title="View the configuration of OpenVPN server">'; ?><?php endif; ?><?php echo '<b>Config</b>'; ?><?php if ($this->_tpl_vars['action'] != 'CONFIG'): ?><?php echo '</a>'; ?><?php endif; ?><?php echo '&nbsp;</td>'; ?>


<td style="border-bottom:1px solid black"><img src="img/1x1.gif" width="2" height="1"></td>

<!-- Action = Certificates -->
<?php echo ''; ?><?php if ($this->_tpl_vars['action'] == 'CERTIFICATES'): ?><?php echo '<td nowrap width="1%" style="border-bottom:1px solid '; ?><?php echo $this->_config[0]['vars']['confBodyBgColor']; ?><?php echo '" bgcolor="'; ?><?php echo $this->_config[0]['vars']['confBodyBgColor']; ?><?php echo '">'; ?><?php if ($this->_tpl_vars['subaction'] != ''): ?><?php echo '&nbsp;<a href="'; ?><?php echo $_SERVER['PHP_SELF']; ?><?php echo '?Action=Certificates" title="View the OpenSSL certificates">'; ?><?php else: ?><?php echo '&nbsp;'; ?><?php endif; ?><?php echo ''; ?><?php else: ?><?php echo '<td nowrap width="1%" style="border-bottom:1px solid black" bgcolor="#CFCFFF">&nbsp;<a href="'; ?><?php echo $_SERVER['PHP_SELF']; ?><?php echo '?Action=Certificates" title="View the OpenSSL certificates">'; ?><?php endif; ?><?php echo '<b>Certificates</b>'; ?><?php if ($this->_tpl_vars['action'] == 'CERTIFICATES'): ?><?php echo ''; ?><?php if ($this->_tpl_vars['subaction'] != ''): ?><?php echo '</a>'; ?><?php endif; ?><?php echo ''; ?><?php else: ?><?php echo '</a>'; ?><?php endif; ?><?php echo '&nbsp;</td>'; ?>


<?php $_from = $this->_tpl_vars['Plugins']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['i'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['i']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['Plugin']):
        $this->_foreach['i']['iteration']++;
?>
<td style="border-bottom:1px solid black"><img src="img/1x1.gif" width="2" height="1"></td>

<!-- Action = <?php echo $this->_tpl_vars['Plugin']['Action']['Name']; ?>
-->
<?php echo ''; ?><?php if ($this->_tpl_vars['action'] == $this->_tpl_vars['Plugin']['Top']['Compare']): ?><?php echo '<td nowrap width="1%" style="border-bottom:1px solid '; ?><?php echo $this->_config[0]['vars']['confBodyBgColor']; ?><?php echo '" bgcolor="'; ?><?php echo $this->_config[0]['vars']['confBodyBgColor']; ?><?php echo '">&nbsp;'; ?><?php else: ?><?php echo '<td nowrap width="1%" style="border-bottom:1px solid black" bgcolor="#CFCFFF">&nbsp;<a href="'; ?><?php echo $_SERVER['PHP_SELF']; ?><?php echo '?Action='; ?><?php echo $this->_tpl_vars['Plugin']['Action']['Name']; ?><?php echo ''; ?><?php echo $this->_tpl_vars['Plugin']['Top']['Suffix']; ?><?php echo '" title="'; ?><?php echo $this->_tpl_vars['Plugin']['Top']['Tooltip']; ?><?php echo '">'; ?><?php endif; ?><?php echo '<b>'; ?><?php echo $this->_tpl_vars['Plugin']['Top']['Label']; ?><?php echo '</b>'; ?><?php if ($this->_tpl_vars['action'] != $this->_tpl_vars['Plugin']['Top']['Compare']): ?><?php echo '</a>'; ?><?php endif; ?><?php echo '&nbsp;</td>'; ?>


<?php endforeach; endif; unset($_from); ?>
<?php echo '<td nowrap width="99%" align="right" style="border-bottom:1px solid black;"><font color="#ffff9c" size="+1"><b>&nbsp;'; ?><?php echo ''; ?><?php if ($this->_tpl_vars['URL_Home_Page'] != ''): ?><?php echo '<a href="'; ?><?php echo $this->_tpl_vars['URL_Home_Page']; ?><?php echo '" class="hp" target="_blank">'; ?><?php endif; ?><?php echo ''; ?><?php echo $this->_tpl_vars['Company_Name']; ?><?php echo ''; ?><?php if ($this->_tpl_vars['URL_Home_Page'] != ''): ?><?php echo '</a>'; ?><?php endif; ?><?php echo ''; ?><?php echo '&nbsp;<font color="#000000">OpenVPN</font></b></font>&nbsp;&nbsp;</td>'; ?>


</tr>
</table>