<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'personId'); ?>
      <?php $this->widget('ext.select2.ESelect2',array(
      	'model'=>$model,
      	'attribute'=>'personId',
      	'data'=>CHtml::listData(Person::model()->findAll(), 'idPerson', 'firstName', 'lastName'),
      	'options'=>array(
                         'width'              => '100%',
                         'placeholder'  => 'Type a name'
                     ),
                     )); ?>
		<?php echo $form->error($model,'contactPerson'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>24,'maxlength'=>24)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'passwordCompare'); ?>
		<?php echo $form->passwordField($model,'passwordCompare',array('size'=>24,'maxlength'=>24)); ?>
		<?php echo $form->error($model,'passwordCompase'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'personId'); ?>
		<?php //echo $form->textField($model,'personId'); ?>
		<?php //echo $form->error($model,'personId'); ?>
	</div>


	<div class="row">
		<?php //echo $form->labelEx($model,'roleId'); ?>
		<?php //echo $form->textField($model,'roleId'); ?>
		<?php //echo $form->error($model,'roleId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'roleId'); ?>
		<?php echo $form->radioButtonList(
                        $model,
                        'roleId',
                        CHtml::listData(Role::model()->findAll(), 'idRole', 'name'),
                        array('separator'=>'&nbsp; &nbsp;','labelOptions'=>array('style'=>'display:inline'))
                        ); ?>
		<?php echo $form->error($model,'roleId'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->