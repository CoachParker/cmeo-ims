<?php
/* @var $this EventTypeController */
/* @var $data EventType */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idEventType')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idEventType), array('view', 'id'=>$data->idEventType)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />


</div>