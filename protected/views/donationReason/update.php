<?php
/* @var $this DonationReasonController */
/* @var $model DonationReason */

$this->breadcrumbs=array(
	'Donation Reasons'=>array('index'),
	$model->name=>array('view','id'=>$model->idDonationReason),
	'Update',
);

$this->menu=array(
	array('label'=>'List DonationReason', 'url'=>array('index')),
	array('label'=>'Create DonationReason', 'url'=>array('create')),
	array('label'=>'View DonationReason', 'url'=>array('view', 'id'=>$model->idDonationReason)),
	array('label'=>'Manage DonationReason', 'url'=>array('admin')),
);
?>

<h1>Update DonationReason <?php echo $model->idDonationReason; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>