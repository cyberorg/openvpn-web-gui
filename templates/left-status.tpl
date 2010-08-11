<table border="0" cellspacing="0" cellpadding="4" bgcolor="#FFFFFF">
<tr><td style="border-top:1px groove black; border-bottom:1px groove black" bgcolor="#BFBFDF"><b>Server Status</b></td></tr>
<tr><td>The OpenVPN server version is <b><font color="blue">{$Server.Title|default:"<i>unknown</i>"}</font></b></td></tr>
{strip}
<tr><td>The last status was recorded at <b><font color="blue">{$Server.DateTime|default:"<i>unknown</i>"}</font></b><br>
what was <b><font color="red">{$Seconds_Ago|default:'<i>unknown</i>'}</font></b> seconds ago</td></tr>
{/strip}
<tr><td nowrap width="5%">{strip}
{if     $Client|@count == 0}No clients connected</b>
{elseif $Client|@count == 1}Connected <b><font color="red">1</font></b> client
{elseif $Client|@count > 1}Connected <b><font color="red">{$Client|@count}</font></b> clients
{/if}
</td></tr>
{/strip}
{if $Certificates != ''}
{strip}
<tr><td>OpenSSL has <b><font color="red">
{if     $Certificates|@count == 0}no certificates</font></b>
{elseif $Certificates|@count == 1}1</font></b> <a href="{$smarty.server.PHP_SELF}?Action=Certificates">certificate</a>
{elseif $Certificates|@count > 1}{$Certificates|@count}</font></b> <a href="{$smarty.server.PHP_SELF}?Action=Certificates">certificates</a>
{/if}
</b></td></tr>
{/strip}
{/if}
{foreach from=$Plugins item=Plugin name=i}
{if $Plugin.Left.Status != ''}
{include file="file:`$PluginPath``$Plugin.Folder`/`$Plugin.Left.Status`"}
{/if}
{/foreach}
</table>
