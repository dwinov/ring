<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/4/14
 * Time: 2:35 PM
 */
?>

<h2 class="glyphicons user"><i></i> Create Event Organizer</h2>
<div class="separator"></div>

<div class="row-fluid">

        <?php echo $this->renderPartial('_form', array('action' => Yii::app()->createUrl('eo/create'))); ?>

</div>