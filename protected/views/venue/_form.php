<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/5/14
 * Time: 2:29 PM
 */
?>

<?php echo CHtml::beginForm($action, 'post', array('id'=>'venue-form', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data')); ?>

<?php echo (isset($model)) ? Chtml::hiddenField('Venue[vn_id]', $model->vn_id) : null; ?>

    <div class="form-body">
        <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button>
            You have some form errors. Please check below.
        </div>
        <div class="alert alert-success display-hide">
            <button class="close" data-close="alert"></button>
            Your form validation is successful!
        </div>
        <div class="form-group">
            <label class="control-label col-md-3">Name<span class="required">*</span></label>
            <div class="col-md-4">
                <div class="input-icon right">
                    <i class="fa"></i>
                    <?php $name = (isset($model)) ? $model->vn_name : ""; ?>
                    <?php echo CHtml::textField('Venue[vn_name]', $name, array('class' => 'form-control')); ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3">Address<span class="required">*</span></label>
            <div class="col-md-4">
                <div class="input-icon right">
                    <i class="fa"></i>
                    <?php $address = (isset($model)) ? $model->vn_address : ""; ?>
                    <?php echo CHtml::textField('Venue[vn_address]', $address, array('class' => 'form-control')); ?>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3">Phone</label>
            <div class="col-md-4">
                <div class="input-icon right">
                    <i class="fa"></i>
                    <?php $phone = (isset($model)) ? $model->vn_phone : ""; ?>
                    <?php echo CHtml::textField('Venue[vn_phone]', $phone, array('class' => 'form-control')); ?>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3">Fax</label>
            <div class="col-md-4">
                <div class="input-icon right">
                    <i class="fa"></i>
                    <?php $fax = (isset($model)) ? $model->vn_fax : ""; ?>
                    <?php echo CHtml::textField('Venue[vn_fax]', $fax, array('class' => 'form-control')); ?>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3">Email<span class="required">*</span></label>
            <div class="col-md-4">
                <div class="input-icon right">
                    <i class="fa"></i>
                    <?php $email = (isset($model)) ? $model->vn_email : ""; ?>
                    <?php echo CHtml::textField('Venue[vn_email]', $email, array('class' => 'form-control')); ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3">Website</label>
            <div class="col-md-4">
                <div class="input-icon right">
                    <i class="fa"></i>
                    <?php $website = (isset($model)) ? $model->vn_website : ""; ?>
                    <?php echo CHtml::textField('Venue[vn_website]', $website, array('class' => 'form-control')); ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3">Description<span class="required">*</span></label>
            <div class="col-md-4">
                <div class="input-icon right">
                    <i class="fa"></i>
                    <?php $desc = (isset($model)) ? $model->vn_description : ""; ?>
                    <?php echo CHtml::textArea('Venue[vn_description]', $desc, array('data-provide' => "markdown",
                        'rows' => "10",
                        'data-error-container' => "#editor_error")); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="form-actions fluid">
        <div class="col-md-offset-3 col-md-9">
            <?php echo CHtml::submitButton( (isset($model)) ? 'Save changes' : 'Save',
                array('class'=>'btn green')); ?>
        </div>
    </div>
<?php echo CHtml::endForm(); ?>