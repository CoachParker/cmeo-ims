<?php
/* @var $this EventTypeController */
/* @var $model EventType */
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
        echo $form->errorSummary(array_merge(array($eventType),$validatedMembers));
        ?>

	<div class="panel">
	<div class="row">
        <div class="large-4 columns">
		<?php echo $form->labelEx($eventType,'eventType'); ?>
		<?php echo $form->textField($eventType,'eventType',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($eventType,'eventType'); ?>
	</div>

       <div class="large-4 columns">
		<?php echo $form->labelEx($eventType,'displayName'); ?>
		<?php echo $form->textField($eventType,'displayName',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($eventType,'displayName'); ?>
	</div>

       <div class="large-4 columns">
		<?php echo $form->labelEx($eventType,'description'); ?>
		<?php echo $form->textField($eventType,'description',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($eventType,'description'); ?>
	</div>
        </div>
            
        </div>


<!--<h1>Add Attributes</h1>-->

<?php
$memberFormConfig = array(
            'class'=>'panel',
            'elements'=>array(
                'attribute'=>array(
                    'type'=>'text',
                    //'class'=>'large-6 columns',
                ),
                'displayName'=>array(
                    'type'=>'text',
                    //'class'=>'large-6 columns',
                ),
                'description'=>array(
                    'type'=>'text',
                    //'class'=>'large-6 columns',
                ),
                'valueType'=>array(
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
    'addItemText' => 'Add Attributes',
    'addItemAsButton' => true,
    'hideCopyTemplate' => false,
 
        //if submitted not empty from the controller,
        //the form will be rendered with validation errors
        'validatedItems' => $validatedMembers,
 
        //array of member instances loaded from db
        //'data' => $member->findAll('entities=:groupId', array(':groupId'=>$eventType->idEntity)),
    ));

?>

	<div class="row buttons">
		<?php echo CHtml::submitButton($eventType->isNewRecord ? 'Create' : 'Save'); ?>
	</div>


<?php $this->endWidget(); ?>

</div><!-- form -->