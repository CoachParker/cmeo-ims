<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<h2>Login</h2>

<p>Please click the button below to enter your login credentials:</p>

<div id="myModal" class="reveal-modal medium" >
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
    'focus'=>array($model,'username'),
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

    <h3>Please Login.</h3>
    
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="row">        
            <div class="large-12 columns">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
            </div>
        </div>

	<div class="row">
            <div class="large-12 columns">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
            </div>
        </div>

	<div class="row">
            <div class="large-12 columns">
		<?php echo CHtml::submitButton('Login', array('class' => 'button')); ?>
            </div>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
</div>

<a href="#" class="button" data-reveal-id="myModal">Login</a>