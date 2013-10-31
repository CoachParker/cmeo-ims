<?php
/* @var $this EventTypeController */
/* @var $model EventType */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'event-type-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'eventType'); ?>
		<?php echo $form->textField($model,'eventType',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'eventType'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'displayName'); ?>
		<?php echo $form->textField($model,'displayName',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'displayName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'eventAttributes'); ?>
		<?php //echo $form->checkBoxList($model,'entities',CHtml::listData(Entity::model()->findAll(), 'ID', 'Name'),array('separator'=>'&nbsp; &nbsp;','labelOptions'=>array('style'=>'display:inline'))); ?>
		<?php echo $form->dropDownList(
                        $model,
                        'eventAttributes',
                        CHtml::listData(EventAttribute::model()->findAll(), 'idEventAttribute', 'displayName'),
                        array('prompt' => 'Select Attributes', 'multiple' => 'multiple')
                        ); ?>
		<?php echo $form->error($model,'eventAttributes'); ?>
	</div>
        
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->