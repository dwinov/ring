<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/11/14
 * Time: 12:39 PM
 */
?>

<?php echo CHtml::beginForm(Yii::app()->createUrl('event/client'), 'post', array('role' => 'form')); ?>

    <div class="row-fluid">
        <div class="span3">
            <strong>Event Name</strong>
        </div>
        <div class="span9">
            <?php echo CHtml::textField('Event[evt_name]', '', array('class' => 'form-control')); ?>
            <div class="separator"></div>
        </div>
    </div>

    <div class="row-fluid">
        <div class="span3">
            <strong>Venue</strong>
        </div>
        <div class="span9">
            <?php echo CHtml::dropDownList('Event[evt_venue_id]', '', $list_venue) ?>
            <div class="separator"></div>
        </div>
    </div>

    <div class="row-fluid">
        <div class="span3">
            <strong>Date</strong>
        </div>
        <div class="span9">
            <?php echo CHtml::textField('Event[evt_date]', '', array('class' => 'form-control')); ?>
            <div class="separator"></div>
        </div>
    </div>

    <div class="row-fluid">
        <div class="span3">
            <strong>Time</strong>
        </div>
        <div class="span9">
            <?php echo CHtml::textField('Event[evt_time]', '', array('class' => 'form-control')); ?>
            <div class="separator"></div>
        </div>
    </div>

    <div class="row-fluid">
        <div class="span3">
            <strong>Tiket Price</strong>
        </div>
        <div class="span9">
            <?php echo CHtml::textField('Event[evt_tiket_price]', '', array('class' => 'form-control')); ?>
            <div class="separator"></div>
        </div>
    </div>

    <div class="row-fluid">
        <div class="span3">
            <strong>Total Tiket</strong>
        </div>
        <div class="span9">
            <?php echo CHtml::textField('Event[evt_total_tiket]', '', array('class' => 'form-control')); ?>
            <div class="separator"></div>
        </div>
    </div>

    <div class="row-fluid">
        <div class="span3">
            <strong>Picture</strong>
        </div>
        <div class="span9">
            <div class="fileupload fileupload-new" data-provides="fileupload" data-name="myimage">
                <div class="fileupload-new thumbnail"><img src="http://www.placehold.it/202x188/232323" /></div>
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
            <?php echo CHtml::textArea('Event[evt_description]', '', array(
                'id' => "mustHaveId",
                'class' => "wysihtml5 span12",
                'rows' => "5"
            )); ?>
        </div>
    </div>

    <hr class="separator bottom" />
    <div class="row-fluid">
        <div class="span9">
            <?php echo CHtml::submitButton('Save', array('class' => 'btn btn-primary btn-icon glyphicons ok_2')); ?>
        </div>
    </div>
<?php echo CHtml::endForm(); ?>