<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idUser')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idUser), array('view', 'id'=>$data->idUser)); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('personId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->person->firstName . " " . $data->person->lastName),
                            array('person/view','id'=>$data->person->idPerson));?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('roleId')); ?>:</b>
	<?php echo CHtml::encode($data->role->name); ?>
	<br />


</div>