<?php
/* @var $this MembershipTypeController */
/* @var $model MembershipType */

$this->breadcrumbs=array(
	'Membership Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MembershipType', 'url'=>array('index')),
	array('label'=>'Manage MembershipType', 'url'=>array('admin')),
);
?>

<h1>Create MembershipType</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>