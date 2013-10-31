<?php
/* @var $this VisitController */
/* @var $model Visit */

$this->breadcrumbs=array(
	'Visits'=>array('index'),
	$model->idVisit,
);

$this->menu=array(
	array('label'=>'List Visit', 'url'=>array('index')),
	array('label'=>'Create Visit', 'url'=>array('create')),
	array('label'=>'Update Visit', 'url'=>array('update', 'id'=>$model->idVisit)),
	array('label'=>'Delete Visit', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idVisit),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Visit', 'url'=>array('admin')),
);
?>

<h1>View Visit #<?php echo $model->idVisit; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idVisit',
		'visitDateTime',
		'entityId',
		array(
		      'label' => 'Entity',
		      'value' => $model->entity->name,
		      ),
		'numberOfMembers',
		'numberOfGuests',
		'amountPaid',
		'destinationEventId',
		array(
		      'label' => 'Event',
		      'value' => $model->destinationEvent->description,
		      ),
	),
)); ?>
