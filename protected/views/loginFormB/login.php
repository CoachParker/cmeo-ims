<?php
/* @var $this LoginFormBController */
/* @var $model LoginFormB */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>


<h1>Login Form B</h1>

<p>Please fill out the following form with your login credentials:</p>

<div class="form">
<?php echo CHtml::beginForm(); ?>
 
    <?php echo CHtml::errorSummary($model); ?>
 
    <div class="row">
        <div class="large-6 columns">
        <?php echo CHtml::activeLabel($model,'username'); ?>
        <?php echo CHtml::activeTextField($model,'username') ?>
        </div>

        <div class="large-6 columns">
        <?php echo CHtml::activeLabel($model,'password'); ?>
        <?php echo CHtml::activePasswordField($model,'password') ?>
        </div>
    </div>
     
    <div class="row submit">
        <?php echo CHtml::submitButton('Login', array('class' => 'small button radius')); ?>
    </div>
 
<?php echo CHtml::endForm(); ?>
</div><!-- form -->
