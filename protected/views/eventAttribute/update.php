<?php
/* @var $this EventAttributeController */
/* @var $model EventAttribute */

$this->breadcrumbs=array(
	'Event Attributes'=>array('index'),
	$model->idEventAttribute=>array('view','id'=>$model->idEventAttribute),
	'Update',
);

$this->menu=array(
	array('label'=>'List EventAttribute', 'url'=>array('index')),
	array('label'=>'Create EventAttribute', 'url'=>array('create')),
	array('label'=>'View EventAttribute', 'url'=>array('view', 'id'=>$model->idEventAttribute)),
	array('label'=>'Manage EventAttribute', 'url'=>array('admin')),
);
?>

<h1>Update EventAttribute <?php echo $model->idEventAttribute; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>