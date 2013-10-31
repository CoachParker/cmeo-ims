<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

<div class="row">
    <div class="twelve columns">
        <ul class="nav-bar">
          <li class="active"><a href="<?php echo Yii::app()->request->baseUrl; ?>">Home</a></li>
          <li class="has-flyout">
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/site/page?view=about">About</a>
            <a href="#" class="flyout-toggle"><span> </span></a>
            <ul class="flyout">
              <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/site/page?view=about">About</a></li>
              <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/site/contact">contact</a></li>
              <!--<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/site/login" visible>Login</a></li>-->
              <li>
                  <?php $this->widget('zii.widgets.CMenu',array(
                      'items'=>array(
                          array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                          array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
                          ),
                      )); ?>
              </li>
            </ul>
          </li>
          <li class="has-flyout">
              <a href="#">Models</a>
              <a href="#" class="flyout-toggle"><span> </span></a>
              <ul class="flyout">
                  <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/person">People</a></li>
                  <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/entity">Entities</a></li>
                  <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/membershipType">Membership Types</a></li>
              </ul>
          </li>
        </ul>  
    </div>
</div>
<!-- mainmenu -->
<!--        
	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div>
 mainmenu -->

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
