<!doctype html public "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<meta http-equiv="Page-Exit" content="blendTrans(Duration=0.1)">
{if $refresh != ''}<meta http-equiv="Refresh" content="{$refresh}">
{/if}
<title>{$title|default:".:: blank ::."}</title>
{literal}
<style>
<!--
@media screen
{
 body           {font-family: Tahoma,Verdana,Arial,Helvetica; font-size: 11; color: #000000}
 select         {font-family: Tahoma,Verdana,Arial,Helvetica; font-size: 11; font-weight: bold; color: #3f0f0f;}
 input          {font-family: Tahoma,Verdana,Arial,Helvetica; font-size: 11; font-weight: bold; color: #3f0f0f;
                 background-color: {/literal}{#confFieldViewColor#}{literal};}
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
{/literal}
</head>

<body bgcolor="{#confBodyBgColor#}" link="{#confBodyLinkColor#}" alink="{#confBodyALinkColor#}" vlink="{#confBodyVLinkColor#}" topmargin="0" leftmargin="0" marginheight="0" marginwidth="0">

{include file="menu.tpl"}

<table border="0" width="100%" cellspacing="0" cellpadding="4" bgcolor="#E0E0E0" align="center" valign="top">

