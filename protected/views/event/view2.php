<?php
/* @var $this EventController */
/* @var $model Event */

$this->breadcrumbs=array(
	'Events'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Event', 'url'=>array('index')),
	array('label'=>'Create Event', 'url'=>array('create')),
	array('label'=>'Update Event', 'url'=>array('update', 'id'=>$model->idEvent)),
	array('label'=>'Delete Event', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idEvent),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Event', 'url'=>array('admin')),
);
?>

<h1>View Event #<?php echo $model->idEvent; ?></h1>

<?php 
$descriptions = array(); // for attribute names
$attributes = array();
// get attribute names based on EventType, EventAttribute
foreach($model->eventType->eventAttributes as $attr){
	$descriptions[$attr->idEventAttribute] = $attr->displayName;
}
// get attribute values from eventAttributeValue table
foreach($model->attributeValues as $attr){
	$id = $attr->eventAttributeId;
	$value = $attr->value;
	if ($descriptions[$id]){
		$attributes[] = array( 'label' => $descriptions[$id], 'value' => $value);
	}
}	
?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=> array_merge( array(
		'idEvent',
		'name',
		'eventDate',
		'endDate',
		'recurrence',
		'classLimit',
		'description',
                array(
                    'label' => 'Age Group',
                    'value' => $model->ageGroup->name,
                ),
                array(
                    'label' => 'Event Type',
                    'value' => $model->eventType->displayName,
                ),
		'notes',
                array(
                    'label' => 'Sponsoring Entity',
                    'value' => $model->sponsorEntity ? $model->sponsorEntity->name: "",
                ),
                //array('label'=>'person.firstName', 'value'=>$model->facilitatorPerson->firstName." ".$model->facilitatorPerson->lastName),
                array(
                'label' => 'Facilitator',
                'value' => $model->getPerson(),
		'type'  => 'raw'
				),
				array()
		
	), $attributes),
)); ?>
