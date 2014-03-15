<?php
/* @var $this EntityController */
/* @var $model Entity */

$this->breadcrumbs=array(
	'Entities'=>array('index'),
	'Add a New Donor',
);

$this->menu=array(
	array('label'=>'List Entity', 'url'=>array('index')),
	array('label'=>'Manage Entity', 'url'=>array('admin')),
);
?>

<h3>Add a New Donor</h3>

<?php echo $this->renderPartial('donorForm', array('entity'=>$entity,
						   'person'=>$person,
						   'donate'=>$donate,)); ?>