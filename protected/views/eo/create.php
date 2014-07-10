<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/4/14
 * Time: 2:35 PM
 */
?>

<ul class="breadcrumb">
    <li><a href="index.html?lang=en" class="glyphicons home"><i></i> BootAdmin</a></li>
    <li class="divider"></li>
    <li>Add New EO</li>
</ul>
<div class="separator"></div>

<h2 class="glyphicons user"><i></i> Create Event Organizer</h2>
<div class="separator"></div>

<div class="row-fluid">

        <?php echo $this->renderPartial('_form', array('action' => Yii::app()->createUrl('eo/create'))); ?>

</div>