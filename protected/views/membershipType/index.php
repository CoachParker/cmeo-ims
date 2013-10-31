<?php
/* @var $this MembershipTypeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Membership Types',
);

$this->menu=array(
	array('label'=>'Create MembershipType', 'url'=>array('create')),
	array('label'=>'Manage MembershipType', 'url'=>array('admin')),
);
?>

<h1>Membership Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
