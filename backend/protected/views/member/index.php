<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/8/14
 * Time: 1:55 PM
 */
?>

    <ul class="breadcrumb">
        <li><a href="index.html?lang=en" class="glyphicons home"><i></i> BootAdmin</a></li>
        <li class="divider"></li>
        <li>Add New EO</li>
    </ul>
    <div class="separator"></div>

    <h2 class="glyphicons user"><i></i> Create Event Organizer</h2>
    <div class="separator"></div>

    <div class="row-fluid">

        <?php echo CHtml::beginForm(Yii::app()->createUrl('member/update'), 'post', array()); ?>
        <div class="span9">
            <div class="tab-content" style="padding: 0;">
                <div class="tab-pane active" id="account-details">

                    <div class="widget widget-2 primary widget-body-white">
                        <div class="widget-head">
                            <h4 class="heading glyphicons edit"><i></i>Memeber Profile</h4>
                        </div>

                        <div class="widget-body" style="padding-bottom: 0;">
                            <div class="row-fluid">
                                <div class="span6">
                                    <div class="control-group">
                                        <label class="control-label">First Name</label>
                                        <div class="controls">
                                            <?php echo CHtml::hiddenField('Member[mem_id]', $model->mem_id); ?>
                                            <?php echo CHtml::textField('Member[mem_first_name]', $model->mem_first_name, array('class' => 'span6')); ?>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Last Name</label>
                                        <div class="controls">
                                            <?php echo CHtml::textField('Member[mem_last_name]', $model->mem_first_name, array('class' => 'span6')); ?>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Mobile Number</label>
                                        <div class="controls">
                                            <?php echo CHtml::textField('Member[mem_phone]', $model->mem_phone, array('class' => 'span6')); ?>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Email</label>
                                        <div class="controls">
                                            <?php echo CHtml::textField('Member[mem_email]', $model->mem_email, array('class' => 'span6')); ?>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Gender</label>
                                        <div class="controls">
                                            <?php
                                            $man = ($model->mem_gender == 1) ? true : false;
                                            $woman = ($model->mem_gender == 0) ? true : false;
                                            ?>
                                            <label class="radio-inline">
                                                <?php echo CHtml::radioButton('Member[mem_gender]', $man, array(
                                                    'class' => 'radio',
                                                    'value' => '1',
                                                )); ?>
                                                Man
                                            </label>
                                            <label class="radio-inline">
                                                <?php echo CHtml::radioButton('Member[mem_gender]', $woman, array(
                                                    'class' => 'radio',
                                                    'value' => '0',
                                                )); ?>
                                                Woman
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="separator bottom" />
                            <div class="control-group">
                                <label class="control-label">About Me</label>
                                <div class="controls">
                                    <?php echo CHtml::textArea('Member[mem_about_me]', $model->mem_about_me,
                                        array(
//                                'id' => 'mustHaveId',
                                            'class' => 'wysihtml5 span12',
                                            'rows' => '5'
                                        )); ?>
                                </div>
                            </div>

                            <div class="form-actions" style="margin: 0;">
                                <?php echo CHtml::submitButton('Save Change', array('class' => 'btn btn-primary btn-icon glyphicons ok_2')); ?>
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

    </div>