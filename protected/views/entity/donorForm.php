<?php
/* @var $this EntityController */
/* @var $model Entity */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'entity-register_family-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($entity); ?>

	<?php echo $form->errorSummary($person); ?>

	<?php echo $form->errorSummary($donate); ?>
        
    <fieldset class="panel">
        <legend>Family or Business Information</legend>
        
	<div class="row">
    <div class="large-6 columns">
		<?php echo $form->labelEx($entity,'name'); ?>
		<?php echo $form->textField($entity,'name',array('size'=>45,'maxlength'=>45)); 
                ?>
		<?php echo $form->error($entity,'name'); ?>
	</div>

	<div class="large-6 columns">
		<?php echo $form->labelEx($entity,'entityTypeId'); ?>
          	<?php echo $form->radioButtonList($entity,'entityTypeId',
                        CHtml::listData(EntityType::model()->findAll(), 
                                'idEntityType', 'name'),
                        array('separator'=>'&nbsp; &nbsp;',
                            'labelOptions'=>array('style'=>'display:inline'))); ?>
		<?php echo $form->error($entity,'entityTypeId'); ?>
	</div>
	</div>        

        <div class="row">
	<div class="large-6 columns">
		<?php echo $form->labelEx($entity,'address1'); ?>
		<?php echo $form->textField($entity,'address1',array('size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($entity,'address1'); ?>
	</div>

	<div class="large-6 columns">
		<?php echo $form->labelEx($entity,'address2'); ?>
		<?php echo $form->textField($entity,'address2',array('size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($entity,'address2'); ?>
	</div>
	</div>

	<div class="row">
	<div class="large-5 columns">
		<?php echo $form->labelEx($entity,'city'); ?>
		<?php echo $form->textField($entity,'city',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($entity,'city'); ?>
	</div>

	<div class="large-4 columns">
		<?php echo $form->labelEx($entity,'state'); ?>
		<?php echo $form->textField($entity,'state',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($entity,'state'); ?>
		</div>

	<div class="large-3 columns">
		<?php echo $form->labelEx($entity,'zip'); ?>
		<?php echo $form->textField($entity,'zip',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($entity,'zip'); ?>
	</div>
	</div>

	<div class="row">
    <div class="large-4 columns">
		<?php echo $form->labelEx($entity,'phone'); ?>
		<?php echo $form->textField($entity,'phone',array('size'=>17,'maxlength'=>17)); ?>
		<?php echo $form->error($entity,'phone'); ?>
	</div>

	<div class="large-8 columns">
		<?php echo $form->labelEx($entity,'comments'); ?>
		<?php echo $form->textArea($entity,'comments',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($entity,'comments'); ?>
	</div>
	</div>
            

	<div class="row">
	<div class="large-6 columns">
		<?php echo $form->labelEx($entity,'people'); ?>
                <?php $this->widget('ext.select2.ESelect2',array(
                     'model'=>$entity,  
                     'attribute'=>'people',
                     'data'=>CHtml::listData(Person::model()->findAll(), 'idPerson', 'firstName', 'lastName'),
                     'options'=>array(
                         'width'        => '100%',
                         'placeholder'  => 'Type a name'
                     ),
                     )); ?>
		<?php echo $form->error($entity,'people'); ?>
	</div>
	<div class="large-6 columns">&nbsp;</div>
	</div>
            
	</fieldset>


<!--<h3>Add Person</h3>-->
<fieldset class="panel">
    <legend>Individual Information</legend>

	<div class="row">
	<div class="large-6 columns">
		<?php echo $form->labelEx($person,'firstName'); ?>
		<?php echo $form->textField($person,'firstName',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($person,'firstName'); ?>
	</div>

	<div class="large-6 columns">
		<?php echo $form->labelEx($person,'lastName'); ?>
		<?php echo $form->textField($person,'lastName',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($person,'lastName'); ?>
	</div>
	</div>

	<div class="row">
	<div class="large-6 columns">
		<?php echo $form->labelEx($person,'birthDate'); ?>
		<?php echo $form->dateField($person,'birthDate'); ?>
		<?php echo $form->error($person,'birthDate'); ?>
	</div>

	<div class="large-6 columns">
		<?php echo $form->labelEx($person,'personTypeId'); ?>
		<?php echo $form->radioButtonList(
                        $person,
                        'personTypeId',
                        CHtml::listData(PersonType::model()->findAll(), 'idPersonType', 'Name'),
                        array('separator'=>'&nbsp; &nbsp;','labelOptions'=>array('style'=>'display:inline'))
                        ); ?>
		<?php echo $form->error($person,'personTypeId'); ?>
	</div>
	</div>

              
	<div class="row">
	<div class="large-6 columns">
		<?php echo $form->labelEx($person,'email'); ?>
		<?php echo $form->textField($person,'email',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($person,'email'); ?>
	</div>

	<div class="large-6 columns">
		<?php echo $form->labelEx($person,'phone'); ?>
		<?php echo $form->textField($person,'phone',array('size'=>17,'maxlength'=>17)); ?>
		<?php echo $form->error($person,'phone'); ?>
	</div>
	</div>

	<div class="row">
	<div class="large-12 columns">
		<?php echo $form->labelEx($person,'comments'); ?>
		<?php echo $form->textArea($person,'comments',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($person,'comments'); ?>
	</div>
	</div>
</fieldset>
<!-- end person section -->
<!--
<h3>Donation</h3>
<div class="panel">-->
<fieldset class="panel">
    <legend>Donation</legend>

    <?php echo $form->hiddenField($donate,'entityId'); ?>
        <div class="row">
            <div class="large-6 columns">
		<?php echo $form->labelEx($donate,'donationDate'); ?>
                <?php 
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model' => $donate,
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
		<?php echo $form->error($donate,'donationDate'); ?>
            </div>
            
            <div class="large-6 columns">
		<?php echo $form->labelEx($donate,'amount'); ?>
		<?php echo $form->textField($donate,'amount',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($donate,'amount'); ?>
            </div>
	</div>

	<div class="row">            
            <div class="large-12 columns">
		<?php echo $form->labelEx($donate,'donationReasonId'); ?>
		<?php echo $form->radioButtonList(
                        $donate,
                        'donationReasonId',
                        CHtml::listData(DonationReason::model()->findAll(), 'idDonationReason', 'name'),
                        array('separator'=>'&nbsp; &nbsp;','labelOptions'=>array('style'=>'display:inline'))
                        ); ?>
		<?php echo $form->error($donate,'donationReasonId'); ?>
            </div>
	</div>
  
	<div class="row">
            &nbsp;
	</div> 
        
	<div class="row">            
            <div class="large-6 columns">
		<?php echo $form->labelEx($donate,'contactPerson'); ?>
		<?php //echo $form->dropDownList(
                        //$donate,
                        //'contactPerson',
                        //CHtml::listData(Person::model()->findAll(), 'idPerson', 'firstName', 'lastName'),
                        //array('prompt' => 'Select Contact Person')); ?>
                <?php $this->widget('ext.select2.ESelect2',array(
                     'model'=>$donate,  
                     'attribute'=>'contactPerson',
                     'data'=>CHtml::listData(Person::model()->findAll(), 'idPerson', 'firstName', 'lastName'),
                     'options'=>array(
                         'width'        => '100%',
                         'placeholder'  => 'Type a name'
                     ),
                     )); ?>
		<?php echo $form->error($donate,'contactPerson'); ?>
            </div>

            
            <div class="large-6 columns">
		<?php echo $form->labelEx($donate,'isThanked'); ?>
		<?php echo $form->radioButtonList(
                        $donate,
                        'isThanked',
                        array(0=>'No',1=>'yes'),
                        array('separator'=>'&nbsp; &nbsp;','labelOptions'=>array('style'=>'display:inline'))); ?>
                
		<?php echo $form->error($donate,'isThanked'); ?>
            </div>
	</div>

	<div class="row">
            <div class="large-12 columns">
		<?php echo $form->labelEx($donate,'comments'); ?>
		<?php echo $form->textArea($donate,'comments',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($donate,'comments'); ?>
            </div>
        </div>

</fieldset>


<!--</div>-->
<!-- end donation section -->

	<div class="row buttons">
		<?php echo CHtml::submitButton($entity->isNewRecord ? 'Create' : 'Save'); ?>
	</div>


<?php $this->endWidget(); ?>

</div><!-- form -->