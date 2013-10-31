<?php
/* @var $this AgeGroupController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Age Groups',
);

$this->menu=array(
	array('label'=>'Create AgeGroup', 'url'=>array('create')),
	array('label'=>'Manage AgeGroup', 'url'=>array('admin')),
);
?>

<h1>Age Groups</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
