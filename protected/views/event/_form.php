<?php
/* @var $this EventController */
/* @var $model Event */
  /* @var $eventType EventType */
  /* @var $member EventAttribute */
/* @var $form CActiveForm */
?>

<div class="form panel">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'event-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
	<?php echo $form->hiddenField($model,'idEvent', array('id'=>'idEvent')); ?>
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
            <div class="large-6 columns">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'name'); ?>
            </div>
	</div>

	<div class="row">
            <div class="large-6 columns">
		<?php echo $form->labelEx($model,'eventDate'); ?>
		<?php echo $form->dateField($model,'eventDate'); ?>
		<?php echo $form->error($model,'eventDate'); ?>
            </div>

            <div class="large-6 columns">
		<?php echo $form->labelEx($model,'endDate'); ?>
		<?php echo $form->dateField($model,'endDate'); ?>
		<?php echo $form->error($model,'endDate'); ?>
            </div>
	</div>

	<div class="row">
            <div class="large-6 columns">
		<?php echo $form->labelEx($model,'recurrence'); ?>
		<?php echo $form->textField($model,'recurrence',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'recurrence'); ?>
            </div>

            <div class="large-6 columns">
		<?php echo $form->labelEx($model,'classLimit'); ?>
		<?php echo $form->textField($model,'classLimit'); ?>
		<?php echo $form->error($model,'classLimit'); ?>
            </div>
	</div>

	<div class="row">
            <div class="large-12 columns">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
            </div>
	</div>

	<div class="row">
            <div class="large-12 columns">
		<?php echo $form->labelEx($model,'ageGroupId'); ?>
		<?php echo $form->radioButtonList(
                        $model,
                        'ageGroupId',
                        CHtml::listData(AgeGroup::model()->findAll(), 'idAgeGroup', 'name'),
                        array('separator'=>'&nbsp; &nbsp;','labelOptions'=>array('style'=>'display:inline'))
                        ); ?>  
		<?php echo $form->error($model,'ageGroupId'); ?>
            </div>
	</div>

      
        <div class="row">
            <div class="large-4 columns">
            <?php echo $form->labelEx($model,'eventTypeId'); ?>
            <?php echo $form->dropDownList(
                        $model,
                        'eventTypeId',
//                        array_merge(CHtml::listData(EventType::model()->findAll(), 'idEventType', 'displayName'),array("__new__"=>'Create new type')),
                        CHtml::listData(EventType::model()->findAll(), 'idEventType', 'displayName'),
                        array(
                            'prompt' => 'Select an Event Type',
                            //'options' => array()
                            // 'ajax' => array(
                                // 'type'=>'POST', //request type
                                // //'url'=>$this->createUrl('dynamicPeople'), //url to call.
                                // 'url'=>Yii::app()->createUrl('event/attributeTextBoxes'), //url to call.
                                // 'update'=>'#Event_attributeValues', //selector to update
                                // //'data'=>array('eventTypeId'=>'js:this.value'), 
                            // //leave out the data key to pass all form values through
							// )
						)); 
                    //moved attribute values to their own div
                    ?>
		<?php echo $form->error($model,'entityId'); ?>
        </div>
        
            <div class="large-4 columns">
                <fieldset>
                    <legend>Additional Attributes</legend>
                    <div id="Event_attributeValues">
                    </div>
                </fieldset>
            </div>
            <div class="large-4 columns">
                <a href="#" class="small button" data-reveal-id="myModal">Add New Event Type</a>
            </div>
                
        </div>
        
	<div class="row">
            <div class="large-12 columns">
		<?php echo $form->labelEx($model,'notes'); ?>
		<?php echo $form->textArea($model,'notes',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'notes'); ?>
            </div>
	</div>

	<div class="row">
            <div class="large-6 columns">
		<?php echo $form->labelEx($model,'sponsorEntityId'); ?>
                <?php echo $form->dropDownList(
                        $model,
                        'sponsorEntityId',
                        CHtml::listData(Entity::model()->findAll(), 'idEntity', 'name'),
                        array('prompt' => 'Select a Group')); ?>
		<?php echo $form->error($model,'sponsorEntityId'); ?>
            </div>

            <div class="large-6 columns">
		<?php echo $form->labelEx($model,'facilitatorPersonId'); ?>
                <?php echo $form->dropDownList(
                        $model,
                        'facilitatorPersonId',
                        CHtml::listData(Person::model()->findAll(), 'idPerson', 'firstName','lastName'),
                        array('prompt' => 'Select a Person')); ?>
		<?php echo $form->error($model,'facilitatorPersonId'); ?>
            </div>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<div id="myModal" class="reveal-modal" >
    Hey Lets make a new event type.
    <!-- begin event type attribute form -->
    <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id'=>'add-eventType',
            'action'=>'createA',
            'enableAjaxValidation'=>false
            ));
    ?>

            <p class="note">Fields with <span class="required">*</span> are required.</p>

            <?php
            //show errorsummary at the top for all models
            //build an array of all models to check
            
            echo $form->errorSummary(array_merge(array($eventType),$validatedMembers));
            ?>

    <div class="panel">
        <div class="row">
            <div class="large-4 columns">
                    <?php echo $form->labelEx($eventType,'eventType'); ?>
                    <?php echo $form->textField($eventType,'eventType',array('size'=>45,'maxlength'=>45)); ?>
                    <?php echo $form->error($eventType,'eventType'); ?>
            </div>

           <div class="large-4 columns">
                    <?php echo $form->labelEx($eventType,'displayName'); ?>
                    <?php echo $form->textField($eventType,'displayName',array('size'=>45,'maxlength'=>45)); ?>
                    <?php echo $form->error($eventType,'displayName'); ?>
            </div>

           <div class="large-4 columns">
                    <?php echo $form->labelEx($eventType,'description'); ?>
                    <?php echo $form->textField($eventType,'description',array('size'=>45,'maxlength'=>45)); ?>
                    <?php echo $form->error($eventType,'description'); ?>
            </div>
        </div>
        <div class="row">
            <div class="large-12 columns">
		<?php echo CHtml::label('Existing Attributes',false) 
                //$form->labelEx($eventType,'eventAttributes'); 
                ?>
		<?php echo $form->dropDownList(
                        $eventType,
                        'eventAttributes',
                        CHtml::listData(EventAttribute::model()->findAll(), 'idEventAttribute', 'displayName'),
                        array('multiple' => 'multiple')
                        ); ?>
		<?php echo $form->error($eventType,'eventAttributes'); ?>              
            </div>
        </div>
    </div>


    <!--<h1>Add Attributes</h1>-->

    <?php
    $memberFormConfig = array(
                'class'=>'panel',
                'elements'=>array(
                    'attribute'=>array(
                        'type'=>'text',
                        //'class'=>'large-6 columns',
                    ),
                    'displayName'=>array(
                        'type'=>'text',
                        //'class'=>'large-6 columns',
                    ),
                    'description'=>array(
                        'type'=>'text',
                        //'class'=>'large-6 columns',
                    ),
                    'valueType'=>array(
                        'type'=>'text',
                        //'class'=>'large-6 columns',
                    ),
                ),
    );

    $this->widget('ext.multimodelform.MultiModelForm',array(
        'id' => 'id_member', //the unique widget id
        'formConfig' => $memberFormConfig, //the form configuration array
        'model' => $member, //instance of the form model
        'tableView' => true,
        'addItemText' => 'Add New Attributes',
        'addItemAsButton' => true,
        'hideCopyTemplate' => false,

        //if submitted not empty from the controller,
        //the form will be rendered with validation errors
        'validatedItems' => $validatedMembers,

        //array of member instances loaded from db
        //'data' => $member->findAll('entities=:groupId', array(':groupId'=>$eventType->idEntity)),
        ));

    ?>

    <div class="row buttons">
        <?php //echo CHtml::submitButton($eventType->isNewRecord ? 'Create' : 'Save');
        			echo CHtml::ajaxSubmitButton(
	        			$eventType->isNewRecord ? 'Create' : 'Save',
	        			CHtml::normalizeUrl(array('event/createA')),
	        			array(
	        				'success'=>"function(ret){
                                                        console.log(ret);
                                                        jQuery.ajax({
                                                            'success':function(data){
                                                                    console.log(data);
                                                                    $('#Event_eventTypeId').html(data);
                                                                },
                                                             'type':'POST',
                                                             'url':'/ims/event/ajaxGetTypes',
                                                             'cache':false
                                                        });
                                                        $('#myModal').foundation('reveal', 'close');
                                                    }"
	        				
        				))
         ?>
    </div>

