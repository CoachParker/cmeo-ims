<?php
/* @var $this PersonController */
/* @var $model Person */

$this->breadcrumbs=array(
	'People'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Person', 'url'=>array('index')),
	array('label'=>'Create Person', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#person-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage People</h1>

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
	'id'=>'person-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idPerson',
		'firstName',
		'lastName',
		'birthDate',
		//'personTypeId',
                // below leads to error 'Trying to get property of non-object'
                //array('name'=>'personTypeSearch', 'value'=>$model->personType->name),
                array(
		      // definitely need the search variable name here
		      'name'=>'personTypeSearch', 
		      // I read that this might be necessary if I have empty fields
		      // I do not here since personType is required
		      //'value'=>'$data->personType!==null?$data->personType->Name:"None"',
		      'value'=>'$data->personType->Name',
		      // This filter change is important as it allows comparison by name, not id
                    //'filter'=>CHtml::listData(PersonType::model()->findAll(),'idPersonType','Name'),),
		      // this works giving a nice drop down menu
                    //'filter'=>CHtml::listData(PersonType::model()->findAll(),'Name','Name'),
		      // this works, matching the other search boxes
		      'filter'=>CHtml::activeTextField($model,'personTypeSearch'),
		      ),
                
		'email',
		/*
		'phone',
		'comments',
		'doNotContact',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
