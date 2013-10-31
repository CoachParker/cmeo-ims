<?php
/* @var $this DonationReasonController */
/* @var $data DonationReason */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idDonationReason')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idDonationReason), array('view', 'id'=>$data->idDonationReason)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />


</div>