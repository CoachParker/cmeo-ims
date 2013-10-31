<?php
/* @var $this DonationController */
/* @var $data Donation */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idDonation')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idDonation), array('view', 'id'=>$data->idDonation)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('entityId')); ?>:</b>
	<?php echo CHtml::encode($data->entityId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('donationDate')); ?>:</b>
	<?php echo CHtml::encode($data->donationDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amount')); ?>:</b>
	<?php echo CHtml::encode($data->amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('donationReasonId')); ?>:</b>
	<?php echo CHtml::encode($data->donationReasonId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isThanked')); ?>:</b>
	<?php echo CHtml::encode($data->isThanked); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comments')); ?>:</b>
	<?php echo CHtml::encode($data->comments); ?>
	<br />


</div>