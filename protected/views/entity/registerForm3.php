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
            
	</div>


<h1>Add Person</h1>

<?php
$this->widget('ext.widgets.tabularinput.XTabularInput',array(
    'models'=>$person,
    'containerTagName'=>'table',
    'headerTagName'=>'thead',
    'header'=>'
        <tr>
            <td>'.CHtml::activeLabelEX(Person::model(),'firstName').'</td>
            <td>'.CHtml::activeLabelEX(Person::model(),'lastName').'</td>
            <td>'.CHtml::activeLabelEX(Person::model(),'birthDate').'</td>
            <td></td>
        </tr>
    ',
    'inputContainerTagName'=>'tbody',
    'inputTagName'=>'tr',
    'inputView'=>'extensions/_tabularInputAsTable',
    'inputUrl'=>$this->createUrl('request/addTabularInputsAsTable'),
    'addTemplate'=>'<tbody><tr><td colspan="3">{link}</td></tr></tbody>',
    'addLabel'=>Yii::t('ui','Add new row'),
    'addHtmlOptions'=>array('class'=>'blue pill full-width'),
    'removeTemplate'=>'<td>{link}</td>',
    'removeLabel'=>Yii::t('ui','Delete'),
    'removeHtmlOptions'=>array('class'=>'red pill'),
));
?>


	<div class="row buttons">
		<?php echo CHtml::submitButton($entity->isNewRecord ? 'Create' : 'Save'); ?>
	</div>


<?php $this->endWidget(); ?>

</div><!-- form -->