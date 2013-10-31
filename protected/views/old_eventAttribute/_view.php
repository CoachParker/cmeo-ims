<?php
/* @var $this EventAttributeController */
/* @var $data EventAttribute */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('attribute')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->attribute), array('view', 'id'=>$data->attribute)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('displayName')); ?>:</b>
	<?php echo CHtml::encode($data->displayName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('value_type')); ?>:</b>
	<?php echo CHtml::encode($data->value_type); ?>
	<br />


</div>