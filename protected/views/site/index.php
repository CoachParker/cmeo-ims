<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<p>Welcome to the Children's Museum of Eastern Oregon Information Management System.</p>

<p>If you are a registered user then please proceed to the <a href="site/login" class="tiny button round">login</a> page, otherwise
    please return to our <a href="http://cmeo.org/" target="_blank">visitor's site</a>.</p>

<!--
<p>Congratulations! You have successfully created your Yii application.</p>

<p>You may change the content of this page by modifying the following two files:</p>
<ul>
	<li>View file: <code><?php echo __FILE__; ?></code></li>
	<li>Layout file: <code><?php echo $this->getLayoutFile('main'); ?></code></li>
</ul>
-->
