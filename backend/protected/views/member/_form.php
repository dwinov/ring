<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 8/17/14
 * Time: 2:09 PM
 */
?>

<?php echo CHtml::beginForm($action, 'post', array('id'=>'eo-form', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data')); ?>

    <div class="span9">
        <div class="tab-content" style="padding: 0;">
            <div class="tab-pane active" id="account-details">

                <div class="widget widget-2 primary widget-body-white">
                    <div class="widget-head">
                        <h4 class="heading glyphicons edit"><i></i>Member Form</h4>
                    </div>

                    <div class="widget-body" style="padding-bottom: 0;">
                        <div class="row-fluid">
                            <div class="span6">
                                <div class="control-group">
                                    <label class="control-label">First Name</label>
                                    <div class="controls">
                                        <?php $mem_id = (isset($model->mem_id)) ? $model->mem_id : ''; ?>
                                        <?php $first_name = (isset($model->mem_first_name)) ? $model->mem_first_name : ''; ?>
                                        <?php echo CHtml::hiddenField('Member[mem_id]', $mem_id); ?>
                                        <?php echo CHtml::textField('Member[mem_first_name]', $first_name, array('class' => 'span12')); ?>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Last Name</label>
                                    <div class="controls">
                                        <?php $last_name = (isset($model->mem_last_name)) ? $model->mem_last_name : ''; ?>
                                        <?php echo CHtml::textField('Member[mem_last_name]', $last_name, array('class' => 'span12')); ?>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Mobile Number</label>
                                    <div class="controls">
                                        <?php $phone = (isset($model->mem_phone)) ? $model->mem_phone : ''; ?>
                                        <?php echo CHtml::textField('Member[mem_phone]', $phone, array('class' => 'span12')); ?>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Email</label>
                                    <div class="controls">
                                        <?php $email = (isset($model->mem_email)) ? $model->mem_email : ''; ?>
                                        <?php echo CHtml::textField('Member[mem_email]', $email, array('class' => 'span12')); ?>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Gender</label>
                                    <div class="controls">
                                        <?php
                                        $man = (isset($model->mem_gender) && $model->mem_gender == 1) ? true : false;
                                        $woman = (isset($model->mem_gender) && $model->mem_gender == 0) ? true : false;
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

                                <div class="control-group">
                                    <label class="control-label">Password</label>
                                    <div class="controls">
                                        <?php echo CHtml::passwordField('User[usr_password]', '', array('class' => 'span12')); ?>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Re-password</label>
                                    <div class="controls">
                                        <?php echo CHtml::passwordField('User[usr_repassword]', '', array('class' => 'span12')); ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="separator bottom" />
                        <div class="control-group">
                            <label class="control-label">Interest</label>
                            <div class="controls">
                                <?php foreach($interest as $int){ ?>
                                <label class="checkbox inline">
                                    <input name="interest[]" type="checkbox" class="checkbox" value="<?php echo $int->int_id; ?>" />
                                    <?php echo $int->int_name; ?>
                                </label>
                                <?php } ?>
                            </div>
                        </div>

                        <hr class="separator bottom" />
                        <div class="control-group">
                            <label class="control-label">About Me</label>
                            <div class="controls">
                                <?php $about = (isset($model->mem_about_me)) ? $model->mem_about_me : ''; ?>
                                <?php echo CHtml::textArea('Member[mem_about_me]', $about,
                                    array(
//                                'id' => 'mustHaveId',
                                        'class' => 'wysihtml5 span12',
                                        'rows' => '5'
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

    <div class="span3">
        <div class="widget widget-2 primary widget-body-white">
            <div class="widget-head">
                <h4 class="heading glyphicons picture"><i></i>Profile image</h4>
            </div>
            <div class="widget-body center">
                <div class="fileupload fileupload-new" data-provides="fileupload" data-name="myimage">

                    <?php if(!empty($model->mem_photo)){ ?>
                        <div class="fileupload-new thumbnail"><img src="<?php echo Yii::app()->request->baseUrl . $model->mem_photo; ?>" width="202" height="188" /></div>
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