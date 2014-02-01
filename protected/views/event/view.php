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
// Todo: replace this all with a viewmodel designed for the widget
$attributes = array();
foreach ($model->attributeLabels() as $k => $l) {
	$entry = array(
				'label' => $l,
				'value' => $model->$k,
				);
	switch ($k) {
		case 'ageGroupId':
			$entry['value'] = $model->ageGroup->name; 
			break;
		case 'eventTypeId':
			$entry['value'] = $model->eventType->displayName; 
			break;
		case 'sponsorEntityId':
			$entry['value'] = $model->sponsorEntity ? $model->sponsorEntity->name: ""; 
			break;
		case 'facilitatorPersonId':
			$entry['value'] = $model->getPerson(); 
			$entry['type'] = 'raw';
			break;
		//array('label'=>'person.firstName', 'value'=>$model->facilitatorPerson->firstName." ".$model->facilitatorPerson->lastName),
	}
	$attributes[] = $entry;
}
				
$eavLabels = $model->attributeLabelsEav();
foreach ( $model->getEavValues() as $eavVal ) {
	$attributes[] = array(
					'label' => $eavLabels[$eavVal->eventAttributeId],
                    'value' => $eavVal->value,
                );
}

// foreach($model->eventType->eventAttributes as $attr){
	// $descriptions[$attr->idEventAttribute] = $attr->displayName;
// }
// foreach($model->attributeValues as $attr){
	// $id = $attr->eventAttributeId;
	// $value = $attr->value;
	// if ($descriptions[$id]){
		// $attributes[] = array( 'label' => $descriptions[$id], 'value' => $value);
	// }
// }	
?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=> $attributes,
	// 'attributes'=> array_merge( array(
		// 'idEvent',
		// 'name',
		// 'eventDate',
		// 'endDate',
		// 'recurrence',
		// 'classLimit',
		// 'description',
                // array(
                    // 'label' => 'Age Group',
                    // 'value' => $model->ageGroup->name,
                // ),
                // array(
                    // 'label' => 'Event Type',
                    // 'value' => $model->eventType->displayName,
                // ),
		// 'notes',
                // array(
                    // 'label' => 'Sponsoring Entity',
                    // 'value' => $model->sponsorEntity ? $model->sponsorEntity->name: "",
                // ),
                // //array('label'=>'person.firstName', 'value'=>$model->facilitatorPerson->firstName." ".$model->facilitatorPerson->lastName),
                // array(
                // 'label' => 'Facilitator',
                // 'value' => $model->getPerson(),
		// 'type'  => 'raw'
				// ),
				// array()
		
	// ), $attributes),
)); ?>
