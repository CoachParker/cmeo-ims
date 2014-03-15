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

	<?php
        //show errorsummary at the top for all models
        //build an array of all models to check
        echo $form->errorSummary(array_merge(array($entity),$validatedMembers));
        ?>

	<div class="panel">
	<div class="row">
        <div class="large-6 columns">
		<?php echo $form->labelEx($entity,'name'); ?>
		<?php echo $form->textField($entity,'name',array('size'=>45,'maxlength'=>45)); ?>
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
            <div class="large-3 columns">
		<?php echo $form->labelEx($entity,'phone'); ?>
		<?php echo $form->textField($entity,'phone',array('size'=>17,'maxlength'=>17)); ?>
		<?php echo $form->error($entity,'phone'); ?>
            </div>

            <div class="large-9 columns">
		<?php echo $form->labelEx($entity,'comments'); ?>
		<?php echo $form->textArea($entity,'comments',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($entity,'comments'); ?>
            </div>
	</div>
            
	<div class="row">
            <div class="large-12 columns">
		<?php echo $form->labelEx($entity,'people'); ?>
		<?php //echo $form->checkBoxList(
                //$model,
                //'people',
                //CHtml::listData(Person::model()->findAll(), 'idPerson', 'firstName'),
                //array('separator'=>'&nbsp; &nbsp;','labelOptions'=>array('style'=>'display:inline'))); 
                ?>
		<?php echo $form->dropDownList(
                        $entity,
                        'people',
                        CHtml::listData(Person::model()->findAll(), 'idPerson', 'firstName', 'lastName'),
                        array('prompt' => 'Select People', 'multiple' => 'multiple')); ?>
                <?php /*$this->widget('ext.select2.ESelect2',array(
                     'model'=>$entity,  
                     'attribute'=>'people',
                     'data'=>CHtml::listData(Person::model()->findAll(), 'idPerson', 'firstName', 'lastName'),
                    'htmlOptions'=>array(
                        'multiple' => 'multiple',
                    ), 
                    'options'=>array(
                         'width'        => '100%',
                         'placeholder'  => 'Type a name'
                     ),
                     )); */?>
		<?php echo $form->error($entity,'people'); ?>
            </div>
        </div>

            
	</div>


<!--<h1>Add Person</h1>-->

<?php
$memberFormConfig = array(
            'class'=>'panel',
            'elements'=>array(
                'firstName'=>array(
                    'type'=>'text',
                    //'class'=>'large-6 columns',
                ),
                'lastName'=>array(
                    'type'=>'text',
                    //'class'=>'large-6 columns',
                ),
                'personTypeId'=>array(
                    'type'=>'dropdownlist',
                    'items'=>  CHtml::listData(PersonType::model()->findAll(), 'idPersonType', 'Name'),
                    //'separator'=>' ',
                    //array('size'=>'2')
                ),
                'email'=>array(
                    'type'=>'text',
                    //'class'=>'large-6 columns',
                ),
                'birthDate'=>array(
                    'type'=>'date',
                    //'class'=>'large-6 columns',
                ),
                'phone'=>array(
                    'type'=>'text',
                    //'class'=>'large-6 columns',
                ),
                'comments'=>array(
                    'type'=>'text',
                    //'class'=>'large-6 columns',
                ),
            ),
);

$this->widget('ext.multimodelform.MultiModelForm',array(
        'id' => 'id_member', //the unique widget id
        'formConfig' => $memberFormConfig, //the form configuration array
        'model' => $member, //instance of the form model
        'tableView' => true,
    'addItemText' => 'Add family member',
    'addItemAsButton' => true,
    'hideCopyTemplate' => false,
 
        //if submitted not empty from the controller,
        //the form will be rendered with validation errors
        'validatedItems' => $validatedMembers,
 
        //array of member instances loaded from db
        //'data' => $member->findAll('entities=:groupId', array(':groupId'=>$entity->idEntity)),
    ));

?>

	<div class="row buttons">
		<?php echo CHtml::submitButton($entity->isNewRecord ? 'Create' : 'Save'); ?>
	</div>


<?php $this->endWidget(); ?>

</div><!-- form -->