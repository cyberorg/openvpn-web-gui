<table border="0" width="100%" cellspacing="0" cellpadding="4" bgcolor="#FFFFFF">
<tr valign="top">
 <td style="border-bottom:1px groove gray; border-top:1px groove gray" bgcolor="#DDFFCC"><b>#</b></td>
 <td style="border-bottom:1px groove gray; border-top:1px groove gray" nowrap><b>Common Name<br>Connected at</b></td>
 <td style="border-bottom:1px groove gray; border-top:1px groove gray" nowrap><b>Virtual Address</b></td>
 <td style="border-bottom:1px groove gray; border-top:1px groove gray" nowrap><b>Read Address</b></td>
 <td style="border-bottom:1px groove gray; border-top:1px groove gray" nowrap><b>Bytes Received</b></td>
 <td style="border-bottom:1px groove gray; border-top:1px groove gray" nowrap><b>Bytes Sent</b></td>
</tr>

{section name=i loop=$Client}

<tr valign="top">
 <td style="border-bottom:1px groove gray" nowrap width="1%" rowspan="2" align="right" bgcolor="#DDFFCC">{$smarty.section.i.iteration}</td>
 <td><font color="blue">{$Client[i].CN}</font></td>
 <td>{$Client[i].VIRTADDR}</td>
 <td>{$Client[i].REALADDR}</td>
 <td>{$Client[i].BYTESRCV}</td>
 <td>{$Client[i].BYTESSND}</td>
</tr>
{strip}
<tr valign="top">
 <td style="border-bottom:1px groove gray" colspan="5">{$Client[i].SINCE}, what is <font color="blue">{$Client[i].Seconds_Ago}</font> ago</td>
</tr>
{/strip}

{sectionelse}
<tr><td colspan="5" align="center"><i>There are no clients connected at the minute</i></td></tr>

{/section}
</table>
