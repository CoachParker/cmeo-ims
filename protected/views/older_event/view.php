<?php
/* @var $this EventController */
/* @var $model Event */

$this->breadcrumbs=array(
	'Events'=>array('index'),
	$model->idEvent,
);

$this->menu=array(
	array('label'=>'List Event', 'url'=>array('index')),
	array('label'=>'Create Event', 'url'=>array('create')),
	array('label'=>'Update Event', 'url'=>array('update', 'id'=>$model->idEvent)),
	array('label'=>'Delete Event', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idEvent),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Event', 'url'=>array('admin')),
);
?>

<h1>View Event #<?php echo $model->idEvent; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idEvent',
		'eventDate',
		'classLimit',
		'description',
                array(
                    'label' => 'Age Group',
                    'value' => $model->ageGroup->name,
                ),
		'eventTypeId',
               array(
                   'label' => 'Event Type',
                   'value' => $model->eventType->name,
               ),
		'notes',
		'sponsoringEntityId',
               array(
                   //'label' => 'Sponsoring Entity',
                   //'value' => $model->sponsoringEntity->name,
               ),
	),
)); ?>
