<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/5/14
 * Time: 3:22 PM
 */
?>

<h2 class="glyphicons user"><i></i> Edit Event</h2>
<div class="separator"></div>

<div class="row-fluid">

    <?php echo $this->renderPartial('_form', array(
        'model' => $model,
        'action' => Yii::app()->createUrl('event/update', array('id' => $model->evt_id)),
        'venue_list' => $venue_list,
        'ticket' => $ticket
    )); ?>

</div>