<table bgcolor="#AFAFFF" border="0" width="100%" cellpadding="2" cellspacing="0">
<tr><td colspan="7" align="right"><img src="img/1x1.gif" height="1" width="100%"></td></tr>

<tr valign="middle">

<td nowrap width="1%" style="border-bottom:1px solid black">
&nbsp;<img src="{$Company_Logo}" width="16" height="16" border="0" alt="" valign="middle">&nbsp;
</td>

<!-- Action = Status -->
{strip}
{if $action == 'STATUS'}
 <td nowrap width="1%" style="border-bottom:1px solid {#confBodyBgColor#}" bgcolor="{#confBodyBgColor#}">
 &nbsp;
{else}
 <td nowrap width="1%" style="border-bottom:1px solid black" bgcolor="#CFCFFF">
 &nbsp;<a href="{$smarty.server.PHP_SELF}?Action=Status" title="View the status of OpenVPN server">
{/if}
<b>Status</b>
{if $action != 'STATUS'}
 </a>
{/if}
 &nbsp;
 </td>
{/strip}

<td style="border-bottom:1px solid black"><img src="img/1x1.gif" width="2" height="1"></td>

<!-- Action = Config -->
{strip}
{if $action == 'CONFIG'}
 <td nowrap width="1%" style="border-bottom:1px solid {#confBodyBgColor#}" bgcolor="{#confBodyBgColor#}">
 &nbsp;
{else}
 <td nowrap width="1%" style="border-bottom:1px solid black" bgcolor="#CFCFFF">
 &nbsp;<a href="{$smarty.server.PHP_SELF}?Action=Config" title="View the configuration of OpenVPN server">
{/if}
<b>Config</b>
{if $action != 'CONFIG'}
 </a>
{/if}
 &nbsp;
 </td>
{/strip}

<td style="border-bottom:1px solid black"><img src="img/1x1.gif" width="2" height="1"></td>

<!-- Action = Certificates -->
{strip}
{if $action == 'CERTIFICATES'}
 <td nowrap width="1%" style="border-bottom:1px solid {#confBodyBgColor#}" bgcolor="{#confBodyBgColor#}">
 {if $subaction != ''}
  &nbsp;<a href="{$smarty.server.PHP_SELF}?Action=Certificates" title="View the OpenSSL certificates">
 {else}
  &nbsp;
 {/if}
{else}
 <td nowrap width="1%" style="border-bottom:1px solid black" bgcolor="#CFCFFF">
 &nbsp;<a href="{$smarty.server.PHP_SELF}?Action=Certificates" title="View the OpenSSL certificates">
{/if}
<b>Certificates</b>
{if $action == 'CERTIFICATES'}
 {if $subaction != ''}
  </a>
 {/if}
{else}
 </a>
{/if}
 &nbsp;
 </td>
{/strip}

{foreach from=$Plugins item=Plugin name=i}
<td style="border-bottom:1px solid black"><img src="img/1x1.gif" width="2" height="1"></td>

<!-- Action = {$Plugin.Action.Name}-->
{strip}
{if $action == $Plugin.Top.Compare}
<td nowrap width="1%" style="border-bottom:1px solid {#confBodyBgColor#}" bgcolor="{#confBodyBgColor#}">
&nbsp;
{else}
<td nowrap width="1%" style="border-bottom:1px solid black" bgcolor="#CFCFFF">
&nbsp;<a href="{$smarty.server.PHP_SELF}?Action={$Plugin.Action.Name}{$Plugin.Top.Suffix}" title="{$Plugin.Top.Tooltip}">
{/if}
<b>{$Plugin.Top.Label}</b>
{if $action != $Plugin.Top.Compare}
</a>
{/if}
&nbsp;
</td>
{/strip}

{/foreach}
{strip}

<td nowrap width="99%" align="right" style="border-bottom:1px solid black;">
 <font color="#ffff9c" size="+1"><b>&nbsp;{strip}
{if $URL_Home_Page != ''}<a href="{$URL_Home_Page}" class="hp" target="_blank">{/if}
{$Company_Name}
{if $URL_Home_Page != ''}</a>{/if}
{/strip}&nbsp;<font color="#000000">OpenVPN</font></b></font>&nbsp;&nbsp;</td>
{/strip}

</tr>
</table>
