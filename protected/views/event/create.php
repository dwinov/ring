<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/5/14
 * Time: 3:21 PM
 */
?>

<ul class="breadcrumb">
    <li><a href="index.html?lang=en" class="glyphicons home"><i></i> Dashboard</a></li>
    <li class="divider"></li>
    <li>Add Event</li>
    <li class="divider"></li>
    <li>Create Event</li>
</ul>
<div class="separator"></div>

<h2 class="glyphicons user"><i></i> Create Event Organizer</h2>
<div class="separator"></div>

<div class="row-fluid">

    <?php echo $this->renderPartial('_form', array(
        'action' => Yii::app()->createUrl('event/create'),
        'venue_list' => $venue_list,
        'owner_id' => $owner_id
    )); ?>

</div>