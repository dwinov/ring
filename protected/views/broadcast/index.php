<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 8/13/14
 * Time: 3:30 PM
 */
?>

<div class="heading-buttons">
    <h2 class="glyphicons message_out"><i></i> Broadcast</h2>
</div>
<div class="separator"></div>

<div class="row-fluid">
    <div class="span9">
        <div class="widget widget-2 primary widget-body-white">
            <div class="widget-head">
                <h4 class="heading glyphicons edit"><i></i>Message</h4>
            </div>

            <?php echo CHtml::beginForm(Yii::app()->createUrl('broadcast/send'), 'post', array('id'=>'broadcast-form')); ?>

            <div class="widget-body" style="padding-bottom: 0;">
                <?php echo CHtml::hiddenField('list_member', '', array('id' => 'list_member')); ?>
                <?php echo CHtml::hiddenField('eo_id', $eo_id); ?>
                <?php echo CHtml::hiddenField('payment', '', array('id' => 'payment')); ?>
                <div class="control-group">
<!--                    <label class="control-label">Type</label>-->
                    <div class="controls">
                        <label class="checkbox inline">
                            <input type="checkbox" name="type_email" class="checkbox" value="email" checked="checked" />
                            Email
                        </label>
                        <label class="checkbox inline">
                            <input type="checkbox" class="checkbox" value="sms" />
                            SMS
                        </label>
                        <label class="checkbox inline">
                            <input type="checkbox" name="type_inbox" class="checkbox" value="inbox" checked="checked" />
                            Inbox
                        </label>
                    </div>
                </div>
                <hr class="separator bottom" />
                <div class="control-group">
                    <label class="control-label"></label>
                    <div class="controls">
                        <?php echo CHtml::textArea('message', '', array(
                            'id' => "mustHaveId",
                            'class' => "wysihtml5 span10",
                            'rows' => "5")); ?>
                    </div>
                </div>

                <div class="form-actions" style="margin: 0;">
                    <?php echo CHtml::submitButton( 'Broadcast Message',
                        array('class'=>'btn btn-icon btn-primary glyphicons circle_ok')); ?>
                </div>
            </div>
            <?php echo CHtml::endForm(); ?>
        </div>
    </div>

    <div class="span3">
        <div class="widget widget-2 primary widget-body-white">
            <div class="widget-head">
                <h4 class="heading glyphicons cogwheel"><i></i> Filter</h4>
            </div>

            <div class="widget-body list list-2 fluid js-filters form-inline small">
                <ul>
                    <li class="right">
                        <label class="span4">Region:</label>
                        <div class="right">
                            <select multiple class="span8" id="region" name="region" style="height: 60px;">
                                <?php foreach($region as $reg){ ?>
                                <option value="<?php echo $reg->reg_id; ?>" selected="selected"><?php echo $reg->reg_name; ?></option>
                                <?php } ?>
                                <?php echo CHtml::hiddenField('tamp_region', '', array('id' => 'tamp-region')); ?>
                            </select>
                        </div>
                    </li>
                    <li>
                        <label class="span4">Age:</label>
                        <div class="right">
                            <div class="range-slider row-fluid">
                                <input type="text" name="age" id="umur" class="input-mini" style="width: 85px;" />
                                <div class="slider slider-primary"></div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="right">
                            <label class="radio">
                                <input type="radio" class="radio" id="gender-both" name="radioInline" value="2" checked />
                                Both
                            </label>
                            <label class="radio">
                                <input type="radio" class="radio" id="gender-male" name="radioInline" value="1" />
                                Male
                            </label>
                            <label class="radio">
                                <input type="radio" class="radio" id="gender-female" name="radioInline" value="0" />
                                Female
                            </label>
                        </div>
                    </li>
                    <li>
                        <label class="span4">Interest:</label>
                        <div class="right">
                            <select multiple class="span8" id="interest" name="interest" style="height: 60px;">
                                <?php foreach($interest as $int){ ?>
                                <option value="<?php echo $int->int_id ?>" selected="selected"><?php echo $int->int_name ?></option>
                                <?php } ?>
                                <?php echo CHtml::hiddenField('tamp_interest', '', array('id' => 'tamp-interest')); ?>
                            </select>
                        </div>
                    </li>
                    <li>
                        <label>Own Database:</label>
                        <div class="right">
                            <div class="input-append">
                                <input type="checkbox">
                            </div>
                        </div>
                    </li>
                    <li>
                        <label>Total Target Group:</label>
                        <div class="right">
                            <div class="input-append">
                                <label id="total-group"></label>
                            </div>
                        </div>
                    </li>
                    <li>
                        <label>Credits For This Broadcast:</label>
                        <div class="right">
                            <div class="input-append">
                                <label id="credit-pay"></label>
                            </div>
                        </div>
                    </li>
                    <li>
                        <label>Your Total Credits:</label>
                        <div class="right">
                            <div class="input-append">
                                <label><?php echo $credit['crt_credit']; ?></label>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<br/>

