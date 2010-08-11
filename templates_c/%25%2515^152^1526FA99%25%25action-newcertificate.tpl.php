<?php /* Smarty version 2.6.26, created on 2010-08-10 16:20:26
         compiled from action-newcertificate.tpl */ ?>
<form name="mainform" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>
?Action=NewCertificate">
<input type="hidden" name="id"     value="New">

<table border="0" width="100%" cellspacing="0" cellpadding="4" bgcolor="#FFFFFF">

<tr valign="top"><td colspan="3" style="border-top:1px groove black; border-bottom:1px groove black"><b>New Certificate Information</b></td></tr>

<tr valign="middle">
<td nowrap width="1%" align="right" bgcolor="#DDFFCC">Common Name</td>
<td colspan="2"><input type="text" name="CommonName" size="40" maxlength="64" value="<?php echo $this->_tpl_vars['Default']['commonName']; ?>
"> (for example, John Doe)</td>
</tr>

<tr valign="middle">
<td nowrap width="1%" align="right" bgcolor="#DDFFCC">Country</td>
<td colspan="2"><input type="text" name="Country" size="40" maxlength="64" value="<?php echo $this->_tpl_vars['Default']['countryName']; ?>
"> (default is <b><?php echo $this->_tpl_vars['Default']['countryName']; ?>
</b>)</td>
</tr>

<tr valign="middle">
<td nowrap width="1%" align="right" bgcolor="#DDFFCC">State or Province</td>
<td colspan="2"><input type="text" name="Province" size="40" maxlength="64" value="<?php echo $this->_tpl_vars['Default']['stateOrProvinceName']; ?>
"> (default is <b><?php echo $this->_tpl_vars['Default']['stateOrProvinceName']; ?>
</b>)</td>
</tr>

<tr valign="middle">
<td nowrap width="1%" align="right" bgcolor="#DDFFCC">City</td>
<td colspan="2"><input type="text" name="City" size="40" maxlength="64" value="<?php echo $this->_tpl_vars['Default']['localityName']; ?>
"> (default is <b><?php echo $this->_tpl_vars['Default']['localityName']; ?>
</b>)</td>
</tr>

<tr valign="middle">
<td nowrap width="1%" align="right" bgcolor="#DDFFCC">Company</td>
<td colspan="2"><input type="text" name="Company" size="40" maxlength="64" value="<?php echo $this->_tpl_vars['Default']['organizationName']; ?>
"> (default is <b><?php echo $this->_tpl_vars['Default']['organizationName']; ?>
</b>)</td>
</tr>

<tr valign="middle">
<td nowrap width="1%" align="right" bgcolor="#DDFFCC">Department</td>
<td colspan="2"><input type="text" name="Department" size="40" maxlength="64" value="<?php echo $this->_tpl_vars['Default']['organizationalUnitName']; ?>
"> (for example, Wholesalers)</td>
</tr>

<tr valign="middle">
<td nowrap width="1%" align="right" bgcolor="#DDFFCC">e-mail</td>
<td colspan="2"><input type="text" name="Email" size="40" maxlength="64" value="<?php echo $this->_tpl_vars['Default']['emailAddress']; ?>
"> (enter the full valid e-mail address there)</td>
</tr>

<tr valign="middle">
<td nowrap width="1%" align="right" bgcolor="#DDFFCC">Password</td>
<td colspan="2"><input type="text" name="Password" size="40" maxlength="64" value="<?php echo $this->_tpl_vars['Default']['password']; ?>
"></td>
</tr>

<tr valign="middle">
<td nowrap width="1%" align="right" bgcolor="#DDFFCC">Generate random password</td>
<td colspan="2"><input type="checkbox"  name="RandomPassword" size="40" maxlength="64" value="TRUE"></td>
</tr>

<tr valign="middle">
<td nowrap width="1%" align="right" bgcolor="#DDFFCC">Validity</td>
<td colspan="2"><input type="text" name="Expiration" size="4" maxlength="4" value="<?php echo $this->_tpl_vars['Default']['expiration']; ?>
"> days</td>
</tr>

<tr valign="top">
<td style="border-top:1px groove black; border-bottom:1px groove black">&nbsp;</td>
<td style="border-top:1px groove black; border-bottom:1px groove black"><input type="submit" value=" Make " style="background-color: #DDFFCC"}></td>
<td style="border-top:1px groove black; border-bottom:1px groove black" align="right"><input type="reset" value=" Clear " style="background-color: #DDFFCC"></td>
</tr>

</table>
</form>