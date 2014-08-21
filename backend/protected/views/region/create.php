<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 8/15/14
 * Time: 4:21 PM
 */
?>

<h2 class="glyphicons user"><i></i> Create Region</h2>
<div class="separator"></div>

<div class="row-fluid">

    <?php echo $this->renderPartial('_form', array('action' => Yii::app()->createUrl('region/create'))); ?>

</div>