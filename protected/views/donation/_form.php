<?php
/* @var $this DonationController */
/* @var $model Donation */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'donation-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'entityId'); ?>
		<?php echo $form->textField($model,'entityId'); ?>
		<?php echo $form->error($model,'entityId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'donationDate'); ?>
		<?php echo $form->textField($model,'donationDate'); ?>
		<?php echo $form->error($model,'donationDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'amount'); ?>
		<?php echo $form->textField($model,'amount',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'donationReasonId'); ?>
		<?php echo $form->textField($model,'donationReasonId'); ?>
		<?php echo $form->error($model,'donationReasonId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'isThanked'); ?>
		<?php echo $form->textField($model,'isThanked'); ?>
		<?php echo $form->error($model,'isThanked'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comments'); ?>
		<?php echo $form->textArea($model,'comments',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'comments'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->