<?php
/* @var $this AgeGroupController */
/* @var $model AgeGroup */

$this->breadcrumbs=array(
	'Age Groups'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AgeGroup', 'url'=>array('index')),
	array('label'=>'Manage AgeGroup', 'url'=>array('admin')),
);
?>

<h1>Create AgeGroup</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>