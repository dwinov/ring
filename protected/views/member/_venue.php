<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/8/14
 * Time: 5:41 PM
 */
?>

<?php echo CHtml::beginForm(Yii::app()->createUrl('venue/update'), 'post', array('role' => 'form')); ?>

    <div class="row-fluid">
        <div class="span3">
            <strong>Venue Name</strong>
        </div>
        <div class="span9">
            <?php echo (isset($model)) ? Chtml::hiddenField('Venue[vn_id]', $model->vn_id) : null; ?>
            <?php $name = (isset($model)) ? $model->vn_name : ""; ?>
            <?php echo CHtml::textField('Venue[vn_name]', $name, array('class' => 'form-control')); ?>
            <div class="separator"></div>
        </div>
    </div>

    <div class="row-fluid">
        <div class="span3">
            <strong>Address</strong>
        </div>
        <div class="span9">
            <?php $address = (isset($model)) ? $model->vn_address : ""; ?>
            <?php echo CHtml::textField('Venue[vn_address]', $address, array('class' => 'form-control')); ?>
            <div class="separator"></div>
        </div>
    </div>

    <div class="row-fluid">
        <div class="span3">
            <strong>Phone</strong>
        </div>
        <div class="span9">
            <?php $phone = (isset($model)) ? $model->vn_phone : ""; ?>
            <?php echo CHtml::textField('Venue[vn_phone]', $phone, array('class' => 'form-control')); ?>
            <div class="separator"></div>
        </div>
    </div>

    <div class="row-fluid">
        <div class="span3">
            <strong>Fax</strong>
        </div>
        <div class="span9">
            <?php $fax = (isset($model)) ? $model->vn_fax : ""; ?>
            <?php echo CHtml::textField('Venue[vn_fax]', $fax, array('class' => 'form-control')); ?>
            <div class="separator"></div>
        </div>
    </div>

    <div class="row-fluid">
        <div class="span3">
            <strong>Email</strong>
        </div>
        <div class="span9">
            <?php $email = (isset($model)) ? $model->vn_email : ""; ?>
            <?php echo CHtml::textField('Venue[vn_email]', $email, array('class' => 'form-control')); ?>
            <div class="separator"></div>
        </div>
    </div>

    <div class="row-fluid">
        <div class="span3">
            <strong>Website</strong>
        </div>
        <div class="span9">
            <?php $website = (isset($model)) ? $model->vn_website : ""; ?>
            <?php echo CHtml::textField('Venue[vn_website]', $website, array('class' => 'form-control')); ?>
            <div class="separator"></div>
        </div>
    </div>

    <div class="row-fluid">
        <div class="span3">
            <strong>Picture</strong>
        </div>
        <div class="span9">
            <div class="fileupload fileupload-new" data-provides="fileupload" data-name="myimage">

                <?php if(!empty($model->vn_photo)){ ?>
                    <div class="fileupload-new thumbnail"><img src="<?php echo Yii::app()->request->baseUrl . $model->vn_photo; ?>" width="202" height="188" /></div>
                <?php }else{ ?>
                    <div class="fileupload-new thumbnail"><img src="http://www.placehold.it/202x188/232323" /></div>
                <?php } ?>

                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 100%;"></div>
                <div>
                    <span class="btn btn-file btn-inverse btn-icon glyphicons picture"><i></i><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" /></span>
                    <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                </div>
            </div>
            <div class="separator"></div>
        </div>
    </div>

    <hr class="separator bottom" />
    <div class="row-fluid">
        <div class="span3">
            <strong>Description</strong>
        </div>
        <div class="span9">
            <?php $desc = (isset($model)) ? $model->vn_description : ""; ?>
            <?php echo CHtml::textArea('Venue[vn_description]', $desc, array(
                'id' => 'mustHaveId',
                'class' => 'wysihtml5 span12',
                'rows' => '5'
            )); ?>
        </div>
    </div>

    <hr class="separator bottom" />
    <div class="row-fluid">
        <div class="span9">
            <?php echo CHtml::submitButton('Save Change', array('class' => 'btn btn-primary btn-icon glyphicons ok_2')); ?>
        </div>
    </div>
<?php echo CHtml::endForm(); ?>