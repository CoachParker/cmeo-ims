<?php
/* @var $this DonationController */
/* @var $model Donation */

$this->breadcrumbs=array(
	'Donations'=>array('index'),
	$model->idDonation=>array('view','id'=>$model->idDonation),
	'Update',
);

$this->menu=array(
	array('label'=>'List Donation', 'url'=>array('index')),
	array('label'=>'Create Donation', 'url'=>array('create')),
	array('label'=>'View Donation', 'url'=>array('view', 'id'=>$model->idDonation)),
	array('label'=>'Manage Donation', 'url'=>array('admin')),
);
?>

<h1>Update Donation <?php echo $model->idDonation; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>