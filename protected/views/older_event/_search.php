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
		<?php echo $form->label($model,'eventDate'); ?>
		<?php echo $form->textField($model,'eventDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'classLimit'); ?>
		<?php echo $form->textField($model,'classLimit'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ageGroupId'); ?>
		<?php echo $form->textField($model,'ageGroupId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'eventTypeId'); ?>
		<?php echo $form->textField($model,'eventTypeId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'notes'); ?>
		<?php echo $form->textArea($model,'notes',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sponsoringEntityId'); ?>
		<?php echo $form->textField($model,'sponsoringEntityId'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->