<?php
/* @var $this DonationController */
/* @var $model Donation */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idDonation'); ?>
		<?php echo $form->textField($model,'idDonation'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'entitySearch'); ?>
		<?php echo $form->textField($model,'entitySearch'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'donationDate'); ?>
		<?php echo $form->textField($model,'donationDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'amount'); ?>
		<?php echo $form->textField($model,'amount',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'reasonSearch'); ?>
		<?php echo $form->textField($model,'reasonSearch'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'isThanked'); ?>
		<?php echo $form->textField($model,'isThanked'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'comments'); ?>
		<?php echo $form->textArea($model,'comments',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->