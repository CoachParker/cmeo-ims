<?php
/* @var $this EventTypeController */
/* @var $data EventType */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idEventType')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idEventType), array('view', 'id'=>$data->idEventType)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('eventType')); ?>:</b>
	<?php echo CHtml::encode($data->eventType); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('displayName')); ?>:</b>
	<?php echo CHtml::encode($data->displayName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />


</div>