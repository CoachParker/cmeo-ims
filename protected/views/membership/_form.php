<?php
/* @var $this MembershipController */
/* @var $model Membership */
/* @var $form CActiveForm */
?>

<div class="form panel">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'membership-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
            <div class="large-6 columns">
		<?php echo $form->labelEx($model,'entityId'); ?>
		<?php 
                    //echo $form->textField($model,'entityId'); 
                    $this->widget('ext.select2.ESelect2',
                            array(
                                'model'=>$model,
                                'attribute'=>'entityId',
                                'data'=>CHtml::listData(Entity::model()->findAll(), 'idEntity', 'name'),
                                'htmlOptions'=>array(
                                    'placeholder'  => 'Type a family name',
                                    ),
                                'options'=>array(
                                    'width'=>'100%')
                                )
                            );
                ?>
		<?php echo $form->error($model,'entityId'); ?>
            </div>
            <div class="large-6 columns">
		<?php echo $form->labelEx($model,'typeId'); ?>
                <?php echo $form->dropDownList(
                        $model,
                        'typeId',
                        CHtml::listData(MembershipType::model()->findAll(), 'idMembershipType', 'name'),
                        array('prompt'=>'Choose a Membership Type')
                        ); ?>
		<?php echo $form->error($model,'typeId'); ?>
            </div>
	</div>

	<div class="row">
            <div class="large-6 columns">
		<?php echo $form->labelEx($model,'startDate'); ?>
		<?php echo $form->dateField($model,'startDate',array('placeholder'=>'today')); ?>
		<?php echo $form->error($model,'startDate'); ?>
            </div>

            <div class="large-6 columns">
		<?php echo $form->labelEx($model,'endDate'); ?>
		<?php echo $form->dateField($model,'endDate'); ?>
		<?php echo $form->error($model,'endDate'); ?>
            </div>
	</div>

	<div class="row">
            <div class="large-4 columns">
		<?php echo $form->labelEx($model,'amountPaid'); ?>
		<?php echo $form->textField($model,'amountPaid',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'amountPaid'); ?>
            </div>

            <div class="large-4 columns">
		<?php echo $form->labelEx($model,'enteredBy'); ?>
		<?php echo 
                //$form->textField($model,'enteredBy',array('size'=>45,'maxlength'=>45)); 
                    $form->dropDownList(
                        $model,
                        'enteredBy',
                            CHtml::listData(User::model()->findAll(),'idUser','username')
                        );
                ?>
		<?php echo $form->error($model,'enteredBy'); ?>
            </div>

            <div class="large-4 columns">
		<?php echo $form->labelEx($model,'createDate'); ?>
		<?php echo $form->dateField($model,'createDate'); ?>
		<?php echo $form->error($model,'createDate'); ?>
            </div>
        </div>
            
	<div class="row">
            <div class="large-12 columns">
		<?php echo $form->labelEx($model,'comments'); ?>
		<?php echo $form->textArea($model,'comments',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'comments'); ?>
            </div>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->