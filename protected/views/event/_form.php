<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/5/14
 * Time: 3:23 PM
 */
?>

<?php echo CHtml::beginForm($action, 'post', array('id'=>'event-form', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data')); ?>

<?php echo (isset($model)) ? Chtml::hiddenField('Event[evt_id]', $model->evt_id) : null; ?>

<?php $eo = (isset($model)) ? $model->evt_owner_id : ""; ?>
<?php echo CHtml::hiddenField('Event[evt_owner_id]', $eo); ?>

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
                    <?php $name = (isset($model)) ? $model->evt_name : ""; ?>
                    <?php echo CHtml::textField('Event[evt_name]', $name, array('class' => 'form-control')); ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3">Venue<span class="required">*</span></label>
            <div class="col-md-4">
                <div class="input-icon right">
                    <i class="fa"></i>
                    <?php $venue = (isset($model)) ? $model->evt_venue_id : ""; ?>
                    <?php echo CHtml::dropDownList('Event[evt_venue_id]', $venue, $venue_list) ?>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3">Event Date<span class="required">*</span></label>
            <div class="col-md-4">
                <div class="input-icon right">
                    <i class="fa"></i>
                    <?php $date = (isset($model)) ? $model->evt_date : ""; ?>
                    <?php echo CHtml::textField('Event[evt_date]', $date, array('class' => 'form-control')); ?>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3">Event Time<span class="required">*</span></label>
            <div class="col-md-4">
                <div class="input-icon right">
                    <i class="fa"></i>
                    <?php $time = (isset($model)) ? $model->evt_time : ""; ?>
                    <?php echo CHtml::textField('Event[evt_time]', $time, array('class' => 'form-control')); ?>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3">Tiket Price<span class="required">*</span></label>
            <div class="col-md-4">
                <div class="input-icon right">
                    <i class="fa"></i>
                    <?php $tiket = (isset($model)) ? $model->evt_tiket_price : ""; ?>
                    <?php echo CHtml::textField('Event[evt_tiket_price]', $tiket, array('class' => 'form-control')); ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3">Total Tiket<span class="required">*</span></label>
            <div class="col-md-4">
                <div class="input-icon right">
                    <i class="fa"></i>
                    <?php $total = (isset($model)) ? $model->evt_total_tiket : ""; ?>
                    <?php echo CHtml::textField('Event[evt_total_tiket]', $total, array('class' => 'form-control')); ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3">Description<span class="required">*</span></label>
            <div class="col-md-4">
                <div class="input-icon right">
                    <i class="fa"></i>
                    <?php $desc = (isset($model)) ? $model->evt_description : ""; ?>
                    <?php echo CHtml::textArea('Event[evt_description]', $desc, array('data-provide' => "markdown",
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