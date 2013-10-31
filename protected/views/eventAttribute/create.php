<?php
/* @var $this EventAttributeController */
/* @var $model EventAttribute */

$this->breadcrumbs=array(
	'Event Attributes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EventAttribute', 'url'=>array('index')),
	array('label'=>'Manage EventAttribute', 'url'=>array('admin')),
);
?>

<h1>Create EventAttribute</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>