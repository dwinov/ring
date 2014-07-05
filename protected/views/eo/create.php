<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/4/14
 * Time: 2:35 PM
 */
?>

<ul class="breadcrumb">
    <li><a href="index.html?lang=en" class="glyphicons home"><i></i> Ring Content Manager</a></li>
    <li class="divider"></li>
    <li>Add Event Organizer</li>
</ul>
<div class="separator"></div>

<h2 class="glyphicons calendar"><i></i> Add Event Organizer</h2>
<div class="separator"></div>

<div class="row-fluid">
    <?php echo $this->renderPartial('_form', array('action' => Yii::app()->createUrl('eo/create'))); ?>
</div>
<br/>