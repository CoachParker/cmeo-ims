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
		<?php echo $form->labelEx($model,'start'); ?>
		<?php echo $form->textField($model,'start'); ?>
		<?php echo $form->error($model,'start'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'end'); ?>
		<?php echo $form->textField($model,'end'); ?>
		<?php echo $form->error($model,'end'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'eventTypeId'); ?>
		<?php //echo $form->textField($model,'eventTypeId',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->radioButtonList(
                        $model,
                        'eventTypeId',
                        CHtml::listData(EventType::model()->findAll(), 'eventType', 'displayName'),
                        array('separator'=>'&nbsp; &nbsp;','labelOptions'=>array('style'=>'display:inline'))
                        ); ?>   
		<?php echo $form->error($model,'eventTypeId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'recurrence'); ?>
		<?php echo $form->textField($model,'recurrence',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'recurrence'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sponsorEntityId'); ?>
		<?php //echo $form->textField($model,'sponsorEntityId'); ?>
		<?php echo $form->dropDownList(
                        $model,
                        'sponsorEntityId',
                        CHtml::listData(Entity::model()->findAll(), 'idEntity', 'name'),
                        array('prompt' => 'Select a Group')); ?>
		<?php echo $form->error($model,'sponsorEntityId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'facilitatorPersonId'); ?>
		<?php //echo $form->textField($model,'facilitatorPersonId'); ?>
		<?php echo $form->dropDownList(
                        $model,
                        'facilitatorPersonId',
                        CHtml::listData(Person::model()->findAll(), 'idPerson', 'firstName','lastName'),
                        array('prompt' => 'Select a Person')); ?>
		<?php echo $form->error($model,'facilitatorPersonId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'classLimit'); ?>
		<?php echo $form->textField($model,'classLimit'); ?>
		<?php echo $form->error($model,'classLimit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ageGroupId'); ?>
		<?php //echo $form->textField($model,'ageGroupId'); ?>
		<?php echo $form->radioButtonList(
                        $model,
                        'ageGroupId',
                        CHtml::listData(AgeGroup::model()->findAll(), 'idAgeGroup', 'name'),
                        array('separator'=>'&nbsp; &nbsp;','labelOptions'=>array('style'=>'display:inline'))
                        ); ?>  
		<?php echo $form->error($model,'ageGroupId'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->