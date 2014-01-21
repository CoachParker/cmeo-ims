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

<h1>Create Entity</h1>

<?php echo $this->renderPartial('registerForm3', array('entity'=>$entity,
						       'person'=>$person,)); ?>