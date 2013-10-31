<?php
/* @var $this AgeGroupController */
/* @var $model AgeGroup */

$this->breadcrumbs=array(
	'Age Groups'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List AgeGroup', 'url'=>array('index')),
	array('label'=>'Create AgeGroup', 'url'=>array('create')),
	array('label'=>'Update AgeGroup', 'url'=>array('update', 'id'=>$model->idAgeGroup)),
	array('label'=>'Delete AgeGroup', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idAgeGroup),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AgeGroup', 'url'=>array('admin')),
);
?>

<h1>View AgeGroup #<?php echo $model->idAgeGroup; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idAgeGroup',
		'name',
		'fromAge',
		'toAge',
	),
)); ?>
