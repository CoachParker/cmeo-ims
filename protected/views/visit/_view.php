<?php
/* @var $this VisitController */
/* @var $data Visit */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idVisit')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idVisit), array('view', 'id'=>$data->idVisit)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('visitDateTime')); ?>:</b>
	<?php echo CHtml::encode($data->visitDateTime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('entityId')); ?>:</b>
	<?php echo CHtml::encode(
                //$data->entityId
                $data->entity->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numberOfGuests')); ?>:</b>
	<?php echo CHtml::encode($data->numberOfGuests); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amountPaid')); ?>:</b>
	<?php echo CHtml::encode($data->amountPaid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('destinationEventId')); ?>:</b>
	<?php echo CHtml::encode($data->destinationEvent->description); ?>
	<br />


</div>