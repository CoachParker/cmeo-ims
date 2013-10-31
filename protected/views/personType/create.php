<?php
/* @var $this PersonTypeController */
/* @var $model PersonType */

$this->breadcrumbs=array(
	'Person Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PersonType', 'url'=>array('index')),
	array('label'=>'Manage PersonType', 'url'=>array('admin')),
);
?>

<h1>Create PersonType</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>