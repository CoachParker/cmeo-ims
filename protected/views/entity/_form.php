<?php
/* @var $this EntityController */
/* @var $model Entity */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'entity-form',
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
		<?php echo $form->labelEx($model,'entityTypeId'); ?>
          	<?php echo $form->radioButtonList($model,'entityTypeId',
                        CHtml::listData(EntityType::model()->findAll(), 
                                'idEntityType', 'name'),
                        array('separator'=>'&nbsp; &nbsp;',
                            'labelOptions'=>array('style'=>'display:inline'))); ?>
		<?php echo $form->error($model,'entityTypeId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'people'); ?>
		<?php //echo $form->checkBoxList(
                //$model,
                //'people',
                //CHtml::listData(Person::model()->findAll(), 'idPerson', 'firstName'),
                //array('separator'=>'&nbsp; &nbsp;','labelOptions'=>array('style'=>'display:inline'))); 
                ?>
		<?php //echo $form->dropDownList(
                        //$model,
                        //'people',
                        //CHtml::listData(Person::model()->findAll(), 'idPerson', 'firstName', 'lastName'),
                        //array('prompt' => 'Select People', 'multiple' => 'multiple')); ?>
                <?php $this->widget('ext.select2.ESelect2',array(
                     'model'=>$model,  
                     'attribute'=>'people',
                     'data'=>CHtml::listData(Person::model()->findAll(), 'idPerson', 'firstName', 'lastName'),
                     'options'=>array(
                         'width'        => '100%',
                         'placeholder'  => 'Type a name'
                     ),
                     )); ?>
		<?php echo $form->error($model,'people'); ?>
	</div>
        

        <div class="row">
		<?php //echo $form->labelEx($model,'people'); ?>
		<?php /*echo $form->checkBoxList(
                $model,
                'people',
                CHtml::listData(Person::model()->findAll(), 'idPerson', 'firstName'),
                array('separator'=>'&nbsp; &nbsp;','labelOptions'=>array('style'=>'display:inline'))); */?>
		<?php //echo $form->error($model,'people'); ?>
	</div>
        
<div class="row">
		<?php echo $form->labelEx($model,'address1'); ?>
		<?php echo $form->textField($model,'address1',array('size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'address1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address2'); ?>
		<?php echo $form->textField($model,'address2',array('size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'address2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'city'); ?>
		<?php echo $form->textField($model,'city',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'city'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'state'); ?>
		<?php echo $form->textField($model,'state',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'state'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'zip'); ?>
		<?php echo $form->textField($model,'zip',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'zip'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>17,'maxlength'=>17)); ?>
		<?php echo $form->error($model,'phone'); ?>
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