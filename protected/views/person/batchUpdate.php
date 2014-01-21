<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="form">
<?php echo CHtml::beginForm(); ?>
<table>
<tr><th>First Name</th><th>Last Name</th><th>Person Type</th><th>Birth Date</th></tr>
<?php foreach($items as $i=>$item): ?>
<tr>
<td><?php echo CHtml::activeTextField($item,"[$i]firstName"); ?></td>
<td><?php echo CHtml::activeTextField($item,"[$i]lastName"); ?></td>
<td><?php echo CHtml::activeRadioButtonList($item,"[$i]Type",PersonType::model()->findAll()); ?></td>
<td><?php echo CHtml::activeDateField($item,"[$i]birthDate"); ?></td>
</tr>
<?php endforeach; ?>
</table>
 
<?php echo CHtml::submitButton('Save'); ?>
<?php echo CHtml::endForm(); ?>
</div><!-- form -->