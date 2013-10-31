<?php
/* @var $this EventAttributeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Event Attributes',
);

$this->menu=array(
	array('label'=>'Create EventAttribute', 'url'=>array('create')),
	array('label'=>'Manage EventAttribute', 'url'=>array('admin')),
);
?>

<h1>Event Attributes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
