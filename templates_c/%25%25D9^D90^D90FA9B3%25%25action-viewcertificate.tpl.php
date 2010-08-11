<?php /* Smarty version 2.6.26, created on 2010-08-10 16:16:54
         compiled from action-viewcertificate.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'action-viewcertificate.tpl', 90, false),)), $this); ?>
<table border="0" width="100%" cellspacing="0" cellpadding="4" bgcolor="#FFFFFF">

<tr valign="top"><td colspan="2" style="border-top:1px groove black; border-bottom:1px groove black"><b>Certificate Information</b></td></tr>

<tr valign="top">
<td nowrap width="1%" align="right" bgcolor="#DDFFCC">Serial</td>
<td><font color="blue"><?php echo $this->_tpl_vars['Certificate']['Serial']; ?>
</font></td>
</tr>

<tr valign="top">
<td nowrap width="1%" align="right" bgcolor="#DDFFCC">Status</td>
<?php echo '<td><font color="blue">'; ?><?php if ($this->_tpl_vars['Certificate']['Status'] == 'V'): ?><?php echo 'Valid'; ?><?php elseif ($this->_tpl_vars['Certificate']['Status'] == 'R'): ?><?php echo 'Revoked'; ?><?php elseif ($this->_tpl_vars['Certificate']['Status'] == 'E'): ?><?php echo 'Expired'; ?><?php endif; ?><?php echo ''; ?><?php if ($this->_tpl_vars['Certificate']['Connected']): ?><?php echo ', Now connected'; ?><?php endif; ?><?php echo '</font></td>'; ?>

</tr>

<tr valign="top">
<td nowrap width="1%" align="right" bgcolor="#DDFFCC" style="border-bottom:1px groove black"><?php echo ''; ?><?php if ($this->_tpl_vars['Certificate']['Status'] == 'V'): ?><?php echo 'Expiration'; ?><?php elseif ($this->_tpl_vars['Certificate']['Status'] == 'R'): ?><?php echo 'Revoked'; ?><?php else: ?><?php echo '&nbsp;'; ?><?php endif; ?><?php echo '</td>'; ?>

<td style="border-bottom:1px groove black"><font color="blue"><?php echo ''; ?><?php if ($this->_tpl_vars['Certificate']['Status'] == 'V'): ?><?php echo ''; ?><?php echo $this->_tpl_vars['Certificate']['ExpDate']; ?><?php echo ''; ?><?php elseif ($this->_tpl_vars['Certificate']['Status'] == 'R'): ?><?php echo ''; ?><?php echo $this->_tpl_vars['Certificate']['RevDate']; ?><?php echo ''; ?><?php else: ?><?php echo '&nbsp;'; ?><?php endif; ?><?php echo '</font></td>'; ?>

</tr>

<tr valign="top">
<td nowrap width="1%" align="right" bgcolor="#DDFFCC">Common Name</td>
<td><font color="blue"><?php echo $this->_tpl_vars['Certificate']['CN']; ?>
</font></td>
</tr>

<tr valign="top">
<td nowrap width="1%" align="right" bgcolor="#DDFFCC" style="border-bottom:1px groove black">e-mail</td>
<td style="border-bottom:1px groove black"><font color="blue"><?php echo ''; ?><?php if ($this->_tpl_vars['Certificate']['Email'] != ''): ?><?php echo '<a href="mailto:'; ?><?php echo $this->_tpl_vars['Certificate']['Email']; ?><?php echo '">'; ?><?php echo $this->_tpl_vars['Certificate']['Email']; ?><?php echo '</a>'; ?><?php else: ?><?php echo '&nbsp;'; ?><?php endif; ?><?php echo '</font></td>'; ?>

</tr>

<tr valign="top">
<td nowrap width="1%" align="right" bgcolor="#DDFFCC">Country</td>
<td><font color="blue"><?php echo $this->_tpl_vars['Certificate']['Country']; ?>
</font></td>
</tr>

<tr valign="top">
<td nowrap width="1%" align="right" bgcolor="#DDFFCC">State or Province</td>
<td><font color="blue"><?php echo $this->_tpl_vars['Certificate']['State']; ?>
</font></td>
</tr>

<tr valign="top">
<td nowrap width="1%" align="right" bgcolor="#DDFFCC">City</td>
<td><font color="blue"><?php echo $this->_tpl_vars['Certificate']['City']; ?>
</font></td>
</tr>

<tr valign="top">
<td nowrap width="1%" align="right" bgcolor="#DDFFCC">Company</td>
<td><font color="blue"><?php echo $this->_tpl_vars['Certificate']['Company']; ?>
</font></td>
</tr>

<tr valign="top">
<td nowrap width="1%" align="right" bgcolor="#DDFFCC">Department</td>
<td><font color="blue"><?php echo ((is_array($_tmp=@$this->_tpl_vars['Certificate']['Department'])) ? $this->_run_mod_handler('default', true, $_tmp, "&nbsp;") : smarty_modifier_default($_tmp, "&nbsp;")); ?>
</font></td>
</tr>

<tr valign="top"><td colspan="2" style="border-top:1px groove black; border-bottom:1px groove black"><b>Certificate Files</b></td></tr>

<tr valign="top">
<td nowrap width="1%" align="right" bgcolor="#DDFFCC">Public Certificate</td>
<td><?php echo ''; ?><?php if ($this->_tpl_vars['CertificateFileCRT'] != ''): ?><?php echo '<a href="'; ?><?php echo $_SERVER['PHP_SELF']; ?><?php echo '?Action=DownloadCertificate&id='; ?><?php echo $this->_tpl_vars['Certificate']['Serial']; ?><?php echo '&Type=CRT" title=\'Download Public Certificate\'>Download</a>'; ?><?php else: ?><?php echo '&lt;File not found&gt;'; ?><?php endif; ?><?php echo ''; ?>
</td>
</tr>

<tr valign="top">
<td nowrap width="1%" align="right" bgcolor="#DDFFCC">Private Key</td>
<td><?php echo ''; ?><?php if ($this->_tpl_vars['CertificateFileKEY'] != ''): ?><?php echo '<a href="'; ?><?php echo $_SERVER['PHP_SELF']; ?><?php echo '?Action=DownloadCertificate&id='; ?><?php echo $this->_tpl_vars['Certificate']['Serial']; ?><?php echo '&Type=KEY" title=\'Download Private Key\'>Download</a>'; ?><?php else: ?><?php echo '&lt;File not found&gt;'; ?><?php endif; ?><?php echo ''; ?>
</td>
</tr>

<tr valign="top">
<td style="border-bottom:1px groove black" nowrap width="1%" align="right" bgcolor="#DDFFCC">Certificate Request</td>
<td style="border-bottom:1px groove black"><?php echo ''; ?><?php if ($this->_tpl_vars['CertificateFileCSR'] != ''): ?><?php echo '<a href="'; ?><?php echo $_SERVER['PHP_SELF']; ?><?php echo '?Action=DownloadCertificate&id='; ?><?php echo $this->_tpl_vars['Certificate']['Serial']; ?><?php echo '&Type=CSR" title=\'Download Certificate Request\'>Download</a>'; ?><?php else: ?><?php echo '&lt;File not found&gt;'; ?><?php endif; ?><?php echo ''; ?>
</td>
</tr>

<tr valign="top">
<td style="border-bottom:1px groove black" nowrap width="1%" align="right" bgcolor="#DDFFCC">Archive</td>
<td style="border-bottom:1px groove black"><?php echo ''; ?><?php if ($this->_tpl_vars['CertificateFileCRT'] != '' || $this->_tpl_vars['CertificateFileKEY'] != '' || $this->_tpl_vars['CertificateFileCSR'] != ''): ?><?php echo '<a href="'; ?><?php echo $_SERVER['PHP_SELF']; ?><?php echo '?Action=DownloadCertificate&id='; ?><?php echo $this->_tpl_vars['Certificate']['Serial']; ?><?php echo '&Type=ZIP" title=\'Download all files in one archive\'>Download</a>'; ?><?php else: ?><?php echo '&lt;File not found&gt;'; ?><?php endif; ?><?php echo ''; ?>
</td>
</tr>

<tr valign="top"><td colspan="2" style="border-top:1px groove black; border-bottom:1px groove black"><b>Misc Information</b></td></tr>

<tr valign="top">
<td style="border-bottom:1px groove black" nowrap width="1%" align="right" bgcolor="#DDFFCC">Password</td>
<td style="border-bottom:1px groove black"><?php echo ''; ?><?php if ($this->_tpl_vars['Password'] != ''): ?><?php echo ''; ?><?php echo $this->_tpl_vars['Password']; ?><?php echo ''; ?><?php else: ?><?php echo '&lt;Password is either blank or not on file&gt;'; ?><?php endif; ?><?php echo ''; ?>
</td>
</tr>

</table>