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
                                            <?php $name = (isset($model)) ? $model->vn_name : ""; ?>
                                            <?php echo CHtml::textField('Venue[vn_name]', $name, array('class' => 'span12')); ?>
                                            <span style="margin: 0;" class="btn-action single glyphicons circle_question_mark" rel="popover" data-placement="top" data-original-title="Help" data-content="Event name is mandatory"><i></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Address</label>
                                    <div class="controls">
                                        <div class="input-append">
                                            <?php $address = (isset($model)) ? $model->vn_address : ""; ?>
                                            <?php echo CHtml::textField('Venue[vn_address]', $address, array('class' => 'span12')); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Phone Number</label>
                                    <div class="controls">
                                        <div class="input-append">
                                            <?php $phone = (isset($model)) ? $model->vn_phone : ""; ?>
                                            <?php echo CHtml::textField('Venue[vn_phone]', $phone, array('class' => 'span12')); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Fax</label>
                                    <div class="controls">
                                        <div class="input-append">
                                            <?php $fax = (isset($model)) ? $model->vn_fax : ""; ?>
                                            <?php echo CHtml::textField('Venue[vn_fax]', $fax, array('class' => 'span12')); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Email</label>
                                    <div class="controls">
                                        <div class="input-append">
                                            <?php $email = (isset($model)) ? $model->vn_email : ""; ?>
                                            <?php echo CHtml::textField('Venue[vn_email]', $email, array('class' => 'span12')); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Website</label>
                                    <div class="controls">
                                        <div class="input-append">
                                            <?php $website = (isset($model)) ? $model->vn_website : ""; ?>
                                            <?php echo CHtml::textField('Venue[vn_website]', $website, array('class' => 'span12')); ?>
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
                                <?php $desc = (isset($model)) ? $model->vn_description : ""; ?>
                                <?php echo CHtml::textArea('Venue[vn_description]', $desc, array('id'=>"mustHaveId", 'class'=>"wysihtml5 span12", 'rows'=>"5")); ?>
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