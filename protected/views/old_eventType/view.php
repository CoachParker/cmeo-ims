<?php
/* @var $this EventTypeController */
/* @var $model EventType */

$this->breadcrumbs=array(
	'Event Types'=>array('index'),
	$model->eventType,
);

$this->menu=array(
	array('label'=>'List EventType', 'url'=>array('index')),
	array('label'=>'Create EventType', 'url'=>array('create')),
	array('label'=>'Update EventType', 'url'=>array('update', 'id'=>$model->eventType)),
	array('label'=>'Delete EventType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->eventType),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EventType', 'url'=>array('admin')),
);
?>

<h1>View EventType #<?php echo $model->eventType; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'eventType',
		'displayName',
		'description',
	),
)); ?>
