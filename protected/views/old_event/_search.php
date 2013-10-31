<?php
/* @var $this EventController */
/* @var $model Event */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idEvent'); ?>
		<?php echo $form->textField($model,'idEvent'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'start'); ?>
		<?php echo $form->textField($model,'start'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'end'); ?>
		<?php echo $form->textField($model,'end'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'eventTypeId'); ?>
		<?php echo $form->textField($model,'eventTypeId',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'recurrence'); ?>
		<?php echo $form->textField($model,'recurrence',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sponsorEntityId'); ?>
		<?php echo $form->textField($model,'sponsorEntityId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'facilitatorPersonId'); ?>
		<?php echo $form->textField($model,'facilitatorPersonId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'classLimit'); ?>
		<?php echo $form->textField($model,'classLimit'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ageGroupId'); ?>
		<?php echo $form->textField($model,'ageGroupId'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->