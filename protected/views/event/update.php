<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/5/14
 * Time: 3:22 PM
 */
?>

<ul class="breadcrumb">
    <li><a href="index.html?lang=en" class="glyphicons home"><i></i> Ring Content Manager</a></li>
    <li class="divider"></li>
    <li>Edit Event</li>
</ul>
<div class="separator"></div>

<h2 class="glyphicons calendar"><i></i> Edit Event</h2>
<div class="separator"></div>

<div class="row-fluid">
    <?php echo $this->renderPartial('_form', array(
        'model' => $model,
        'action' => Yii::app()->createUrl('event/update', array('id' => $model->evt_id)),
        'venue_list' => $venue_list
    )); ?>
</div>
<br/>