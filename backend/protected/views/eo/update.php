<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/5/14
 * Time: 12:33 PM
 */
?>

<ul class="breadcrumb">
    <li><a href="index.html?lang=en" class="glyphicons home"><i></i> BootAdmin</a></li>
    <li class="divider"></li>
    <li>Edit New EO</li>
</ul>
<div class="separator"></div>

<h2 class="glyphicons user"><i></i> Edit Event Organizer</h2>
<div class="separator"></div>

<div class="row-fluid">

    <?php if(isset($user_id)){ ?>
        <?php echo $this->renderPartial('_form', array('model' => $model, 'action' => Yii::app()->createUrl('eo/update/' . $model->eo_id . '?user_id=' . $user_id))); ?>
    <?php }else{ ?>
        <?php echo $this->renderPartial('_form', array('model' => $model, 'action' => Yii::app()->createUrl('eo/update', array('id' => $model->eo_id)))); ?>
    <?php } ?>

</div>