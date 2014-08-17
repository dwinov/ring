<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/5/14
 * Time: 3:23 PM
 */
?>

<?php echo CHtml::beginForm($action, 'post', array('id'=>'event-form', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data')); ?>

    <div class="span9">
        <div class="tab-content" style="padding: 0;">
            <div class="tab-pane active" id="account-details">

                <div class="widget widget-2 primary widget-body-white">
                    <div class="widget-head">
                        <h4 class="heading glyphicons edit"><i></i>Event Details</h4>
                    </div>

                    <?php echo (isset($model)) ? Chtml::hiddenField('Event[evt_id]', $model->evt_id) : null; ?>

                    <?php $role = (isset($model)) ? $model->evt_role_id : Yii::app()->user->roleid; ?>
                    <?php echo CHtml::hiddenField('Event[evt_role_id]', $role); ?>

                    <?php $owner = (isset($model)) ? $model->evt_owner_id : $owner_id; ?>
                    <?php echo CHtml::hiddenField('Event[evt_owner_id]', $owner); ?>

                    <div class="widget-body" style="padding-bottom: 0;">
                        <div class="row-fluid">
                            <div class="span6">
                                <div class="control-group">
                                    <label class="control-label">Name</label>
                                    <div class="controls">
                                        <?php $name = (isset($model)) ? $model->evt_name : ""; ?>
                                        <?php echo CHtml::textField('Event[evt_name]', $name, array('class' => 'span12')); ?>
                                    </div>
                                </div>

                                <?php if(Yii::app()->user->roleid == 2){ ?>
                                    <div class="control-group">
                                        <label class="control-label">Venue</label>
                                        <div class="controls">
                                            <?php $venue = (isset($model)) ? $model->evt_venue_id : ""; ?>
                                            <?php echo CHtml::dropDownList('Event[evt_venue_id]', $venue, $venue_list) ?>
                                        </div>
                                    </div>
                                <?php }elseif(Yii::app()->user->roleid == 3){ ?>
                                    <?php $venue = (isset($model)) ? $model->evt_venue_id : $owner; ?>
                                    <?php echo CHtml::hiddenField('Event[evt_venue_id]', $venue); ?>
                                <?php } ?>

                                <div class="control-group">
                                    <label class="control-label">Event Start Date & Time</label>
                                    <div class="controls">
                                        <?php $start = (isset($model)) ? date('d-m-Y H:i', $model->evt_start_date) : ""; ?>
                                        <?php echo CHtml::textField('Event[evt_start_date]', $start, array('class' => 'datetimepicker span12')); ?>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Event End Date & Time</label>
                                    <div class="controls">
                                        <?php $end = (isset($model)) ? date('d-m-Y H:i', $model->evt_end_date) : ""; ?>
                                        <?php echo CHtml::textField('Event[evt_end_date]', $end, array('class' => 'datetimepicker span12')); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="separator bottom" />
                        <div class="control-group">
                            <label class="control-label">Ticketing</label>
                            <div class="controls">
                                <?php $ticketing = (isset($model)) ? $model->evt_ticketing : 0; ?>
                                <?php echo CHtml::checkBox('Event[evt_ticketing]', $ticketing, array('id' => 'ticket_toggle')); ?>
                            </div>
                        </div>

                        <div id="tiket">
                            <?php if(isset($model->evt_ticketing) && $model->evt_ticketing == true){ ?>
                                <?php foreach($ticket as $tiket){ ?>
                                    <div class="control-group">
                                        <label class="control-label"></label>
                                        <div class="controls">
                                            <?php echo CHtml::textField('tkt_type[]', $tiket['tkt_type'], array('class' => 'span4 input-type', 'placeholder' => 'Type Tickets')); ?>
                                            <?php echo CHtml::textField('tkt_price[]', $tiket['tkt_price'], array('class' => 'span2 input-price', 'placeholder' => 'Price')); ?>
                                            <?php echo CHtml::textField('tkt_total[]', $tiket['tkt_total'], array('class' => 'span2 input-total', 'placeholder' => 'Total')); ?>
                                            <?php echo CHtml::button('Remove', array('class' => 'btn btn-primary btn_remove')); ?>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                            <div class="control-group">
                                <label class="control-label"></label>
                                <div class="controls">
                                    <?php echo CHtml::textField('tkt_type[]', '', array('class' => 'span4 input-type', 'placeholder' => 'Type Tickets')); ?>
                                    <?php echo CHtml::textField('tkt_price[]', '', array('class' => 'span2 input-price', 'placeholder' => 'Price')); ?>
                                    <?php echo CHtml::textField('tkt_total[]', '', array('class' => 'span2 input-total', 'placeholder' => 'Total')); ?>
                                    <?php echo CHtml::button('Add', array('class' => 'btn btn-success btn_add')); ?>
                                </div>
                            </div>
                        </div>
                        <hr class="separator bottom" />
                        <div class="control-group">
                            <label class="control-label">Description</label>
                            <div class="controls">
                                <?php $desc = (isset($model)) ? $model->evt_description : ""; ?>
                                <?php echo CHtml::textArea('Event[evt_description]', $desc, array(
                                    'id' => "mustHaveId",
                                    'class' => "wysihtml5 span12",
                                    'rows' => "5"
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

                    <?php if(!empty($model->evt_photo)){ ?>
                        <div class="fileupload-new thumbnail"><img src="<?php echo Yii::app()->request->baseUrl . $model->evt_photo; ?>" width="202" height="188" /></div>
                    <?php }else{ ?>
                        <div class="fileupload-new thumbnail"><img src="<?php echo Yii::app()->request->baseUrl . '/images/232323.gif'; ?>" /></div>
                    <?php } ?>

                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 100%;"></div>
                    <div>
                        <span class="btn btn-file btn-inverse btn-icon glyphicons picture"><i></i><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" /></span>
                        <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                    </div>
                </div>
            </div>
        </div>

        <div id="ticket-picture">
            <div class="widget widget-2 primary widget-body-white">
                <div class="widget-head">
                    <h4 class="heading glyphicons picture"><i></i>Ticket Picture</h4>
                </div>
                <div class="widget-body center">
                    <div class="fileupload fileupload-new" data-provides="fileupload" data-name="tiketpic">

                        <?php if(!empty($model->evt_photo)){ ?>
                            <div class="fileupload-new thumbnail"><img src="<?php echo Yii::app()->request->baseUrl . $model->evt_photo; ?>" width="202" height="188" /></div>
                        <?php }else{ ?>
                            <div class="fileupload-new thumbnail"><img src="<?php echo Yii::app()->request->baseUrl . '/images/232323.gif'; ?>" /></div>
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
    </div>
<?php echo CHtml::endForm(); ?>

<?php $this->beginClip('js-page-end'); ?>
    <script type="text/javascript">
        $(document).ready(function(){
            var ticket = '<?php echo (isset($model->evt_ticketing)) ? : 0; ?>';
            window.onload = function(){
                if(ticket != '1'){
                    $('#tiket').hide();
                    $('#ticket-picture').hide();
                }
            }

            $('#ticket_toggle').click(function(){
                if($(this).attr('checked'))
                {
                    $('#tiket').show();
                    $('#ticket-picture').show();
                }else{
                    $('#tiket').hide();
                    $('#ticket-picture').hide();
                }
            });

            $('.btn_add').live('click', function(){
                $(this).parent('.controls').parent('.control-group').clone(true).appendTo($(this).parent('.controls').parent('.control-group').parent('#tiket'));
                $(this).attr('value', 'Remove');
                $(this).toggleClass('btn_remove btn_add');
                $(this).toggleClass('btn-primary btn-success');
                $('.input-type:last').val("");
                $('.input-price:last').val("");
                $('.input-total:last').val("");
            });

            $('.btn_remove').live('click', function(){
                $(this).parent('.controls').parent('.control-group').remove();
            });
        });
    </script>
<?php echo $this->endClip(); ?>