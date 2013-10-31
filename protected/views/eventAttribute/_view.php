<?php
/* @var $this EventAttributeController */
/* @var $data EventAttribute */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idEventAttribute')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idEventAttribute), array('view', 'id'=>$data->idEventAttribute)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('attribute')); ?>:</b>
	<?php echo CHtml::encode($data->attribute); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('displayName')); ?>:</b>
	<?php echo CHtml::encode($data->displayName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('valueType')); ?>:</b>
	<?php echo CHtml::encode($data->valueType); ?>
	<br />


</div>