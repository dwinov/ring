<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/5/14
 * Time: 2:28 PM
 */
?>

<ul class="breadcrumb">
    <li><a href="index.html?lang=en" class="glyphicons home"><i></i> Ring Content Manager</a></li>
    <li class="divider"></li>
    <li>Add Venue</li>
</ul>
<div class="separator"></div>

<h2 class="glyphicons calendar"><i></i> Add Venue</h2>
<div class="separator"></div>

<div class="row-fluid">
    <?php echo $this->renderPartial('_form', array('action' => Yii::app()->createUrl('venue/create'))); ?>
</div>
<br/>