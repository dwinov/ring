<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 8/15/14
 * Time: 4:24 PM
 */
?>

<h2 class="glyphicons user"><i></i> Edit Region</h2>
<div class="separator"></div>

<div class="row-fluid">

    <?php echo $this->renderPartial('_form', array('model' => $model, 'action' => Yii::app()->createUrl('region/update', array('id' => $model->reg_id)))); ?>

</div>