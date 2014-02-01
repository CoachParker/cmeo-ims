<?php
/* @var $this FamilyController */
/* @var $entity Entity */

$this->breadcrumbs=array(
	'Families'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Family', 'url'=>array('/entity/index')),
	array('label'=>'Manage Family', 'url'=>array('/entity/admin')),
);
?>

<h1>Create Family</h1>

<?php $this->renderPartial('_form', array('entity'=>$entity,
	'member'=>$member,
	'validatedMembers'=>$validatedMembers)); 
?>