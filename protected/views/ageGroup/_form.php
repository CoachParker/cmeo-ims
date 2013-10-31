<?php
/* @var $this AgeGroupController */
/* @var $model AgeGroup */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'age-group-form',
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
		<?php echo $form->labelEx($model,'fromAge'); ?>
		<?php echo $form->textField($model,'fromAge'); ?>
		<?php echo $form->error($model,'fromAge'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'toAge'); ?>
		<?php echo $form->textField($model,'toAge'); ?>
		<?php echo $form->error($model,'toAge'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->