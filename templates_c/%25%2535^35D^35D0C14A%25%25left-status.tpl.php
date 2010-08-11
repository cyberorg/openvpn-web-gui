<?php /* Smarty version 2.6.26, created on 2010-08-03 12:34:31
         compiled from left-status.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'left-status.tpl', 3, false),array('modifier', 'count', 'left-status.tpl', 9, false),)), $this); ?>
<table border="0" cellspacing="0" cellpadding="4" bgcolor="#FFFFFF">
<tr><td style="border-top:1px groove black; border-bottom:1px groove black" bgcolor="#BFBFDF"><b>Server Status</b></td></tr>
<tr><td>The OpenVPN server version is <b><font color="blue"><?php echo ((is_array($_tmp=@$this->_tpl_vars['Server']['Title'])) ? $this->_run_mod_handler('default', true, $_tmp, "<i>unknown</i>") : smarty_modifier_default($_tmp, "<i>unknown</i>")); ?>
</font></b></td></tr>
<?php echo '<tr><td>The last status was recorded at <b><font color="blue">'; ?><?php echo ((is_array($_tmp=@$this->_tpl_vars['Server']['DateTime'])) ? $this->_run_mod_handler('default', true, $_tmp, "<i>unknown</i>") : smarty_modifier_default($_tmp, "<i>unknown</i>")); ?><?php echo '</font></b><br>what was <b><font color="red">'; ?><?php echo ((is_array($_tmp=@$this->_tpl_vars['Seconds_Ago'])) ? $this->_run_mod_handler('default', true, $_tmp, '<i>unknown</i>') : smarty_modifier_default($_tmp, '<i>unknown</i>')); ?><?php echo '</font></b> seconds ago</td></tr>'; ?>

<tr><td nowrap width="5%"><?php echo ''; ?><?php if (count($this->_tpl_vars['Client']) == 0): ?><?php echo 'No clients connected</b>'; ?><?php elseif (count($this->_tpl_vars['Client']) == 1): ?><?php echo 'Connected <b><font color="red">1</font></b> client'; ?><?php elseif (count($this->_tpl_vars['Client']) > 1): ?><?php echo 'Connected <b><font color="red">'; ?><?php echo count($this->_tpl_vars['Client']); ?><?php echo '</font></b> clients'; ?><?php endif; ?><?php echo '</td></tr>'; ?>

<?php if ($this->_tpl_vars['Certificates'] != ''): ?>
<?php echo '<tr><td>OpenSSL has <b><font color="red">'; ?><?php if (count($this->_tpl_vars['Certificates']) == 0): ?><?php echo 'no certificates</font></b>'; ?><?php elseif (count($this->_tpl_vars['Certificates']) == 1): ?><?php echo '1</font></b> <a href="'; ?><?php echo $_SERVER['PHP_SELF']; ?><?php echo '?Action=Certificates">certificate</a>'; ?><?php elseif (count($this->_tpl_vars['Certificates']) > 1): ?><?php echo ''; ?><?php echo count($this->_tpl_vars['Certificates']); ?><?php echo '</font></b> <a href="'; ?><?php echo $_SERVER['PHP_SELF']; ?><?php echo '?Action=Certificates">certificates</a>'; ?><?php endif; ?><?php echo '</b></td></tr>'; ?>

<?php endif; ?>
<?php $_from = $this->_tpl_vars['Plugins']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['i'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['i']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['Plugin']):
        $this->_foreach['i']['iteration']++;
?>
<?php if ($this->_tpl_vars['Plugin']['Left']['Status'] != ''): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "file:".($this->_tpl_vars['PluginPath']).($this->_tpl_vars['Plugin']['Folder'])."/".($this->_tpl_vars['Plugin']['Left']['Status']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
</table>