<?php
/* @var $this PersonController */
/* @var $model Person */
/* @var $form CActiveForm */
?>

<div class="form panel">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'person-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
            <div class="large-6 columns">
		<?php echo $form->labelEx($model,'firstName'); ?>
		<?php echo $form->textField($model,'firstName',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'firstName'); ?>
            </div>

            <div class="large-6 columns">
		<?php echo $form->labelEx($model,'lastName'); ?>
		<?php echo $form->textField($model,'lastName',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'lastName'); ?>
            </div>
	</div>

	<div class="row">
            <div class="large-6 columns">
		<?php echo $form->labelEx($model,'birthDate'); ?>
		<?php echo $form->textField($model,'birthDate'); ?>
		<?php echo $form->error($model,'birthDate'); ?>
            </div>

            <div class="large-6 columns">
		<?php echo $form->labelEx($model,'personTypeId'); ?>
		<?php echo $form->radioButtonList(
                        $model,
                        'personTypeId',
                        CHtml::listData(PersonType::model()->findAll(), 'idPersonType', 'Name'),
                        array('separator'=>'&nbsp; &nbsp;','labelOptions'=>array('style'=>'display:inline'))
                        ); ?>
		<?php //echo $form->textField($model,'personTypeId'); ?>
		<?php echo $form->error($model,'personTypeId'); ?>
            </div>
        </div>

	<div class="row">
            <div class="large-12 columns">
		<?php echo $form->labelEx($model,'entities'); ?>
                <?php $this->widget('ext.select2.ESelect2',array(
                     'model'=>$model,  
                     'attribute'=>'entities',
                     'data'=>CHtml::listData(Entity::model()->findAll(), 'idEntity', 'name'),
                     'htmlOptions'=>array(
                         'placeholder'  => 'Type a name',
                         'multiple'=>'multiple',
                     ),
                    'options'=>array(
                        'width'=>"100%",
                    ),
                     )); ?>
		<?php /*echo $form->dropDownList(
                        $model,
                        'entities',
                        CHtml::listData(Entity::model()->findAll(), 'idEntity', 'name'),
                        array('prompt' => 'Select a Group', 'multiple' => 'multiple')
                        );*/ ?>
		<?php echo $form->error($model,'entities'); ?>
           </div>
	</div>
              
	<div class="row">
            <div class="large-6 columns">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'email'); ?>
            </div>

            <div class="large-6 columns">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>17,'maxlength'=>17)); ?>
		<?php echo $form->error($model,'phone'); ?>
            </div>
        </div>

	<div class="row">
            <div class="large-9 columns">
		<?php echo $form->labelEx($model,'comments'); ?>
		<?php echo $form->textArea($model,'comments',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'comments'); ?>
            </div>
  
            <div class="large-3 columns">
		<?php echo $form->labelEx($model,'doNotContact'); ?>
		<?php echo $form->radioButtonList(
                        $model,
                        'doNotContact',
                        array(0=>'false',1=>'true'),
                        array('separator'=>'&nbsp; &nbsp;','labelOptions'=>array('style'=>'display:inline'))
                        ); ?>
		<?php echo $form->error($model,'doNotContact'); ?>
            </div>
        </div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->