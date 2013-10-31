<?php
/* @var $this DonationReasonController */
/* @var $model DonationReason */

$this->breadcrumbs=array(
	'Donation Reasons'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DonationReason', 'url'=>array('index')),
	array('label'=>'Manage DonationReason', 'url'=>array('admin')),
);
?>

<h1>Create DonationReason</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>