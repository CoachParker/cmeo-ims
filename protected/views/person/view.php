<?php
/* @var $this PersonController */
/* @var $model Person */

$this->breadcrumbs=array(
	'People'=>array('index'),
	$model->idPerson,
);

$this->menu=array(
	array('label'=>'List Person', 'url'=>array('index')),
	array('label'=>'Create Person', 'url'=>array('create')),
	array('label'=>'Update Person', 'url'=>array('update', 'id'=>$model->idPerson)),
	array('label'=>'Delete Person', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idPerson),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Person', 'url'=>array('admin')),
);
?>

<h1>View Person #<?php echo $model->idPerson; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idPerson',
		'firstName',
		'lastName',
		'birthDate',
            array(
                'label' => 'Person Type',
                'value' => $model->personType->Name,
            ),
		'email',
		'phone',
		'comments',
            array(
			'label' => 'Entities',
                    /*Some progress; prints first entity, but not sure how to
                     *  get others; */
			'value' => $model->getEntityList(),
			'type' => 'raw'
		),
		'doNotContact',
	),
)); ?>
