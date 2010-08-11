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
{section name=i loop=$Certificates}

<tr valign="top"{strip}
{if $Certificates[i].Status == 'R'} bgcolor="#FFDFDF"
{elseif $Certificates[i].Status == 'E'} bgcolor="#DFDFDF"
{elseif $Certificates[i].Connected} bgcolor="#DFDFFF"
{/if}
{/strip}>
<td style="border-bottom:1px groove gray" nowrap width="1%" rowspan="1" align="right" bgcolor="#DDFFCC">{$smarty.section.i.iteration}</td>
{strip}

<td style="border-bottom:1px groove gray">{if $Certificates[i].Connected}<a title="connected"><font color="blue"><b>#</b></font></a>{else}&nbsp;{/if}</td>
{/strip}
{strip}

<td style="border-bottom:1px groove gray">
 <a href="{$smarty.server.PHP_SELF}?Action=ViewCertificate&id={$Certificates[i].Serial}" title='View this certificate'>
 {$Certificates[i].CN|default:"&nbsp;"}
</td>
{/strip}
{strip}

<td style="border-bottom:1px groove gray">
{$Certificates[i].Department|default:"&nbsp;"}
</td>
{/strip}
{strip}

<td style="border-bottom:1px groove gray">
{if $Certificates[i].Email != ''}
 <a href="mailto:{$Certificates[i].Email}">{$Certificates[i].Email}</a>
{else}
 &nbsp;
{/if}
</td>
{/strip}
{strip}

<td style="border-bottom:1px groove gray" nowrap width="1%" align="right">
{$Certificates[i].Serial|default:"-"}
</td>
{/strip}
{strip}

<td style="border-bottom:1px groove gray" nowrap width="1%" align="right">
{if $Certificates[i].Status == 'V'}
Valid
{elseif $Certificates[i].Status == 'R'}
Revoked
{elseif $Certificates[i].Status == 'E'}
Expired
{else}
{/if}
</td>
{/strip}
{strip}

<td style="border-bottom:1px groove gray" bgcolor="#DDFFCC" nowrap="nowrap">
[<a href="{$smarty.server.PHP_SELF}?Action=DownloadCertificate&id={$Certificates[i].Serial}&Type=ZIP" title='Download All files in one archive'>zip</a>]{/strip} {strip}
[<a href="{$smarty.server.PHP_SELF}?Action=DownloadCertificate&id={$Certificates[i].Serial}&Type=CRT" title='Download Public Certificate'>crt</a>]{/strip} {strip}
[<a href="{$smarty.server.PHP_SELF}?Action=DownloadCertificate&id={$Certificates[i].Serial}&Type=KEY" title='Download Private Key'>key</a>]{/strip} {strip}
[<a href="{$smarty.server.PHP_SELF}?Action=DownloadCertificate&id={$Certificates[i].Serial}&Type=CSR" title='Download Certificate Request'>csr</a>]
</td>
{/strip}
{strip}

</tr>
{/strip}
{sectionelse}

<tr><td colspan="2" align="center"><i>There are no certificates made at the minute</i></td></tr>
{/section}

</table>
