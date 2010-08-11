<?php /* Smarty version 2.6.26, created on 2010-08-03 12:43:28
         compiled from action-certificates.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'action-certificates.tpl', 30, false),)), $this); ?>
<table border="0" width="100%" cellspacing="0" cellpadding="4" bgcolor="#FFFFFF">

<tr valign="top">
<td style="border-bottom:1px groove gray; border-top:1px groove gray" bgcolor="#DDFFCC"><b>#</b></td>
<td style="border-bottom:1px groove gray; border-top:1px groove gray" width="1%">&nbsp;</td>
<td style="border-bottom:1px groove gray; border-top:1px groove gray"><b>Common Name</b></td>
<td style="border-bottom:1px groove gray; border-top:1px groove gray"><b>Department</b></td>
<td style="border-bottom:1px groove gray; border-top:1px groove gray"><b>e-mail</b></td>
<td style="border-bottom:1px groove gray; border-top:1px groove gray"><b>Serial</b></td>
<td style="border-bottom:1px groove gray; border-top:1px groove gray"><b>Status</b></td>
<td style="border-bottom:1px groove gray; border-top:1px groove gray" bgcolor="#DDFFCC" width="5%"><b>Download</b></td>
</tr>
<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['Certificates']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>

<tr valign="top"<?php echo ''; ?><?php if ($this->_tpl_vars['Certificates'][$this->_sections['i']['index']]['Status'] == 'R'): ?><?php echo ' bgcolor="#FFDFDF"'; ?><?php elseif ($this->_tpl_vars['Certificates'][$this->_sections['i']['index']]['Status'] == 'E'): ?><?php echo ' bgcolor="#DFDFDF"'; ?><?php elseif ($this->_tpl_vars['Certificates'][$this->_sections['i']['index']]['Connected']): ?><?php echo ' bgcolor="#DFDFFF"'; ?><?php endif; ?><?php echo ''; ?>
>
<td style="border-bottom:1px groove gray" nowrap width="1%" rowspan="1" align="right" bgcolor="#DDFFCC"><?php echo $this->_sections['i']['iteration']; ?>
</td>
<?php echo '<td style="border-bottom:1px groove gray">'; ?><?php if ($this->_tpl_vars['Certificates'][$this->_sections['i']['index']]['Connected']): ?><?php echo '<a title="connected"><font color="blue"><b>#</b></font></a>'; ?><?php else: ?><?php echo '&nbsp;'; ?><?php endif; ?><?php echo '</td>'; ?>

<?php echo '<td style="border-bottom:1px groove gray"><a href="'; ?><?php echo $_SERVER['PHP_SELF']; ?><?php echo '?Action=ViewCertificate&id='; ?><?php echo $this->_tpl_vars['Certificates'][$this->_sections['i']['index']]['Serial']; ?><?php echo '" title=\'View this certificate\'>'; ?><?php echo ((is_array($_tmp=@$this->_tpl_vars['Certificates'][$this->_sections['i']['index']]['CN'])) ? $this->_run_mod_handler('default', true, $_tmp, "&nbsp;") : smarty_modifier_default($_tmp, "&nbsp;")); ?><?php echo '</td>'; ?>

<?php echo '<td style="border-bottom:1px groove gray">'; ?><?php echo ((is_array($_tmp=@$this->_tpl_vars['Certificates'][$this->_sections['i']['index']]['Department'])) ? $this->_run_mod_handler('default', true, $_tmp, "&nbsp;") : smarty_modifier_default($_tmp, "&nbsp;")); ?><?php echo '</td>'; ?>

<?php echo '<td style="border-bottom:1px groove gray">'; ?><?php if ($this->_tpl_vars['Certificates'][$this->_sections['i']['index']]['Email'] != ''): ?><?php echo '<a href="mailto:'; ?><?php echo $this->_tpl_vars['Certificates'][$this->_sections['i']['index']]['Email']; ?><?php echo '">'; ?><?php echo $this->_tpl_vars['Certificates'][$this->_sections['i']['index']]['Email']; ?><?php echo '</a>'; ?><?php else: ?><?php echo '&nbsp;'; ?><?php endif; ?><?php echo '</td>'; ?>

<?php echo '<td style="border-bottom:1px groove gray" nowrap width="1%" align="right">'; ?><?php echo ((is_array($_tmp=@$this->_tpl_vars['Certificates'][$this->_sections['i']['index']]['Serial'])) ? $this->_run_mod_handler('default', true, $_tmp, "-") : smarty_modifier_default($_tmp, "-")); ?><?php echo '</td>'; ?>

<?php echo '<td style="border-bottom:1px groove gray" nowrap width="1%" align="right">'; ?><?php if ($this->_tpl_vars['Certificates'][$this->_sections['i']['index']]['Status'] == 'V'): ?><?php echo 'Valid'; ?><?php elseif ($this->_tpl_vars['Certificates'][$this->_sections['i']['index']]['Status'] == 'R'): ?><?php echo 'Revoked'; ?><?php elseif ($this->_tpl_vars['Certificates'][$this->_sections['i']['index']]['Status'] == 'E'): ?><?php echo 'Expired'; ?><?php else: ?><?php echo ''; ?><?php endif; ?><?php echo '</td>'; ?>

<?php echo '<td style="border-bottom:1px groove gray" bgcolor="#DDFFCC" nowrap="nowrap">[<a href="'; ?><?php echo $_SERVER['PHP_SELF']; ?><?php echo '?Action=DownloadCertificate&id='; ?><?php echo $this->_tpl_vars['Certificates'][$this->_sections['i']['index']]['Serial']; ?><?php echo '&Type=ZIP" title=\'Download All files in one archive\'>zip</a>]'; ?>
 <?php echo '[<a href="'; ?><?php echo $_SERVER['PHP_SELF']; ?><?php echo '?Action=DownloadCertificate&id='; ?><?php echo $this->_tpl_vars['Certificates'][$this->_sections['i']['index']]['Serial']; ?><?php echo '&Type=CRT" title=\'Download Public Certificate\'>crt</a>]'; ?>
 <?php echo '[<a href="'; ?><?php echo $_SERVER['PHP_SELF']; ?><?php echo '?Action=DownloadCertificate&id='; ?><?php echo $this->_tpl_vars['Certificates'][$this->_sections['i']['index']]['Serial']; ?><?php echo '&Type=KEY" title=\'Download Private Key\'>key</a>]'; ?>
 <?php echo '[<a href="'; ?><?php echo $_SERVER['PHP_SELF']; ?><?php echo '?Action=DownloadCertificate&id='; ?><?php echo $this->_tpl_vars['Certificates'][$this->_sections['i']['index']]['Serial']; ?><?php echo '&Type=CSR" title=\'Download Certificate Request\'>csr</a>]</td>'; ?>

<?php echo '</tr>'; ?>

<?php endfor; else: ?>

<tr><td colspan="2" align="center"><i>There are no certificates made at the minute</i></td></tr>
<?php endif; ?>

</table>