<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/5/14
 * Time: 2:37 PM
 */
?>

<ul class="breadcrumb">
    <li><a href="index.html?lang=en" class="glyphicons home"><i></i> Ring Content Manager</a></li>
    <li class="divider"></li>
    <li>Edit Venue</li>
</ul>
<div class="separator"></div>

<h2 class="glyphicons calendar"><i></i> Edit Venue</h2>
<div class="separator"></div>

<div class="row-fluid">
    <?php echo $this->renderPartial('_form', array('model' => $model, 'action' => Yii::app()->createUrl('venue/update', array('id' => $model->vn_id)))); ?>
</div>
<br/>