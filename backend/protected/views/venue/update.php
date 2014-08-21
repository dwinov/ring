<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/5/14
 * Time: 2:37 PM
 */
?>

<h2 class="glyphicons user"><i></i> Edit Venue</h2>
<div class="separator"></div>

<div class="row-fluid">

    <?php echo $this->renderPartial('_form', array('model' => $model, 'action' => Yii::app()->createUrl('venue/update', array('id' => $model->vn_id)))); ?>

</div>