<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 8/16/14
 * Time: 5:34 PM
 */
?>

<ul class="breadcrumb">
    <li><a href="index.html?lang=en" class="glyphicons home"><i></i> BootAdmin</a></li>
    <li class="divider"></li>
    <li>Add New EO</li>
</ul>
<div class="separator"></div>

<h2 class="glyphicons user"><i></i> Credit</h2>
<div class="separator"></div>

<div class="row-fluid">

    <?php echo CHtml::beginForm(Yii::app()->createUrl('credit/create'), 'post', array('id'=>'eo-form', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data')); ?>

    <div class="span9">
        <div class="tab-content" style="padding: 0;">
            <div class="tab-pane active" id="account-details">

                <div class="widget widget-2 primary widget-body-white">
                    <div class="widget-head">
                        <h4 class="heading glyphicons edit"><i></i>Buy Credit</h4>
                    </div>

                    <?php echo Chtml::hiddenField('Credit[crt_eo_id]', $eo_id); ?>

                    <div class="widget-body" style="padding-bottom: 0;">
                        <div class="row-fluid">
                            <div class="span6">
                                <div class="control-group">
                                    <label class="control-label">Credit</label>
                                    <div class="controls">
                                        <?php echo CHtml::textField('Credit[crt_credit]', '', array('class' => 'span12')); ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-actions" style="margin: 0;">
                            <?php echo CHtml::submitButton('Buy',
                                array('class'=>'btn btn-icon btn-primary glyphicons circle_ok')); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo CHtml::endForm(); ?>

</div>