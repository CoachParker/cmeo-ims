<?php
/* @var $this EntityController */
/* @var $model Entity */

$this->breadcrumbs=array(
	'Entities'=>array('index'),
	'Register New Family',
);

$this->menu=array(
	array('label'=>'List Entity', 'url'=>array('index')),
	array('label'=>'Manage Entity', 'url'=>array('admin')),
);
?>

<h2>Create Entity</h2>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>