<?php
/* @var $this EventAttributeController */
/* @var $model EventAttribute */

$this->breadcrumbs=array(
	'Event Attributes'=>array('index'),
	$model->idEventAttribute,
);

$this->menu=array(
	array('label'=>'List EventAttribute', 'url'=>array('index')),
	array('label'=>'Create EventAttribute', 'url'=>array('create')),
	array('label'=>'Update EventAttribute', 'url'=>array('update', 'id'=>$model->idEventAttribute)),
	array('label'=>'Delete EventAttribute', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idEventAttribute),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EventAttribute', 'url'=>array('admin')),
);
?>

<h1>View EventAttribute #<?php echo $model->idEventAttribute; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idEventAttribute',
		'attribute',
		'displayName',
		'description',
		'valueType',
	),
)); ?>
