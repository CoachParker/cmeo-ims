<?php

/* @var $this VisitController */
/* @var $model Visit */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'visit-form',
    'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

<!-- visitDateTime field not needed due to timestamp rule in Visit model -->
        
<!-- This was an attempt to load an entities people without and ajax call
doesnt work
	<div class="row">
		<?php ///echo $form->labelEx($model,'entityId'); ?>
		<?php //echo $form->dropDownList($model,'entityId',
                        //CHtml::listData(Entity::model()->findAll(), 'idEntity', 'name'),
                        //array('prompt' => 'Select a Group')); ?>
            <?php //echo $form->dropDownList($model, 'personId', empty($model->entityId) ? 
                       // array ( 'prompt' => 'Select the group first' ) : CHtml::listData( Person::model()->findAll(
                       // array(
                       //     'condition' => 'entityId=:entityId', 
                       //     'params'=>array(':entityId' => $model->entityId)
                      //  )), 'idPerson', 'firstName')
                     // ); ?>
		<?php //echo $form->error($model,'entityId'); ?>
	</div>
-->

        <div class="row">
        <div class="large-6 columns">
            <?php echo $form->labelEx($model,'entityId'); ?>
            <?php echo $form->dropDownList(
                        $model,
                        'entityId',
                        CHtml::listData(Entity::model()->findAll(), 'idEntity', 'name'),
                        array(
                            'prompt' => 'Select a Group',
                            'ajax' => array(
                                'type'=>'POST', //request type
                                //'url'=>$this->createUrl('dynamicPeople'), //url to call.
                                'url'=>Yii::app()->createUrl('visit/dynamicPeopleCheck'), //url to call.  
                                'update'=>'#Visit_people', //selector to update
                                //'data'=>array('entityId'=>'js:this.value'), 
                            //leave out the data key to pass all form values through
                        ))); 
                    //empty since it will be filled by the other dropdown
                    //echo CHtml::dropDownList('personId','', array()); 
                    //moved person to its own div
               /* echo $form->checkBoxList(
                        $model,
                        'people',
                        array(),
                        array('separator'=>'&nbsp; &nbsp;')
                        ); 
                 */   ?>
		<?php echo $form->error($model,'entityId'); ?>
        </div>
        </div>
<br />

        <div class="row">
		<?php echo $form->labelEx($model,'people'); ?>
		<?php echo $form->checkBoxList(
                $model,
                'people',
                CHtml::listData(Person::model()->findAll(), 'idPerson', 'firstName'),
                array('separator'=>'&nbsp; &nbsp;','labelOptions'=>array('style'=>'display:inline'))); ?>
		<?php echo $form->error($model,'people'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'numberOfGuests'); ?>
		<?php echo $form->textField($model,'numberOfGuests'); ?>
		<?php echo $form->error($model,'numberOfGuests'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'amountPaid'); ?>
		<?php echo $form->textField($model,'amountPaid',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'amountPaid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'destinationEventId'); ?>
		<?php echo $form->dropDownList($model,'destinationEventId',
                        CHtml::listData(Event::model()->findAll(), 'idEvent', 'description'),
                        array('prompt' => 'Select an Event')
					       ); ?>
		<?php echo $form->error($model,'destinationEventId'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->