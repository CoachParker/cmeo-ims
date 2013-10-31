<?php
/* @var $this DonationController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Donations',
);

$this->menu=array(
	array('label'=>'Create Donation', 'url'=>array('create')),
	array('label'=>'Manage Donation', 'url'=>array('admin')),
);
?>

<h1>Donations</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
