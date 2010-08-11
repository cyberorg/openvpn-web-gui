<?php /* Smarty version 2.6.26, created on 2010-08-03 12:30:42
         compiled from action-error.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'config_load', 'action-error.tpl', 2, false),)), $this); ?>
<?php echo smarty_function_config_load(array('file' => "colors.conf"), $this);?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<tr valign="top" align="left">
<td width="150">
&nbsp;
</td>
<td>

<p><i>There is an error happened:</i></p>
<p><font color="red"><?php echo $this->_tpl_vars['message']; ?>
</font></p>

</td></tr></table>
</body>
</html>
