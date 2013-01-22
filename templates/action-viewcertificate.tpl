<table border="0" width="100%" cellspacing="0" cellpadding="4" bgcolor="#FFFFFF">

<tr valign="top"><td colspan="2" style="border-top:1px groove black; border-bottom:1px groove black"><b>Certificate Information</b></td></tr>

<tr valign="top">
<td nowrap width="1%" align="right" bgcolor="#DDFFCC">Serial</td>
<td><font color="blue">{$Certificate.Serial}</font></td>
</tr>

<tr valign="top">
<td nowrap width="1%" align="right" bgcolor="#DDFFCC">Status</td>
{strip}
<td><font color="blue">
{if $Certificate.Status == 'V'}
Valid
{elseif $Certificate.Status == 'R'}
Revoked
{elseif $Certificate.Status == 'E'}
Expired
{/if}
{if $Certificate.Connected}
, Now connected
{/if}
</font></td>
{/strip}
</tr>

<tr valign="top">
<td nowrap width="1%" align="right" bgcolor="#DDFFCC" style="border-bottom:1px groove black">{strip}
{if $Certificate.Status == 'V'}
Expiration
{elseif $Certificate.Status == 'R'}
Revoked
{else}
&nbsp;
{/if}
</td>
{/strip}
<td style="border-bottom:1px groove black"><font color="blue">{strip}
{if $Certificate.Status == 'V'}
{$Certificate.ExpDate}
{elseif $Certificate.Status == 'R'}
{$Certificate.RevDate}
{else}
&nbsp;
{/if}
</font></td>
{/strip}
</tr>

<tr valign="top">
<td nowrap width="1%" align="right" bgcolor="#DDFFCC">Common Name</td>
<td><font color="blue">{$Certificate.CN}</font></td>
</tr>

<tr valign="top">
<td nowrap width="1%" align="right" bgcolor="#DDFFCC" style="border-bottom:1px groove black">E-mail</td>
<td style="border-bottom:1px groove black"><font color="blue">{strip}
{if $Certificate.Email != ''}
<a href="mailto:{$Certificate.Email}">{$Certificate.Email}</a>
{else}
&nbsp;
{/if}
</font></td>
{/strip}
</tr>

<tr valign="top">
<td nowrap width="1%" align="right" bgcolor="#DDFFCC">Country</td>
<td><font color="blue">{$Certificate.Country}</font></td>
</tr>

<tr valign="top">
<td nowrap width="1%" align="right" bgcolor="#DDFFCC">State or Province</td>
<td><font color="blue">{$Certificate.State}</font></td>
</tr>

<tr valign="top">
<td nowrap width="1%" align="right" bgcolor="#DDFFCC">City</td>
<td><font color="blue">{$Certificate.City}</font></td>
</tr>

<tr valign="top">
<td nowrap width="1%" align="right" bgcolor="#DDFFCC">Company</td>
<td><font color="blue">{$Certificate.Company}</font></td>
</tr>

<tr valign="top">
<td nowrap width="1%" align="right" bgcolor="#DDFFCC">Department</td>
<td><font color="blue">{$Certificate.Department|default:"&nbsp;"}</font></td>
</tr>

<tr valign="top"><td colspan="2" style="border-top:1px groove black; border-bottom:1px groove black"><b>Certificate Files</b></td></tr>

<tr valign="top">
<td nowrap width="1%" align="right" bgcolor="#DDFFCC">Public Certificate</td>
<td>{strip}
{if $CertificateFileCRT != ''}
<a href="{$smarty.server.PHP_SELF}?Action=DownloadCertificate&id={$Certificate.Serial}&Type=CRT" title='Download Public Certificate'>Download</a>
{else}
&lt;File not found&gt;
{/if}
{/strip}</td>
</tr>

<tr valign="top">
<td nowrap width="1%" align="right" bgcolor="#DDFFCC">Private Key</td>
<td>{strip}
{if $CertificateFileKEY != ''}
<a href="{$smarty.server.PHP_SELF}?Action=DownloadCertificate&id={$Certificate.Serial}&Type=KEY" title='Download Private Key'>Download</a>
{else}
&lt;File not found&gt;
{/if}
{/strip}</td>
</tr>

<tr valign="top">
<td style="border-bottom:1px groove black" nowrap width="1%" align="right" bgcolor="#DDFFCC">Certificate Request</td>
<td style="border-bottom:1px groove black">{strip}
{if $CertificateFileCSR != ''}
<a href="{$smarty.server.PHP_SELF}?Action=DownloadCertificate&id={$Certificate.Serial}&Type=CSR" title='Download Certificate Request'>Download</a>
{else}
&lt;File not found&gt;
{/if}
{/strip}</td>
</tr>

<tr valign="top">
<td style="border-bottom:1px groove black" nowrap width="1%" align="right" bgcolor="#DDFFCC">Archive</td>
<td style="border-bottom:1px groove black">{strip}
{if $CertificateFileCRT != '' ||
    $CertificateFileKEY != '' ||
    $CertificateFileCSR != '' }
<a href="{$smarty.server.PHP_SELF}?Action=DownloadCertificate&id={$Certificate.Serial}&Type=ZIP" title='Download all files in one archive'>Download</a>
{else}
&lt;File not found&gt;
{/if}
{/strip}</td>
</tr>

<tr valign="top"><td colspan="2" style="border-top:1px groove black; border-bottom:1px groove black"><b>Misc Information</b></td></tr>

<tr valign="top">
<td style="border-bottom:1px groove black" nowrap width="1%" align="right" bgcolor="#DDFFCC">Password</td>
<td style="border-bottom:1px groove black">{strip}
{if $Password != ''}
{$Password}
{else}
&lt;Password is either blank or not on file&gt;
{/if}
{/strip}</td>
</tr>

</table>
