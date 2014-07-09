<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/8/14
 * Time: 5:39 PM
 */
?>

<?php echo CHtml::beginForm(Yii::app()->createUrl('eo/client'), 'post', array('role' => 'form')); ?>
    <?php echo (isset($eo)) ? Chtml::hiddenField('Eo[eo_id]', $eo->eo_id) : null; ?>
    <div class="form-group">
        <label class="control-label">Event Organizer Name</label>
        <?php $name = (isset($eo)) ? $eo->eo_name : ""; ?>
        <?php echo CHtml::textField('Eo[eo_name]', $name, array('class' => 'form-control')); ?>
    </div>
    <div class="form-group">
        <label class="control-label">Address</label>
        <?php $address = (isset($eo)) ? $eo->eo_address : ""; ?>
        <?php echo CHtml::textField('Eo[eo_address]', $address, array('class' => 'form-control')); ?>
    </div>
    <div class="form-group">
        <label class="control-label">Phone Number</label>
        <?php $phone = (isset($eo)) ? $eo->eo_phone : ""; ?>
        <?php echo CHtml::textField('Eo[eo_phone]', $phone, array('class' => 'form-control')); ?>
    </div>
    <div class="form-group">
        <label class="control-label">Fax</label>
        <?php $fax = (isset($eo)) ? $eo->eo_fax : ""; ?>
        <?php echo CHtml::textField('Eo[eo_fax]', $fax, array('class' => 'form-control')); ?>
    </div>
    <div class="form-group">
        <label class="control-label">Email</label>
        <?php $email = (isset($eo)) ? $eo->eo_email : ""; ?>
        <?php echo CHtml::textField('Eo[eo_email]', $email, array('class' => 'form-control')); ?>
    </div>
    <div class="form-group">
        <label class="control-label">Website</label>
        <?php $website = (isset($eo)) ? $eo->eo_website : ""; ?>
        <?php echo CHtml::textField('Eo[eo_website]', $website, array('class' => 'form-control')); ?>
    </div>
    <div class="form-group">
        <label class="control-label">Description</label>
        <?php $desc = (isset($eo)) ? $eo->eo_description : ""; ?>
        <?php echo CHtml::textArea('Eo[eo_description]', $desc, array('rows' => "3", 'class' => 'form-control')); ?>
    </div>
    <div class="margiv-top-10">
        <?php echo CHtml::submitButton('Save Change', array('class' => 'btn green')); ?>
    </div>
<?php echo CHtml::endForm(); ?>