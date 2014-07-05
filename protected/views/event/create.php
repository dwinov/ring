<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/5/14
 * Time: 3:21 PM
 */
?>

<ul class="breadcrumb">
    <li><a href="index.html?lang=en" class="glyphicons home"><i></i> Ring Content Manager</a></li>
    <li class="divider"></li>
    <li>Add Event</li>
</ul>
<div class="separator"></div>

<h2 class="glyphicons calendar"><i></i> Add Event</h2>
<div class="separator"></div>

<div class="row-fluid">
    <?php echo $this->renderPartial('_form', array(
            'action' => Yii::app()->createUrl('event/create'),
            'venue_list' => $venue_list
    )); ?>
</div>
<br/>