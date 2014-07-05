<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/5/14
 * Time: 12:33 PM
 */
?>

<ul class="breadcrumb">
    <li><a href="index.html?lang=en" class="glyphicons home"><i></i> Ring Content Manager</a></li>
    <li class="divider"></li>
    <li>Add Event Organizer</li>
</ul>
<div class="separator"></div>

<h2 class="glyphicons calendar"><i></i> Edit Event Organizer</h2>
<div class="separator"></div>

<div class="row-fluid">
    <?php echo $this->renderPartial('_form', array('model' => $model, 'action' => Yii::app()->createUrl('eo/update', array('id' => $model->eo_id)))); ?>
</div>
<br/>