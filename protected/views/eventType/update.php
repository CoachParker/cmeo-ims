<?php
/* @var $this EventTypeController */
/* @var $model EventType */

$this->breadcrumbs=array(
	'Event Types'=>array('index'),
	$model->idEventType=>array('view','id'=>$model->idEventType),
	'Update',
);

$this->menu=array(
	array('label'=>'List EventType', 'url'=>array('index')),
	array('label'=>'Create EventType', 'url'=>array('create')),
	array('label'=>'View EventType', 'url'=>array('view', 'id'=>$model->idEventType)),
	array('label'=>'Manage EventType', 'url'=>array('admin')),
);
?>

<h1>Update EventType <?php echo $model->idEventType; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>