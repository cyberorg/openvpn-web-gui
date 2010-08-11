<table border="0" width="100%" cellspacing="0" cellpadding="4" bgcolor="#FFFFFF">
<tr><td style="border-top:1px groove black; border-bottom:1px groove black" bgcolor="#BFBFDF"><b>Common Tasks</b></td></tr>
{if $action == 'CERTIFICATES'}
<tr><td>
{if $subaction != ''}
{strip}
- <a href="{$smarty.server.PHP_SELF}?Action=Certificates" title="View all certificates">All Certificates</a>
<br>
{/strip}
{/if}
{strip}
- <a href="{$smarty.server.PHP_SELF}?Action=NewCertificate" title="Create the new certificate">New Certificate</a>
{/strip}
{/if}
</td></tr>
{foreach from=$Plugins item=Plugin name=i}
{if $Plugin.Left.Menu != ''}
{include file="file:`$PluginPath``$Plugin.Folder`/`$Plugin.Left.Menu`"}
{/if}
{/foreach}
</table>
