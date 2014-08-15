<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 8/13/14
 * Time: 3:30 PM
 */
?>

<ul class="breadcrumb">
    <li><a href="index.html?lang=en" class="glyphicons home"><i></i> BootAdmin</a></li>
    <li class="divider"></li>
    <li>Online Shop</li>
    <li class="divider"></li>
    <li>Products</li>
</ul>
<div class="separator"></div>

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
                <div class="control-group">
<!--                    <label class="control-label">Type</label>-->
                    <div class="controls">
                        <label class="checkbox inline">
                            <input type="checkbox" name="type_email" class="checkbox" value="email" checked="checked" />
                            Email
                        </label>
                        <label class="checkbox inline">
                            <input type="checkbox" class="checkbox" value="sms" checked="checked" />
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
                                <option value="2">All</option>
                                <option value="1">Male</option>
                                <option value="0">Female</option>
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
                                <input type="radio" class="radio" id="gender-both" name="radioInline" value="2" />
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
                            <select multiple class="span8" id="region" name="region" style="height: 60px;">
                                <option value="2">All</option>
                                <option value="1">Male</option>
                                <option value="0">Female</option>
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
                                <label id="total-group">100</label>
                            </div>
                        </div>
                    </li>
                    <li>
                        <label>Credits For This Broadcast:</label>
                        <div class="right">
                            <div class="input-append">
                                <label>100</label>
                            </div>
                        </div>
                    </li>
                    <li>
                        <label>Your Total Credits:</label>
                        <div class="right">
                            <div class="input-append">
                                <label>100</label>
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
                    values: [ 18, 25 ],
                    slide: function( event, ui ) {
                        $( ".range-slider #umur" ).val( ui.values[ 0 ] + " - " + ui.values[ 1 ] );
                        getDataMember($('#region').val(), $('#gender').val(), $('#interest').val(), ui.values[ 0 ] + " - " + ui.values[ 1 ]);
                    }
//	        start: function() { if (typeof mainYScroller != 'undefined') mainYScroller.disable(); },
//	        stop: function() { if (typeof mainYScroller != 'undefined') mainYScroller.enable(); }
                });
                $( ".range-slider #umur" ).val( $( ".range-slider .slider" ).slider( "values", 0 ) +
                    " - " + $( ".range-slider .slider" ).slider( "values", 1 ) );
            }

            $("#region, #gender-both, #gender-male, #gender-female, #interest").change(function() {
                if($('#gender-both').attr('checked') == 'checked'){
                    getDataMember($('#region').val(), $('#gender-both').val(), $('#interest').val(), $('#umur').val());
                }else if($('#gender-male').attr('checked') == 'checked'){
                    getDataMember($('#region').val(), $('#gender-male').val(), $('#interest').val(), $('#umur').val());
                }else if($('#gender-female').attr('checked') == 'checked'){
                    getDataMember($('#region').val(), $('#gender-female').val(), $('#interest').val(), $('#umur').val());
                }
            });

            function getDataMember(reg, gen, int, age)
            {
                $.post(document.location.href, { region: reg, gender: gen, interest: int, umur: age }, function(data){
                    $('#total-group').html(data.total_target);
                }, "json");
            }
        });
    </script>
<?php echo $this->endClip(); ?>