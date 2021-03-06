<?php
/* @var $this MembershipController */
/* @var $model Membership */

$this->breadcrumbs=array(
	'Memberships'=>array('index'),
	$model->idMembership,
);

$this->menu=array(
	array('label'=>'List Membership', 'url'=>array('index')),
	array('label'=>'Create Membership', 'url'=>array('create')),
	array('label'=>'Update Membership', 'url'=>array('update', 'id'=>$model->idMembership)),
	array('label'=>'Delete Membership', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idMembership),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Membership', 'url'=>array('admin')),
);
?>

<h1>View Membership #<?php echo $model->idMembership; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idMembership',
                array(
                    'label' => 'Entity',
                    'value' => $model->entity->name,
                ),
		'startDate',
		'endDate',
                array(
                    'label' => 'Type',
                    'value' => $model->type->name,
                ),
                'amountPaid',
                array(
                    'label' => 'Entered by',
                    'value' => $model->staff->username,
                ),
		'createDate',
		'comments',
	),
)); ?>
