<?php
/* @var $this EntityController */
/* @var $data Entity */
?>

<div class="view">

            <?php 
        $this->widget('zii.widgets.CDetailView', array(
	'data'=>$data,
	'attributes'=>array(
            array(
                'label' => 'ID',
                'value' => CHtml::link(CHtml::encode($data->idEntity), array('view', 'id'=>$data->idEntity)),
                'type' => 'raw'
                ),
            'name',
            array(
                'label' => 'Entity Type',
                'value' => $data->entityType->name,
            ),
            'address1',
            'city',
            'state',
            array(
			'label' => 'People',
			'value' => $data->getPersonList(),
			'type' => 'raw'
		),
	   
	),
));
 ?>

<!--
	<b><?php echo CHtml::encode($data->getAttributeLabel('idEntity')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idEntity), array('view', 'id'=>$data->idEntity)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('entityTypeId')); ?>:</b>
	<?php echo CHtml::encode($data->entityTypeId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address1')); ?>:</b>
	<?php echo CHtml::encode($data->address1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address2')); ?>:</b>
	<?php echo CHtml::encode($data->address2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('city')); ?>:</b>
	<?php echo CHtml::encode($data->city); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('state')); ?>:</b>
	<?php echo CHtml::encode($data->state); ?>
	<br />

	<b><?php         /* Trying to load a person's entities, added 2013-07-23, it works */
        $entity = Entity::model()->with('people')->findbyPk($data->idEntity);
        echo CHtml::encode("Person " . $data->getAttributeLabel('person.name')) ."(s)"; ?>:</b>
        <?php 
                foreach($entity->people as $person)
                {
                        echo CHtml::encode($person->firstName . ", ");
                }
        ?>
-->
	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('zip')); ?>:</b>
	<?php echo CHtml::encode($data->zip); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone')); ?>:</b>
	<?php echo CHtml::encode($data->phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comments')); ?>:</b>
	<?php echo CHtml::encode($data->comments); ?>
	<br />

	*/ ?>

</div>