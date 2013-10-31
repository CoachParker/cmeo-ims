<?php
/* @var $this MembershipTypeController */
/* @var $model MembershipType */

$this->breadcrumbs=array(
	'Membership Types'=>array('index'),
	$model->name=>array('view','id'=>$model->idMembershipType),
	'Update',
);

$this->menu=array(
	array('label'=>'List MembershipType', 'url'=>array('index')),
	array('label'=>'Create MembershipType', 'url'=>array('create')),
	array('label'=>'View MembershipType', 'url'=>array('view', 'id'=>$model->idMembershipType)),
	array('label'=>'Manage MembershipType', 'url'=>array('admin')),
);
?>

<h1>Update MembershipType <?php echo $model->idMembershipType; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>