<?php /* Smarty version 2.6.26, created on 2010-08-03 12:34:31
         compiled from action-status.tpl */ ?>
<table border="0" width="100%" cellspacing="0" cellpadding="4" bgcolor="#FFFFFF">
<tr valign="top">
 <td style="border-bottom:1px groove gray; border-top:1px groove gray" bgcolor="#DDFFCC"><b>#</b></td>
 <td style="border-bottom:1px groove gray; border-top:1px groove gray" nowrap><b>Common Name<br>Connected at</b></td>
 <td style="border-bottom:1px groove gray; border-top:1px groove gray" nowrap><b>Virtual Address</b></td>
 <td style="border-bottom:1px groove gray; border-top:1px groove gray" nowrap><b>Read Address</b></td>
 <td style="border-bottom:1px groove gray; border-top:1px groove gray" nowrap><b>Bytes Received</b></td>
 <td style="border-bottom:1px groove gray; border-top:1px groove gray" nowrap><b>Bytes Sent</b></td>
</tr>

<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['Client']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>

<tr valign="top">
 <td style="border-bottom:1px groove gray" nowrap width="1%" rowspan="2" align="right" bgcolor="#DDFFCC"><?php echo $this->_sections['i']['iteration']; ?>
</td>
 <td><font color="blue"><?php echo $this->_tpl_vars['Client'][$this->_sections['i']['index']]['CN']; ?>
</font></td>
 <td><?php echo $this->_tpl_vars['Client'][$this->_sections['i']['index']]['VIRTADDR']; ?>
</td>
 <td><?php echo $this->_tpl_vars['Client'][$this->_sections['i']['index']]['REALADDR']; ?>
</td>
 <td><?php echo $this->_tpl_vars['Client'][$this->_sections['i']['index']]['BYTESRCV']; ?>
</td>
 <td><?php echo $this->_tpl_vars['Client'][$this->_sections['i']['index']]['BYTESSND']; ?>
</td>
</tr>
<?php echo '<tr valign="top"><td style="border-bottom:1px groove gray" colspan="5">'; ?><?php echo $this->_tpl_vars['Client'][$this->_sections['i']['index']]['SINCE']; ?><?php echo ', what is <font color="blue">'; ?><?php echo $this->_tpl_vars['Client'][$this->_sections['i']['index']]['Seconds_Ago']; ?><?php echo '</font> ago</td></tr>'; ?>


<?php endfor; else: ?>
<tr><td colspan="5" align="center"><i>There are no clients connected at the minute</i></td></tr>

<?php endif; ?>
</table>