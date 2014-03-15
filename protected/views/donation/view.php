<?php
/* @var $this DonationController */
/* @var $model Donation */

$this->breadcrumbs=array(
	'Donations'=>array('index'),
	$model->idDonation,
);

$this->menu=array(
	array('label'=>'List Donation', 'url'=>array('index')),
	array('label'=>'Create Donation', 'url'=>array('create')),
	array('label'=>'Update Donation', 'url'=>array('update', 'id'=>$model->idDonation)),
	array('label'=>'Delete Donation', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idDonation),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Donation', 'url'=>array('admin')),
);
?>

<h1>View Donation #<?php echo $model->idDonation; ?></h1>

<?php
	$contact = "";
	if(isset($model->personContact))
	{
		$contact =  CHtml::link(CHtml::encode($model->personContact->firstName . " " . $model->personContact->lastName),
		array('person/view','id'=>$model->contactPerson));
		}

?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idDonation',
		array(
			'label'=>'Entity',
			'value' => CHtml::link(CHtml::encode($model->entity->name),
                            array('entity/view','id'=>$model->entity->idEntity)),
                                    'type' => 'raw',
		),
		'donationDate',
		'amount',
                array(
                    'label' => 'Donation Reason',
                    'value' => $model->donationReason->name,
                ),
                array(
                    'label' => 'Contact Person',
                    'value' => $contact,
                    'type'  => 'raw',
                ),
		'isThanked',
		'comments',
	),
)); ?>
