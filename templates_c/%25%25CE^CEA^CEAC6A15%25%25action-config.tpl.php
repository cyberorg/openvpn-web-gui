<?php /* Smarty version 2.6.26, created on 2010-08-03 12:45:07
         compiled from action-config.tpl */ ?>
<table border="0" width="100%" cellspacing="0" cellpadding="4" bgcolor="#FFFFFF">

<tr valign="top">
<td colspan="2" style="border-top:1px groove black; border-bottom:1px groove black"><b>Server Settings</b></td></tr>

<tr valign="top">
<td nowrap width="1%" align="right" bgcolor="#DDFFCC">Mode</td>
<td><font color="blue"><?php echo $this->_tpl_vars['Server']['Mode']; ?>
</font></td>
</tr>

<tr valign="top">
<td nowrap width="1%" align="right" bgcolor="#DDFFCC">Uses device</td>
<td><font color="blue"><?php echo $this->_tpl_vars['Server']['Dev']; ?>
</font></td>
</tr>

<tr valign="top">
<td nowrap width="1%" align="right" bgcolor="#DDFFCC">Listens on</td>
<td><font color="blue"><?php echo $this->_tpl_vars['Server']['Local']; ?>
:<?php echo $this->_tpl_vars['Server']['Port']; ?>
 (<?php echo $this->_tpl_vars['Server']['Proto']; ?>
)</font></td>
</tr>

<tr valign="top">
<td nowrap width="1%" align="right" bgcolor="#DDFFCC">Maximum Clients</td>
<td><font color="blue"><?php echo $this->_tpl_vars['Server']['MaxClients']; ?>
</font></td>
</tr>

<tr valign="top"><td colspan="2" style="border-top:1px groove black; border-bottom:1px groove black"><b>Certificate Files</b></td></tr>

<tr valign="top">
<td nowrap width="1%" align="right" bgcolor="#DDFFCC">DH</td>
<td><font color="blue"><?php echo $this->_tpl_vars['Server']['DH']['File']; ?>
</font> <?php echo ''; ?><?php if ($this->_tpl_vars['Server']['DH']['Exists'] == true): ?><?php echo '[<a href="'; ?><?php echo $_SERVER['PHP_SELF']; ?><?php echo '?Action=DownloadConfigFile&id=DH" title=\'DH File\'>download</a>]'; ?><?php else: ?><?php echo '[<font color="red">does not exist</font>]'; ?><?php endif; ?><?php echo ''; ?>
</td>
</tr>

<tr valign="top">
<td nowrap width="1%" align="right" bgcolor="#DDFFCC">CA Certificate</td>
<td><font color="blue"><?php echo $this->_tpl_vars['Openssl']['CA']['File']; ?>
</font> <?php echo ''; ?><?php if ($this->_tpl_vars['Openssl']['CA']['Exists'] == true): ?><?php echo '[<a href="'; ?><?php echo $_SERVER['PHP_SELF']; ?><?php echo '?Action=DownloadConfigFile&id=CA" title=\'Certificate Authority Public Certificate\'>download</a>]'; ?><?php else: ?><?php echo '[<font color="red">does not exist</font>]'; ?><?php endif; ?><?php echo ''; ?>
</td>
</tr>

<tr valign="top">
<td nowrap width="1%" align="right" bgcolor="#DDFFCC">Server Certificate</td>
<td><font color="blue"><?php echo $this->_tpl_vars['Server']['Certificate']['File']; ?>
</font> <?php echo ''; ?><?php if ($this->_tpl_vars['Server']['Certificate']['Exists'] == true): ?><?php echo '[<a href="'; ?><?php echo $_SERVER['PHP_SELF']; ?><?php echo '?Action=DownloadConfigFile&id=CRT" title=\'Server Public Certificate\'>download</a>]'; ?><?php else: ?><?php echo '[<font color="red">does not exist</font>]'; ?><?php endif; ?><?php echo ''; ?>
</td>
</tr>

<tr valign="top">
<td nowrap width="1%" align="right" bgcolor="#DDFFCC">Server Private Key</td>
<td><font color="blue"><?php echo $this->_tpl_vars['Server']['Private_Key']['File']; ?>
</font> <?php echo ''; ?><?php if ($this->_tpl_vars['Server']['Private_Key']['Exists'] == true): ?><?php echo '[<a href="'; ?><?php echo $_SERVER['PHP_SELF']; ?><?php echo '?Action=DownloadConfigFile&id=KEY" title=\'Server Private Key\'>download</a>]'; ?><?php else: ?><?php echo '[<font color="red">does not exist</font>]'; ?><?php endif; ?><?php echo ''; ?>
</td>
</tr>

<tr valign="top">
<td nowrap width="1%" align="right" bgcolor="#DDFFCC">TLS Authentication</td>
<td><font color="blue"><?php echo $this->_tpl_vars['Server']['TLS_Auth']['File']; ?>
</font><?php echo ''; ?><?php if ($this->_tpl_vars['Server']['DH']['Exists'] == true): ?><?php echo ', '; ?><?php if ($this->_tpl_vars['Server']['TLS_Auth']['Key'] == 0): ?><?php echo 'server '; ?><?php else: ?><?php echo 'client '; ?><?php endif; ?><?php echo 'side [<a href="'; ?><?php echo $_SERVER['PHP_SELF']; ?><?php echo '?Action=DownloadConfigFile&id=TLS" title=\'Server TLS Key\'>download</a>]'; ?><?php else: ?><?php echo '&nbsp;[<font color="red">does not exist</font>]'; ?><?php endif; ?><?php echo ''; ?>
</td>
</tr>

<tr valign="top">
<td nowrap width="1%" align="right" bgcolor="#DDFFCC">CRL Verify File</td>
<td><font color="blue"><?php echo $this->_tpl_vars['Server']['CRL_Verify']['File']; ?>
</font> <?php echo ''; ?><?php if ($this->_tpl_vars['Server']['CRL_Verify']['Exists'] == true): ?><?php echo '[<a href="'; ?><?php echo $_SERVER['PHP_SELF']; ?><?php echo '?Action=DownloadConfigFile&id=CRL" title=\'OPENSSL Certificate Revocation List\'>download</a>]'; ?><?php else: ?><?php echo '[<font color="red">does not exist</font>]'; ?><?php endif; ?><?php echo ''; ?>
</td>
</tr>
</table>