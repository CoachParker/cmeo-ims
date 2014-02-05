<?php
/* @var $this RoleController */
/* @var $data Role */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idRole')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idRole), array('view', 'id'=>$data->idRole)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />


</div>