<?php $this->beginClip('js-page-end'); ?>
    <script type="text/javascript">
        $(document).ready(function(){
            window.onload = function(){
                var foo = new Array();
                var bar = new Array();
                $('#region :selected').each(function(i, selected){
                    foo.push($(this).val());
                });

                $('#interest :selected').each(function(i, selected){
                    bar.push($(this).val());
                });

                var first_regStr = foo.join(',');
                $('#tamp-region').val(first_regStr);

                var first_intStr = bar.join(',');
                $('#tamp-interest').val(first_intStr);

                getDataMember($('#tamp-region').val(), $('#gender-both').val(), $('#tamp-interest').val(), $('#umur').val());
            };

            function JQSliderCreate()
            {
                $(this)
                    .removeClass('ui-corner-all ui-widget-content')
                    .wrap('<span class="ui-slider-wrap"></span>')
                    .find('.ui-slider-handle')
                    .removeClass('ui-corner-all ui-state-default');
            }

            if ($('.range-slider').size() > 0)
            {
                $( ".range-slider .slider" ).slider({
                    create: JQSliderCreate,
                    range: true,
                    min: 18,
                    max: 80,
                    values: [ 18, 80 ],
                    slide: function( event, ui ) {
                        $( ".range-slider #umur" ).val( ui.values[ 0 ] + " - " + ui.values[ 1 ] );
                        getDataMember($('#tamp-region').val(), $('#gender').val(), $('#tamp-interest').val(), ui.values[ 0 ] + " - " + ui.values[ 1 ]);
                    }
//	        start: function() { if (typeof mainYScroller != 'undefined') mainYScroller.disable(); },
//	        stop: function() { if (typeof mainYScroller != 'undefined') mainYScroller.enable(); }
                });
                $( ".range-slider #umur" ).val( $( ".range-slider .slider" ).slider( "values", 0 ) +
                    " - " + $( ".range-slider .slider" ).slider( "values", 1 ) );
            }

            $("#gender-both, #gender-male, #gender-female").change(function() {
                if($('#gender-both').attr('checked') == 'checked'){
                    getDataMember($('#tamp-region').val(), $('#gender-both').val(), $('#tamp-interest').val(), $('#umur').val());
                }else if($('#gender-male').attr('checked') == 'checked'){
                    getDataMember($('#tamp-region').val(), $('#gender-male').val(), $('#tamp-interest').val(), $('#umur').val());
                }else if($('#gender-female').attr('checked') == 'checked'){
                    getDataMember($('#tamp-region').val(), $('#gender-female').val(), $('#tamp-interest').val(), $('#umur').val());
                }
            });


            $('#region').change(function(){
                var region = $(this).val();
                if(region != 'null')
                {
                    var regStr = region.join(',');
                    $('#tamp-region').val(regStr);
                    getDataMember($('#tamp-region').val(), $('#gender-female').val(), $('#tamp-interest').val(), $('#umur').val());
                }
            });

            $('#interest').change(function(){
                var interest = $(this).val();
                if(interest != null)
                {
                    var intStr = interest.join(',');
                    $('#tamp-interest').val(intStr);
                    getDataMember($('#tamp-region').val(), $('#gender-female').val(), $('#tamp-interest').val(), $('#umur').val());
                }
            });

            function getDataMember(reg, gen, int, age)
            {
                $.post(document.location.href, { region: reg, gender: gen, interest: int, umur: age }, function(data){
                    $('#total-group').html(data.total_target);
                    $('#list_member').val(data.members_id);
                    $('#credit-pay').html(data.total_target * data.credit_cb);
                    $('#payment').val(data.total_target * data.credit_cb);
                }, "json");
            }
        });
    </script>
<?php echo $this->endClip(); ?>