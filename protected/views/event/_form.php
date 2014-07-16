<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/5/14
 * Time: 3:23 PM
 */
?>

<?php echo CHtml::beginForm($action, 'post', array('id'=>'event-form', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data')); ?>

    <div class="span9">
        <div class="tab-content" style="padding: 0;">
            <div class="tab-pane active" id="account-details">

                <div class="widget widget-2">
                    <div class="widget-head">
                        <h4 class="heading glyphicons edit"><i></i>Event Organizer details</h4>
                    </div>

                    <?php echo (isset($model)) ? Chtml::hiddenField('Event[evt_id]', $model->evt_id) : null; ?>

                    <?php $eo = (isset($model)) ? $model->evt_owner_id : $eo_id; ?>
                    <?php echo CHtml::hiddenField('Event[evt_owner_id]', $eo); ?>

                    <div class="widget-body" style="padding-bottom: 0;">
                        <div class="row-fluid">
                            <div class="span6">
                                <div class="control-group">
                                    <label class="control-label">Name</label>
                                    <div class="controls">
                                        <?php $name = (isset($model)) ? $model->evt_name : ""; ?>
                                        <?php echo CHtml::textField('Event[evt_name]', $name, array('class' => 'form-control')); ?>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Venue</label>
                                    <div class="controls">
                                        <?php $venue = (isset($model)) ? $model->evt_venue_id : ""; ?>
                                        <?php echo CHtml::dropDownList('Event[evt_venue_id]', $venue, $venue_list) ?>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Event Date</label>
                                    <div class="controls">
                                        <?php $date = (isset($model)) ? $model->evt_date : ""; ?>
                                        <?php echo CHtml::textField('Event[evt_date]', $date, array('class' => 'form-control')); ?>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Event Time</label>
                                    <div class="controls">
                                        <?php $time = (isset($model)) ? $model->evt_time : ""; ?>
                                        <?php echo CHtml::textField('Event[evt_time]', $time, array('class' => 'form-control')); ?>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Tiket Price</label>
                                    <div class="controls">
                                        <?php $tiket = (isset($model)) ? $model->evt_tiket_price : ""; ?>
                                        <?php echo CHtml::textField('Event[evt_tiket_price]', $tiket, array('class' => 'form-control')); ?>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Total Tiket</label>
                                    <div class="controls">
                                        <?php $total = (isset($model)) ? $model->evt_total_tiket : ""; ?>
                                        <?php echo CHtml::textField('Event[evt_total_tiket]', $total, array('class' => 'form-control')); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="separator bottom" />
                        <div class="control-group">
                            <label class="control-label">Description</label>
                            <div class="controls">
                                <?php $desc = (isset($model)) ? $model->evt_description : ""; ?>
                                <?php echo CHtml::textArea('Event[evt_description]', $desc, array(
                                    'id' => "mustHaveId",
                                    'class' => "wysihtml5 span12",
                                    'rows' => "5"
                                )); ?>
                            </div>
                        </div>
                        <div class="form-actions" style="margin: 0;">
                            <?php echo CHtml::submitButton( (isset($model)) ? 'Save changes' : 'Save',
                                array('class'=>'btn btn-icon btn-primary glyphicons circle_ok')); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php echo CHtml::endForm(); ?>