<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 8/17/14
 * Time: 2:19 PM
 */
?>

<h2 class="glyphicons user"><i></i> Edit Member</h2>
<div class="separator"></div>

<div class="row-fluid">

    <?php echo $this->renderPartial('_form', array('model' => $model, 'action' => Yii::app()->createUrl('member/update', array('id' => $model->mem_id)))); ?>

</div>