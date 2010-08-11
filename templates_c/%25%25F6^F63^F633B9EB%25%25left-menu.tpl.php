<?php /* Smarty version 2.6.26, created on 2010-08-03 12:34:31
         compiled from left-menu.tpl */ ?>
<table border="0" width="100%" cellspacing="0" cellpadding="4" bgcolor="#FFFFFF">
<tr><td style="border-top:1px groove black; border-bottom:1px groove black" bgcolor="#BFBFDF"><b>Common Tasks</b></td></tr>
<?php if ($this->_tpl_vars['action'] == 'CERTIFICATES'): ?>
<tr><td>
<?php if ($this->_tpl_vars['subaction'] != ''): ?>
<?php echo '- <a href="'; ?><?php echo $_SERVER['PHP_SELF']; ?><?php echo '?Action=Certificates" title="View all certificates">All Certificates</a><br>'; ?>

<?php endif; ?>
<?php echo '- <a href="'; ?><?php echo $_SERVER['PHP_SELF']; ?><?php echo '?Action=NewCertificate" title="Create the new certificate">New Certificate</a>'; ?>

<?php endif; ?>
</td></tr>
<?php $_from = $this->_tpl_vars['Plugins']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['i'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['i']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['Plugin']):
        $this->_foreach['i']['iteration']++;
?>
<?php if ($this->_tpl_vars['Plugin']['Left']['Menu'] != ''): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "file:".($this->_tpl_vars['PluginPath']).($this->_tpl_vars['Plugin']['Folder'])."/".($this->_tpl_vars['Plugin']['Left']['Menu']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
</table>