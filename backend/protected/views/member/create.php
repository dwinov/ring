<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 8/17/14
 * Time: 2:07 PM
 */
?>

<h2 class="glyphicons user"><i></i> Create Member</h2>
<div class="separator"></div>

<div class="row-fluid">

    <?php echo $this->renderPartial('_form', array('action' => Yii::app()->createUrl('member/create'), 'interest' => $interest)); ?>

</div>