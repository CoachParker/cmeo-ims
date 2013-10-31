<?php
/* @var $this VisitController */
/* @var $model Visit */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idVisit'); ?>
		<?php echo $form->textField($model,'idVisit'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'visitDateTime'); ?>
		<?php echo $form->textField($model,'visitDateTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'entityId'); ?>
		<?php echo $form->textField($model,'entityId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'numberOfGuests'); ?>
		<?php echo $form->textField($model,'numberOfGuests'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'amountPaid'); ?>
		<?php echo $form->textField($model,'amountPaid',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'destinationEventId'); ?>
		<?php echo $form->textField($model,'destinationEventId'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->