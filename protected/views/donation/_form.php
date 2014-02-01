<?php
/* @var $this DonationController */
/* @var $model Donation */
/* @var $form CActiveForm */
?>

<div class="form">
    
<?php $form=$this->beginWidget('CActiveForm', array(
    //$form=$this->beginWidget('foundation.widgets.FounActiveForm', array(
	'id'=>'donation-form',
	'enableAjaxValidation'=>false,
        //'type' => 'custom', // foundation option
)); ?>

    <div class="panel">
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
            <div class="large-12 columns">
		<?php echo $form->labelEx($model,'entityId'); ?>
		<?php //echo $form->dropDownList(
                        //$model,
                        //'entityId',
                        //CHtml::listData(Entity::model()->findAll(), 'idEntity', 'name'),
                        //array('prompt' => 'Select a Group',)
                        //); ?>
                 <?php $this->widget('ext.select2.ESelect2',array(
                     'model'=>$model,  
                     'attribute'=>'entityId',
                     'data'=>CHtml::listData(Entity::model()->findAll(), 'idEntity', 'name'),
                     'options'=>array(
                         'width'              => '100%',
                         'placeholder'  => 'Type a name'
                         ),
                     )); 
                ?>
		<?php echo $form->error($model,'entityId'); ?>
            </div>
	</div>
  
	<div class="row">
            &nbsp;
	</div> 
        
        <div class="row">
            <div class="large-6 columns">
		<?php echo $form->labelEx($model,'donationDate'); ?>
                <?php 
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model' => $model,
                    'attribute' => 'donationDate',
                    'htmlOptions' => array(
                        'size' => '10',         // textField size
                        'maxlength' => '10',    // textField maxlength
                        'value'=>CTimestamp::formatDate('Y-m-d'), //default to today.
                    ),
                    'options' => array(
                        'dateFormat' => 'yy-m-d',
                    ),
                )); 
                ?>
		<?php echo $form->error($model,'donationDate'); ?>
            </div>
            
            <div class="large-6 columns">
		<?php echo $form->labelEx($model,'amount'); ?>
		<?php echo $form->textField($model,'amount',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'amount'); ?>
            </div>
	</div>

	<div class="row">            
            <div class="large-12 columns">
		<?php echo $form->labelEx($model,'donationReasonId'); ?>
		<?php echo $form->radioButtonList(
                        $model,
                        'donationReasonId',
                        CHtml::listData(DonationReason::model()->findAll(), 'idDonationReason', 'name'),
                        array('separator'=>'&nbsp; &nbsp;','labelOptions'=>array('style'=>'display:inline'))
                        ); ?>
		<?php echo $form->error($model,'donationReasonId'); ?>
            </div>
	</div>
  
	<div class="row">
            &nbsp;
	</div> 
        
	<div class="row">            
            <div class="large-6 columns">
		<?php echo $form->labelEx($model,'contactPerson'); ?>
		<?php //echo $form->dropDownList(
                        //$model,
                        //'contactPerson',
                        //CHtml::listData(Person::model()->findAll(), 'idPerson', 'firstName', 'lastName'),
                        //array('prompt' => 'Select Contact Person')); ?>
                <?php $this->widget('ext.select2.ESelect2',array(
                     'model'=>$model,  
                     'attribute'=>'contactPerson',
                     'data'=>CHtml::listData(Person::model()->findAll(), 'idPerson', 'firstName', 'lastName'),
                     'options'=>array(
                         'width'        => '100%',
                         'placeholder'  => 'Type a name'
                     ),
                     )); ?>
		<?php echo $form->error($model,'contactPerson'); ?>
            </div>

            
            <div class="large-6 columns">
		<?php echo $form->labelEx($model,'isThanked'); ?>
		<?php echo $form->radioButtonList(
                        $model,
                        'isThanked',
                        array(0=>'No',1=>'yes'),
                        array('separator'=>'&nbsp; &nbsp;','labelOptions'=>array('style'=>'display:inline'))); ?>
                
		<?php echo $form->error($model,'isThanked'); ?>
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
</div>
</div><!-- form -->