</div>


<?php $this->endWidget(); ?>

</div><!-- form -->
<!-- end  event type attribute form -->
</div>

<?php  
//Yii::app()->clientscript->scriptMap['jquery.js'] = false;
//Yii::app()->clientScript->registerCoreScript('jquery');
Yii::app()->clientScript->registerScript('dynamic-typefields', //<<<'Javascript'
'	
jQuery("body").on("change","#Event_eventTypeId", function(){updateEventTypeFields(this);} );

function updateEventTypeFields(elem){
	var $elem = jQuery(elem);
	var idEventType = $elem.attr("value");
        if (idEventType == "__new__") {
            $("#myModal").foundation("reveal", "open");
        }
	var $form = $elem.parents("form");
	var idEvent = $form.find("#idEvent").attr("value");
	jQuery.ajax({
		"type":"POST",
		"url":"'.Yii::app()->createUrl('event/attributeTextBoxes').'",
		"cache":false,
		"data": "idEventType=" + encodeURIComponent(idEventType) + "&idEvent=" + encodeURIComponent(idEvent),
		"success": function(html){
			jQuery("#Event_attributeValues").html(html)
		}
	});
	return false;
}

var $typeSel = $("#Event_eventTypeId");
if ( $typeSel.attr("value") != ""){
	updateEventTypeFields($typeSel);
}
'
//Javascript
//'data': jQuery(elem).parents('form').serialize(),
//encodeURIComponent(" . $model->idEvent . ")
//".Yii::app()->createUrl('event/attributeTextBoxes')."

);
?>