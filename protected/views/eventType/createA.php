<?php
/* @var $this EventTypeController */
/* @var $model EventType */

$this->breadcrumbs=array(
	'Event Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EventType', 'url'=>array('index')),
	array('label'=>'Manage EventType', 'url'=>array('admin')),
);
?>

<h3>Create EventType with attributes</h3>

<?php $this->renderPartial('typeAttributes', array('eventType'=>$eventType,
	'member'=>$member,
	'validatedMembers'=>$validatedMembers)); ?>