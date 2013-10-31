<?php
/* @var $this AgeGroupController */
/* @var $model AgeGroup */

$this->breadcrumbs=array(
	'Age Groups'=>array('index'),
	$model->name=>array('view','id'=>$model->idAgeGroup),
	'Update',
);

$this->menu=array(
	array('label'=>'List AgeGroup', 'url'=>array('index')),
	array('label'=>'Create AgeGroup', 'url'=>array('create')),
	array('label'=>'View AgeGroup', 'url'=>array('view', 'id'=>$model->idAgeGroup)),
	array('label'=>'Manage AgeGroup', 'url'=>array('admin')),
);
?>

<h1>Update AgeGroup <?php echo $model->idAgeGroup; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>