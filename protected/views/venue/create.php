<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/5/14
 * Time: 2:28 PM
 */
?>

<h2 class="glyphicons user"><i></i> Create Venue</h2>
<div class="separator"></div>

<div class="row-fluid">

    <?php echo $this->renderPartial('_form', array('action' => Yii::app()->createUrl('venue/create'))); ?>

</div>