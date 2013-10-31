<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<!--[if IE 8]> 				 <html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" > <!--<![endif]-->

<head>
	<meta charset="utf-8" />
	<meta name="language" content="en" />
	<meta name="viewport" content="width=device-width" />
  
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/foundation.css" />

	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/vendor/custom.modernizr.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation.min.js"></script>
        
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body>

	<nav class="top-bar" id="mainmenu">
		<ul class="title-area">
			<li class="name">
				<h1><a href="#"><?php echo CHtml::encode(Yii::app()->name); ?></a></h1>
			</li>
    <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
			<li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
		</ul>

		<section class="top-bar-section">
<?php $this->widget('zii.widgets.CMenu',array(
	'htmlOptions'=>array('class'=>'right'),
	'items'=>array(
		array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
		array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
		array('label'=>'Main', 
			'url'=>array('#'), 
			'itemOptions'=>array('class'=>'has-dropdown'), 
			'submenuOptions'=>array('class'=>'dropdown'),
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Contact', 'url'=>array('/site/contact')),
			),
		),
		array('label'=>'Menu', 
			'url'=>array('#'), 
			'itemOptions'=>array('class'=>'has-dropdown'), 
			'submenuOptions'=>array('class'=>'dropdown'),
			'items'=>array(
				array('label'=>'People', 'url'=>array('/person/index')),
				array('label'=>'Entities', 'url'=>array('/entity/')),
				array('label'=>'Visit', 'url'=>array('/visit/')),
				array('label'=>'Event', 'url'=>array('/event/')),
				array('label'=>'Membership', 'url'=>array('/membership/')),
			),
		),
            array('label'=>'Operations', 
			'visible'=>(isset($this->menu) && !Yii::app()->user->isGuest),
			'url'=>array('#'), 
			'itemOptions'=>array('class'=>'has-dropdown'), 
			'submenuOptions'=>array('class'=>'dropdown'),
			'items'=>$this->menu,
		),
	),
)); ?>
		</section>
	</nav>
	
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
			'separator'=>'',
		)); ?>
	<?php endif?>

	<?php echo $content; ?>

	<div class="row">
		<div class="small-12 columns" id="footer">
			<p>Copyright &copy; <?php echo date('Y'); ?> by CMEO.<br/>
			All Rights Reserved.<br/>
			<?php echo Yii::powered(); ?><br/>
			With <a href="http://foundation.zurb.com/">Foundation version 4.2.1. from Zurb</a></p>
		</div>
	</div>

	<script>
		document.write('<script src=' + '<?php echo Yii::app()->request->baseUrl; ?>/' + 
			('__proto__' in {} ? 'js/vendor/zepto' : 'js/vendor/jquery') +
			'.js><\/script>');
	</script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation.min.js"></script>
	<!--
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.alerts.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.clearing.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.cookie.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.forms.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.interchange.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.joyride.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.magellan.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.orbit.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.placeholder.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.reveal.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.section.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.tooltips.js"></script>
	-->
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.dropdown.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.topbar.js"></script>
	<script>
		$(document).foundation();
	</script>
</body>
</html>
