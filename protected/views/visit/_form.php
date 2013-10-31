<?php
/* @var $this VisitController */
/* @var $model Visit */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'visit-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'visitDateTime'); ?>
		<?php echo $form->textField($model,'visitDateTime'); ?>
		<?php echo $form->error($model,'visitDateTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'entityId'); ?>
		<?php echo $form->textField($model,'entityId'); ?>
		<?php echo $form->error($model,'entityId'); ?>
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
		<?php echo $form->textField($model,'destinationEventId'); ?>
		<?php echo $form->error($model,'destinationEventId'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->