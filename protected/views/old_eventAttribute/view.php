<?php
/* @var $this EventAttributeController */
/* @var $model EventAttribute */

$this->breadcrumbs=array(
	'Event Attributes'=>array('index'),
	$model->attribute,
);

$this->menu=array(
	array('label'=>'List EventAttribute', 'url'=>array('index')),
	array('label'=>'Create EventAttribute', 'url'=>array('create')),
	array('label'=>'Update EventAttribute', 'url'=>array('update', 'id'=>$model->attribute)),
	array('label'=>'Delete EventAttribute', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->attribute),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EventAttribute', 'url'=>array('admin')),
);
?>

<h1>View EventAttribute #<?php echo $model->attribute; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'attribute',
		'displayName',
		'description',
		'value_type',
	),
)); ?>
