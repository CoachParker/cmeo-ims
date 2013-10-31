<?php
/* @var $this EventController */
/* @var $data Event */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idEvent')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idEvent), array('view', 'id'=>$data->idEvent)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('eventDate')); ?>:</b>
	<?php echo CHtml::encode($data->eventDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('endDate')); ?>:</b>
	<?php echo CHtml::encode($data->endDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('recurrence')); ?>:</b>
	<?php echo CHtml::encode($data->recurrence); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('classLimit')); ?>:</b>
	<?php echo CHtml::encode($data->classLimit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('ageGroupId')); ?>:</b>
	<?php echo CHtml::encode($data->ageGroupId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('eventTypeId')); ?>:</b>
	<?php echo CHtml::encode($data->eventTypeId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('notes')); ?>:</b>
	<?php echo CHtml::encode($data->notes); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sponsorEntityId')); ?>:</b>
	<?php echo CHtml::encode($data->sponsorEntityId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('facilitatorPersonId')); ?>:</b>
	<?php echo CHtml::encode($data->facilitatorPersonId); ?>
	<br />

	*/ ?>

</div>