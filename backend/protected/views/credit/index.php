<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 8/16/14
 * Time: 7:26 PM
 */
?>

<ul class="breadcrumb">
    <li><a href="index.html?lang=en" class="glyphicons home"><i></i> BootAdmin</a></li>
    <li class="divider"></li>
    <li>Add New EO</li>
</ul>
<div class="separator"></div>

<h2 class="glyphicons user"><i></i> Credit for Broadcast</h2>
<div class="separator"></div>

<div class="row-fluid">

    <?php $action = (isset($model)) ? Yii::app()->createUrl('credit/update') : Yii::app()->createUrl('credit/create'); ?>

    <?php echo CHtml::beginForm($action, 'post', array('id'=>'eo-form', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data')); ?>

    <div class="span9">
        <div class="tab-content" style="padding: 0;">
            <div class="tab-pane active" id="account-details">

                <div class="widget widget-2 primary widget-body-white">
                    <div class="widget-head">
                        <h4 class="heading glyphicons edit"><i></i>Set Credit for Broadcast</h4>
                    </div>

                    <div class="widget-body" style="padding-bottom: 0;">
                        <div class="row-fluid">
                            <div class="span6">
                                <div class="control-group">
                                    <label class="control-label">Set Credit</label>
                                    <div class="controls">
                                        <?php $value = (isset($model)) ? $model->cb_value : ''; ?>
                                        <?php echo CHtml::textField('Cb[cb_value]', $value, array('class' => 'span12')); ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-actions" style="margin: 0;">
                            <?php echo CHtml::submitButton('Set',
                                array('class'=>'btn btn-icon btn-primary glyphicons circle_ok')); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo CHtml::endForm(); ?>

</div>