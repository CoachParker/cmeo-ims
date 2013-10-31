<?php
/* @var $this EventAttributeController */
/* @var $model EventAttribute */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idEventAttribute'); ?>
		<?php echo $form->textField($model,'idEventAttribute'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'attribute'); ?>
		<?php echo $form->textField($model,'attribute',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'displayName'); ?>
		<?php echo $form->textField($model,'displayName',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'valueType'); ?>
		<?php echo $form->textField($model,'valueType',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->