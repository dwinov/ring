<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/4/14
 * Time: 2:53 PM
 */
?>

<?php echo CHtml::beginForm($action, 'post', array('id'=>'eo-form', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data')); ?>

<div class="span9">
    <div class="tab-content" style="padding: 0;">
        <div class="tab-pane active" id="account-details">

            <div class="widget widget-2 primary widget-body-white">
                <div class="widget-head">
                    <h4 class="heading glyphicons edit"><i></i>Event Organizer details</h4>
                </div>

                <?php echo (isset($model)) ? Chtml::hiddenField('Eo[eo_id]', $model->eo_id) : null; ?>

                <div class="widget-body" style="padding-bottom: 0;">
                    <div class="row-fluid">
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label">Name</label>
                                <div class="controls">
                                    <?php $name = (isset($model)) ? $model->eo_name : ""; ?>
                                    <?php echo CHtml::textField('Eo[eo_name]', $name, array('class' => 'span12')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Address</label>
                                <div class="controls">
                                    <?php $address = (isset($model)) ? $model->eo_address : ""; ?>
                                    <?php echo CHtml::textField('Eo[eo_address]', $address, array('class' => 'span12')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Phone</label>
                                <div class="controls">
                                    <?php $phone = (isset($model)) ? $model->eo_phone : ""; ?>
                                    <?php echo CHtml::textField('Eo[eo_phone]', $phone, array('class' => 'span12')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Fax</label>
                                <div class="controls">
                                    <?php $fax = (isset($model)) ? $model->eo_fax : ""; ?>
                                    <?php echo CHtml::textField('Eo[eo_fax]', $fax, array('class' => 'span12')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Email</label>
                                <div class="controls">
                                    <?php $email = (isset($model)) ? $model->eo_email : ""; ?>
                                    <?php echo CHtml::textField('Eo[eo_email]', $email, array('class' => 'span12')); ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Website</label>
                                <div class="controls">
                                    <?php $website = (isset($model)) ? $model->eo_website : ""; ?>
                                    <?php echo CHtml::textField('Eo[eo_website]', $website, array('class' => 'span12')); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="separator bottom" />
                    <div class="control-group">
                        <label class="control-label">Description</label>
                        <div class="controls">
                            <?php $desc = (isset($model)) ? $model->eo_description : ""; ?>
                            <?php echo CHtml::textArea('Eo[eo_description]', $desc, array(
                                'id' => "mustHaveId",
                                'class' => "wysihtml5 span12",
                                'rows' => "5")); ?>
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

<div class="span3">
    <div class="widget widget-2 primary widget-body-white">
        <div class="widget-head">
            <h4 class="heading glyphicons picture"><i></i>Profile image</h4>
        </div>
        <div class="widget-body center">
            <div class="fileupload fileupload-new" data-provides="fileupload" data-name="myimage">

                <?php if(!empty($model->eo_photo)){ ?>
                    <div class="fileupload-new thumbnail"><img src="<?php echo Yii::app()->request->baseUrl . $model->eo_photo; ?>" width="202" height="188" /></div>
                <?php }else{ ?>
                    <div class="fileupload-new thumbnail"><img src="http://www.placehold.it/202x188/232323" /></div>
                <?php } ?>

                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 100%;"></div>
                <div>
                    <span class="btn btn-file btn-inverse btn-icon glyphicons picture"><i></i><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" /></span>
                    <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo CHtml::endForm(); ?>