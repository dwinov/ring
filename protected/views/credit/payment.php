<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 8/18/14
 * Time: 6:46 PM
 */
?>

<h2 class="glyphicons user"><i></i> Credit</h2>
<div class="separator"></div>

<div class="row-fluid">

    <?php echo CHtml::beginForm(Yii::app()->createUrl('credit/create'), 'post', array('id'=>'credit-form', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data')); ?>

    <div class="span9">
        <div class="tab-content" style="padding: 0;">
            <div class="tab-pane active" id="account-details">

                <div class="widget widget-2 primary widget-body-white">
                    <div class="widget-head">
                        <h4 class="heading glyphicons edit"><i></i>Buy Credits</h4>
                    </div>

                    <?php echo Chtml::hiddenField('Credit[crt_eo_id]', $eo_id); ?>

                    <div class="widget-body" style="padding-bottom: 0;">
                        <div class="row-fluid">
                            <div class="span9">
                                <div class="control-group">
                                    <label class="control-label">You have to pay</label>
                                    <div class="controls">
                                        <?php echo CHtml::textField('Credit[crt_credit]', $payment, array('class' => 'span6', 'id' => 'crt-credit', 'readonly' => 'readonly')); ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-actions" style="margin: 0;">
                            <?php echo CHtml::submitButton('Buy',
                                array('class'=>'btn btn-icon btn-primary glyphicons circle_ok')); ?>
                            <a href="" class="btn btn-icon btn-primary glyphicons circle_ok">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo CHtml::endForm(); ?>
</div>