<?php
/* @var $this AgeGroupController */
/* @var $model AgeGroup */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idAgeGroup'); ?>
		<?php echo $form->textField($model,'idAgeGroup'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fromAge'); ?>
		<?php echo $form->textField($model,'fromAge'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'toAge'); ?>
		<?php echo $form->textField($model,'toAge'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->