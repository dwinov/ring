<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 8/16/14
 * Time: 5:34 PM
 */
?>

<h2 class="glyphicons user"><i></i> Credit</h2>
<div class="separator"></div>

<div class="row-fluid">

    <?php echo CHtml::beginForm(Yii::app()->createUrl('credit/payment'), 'post', array('id'=>'credit-form', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data')); ?>

    <div class="span9">
        <div class="tab-content" style="padding: 0;">
            <div class="tab-pane active" id="account-details">

                <div class="widget widget-2 primary widget-body-white">
                    <div class="widget-head">
                        <h4 class="heading glyphicons edit"><i></i>Buy Credits</h4>
                    </div>

                    <?php echo Chtml::hiddenField('Credit[crt_eo_id]', $eo_id); ?>
                    <?php echo Chtml::hiddenField('payment', '', array('id' => 'payment')); ?>

                    <div class="widget-body" style="padding-bottom: 0;">
                        <div class="row-fluid">
                            <div class="span9">
                                <div class="control-group">
                                    <label class="control-label">Packages of Credist</label>
                                    <div class="controls">
                                        <?php echo CHtml::button('1000', array('class' => 'packages', 'id' => '1000')); ?>
                                        <?php echo CHtml::button('5000', array('class' => 'packages', 'id' => '5000')); ?>
                                        <?php echo CHtml::button('10000', array('class' => 'packages', 'id' => '10000')); ?>
                                        <?php echo CHtml::button('25000', array('class' => 'packages', 'id' => '25000')); ?>
                                        <?php echo CHtml::button('50000', array('class' => 'packages', 'id' => '50000')); ?>
                                        <?php echo CHtml::hiddenField('Credit[crt_credit]', '', array('class' => 'span6', 'id' => 'crt-credit')); ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-actions" style="margin: 0;">
                            <?php echo CHtml::submitButton('Buy',
                                array('class'=>'btn btn-icon btn-primary glyphicons circle_ok', 'id' => 'buy')); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo CHtml::endForm(); ?>
</div>

<!-- dialog box -->
<div id="dialog" title="Total Credits" style="display: none;">
    <p id="total-credits"></p>
</div>


<?php $this->beginClip('js-page-end'); ?>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.packages').click(function(){
                $('#crt-credit').val($(this).attr('id'));

                $('.packages').each(function(i, obj){
                    if($(this).attr('disabled') == 'disabled')
                    {
                        $(this).attr('disabled', false);
                    }
                });

                $('.packages:disabled').attr('desabled', false);
                $(this).attr('disabled', 'disabled');
            });
        });
    </script>
<?php echo $this->endClip(); ?>