<?php
/* @var $this EntityController */
/* @var $model Entity */

$this->breadcrumbs=array(
	'Entities'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Entity', 'url'=>array('index')),
	array('label'=>'Create Entity', 'url'=>array('create')),
	array('label'=>'Update Entity', 'url'=>array('update', 'id'=>$model->idEntity)),
	array('label'=>'Delete Entity', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idEntity),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Entity', 'url'=>array('admin')),
);
?>

<h1>View Entity #<?php echo $model->idEntity; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idEntity',
		'name',
            array(
                'label' => 'Entity Type',
                'value' => $model->entityType->name,
            ),
            array(
                'label' => 'People',
                'value' => $model->getPersonList(),
                'type' => 'raw'
                ),
            array(
                'label' => 'Memberships',
                'value' => $model->getMemberDates(),
                'type' => 'raw'
            ),
            array(
                'label' => 'Donations',
                'value' => $model->getDonations(),
                'type' => 'raw'
            ),
		'address1',
		'address2',
		'city',
		'state',
		'zip',
		'phone',
		'comments',
	),
)); ?>
