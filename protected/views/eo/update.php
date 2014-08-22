<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/5/14
 * Time: 12:33 PM
 */
?>

<h2 class="glyphicons user"><i></i> Edit Event Organizer</h2>
<div class="separator"></div>

<div class="row-fluid">

    <?php if(isset($user_id)){ ?>
        <?php echo $this->renderPartial('_form', array('model' => $model, 'action' => Yii::app()->createUrl('eo/update/' . $model->eo_id . '?user_id=' . $user_id))); ?>
    <?php }else{ ?>
        <?php echo $this->renderPartial('_form', array('model' => $model, 'action' => Yii::app()->createUrl('eo/update', array('id' => $model->eo_id)))); ?>
    <?php } ?>

</div>