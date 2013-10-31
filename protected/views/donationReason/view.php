<?php
/* @var $this DonationReasonController */
/* @var $model DonationReason */

$this->breadcrumbs=array(
	'Donation Reasons'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List DonationReason', 'url'=>array('index')),
	array('label'=>'Create DonationReason', 'url'=>array('create')),
	array('label'=>'Update DonationReason', 'url'=>array('update', 'id'=>$model->idDonationReason)),
	array('label'=>'Delete DonationReason', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idDonationReason),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DonationReason', 'url'=>array('admin')),
);
?>

<h1>View DonationReason #<?php echo $model->idDonationReason; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idDonationReason',
		'name',
	),
)); ?>
