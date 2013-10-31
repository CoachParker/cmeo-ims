<?php
/* @var $this PersonTypeController */
/* @var $data PersonType */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idPersonType')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idPersonType), array('view', 'id'=>$data->idPersonType)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Name')); ?>:</b>
	<?php echo CHtml::encode($data->Name); ?>
	<br />


</div>