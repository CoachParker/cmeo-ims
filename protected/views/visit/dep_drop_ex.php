<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<!-- view: -->
<?php 
/* @var $this RamCityController */ 
/* @var $model RamCity */ 
/* @var $form CActiveForm */
?>

<?php 
$form=$this->beginWidget('CActiveForm', 
        array( 'id'=>'ram-city-form', 'enableAjaxValidation'=>false, )); 
?>
Fields with * are required.
<?php echo $form->errorSummary($model); ?>

<?php echo $form->labelEx($model,'Continent'); ?> 
    <?php /*echo CHtml::dropDownList('con_id','con_id',CHtml::listData(RamContinent::model()->findAll(),'con_id','description'), array( 'ajax'=>array( 'type'=>'POST', 'url'=>Ccontroller::createUrl('RamCity/Selectcounty'), 'update'=>'#'.CHtml::activeId($model,'c_id'), ), 'prompt'=>'select Continet', ));*/ ?> 
        <?php echo $form->dropDownList($model,'con_id',
                CHtml::listData(RamContinent::model()->findAll(),'con_id','description'), 
                array( 'ajax'=>array( 
                    'type'=>'POST', 
                    'url'=>Ccontroller::createUrl('RamCity/Selectcounty'), 
                    'update'=>'#'.CHtml::activeId($model,'c_id'), ), 
                    'prompt'=>'select Continet', )
                ); ?> 
            <?php echo $form->error($model,'con_id'); ?>

<?php echo $form->labelEx($model,'country'); ?>
 <?php /*echo CHtml::dropDownList('c_id','c_id',CHtml::listData(RamCountry::model()->findAll(),'c_id','description'), array( 'ajax'=>array( 'type'=>'POST', 'url'=>Ccontroller::createUrl('RamCity/SelectState'), 'update'=>'#'.CHtml::activeId($model,'s_id'), ), 'prompt'=>'select Country', ));*/ ?> 
     <?php echo $form->dropDownList($model,'c_id',
             array(), 
             array( 'ajax'=>array( 
                 'type'=>'POST', 
                 'url'=>Ccontroller::createUrl('RamCity/SelectState'), 
                 'update'=>'#'.CHtml::activeId($model,'s_id'), ), 
                 'prompt'=>'select Country', )
             ); ?> 
            <?php echo $form->error($model,'c_id'); ?>

<?php echo $form->labelEx($model,'State'); ?> 
    <?php /* echo CHtml::dropDownList('s_id','s_id',CHtml::listData(RamState::model()->findAll(),'s_id','description'), array( 'ajax'=>array( 'type'=>'POST', 'url'=>Ccontroller::createUrl('RamCity/SelectCity'), 'update'=>'#'.CHtml::activeId($model,'ct_id'), ), 'prompt'=>'select Country', ));*/ 
    echo $form->dropDownList($model,'s_id',
            array(), 
            array( 'ajax'=>array( 
                'type'=>'POST', 
                'url'=>Ccontroller::createUrl('RamCity/SelectCity'), 
                'update'=>'#'.CHtml::activeId($model,'ct_id'), ), 
                'prompt'=>'select Country', )
            ); ?> 
           <?php echo $form->error($model,'s_id'); ?>

<?php echo $form->labelEx($model,'ctiy'); ?> 
    <?php echo $form->dropDownList($model,'ct_id', 
            array(), 
            array('empty'=>'select CITY')); ?> 
        <?php echo $form->error($model,'ct_id'); ?>

<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
<?php $this->endWidget(); ?>

