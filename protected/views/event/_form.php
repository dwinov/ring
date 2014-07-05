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

    <div class="span9">

        <div class="tab-content" style="padding: 0;">
            <div class="tab-pane active" id="account-details">

                <div class="widget widget-2">
                    <div class="widget-head">
                        <h4 class="heading glyphicons edit"><i></i>Create Event Organizer</h4>
                    </div>
                    <div class="widget-body" style="padding-bottom: 0;">
                        <div class="row-fluid">
                            <div class="span12">
                                <div class="control-group">
                                    <label class="control-label">Name</label>
                                    <div class="controls">
                                        <div class="input-append">
                                            <?php $name = (isset($model)) ? $model->evt_name : ""; ?>
                                            <?php echo CHtml::textField('Event[evt_name]', $name, array('class' => 'span12')); ?>
                                            <span style="margin: 0;" class="btn-action single glyphicons circle_question_mark" rel="popover" data-placement="top" data-original-title="Help" data-content="Event name is mandatory"><i></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Venue</label>
                                    <div class="controls">
                                        <div class="input-append">
                                            <?php $venue = (isset($model)) ? $model->evt_venue_id : ""; ?>
                                            <?php echo CHtml::dropDownList('Event[evt_venue_id]', $venue, $venue_list) ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Event Date</label>
                                    <div class="controls">
                                        <div class="input-append">
                                            <?php $date = (isset($model)) ? $model->evt_date : ""; ?>
                                            <?php echo CHtml::textField('Event[evt_date]', $date, array('class' => 'span12')); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Event Time</label>
                                    <div class="controls">
                                        <div class="input-append">
                                            <?php $time = (isset($model)) ? $model->evt_time : ""; ?>
                                            <?php echo CHtml::textField('Event[evt_time]', $time, array('class' => 'span12')); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Tiket Price</label>
                                    <div class="controls">
                                        <div class="input-append">
                                            <?php $tiket = (isset($model)) ? $model->evt_tiket_price : ""; ?>
                                            <?php echo CHtml::textField('Event[evt_tiket_price]', $tiket, array('class' => 'span12')); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Total Tiket</label>
                                    <div class="controls">
                                        <div class="input-append">
                                            <?php $total = (isset($model)) ? $model->evt_total_tiket : ""; ?>
                                            <?php echo CHtml::textField('Event[evt_total_tiket]', $total, array('class' => 'span12')); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="separator"></div>
                            </div>
                        </div>
                        <hr class="separator bottom" />
                        <div class="control-group">
                            <label class="control-label">Description</label>
                            <div class="controls">
                                <?php $desc = (isset($model)) ? $model->evt_description : ""; ?>
                                <?php echo CHtml::textArea('Event[evt_description]', $desc, array('id'=>"mustHaveId", 'class'=>"wysihtml5 span12", 'rows'=>"5")); ?>
                            </div>
                        </div>
                        <div class="form-actions" style="margin: 0;">
                            <?php echo CHtml::submitButton('Save changes',
                                array('class'=>'btn btn-icon btn-primary glyphicons circle_ok')); ?>
                            <button type="button" class="btn btn-icon btn-default glyphicons circle_remove"><i></i>Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php echo CHtml::endForm(); ?>