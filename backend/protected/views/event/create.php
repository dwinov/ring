<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/5/14
 * Time: 3:21 PM
 */
?>

<h2 class="glyphicons user"><i></i> Create Event Organizer</h2>
<div class="separator"></div>

<div class="row-fluid">

    <?php echo $this->renderPartial('_form', array(
        'action' => Yii::app()->createUrl('event/create'),
        'venue_list' => $venue_list,
        'owner_id' => $owner_id
    )); ?>

</div>