<?php
/* @var $this EventController */
/* @var $model oldEvent */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'event-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'eventDate'); ?>
		<?php echo $form->textField($model,'eventDate'); ?>
  <?php /*
  $this->widget('zii.widgets.jui.CJuiDatePicker',
  array(
        'attribute'=>'eventDate',
        'model'=>$model,
        'options' => array(
                          'mode'=>'focus',
                          'dateFormat'=>'d MM, yy',
                          'showAnim' => 'slideDown',
                          ),
  'htmlOptions'=>array('size'=>30,'class'=>'date', 'value'=>date("Y F d")),
      )
      );*/
  ?>
		<?php echo $form->error($model,'eventDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'classLimit'); ?>
		<?php echo $form->textField($model,'classLimit'); ?>
		<?php echo $form->error($model,'classLimit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ageGroupId'); ?>
		<?php //echo $form->textField($model,'ageGroupId'); ?>
		<?php echo $form->radioButtonList(
                        $model,
                        'ageGroupId',
                        CHtml::listData(AgeGroup::model()->findAll(), 'idAgeGroup', 'name'),
                        array('separator'=>'&nbsp; &nbsp;','labelOptions'=>array('style'=>'display:inline'))
                        ); ?>   
		<?php echo $form->error($model,'ageGroupId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'eventTypeId'); ?>
		<?php //echo $form->textField($model,'eventTypeId'); ?>
		<?php echo $form->radioButtonList(
                        $model,
                        'eventTypeId',
                        CHtml::listData(EventType::model()->findAll(), 'idEventType', 'name'),
                        array('separator'=>'&nbsp; &nbsp;','labelOptions'=>array('style'=>'display:inline'))
                        ); ?>            
		<?php echo $form->error($model,'eventTypeId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'notes'); ?>
		<?php echo $form->textArea($model,'notes',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'notes'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sponsoringEntityId'); ?>
		<?php //echo $form->textField($model,'sponsoringEntityId'); ?>
		<?php echo $form->dropDownList(
                        $model,
                        'sponsoringEntityId',
                        CHtml::listData(Entity::model()->findAll(), 'idEntity', 'name'),
                        array('prompt' => 'Select a Group')); ?>
		<?php echo $form->error($model,'sponsoringEntityId'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->