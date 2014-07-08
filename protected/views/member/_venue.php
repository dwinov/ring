<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/8/14
 * Time: 5:41 PM
 */
?>

<?php echo CHtml::beginForm(Yii::app()->createUrl('venue/update'), 'post', array('role' => 'form')); ?>
    <?php echo (isset($model)) ? Chtml::hiddenField('Venue[vn_id]', $model->vn_id) : null; ?>
    <div class="form-group">
        <label class="control-label">First Name</label>
        <?php $name = (isset($model)) ? $model->vn_name : ""; ?>
        <?php echo CHtml::textField('Venue[vn_name]', $name, array('class' => 'form-control')); ?>
    </div>
    <div class="form-group">
        <label class="control-label">Last Name</label>
        <?php $address = (isset($model)) ? $model->vn_address : ""; ?>
        <?php echo CHtml::textField('Venue[vn_address]', $address, array('class' => 'form-control')); ?>
    </div>
    <div class="form-group">
        <label class="control-label">Mobile Number</label>
        <?php $phone = (isset($model)) ? $model->vn_phone : ""; ?>
        <?php echo CHtml::textField('Venue[vn_phone]', $phone, array('class' => 'form-control')); ?>
    </div>
    <div class="form-group">
        <label class="control-label">Email</label>
        <?php $fax = (isset($model)) ? $model->vn_fax : ""; ?>
        <?php echo CHtml::textField('Venue[vn_fax]', $fax, array('class' => 'form-control')); ?>
    </div>
    <div class="form-group">
        <label class="control-label">Sex</label>
        <?php $email = (isset($model)) ? $model->vn_email : ""; ?>
        <?php echo CHtml::textField('Venue[vn_email]', $email, array('class' => 'form-control')); ?>
    </div>
    <div class="form-group">
        <label class="control-label">Website Url</label>
        <?php $website = (isset($model)) ? $model->vn_website : ""; ?>
        <?php echo CHtml::textField('Venue[vn_website]', $website, array('class' => 'form-control')); ?>
    </div>
    <div class="form-group">
        <label class="control-label">Description</label>
        <?php $desc = (isset($model)) ? $model->vn_description : ""; ?>
        <?php echo CHtml::textArea('Venue[vn_description]', $desc, array('data-provide' => "markdown",
            'rows' => "10",
            'data-error-container' => "#editor_error")); ?>
    </div>
    <div class="margiv-top-10">
        <?php echo CHtml::submitButton('Save Change', array('class' => 'btn green')); ?>
    </div>
<?php echo CHtml::endForm(); ?>