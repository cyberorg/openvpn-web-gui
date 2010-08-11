<?php /* Smarty version 2.6.26, created on 2010-08-03 12:30:42
         compiled from header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'header.tpl', 7, false),)), $this); ?>
<!doctype html public "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<meta http-equiv="Page-Exit" content="blendTrans(Duration=0.1)">
<?php if ($this->_tpl_vars['refresh'] != ''): ?><meta http-equiv="Refresh" content="<?php echo $this->_tpl_vars['refresh']; ?>
">
<?php endif; ?>
<title><?php echo ((is_array($_tmp=@$this->_tpl_vars['title'])) ? $this->_run_mod_handler('default', true, $_tmp, ".:: blank ::.") : smarty_modifier_default($_tmp, ".:: blank ::.")); ?>
</title>
<?php echo '
<style>
<!--
@media screen
{
 body           {font-family: Tahoma,Verdana,Arial,Helvetica; font-size: 11; color: #000000}
 select         {font-family: Tahoma,Verdana,Arial,Helvetica; font-size: 11; font-weight: bold; color: #3f0f0f;}
 input          {font-family: Tahoma,Verdana,Arial,Helvetica; font-size: 11; font-weight: bold; color: #3f0f0f;
                 background-color: '; ?>
<?php echo $this->_config[0]['vars']['confFieldViewColor']; ?>
<?php echo ';}
 textarea       {font-family: Tahoma,Verdana,Arial,Helvetica; font-size: 11; font-weight: bold; color: #3f0f0f;}
 button         {font-family: Tahoma,Verdana,Arial,Helvetica; font-size: 11; font-weight: bold; color: #3f0f0f;}
 table          {font-family: Tahoma,Verdana,Arial,Helvetica; font-size: 11; color: #000000}
 tr             {font-family: Tahoma,Verdana,Arial,Helvetica; font-size: 11; color: #000000}
 td             {font-family: Tahoma,Verdana,Arial,Helvetica; font-size: 11; color: #000000}
 A.hp:link      {font-family: Tahoma,Verdana,Arial,Helvetica; font-size: 18; text-decoration: none; color: #ffff9c}
 A.hp:visited   {font-family: Tahoma,Verdana,Arial,Helvetica; font-size: 18; text-decoration: none; color: #ffff9c}
 A.hp:hover     {font-family: Tahoma,Verdana,Arial,Helvetica; font-size: 18; text-decoration: underline; color: #ffff9c}
 A.list:link    {font-family: Tahoma,Verdana,Arial,Helvetica; font-size: 11; text-decoration: none; color: #1055CE}
 A.list:visited {font-family: Tahoma,Verdana,Arial,Helvetica; font-size: 11; text-decoration: none; color: #1055CE}
 A.list:hover   {font-family: Tahoma,Verdana,Arial,Helvetica; font-size: 11; text-decoration: underline; color: #0078F0}
 A:link         {font-family: Tahoma,Verdana,Arial,Helvetica; font-size: 11; text-decoration: none; color: #000000}
 A:visited      {font-family: Tahoma,Verdana,Arial,Helvetica; font-size: 11; text-decoration: none; color: #000000}
 A:hover        {font-family: Tahoma,Verdana,Arial,Helvetica; font-size: 11; text-decoration: none; color: #404040}
 .sans          {font-family: verdana,arial,helvetica; font-size: small;}
 .small         {font-family: verdana,arial,helvetica; font-size: x-small;}
 .h1            {font-family: verdana,arial,helvetica; color: #CC6600; font-size: small;}
 .serif         {font-family: times,serif; font-size: small;}
}
@media print
{
 body           {font-family: Tahoma,Verdana,Arial,Helvetica; font-size: 11; color: #000000}
 table          {font-family: Tahoma,Verdana,Arial,Helvetica; font-size: 11; color: #000000}
}
-->
</style>
'; ?>

</head>

<body bgcolor="<?php echo $this->_config[0]['vars']['confBodyBgColor']; ?>
" link="<?php echo $this->_config[0]['vars']['confBodyLinkColor']; ?>
" alink="<?php echo $this->_config[0]['vars']['confBodyALinkColor']; ?>
" vlink="<?php echo $this->_config[0]['vars']['confBodyVLinkColor']; ?>
" topmargin="0" leftmargin="0" marginheight="0" marginwidth="0">

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "menu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<table border="0" width="100%" cellspacing="0" cellpadding="4" bgcolor="#E0E0E0" align="center" valign="top">
