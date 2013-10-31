<?php
/* @var $this MembershipController */
/* @var $model Membership */

$this->breadcrumbs=array(
	'Memberships'=>array('index'),
	$model->idMembership=>array('view','id'=>$model->idMembership),
	'Update',
);

$this->menu=array(
	array('label'=>'List Membership', 'url'=>array('index')),
	array('label'=>'Create Membership', 'url'=>array('create')),
	array('label'=>'View Membership', 'url'=>array('view', 'id'=>$model->idMembership)),
	array('label'=>'Manage Membership', 'url'=>array('admin')),
);
?>

<h1>Update Membership <?php echo $model->idMembership; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>