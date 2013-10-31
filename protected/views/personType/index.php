<?php
/* @var $this PersonTypeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Person Types',
);

$this->menu=array(
	array('label'=>'Create PersonType', 'url'=>array('create')),
	array('label'=>'Manage PersonType', 'url'=>array('admin')),
);
?>

<h1>Person Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
