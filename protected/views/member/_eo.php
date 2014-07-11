<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/8/14
 * Time: 5:39 PM
 */
?>

<?php echo CHtml::beginForm(Yii::app()->createUrl('eo/client'), 'post', array('role' => 'form')); ?>

    <div class="row-fluid">
        <div class="span3">
            <strong>Event Organizer Name</strong>
        </div>
        <div class="span9">
            <?php $name = (isset($eo)) ? $eo->eo_name : ""; ?>
            <?php echo (isset($eo)) ? Chtml::hiddenField('Eo[eo_id]', $eo->eo_id) : null; ?>
            <?php echo CHtml::textField('Eo[eo_name]', $name, array('class' => 'form-control')); ?>
            <div class="separator"></div>
        </div>
    </div>

    <div class="row-fluid">
        <div class="span3">
            <strong>Address</strong>
        </div>
        <div class="span9">
            <?php $address = (isset($eo)) ? $eo->eo_address : ""; ?>
            <?php echo CHtml::textField('Eo[eo_address]', $address, array('class' => 'form-control')); ?>
            <div class="separator"></div>
        </div>
    </div>

    <div class="row-fluid">
        <div class="span3">
            <strong>Phone Number</strong>
        </div>
        <div class="span9">
            <?php $phone = (isset($eo)) ? $eo->eo_phone : ""; ?>
            <?php echo CHtml::textField('Eo[eo_phone]', $phone, array('class' => 'form-control')); ?>
            <div class="separator"></div>
        </div>
    </div>

    <div class="row-fluid">
        <div class="span3">
            <strong>Fax</strong>
        </div>
        <div class="span9">
            <?php $fax = (isset($eo)) ? $eo->eo_fax : ""; ?>
            <?php echo CHtml::textField('Eo[eo_fax]', $fax, array('class' => 'form-control')); ?>
            <div class="separator"></div>
        </div>
    </div>

    <div class="row-fluid">
        <div class="span3">
            <strong>Email</strong>
        </div>
        <div class="span9">
            <?php $email = (isset($eo)) ? $eo->eo_email : ""; ?>
            <?php echo CHtml::textField('Eo[eo_email]', $email, array('class' => 'form-control')); ?>
            <div class="separator"></div>
        </div>
    </div>

    <div class="row-fluid">
        <div class="span3">
            <strong>Website</strong>
        </div>
        <div class="span9">
            <?php $website = (isset($eo)) ? $eo->eo_website : ""; ?>
            <?php echo CHtml::textField('Eo[eo_website]', $website, array('class' => 'form-control')); ?>
            <div class="separator"></div>
        </div>
    </div>

    <hr class="separator bottom" />
    <div class="row-fluid">
        <div class="span3">
            <strong>Description</strong>
        </div>
        <div class="span9">
            <?php $desc = (isset($eo)) ? $eo->eo_description : ""; ?>
            <?php echo CHtml::textArea('Eo[eo_description]', $desc, array(
                'id' => 'mustHaveId',
                'class' => 'wysihtml5 span12',
                'rows' => '5'
            )); ?>
        </div>
    </div>

    <hr class="separator bottom" />
    <div class="row-fluid">
        <div class="span9">
            <?php echo CHtml::submitButton('Save Change', array('class' => 'btn btn-primary btn-icon glyphicons ok_2')); ?>
        </div>
    </div>
<?php echo CHtml::endForm(); ?>