<?php
/* @var $this MembershipTypeController */
/* @var $data MembershipType */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idMembershipType')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idMembershipType), array('view', 'id'=>$data->idMembershipType)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cost')); ?>:</b>
	<?php echo CHtml::encode($data->cost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('benefits')); ?>:</b>
	<?php echo CHtml::encode($data->benefits); ?>
	<br />


</div>