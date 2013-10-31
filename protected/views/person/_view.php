<?php
/* @var $this PersonController */
/* @var $data Person */
?>

<div class="view">

    <?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$data,
	'attributes'=>array(
            array(
                'label' => 'Person ID',
                'value' => CHtml::link(CHtml::encode($data->idPerson), array('view', 'id'=>$data->idPerson)),
                'type' => 'raw'
                ),
		'firstName',
		'lastName',
		'birthDate',
            array(
			'label' => 'Entities',
                    /*Some progress; prints first entity, but not sure how to
                     *  get others; */
			'value' => $data->getEntityList(),
			'type' => 'raw'
		),
		'doNotContact',
	),
)); ?>
    
    <!--
	<b><?php echo CHtml::encode($data->getAttributeLabel('idPerson')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idPerson), array('view', 'id'=>$data->idPerson)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('firstName')); ?>:</b>
	<?php echo CHtml::encode($data->firstName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lastName')); ?>:</b>
	<?php echo CHtml::encode($data->lastName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('birthDate')); ?>:</b>
	<?php echo CHtml::encode($data->birthDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('personTypeId')); ?>:</b>
	<?php echo CHtml::encode($data->personTypeId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone')); ?>:</b>
	<?php echo CHtml::encode($data->phone); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('comments')); ?>:</b>
	<?php echo CHtml::encode($data->comments); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('doNotContact')); ?>:</b>
	<?php echo CHtml::encode($data->doNotContact); ?>
	<br />

	*/ ?>
-->
</div>