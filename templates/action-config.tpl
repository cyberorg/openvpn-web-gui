<table border="0" width="100%" cellspacing="0" cellpadding="4" bgcolor="#FFFFFF">

<tr valign="top">
<td colspan="2" style="border-top:1px groove black; border-bottom:1px groove black"><b>Server Settings</b></td></tr>

<tr valign="top">
<td nowrap width="1%" align="right" bgcolor="#DDFFCC">Mode</td>
<td><font color="blue">{$Server.Mode}</font></td>
</tr>

<tr valign="top">
<td nowrap width="1%" align="right" bgcolor="#DDFFCC">Uses device</td>
<td><font color="blue">{$Server.Dev}</font></td>
</tr>

<tr valign="top">
<td nowrap width="1%" align="right" bgcolor="#DDFFCC">Listens on</td>
<td><font color="blue">{$Server.Local}:{$Server.Port} ({$Server.Proto})</font></td>
</tr>

<tr valign="top">
<td nowrap width="1%" align="right" bgcolor="#DDFFCC">Maximum Clients</td>
<td><font color="blue">{$Server.MaxClients}</font></td>
</tr>

<tr valign="top"><td colspan="2" style="border-top:1px groove black; border-bottom:1px groove black"><b>Certificate Files</b></td></tr>

<tr valign="top">
<td nowrap width="1%" align="right" bgcolor="#DDFFCC">DH</td>
<td><font color="blue">{$Server.DH.File}</font> {strip}
{if $Server.DH.Exists == true}
[<a href="{$smarty.server.PHP_SELF}?Action=DownloadConfigFile&id=DH" title='DH File'>download</a>]
{else}
[<font color="red">does not exist</font>]
{/if}
{/strip}</td>
</tr>

<tr valign="top">
<td nowrap width="1%" align="right" bgcolor="#DDFFCC">CA Certificate</td>
<td><font color="blue">{$Openssl.CA.File}</font> {strip}
{if $Openssl.CA.Exists == true}
[<a href="{$smarty.server.PHP_SELF}?Action=DownloadConfigFile&id=CA" title='Certificate Authority Public Certificate'>download</a>]
{else}
[<font color="red">does not exist</font>]
{/if}
{/strip}</td>
</tr>

<tr valign="top">
<td nowrap width="1%" align="right" bgcolor="#DDFFCC">Server Certificate</td>
<td><font color="blue">{$Server.Certificate.File}</font> {strip}
{if $Server.Certificate.Exists == true}
[<a href="{$smarty.server.PHP_SELF}?Action=DownloadConfigFile&id=CRT" title='Server Public Certificate'>download</a>]
{else}
[<font color="red">does not exist</font>]
{/if}
{/strip}</td>
</tr>

<tr valign="top">
<td nowrap width="1%" align="right" bgcolor="#DDFFCC">Server Private Key</td>
<td><font color="blue">{$Server.Private_Key.File}</font> {strip}
{if $Server.Private_Key.Exists == true}
[<a href="{$smarty.server.PHP_SELF}?Action=DownloadConfigFile&id=KEY" title='Server Private Key'>download</a>]
{else}
[<font color="red">does not exist</font>]
{/if}
{/strip}</td>
</tr>

<tr valign="top">
<td nowrap width="1%" align="right" bgcolor="#DDFFCC">TLS Authentication</td>
<td><font color="blue">{$Server.TLS_Auth.File}</font>{strip}
{if $Server.DH.Exists == true}
, {if $Server.TLS_Auth.Key == 0}
server {else}
client {/if}
side [<a href="{$smarty.server.PHP_SELF}?Action=DownloadConfigFile&id=TLS" title='Server TLS Key'>download</a>]
{else}
&nbsp;[<font color="red">does not exist</font>]
{/if}
{/strip}</td>
</tr>

<tr valign="top">
<td nowrap width="1%" align="right" bgcolor="#DDFFCC">CRL Verify File</td>
<td><font color="blue">{$Server.CRL_Verify.File}</font> {strip}
{if $Server.CRL_Verify.Exists == true}
[<a href="{$smarty.server.PHP_SELF}?Action=DownloadConfigFile&id=CRL" title='OPENSSL Certificate Revocation List'>download</a>]
{else}
[<font color="red">does not exist</font>]
{/if}
{/strip}</td>
</tr>
</table>
