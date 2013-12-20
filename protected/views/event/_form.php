<?php
/* @var $this EventController */
/* @var $model Event */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'event-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'eventDate'); ?>
		<?php echo $form->textField($model,'eventDate'); ?>
		<?php echo $form->error($model,'eventDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'endDate'); ?>
		<?php echo $form->textField($model,'endDate'); ?>
		<?php echo $form->error($model,'endDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'recurrence'); ?>
		<?php echo $form->textField($model,'recurrence',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'recurrence'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'classLimit'); ?>
		<?php echo $form->textField($model,'classLimit'); ?>
		<?php echo $form->error($model,'classLimit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ageGroupId'); ?>
		<?php echo $form->radioButtonList(
                        $model,
                        'ageGroupId',
                        CHtml::listData(AgeGroup::model()->findAll(), 'idAgeGroup', 'name'),
                        array('separator'=>'&nbsp; &nbsp;','labelOptions'=>array('style'=>'display:inline'))
                        ); ?>  
		<?php echo $form->error($model,'ageGroupId'); ?>
	</div>

      
        <div class="row">
            <?php echo $form->labelEx($model,'eventTypeId'); ?>
            <?php echo $form->dropDownList(
                        $model,
                        'eventTypeId',
                        CHtml::listData(EventType::model()->findAll(), 'idEventType', 'displayName'),
                        array(
                            'prompt' => 'Select an Event Type',
                        /*    'ajax' => array(
                                'type'=>'POST', //request type
                                //'url'=>$this->createUrl('dynamicPeople'), //url to call.
                                'url'=>Yii::app()->createUrl('event/attributeTextBoxes')."?idEvent=".$model->idEvent, //url to call.
                                'update'=>'#Event_attributeValues', //selector to update
                                //'data'=>array('eventTypeId'=>'js:this.value'), 
                            //leave out the data key to pass all form values through
                        )*/
                            )); 
                    //moved attribute values to their own div
                    ?>
		<?php echo $form->error($model,'entityId'); ?>
        </div>
        
        <fieldset>
            <legend>Additional Attributes</legend>
            <div id="Event_attributeValues">
            </div>
        </fieldset>
        
	<div class="row">
		<?php echo $form->labelEx($model,'notes'); ?>
		<?php echo $form->textArea($model,'notes',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'notes'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sponsorEntityId'); ?>
                <?php echo $form->dropDownList(
                        $model,
                        'sponsorEntityId',
                        CHtml::listData(Entity::model()->findAll(), 'idEntity', 'name'),
                        array('prompt' => 'Select a Group')); ?>
		<?php echo $form->error($model,'sponsorEntityId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'facilitatorPersonId'); ?>
                <?php echo $form->dropDownList(
                        $model,
                        'facilitatorPersonId',
                        CHtml::listData(Person::model()->findAll(), 'idPerson', 'firstName','lastName'),
                        array('prompt' => 'Select a Person')); ?>
		<?php echo $form->error($model,'facilitatorPersonId'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

<?php  
//Yii::app()->clientscript->scriptMap['jquery.js'] = false;
Yii::app()->clientScript->registerScript('dynamic-typefields', "

jQuery('body').on('change','#Event_eventTypeId', function(){updateEventTypeFields(this);} );

function updateEventTypeFields(elem){
	jQuery.ajax({
		'type':'POST',
		'url':'".Yii::app()->createUrl('event/attributeTextBoxes')."',
		'cache':false,
		'data': jQuery(elem).parents('form').serialize(),
		'success': function(html){
			jQuery('#Event_attributeValues').html(html)
		}
	});
	return false;
}

var \$typeSel = $('#Event_eventTypeId');
if ( \$typeSel.attr('value') != ''){
	updateEventTypeFields(\$typeSel);
}
"
//".Yii::app()->createUrl('event/attributeTextBoxes')."
);
?>
      
        

</div><!-- form -->