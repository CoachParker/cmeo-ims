<?php
/* @var $this AgeGroupController */
/* @var $data AgeGroup */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idAgeGroup')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idAgeGroup), array('view', 'id'=>$data->idAgeGroup)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fromAge')); ?>:</b>
	<?php echo CHtml::encode($data->fromAge); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('toAge')); ?>:</b>
	<?php echo CHtml::encode($data->toAge); ?>
	<br />


</div>