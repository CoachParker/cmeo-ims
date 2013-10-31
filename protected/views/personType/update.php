<?php
/* @var $this PersonTypeController */
/* @var $model PersonType */

$this->breadcrumbs=array(
	'Person Types'=>array('index'),
	$model->Name=>array('view','id'=>$model->idPersonType),
	'Update',
);

$this->menu=array(
	array('label'=>'List PersonType', 'url'=>array('index')),
	array('label'=>'Create PersonType', 'url'=>array('create')),
	array('label'=>'View PersonType', 'url'=>array('view', 'id'=>$model->idPersonType)),
	array('label'=>'Manage PersonType', 'url'=>array('admin')),
);
?>

<h1>Update PersonType <?php echo $model->idPersonType; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>