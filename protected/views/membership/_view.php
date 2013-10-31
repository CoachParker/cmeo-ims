<?php
/* @var $this MembershipController */
/* @var $data Membership */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idMembership')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idMembership), array('view', 'id'=>$data->idMembership)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('entityId')); ?>:</b>
	<?php echo CHtml::encode($data->entityId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('startDate')); ?>:</b>
	<?php echo CHtml::encode($data->startDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('endDate')); ?>:</b>
	<?php echo CHtml::encode($data->endDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('typeId')); ?>:</b>
	<?php echo CHtml::encode($data->typeId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amountPaid')); ?>:</b>
	<?php echo CHtml::encode($data->amountPaid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('enteredBy')); ?>:</b>
	<?php echo CHtml::encode($data->enteredBy); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('createDate')); ?>:</b>
	<?php echo CHtml::encode($data->createDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comments')); ?>:</b>
	<?php echo CHtml::encode($data->comments); ?>
	<br />

	*/ ?>

</div>