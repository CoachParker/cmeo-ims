<?php
/* @var $this DonationController */
/* @var $model Donation */

$this->breadcrumbs=array(
	'Donations'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Donation', 'url'=>array('index')),
	array('label'=>'Create Donation', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#donation-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Donations</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'donation-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idDonation',
//		'entityId',
		array('name'=>'entitySearch',
			'value'=>'$data->entity->name',
			'filter'=>CHtml::activeTextField($model,'entitySearch'),
		),
		'donationDate',
		'amount',
//		'donationReasonId',
		array('name'=>'reasonSearch',
			'value'=>'$data->donationReason->name',
			'filter'=>CHtml::activeTextField($model,'reasonSearch'),
		),
		'isThanked',
		'contactPerson',
//		array('name'=>'contactSearch',
//			'value'=>'$data->personContact->firstName',
//			'filter'=>CHtml::activeTextField($model,'contactSearch'),
//		),

		/*
		'comments',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
