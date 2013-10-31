<?php
/* @var $this DonationController */
/* @var $model Donation */

$this->breadcrumbs=array(
	'Donations'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Donation', 'url'=>array('index')),
	array('label'=>'Manage Donation', 'url'=>array('admin')),
);
?>

<h1>Create Donation</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>