<?php
/* @var $this DonationReasonController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Donation Reasons',
);

$this->menu=array(
	array('label'=>'Create DonationReason', 'url'=>array('create')),
	array('label'=>'Manage DonationReason', 'url'=>array('admin')),
);
?>

<h1>Donation Reasons</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
