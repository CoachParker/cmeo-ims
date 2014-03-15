<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<h2>Menu</h2>

<p>Here are the menu options for the Children's Museum of Eastern Oregon data management system.</p>

<div class="row">
    <div class="large-6 columns">
    <h4>Check In</h4>
    <div class="button-bar">
    <ul class="button-group radius">
        <li><a class="button" href="<?php echo Yii::app()->request->baseUrl; ?>/visit/create">Visit</a></li>
        <li><a class="button" href="<?php echo Yii::app()->request->baseUrl; ?>/family/create">New Family</a></li>
        <li><a class="button" href="<?php echo Yii::app()->request->baseUrl; ?>/membership/admin">Memberships</a></li>
    </ul>
    </div>
    </div>
    <div class="large-6 columns">
        <h4>Events</h4>
        <div class="button-bar">
    <ul class="button-group round">
        <li><a class="button" href="<?php echo Yii::app()->request->baseUrl; ?>/event/create">New Event</a></li>
        <li><a class="button success" href="<?php echo Yii::app()->request->baseUrl; ?>/eventType/index">Event Types</a></li>
        <li><a class="button" href="<?php echo Yii::app()->request->baseUrl; ?>/eventAttribute/create">Event Options</a></li>
    </ul>
        </div>
    </div>
</div>
<!--
<div class="row">
   <ul class="button-group round even-4">
    <li> <a href="<?php echo Yii::app()->request->baseUrl; ?>/visit" class="button">Visits</a> </li>
    <li> <a href="<?php echo Yii::app()->request->baseUrl; ?>/entity" class="button success">Entities</a> </li>
    <li> <a href="<?php echo Yii::app()->request->baseUrl; ?>/event" class="button alert">Events</a> </li>
    <li> <a href="<?php echo Yii::app()->request->baseUrl; ?>/membershipType" class="button">Membership Types</a> </li>
  </ul>
</div>
<div class="row">
   <ul class="button-group">
    <li> <a href="<?php echo Yii::app()->request->baseUrl; ?>/visit" class="button">Visits</a> </li>
    <li> <a href="<?php echo Yii::app()->request->baseUrl; ?>/entity" class="button">Entities</a> </li>
    <li> <a href="<?php echo Yii::app()->request->baseUrl; ?>/event" class="button">Events</a> </li>
    <li> <a href="<?php echo Yii::app()->request->baseUrl; ?>/membershipType" class="button">Membership Types</a> </li>
  </ul>
</div>
-->
<!--
<p>Congratulations! You have successfully created your Yii application.</p>

<p>You may change the content of this page by modifying the following two files:</p>
<ul>
	<li>View file: <code><?php echo __FILE__; ?></code></li>
	<li>Layout file: <code><?php echo $this->getLayoutFile('main'); ?></code></li>
</ul>
-->
