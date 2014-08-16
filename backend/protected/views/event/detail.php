<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 8/1/14
 * Time: 11:10 AM
 */
?>

<ul class="breadcrumb">
    <li><a href="index.html?lang=en" class="glyphicons home"><i></i> BootAdmin</a></li>
    <li class="divider"></li>
    <li>Forms</li>
    <li class="divider"></li>
    <li>Demo Forms</li>
</ul>
<div class="separator"></div>

<h2 class="glyphicons group"><i></i> Event Detail</h2>
<div class="separator"></div>

<div class="row-fluid">

    <div class="span9">
        <form class="form-horizontal">
            <div class="tab-content" style="padding: 0;">
                <div class="tab-pane active" id="account-details">

                    <div class="widget widget-2">
                        <div class="widget-head">
                            <h4 class="heading glyphicons edit"><i></i>Event Details</h4>
                        </div>
                        <div class="widget-body" style="padding-bottom: 0;">
                            <div class="row-fluid">
                                <div class="span6">
                                    <div class="control-group">
                                        <label class="control-label">Name</label>
                                        <div class="controls">
                                            <?php $name = (isset($model)) ? $model->evt_name : ""; ?>
                                            <p><?php echo $name; ?></p>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Date/Time Event</label>
                                        <div class="controls">
                                            <?php $date = (isset($model)) ? $model->evt_start_date : ""; ?>
                                            <?php $time = (isset($model)) ? $model->evt_end_date : ""; ?>
                                            <?php echo date('d-m-Y H:i', $date) . ' till ' . date('d-m-Y H:i', $time); ?>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Ticket</label>
                                        <div class="controls">
                                            <table>
                                                <thead>
                                                <tr>
                                                    <th style="width: 100px;">Type</th>
                                                    <th style="width: 100px;">Price</th>
                                                    <th style="width: 100px;">Total</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php if(isset($ticket)){ ?>
                                                    <?php foreach($ticket as $tiket){ ?>
                                                        <tr>
                                                            <td style="text-align: center;"><?php echo $tiket['tkt_type']; ?></td>
                                                            <td style="text-align: center;"><?php echo $tiket['tkt_price']; ?></td>
                                                            <td style="text-align: center;"><?php echo $tiket['tkt_total']; ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="separator bottom" />
                            <div class="control-group">
                                <label class="control-label">Description</label>
                                <div class="controls">
                                    <?php $desc = (isset($model)) ? $model->evt_description : ""; ?>
                                    <?php echo $desc; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="account-settings">
                    <div class="widget widget-2">
                        <div class="well">
                            <div class="row-fluid gallery paper">
                                <ul>
                                    <?php foreach($glr_event as $gallery){ ?>
                                        <li class="span3">
                                        <span class="thumb view">
                                            <span class="back">
                                                <span id="<?php echo $gallery['glr_evt_id']; ?>" class="btn btn-mini btn-primary delete">Delete</span>
                        <!--                        <a href=""  class="arr">&times;</a>-->
                                            </span>
                                            <img src="<?php echo Yii::app()->request->baseUrl . $gallery['glr_evt_name']; ?>" alt="Album" />
                                        </span>
                                            <span class="name"></span>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <?php if(Yii::app()->user->roleid == 2 || Yii::app()->user->roleid == 1){ ?>
                <div class="tab-pane" id="eo">
                    <div class="widget widget-2">
                        <div class="widget-head">
                            <h4 class="heading glyphicons edit"><i></i>Event Organizer Details</h4>
                        </div>
                        <div class="widget-body" style="padding-bottom: 0;">
                            <div class="row-fluid">
                                <div class="span6">
                                    <div class="control-group">
                                        <label class="control-label">Name</label>
                                        <div class="controls">
                                            <?php $eo_name = (isset($eo)) ? $eo->eo_name : ""; ?>
                                            <p><?php echo $eo_name; ?></p>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Address</label>
                                        <div class="controls">
                                            <?php $eo_address = (isset($eo)) ? $eo->eo_address : ""; ?>
                                            <?php echo $eo_address; ?>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Phone</label>
                                        <div class="controls">
                                            <?php $eo_phone = (isset($eo)) ? $eo->eo_phone : ""; ?>
                                            <?php echo $eo_phone; ?>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Fax</label>
                                        <div class="controls">
                                            <?php $eo_fax = (isset($eo)) ? $eo->eo_fax : ""; ?>
                                            <?php echo $eo_fax; ?>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Email</label>
                                        <div class="controls">
                                            <?php $eo_email = (isset($eo)) ? $eo->eo_email : ""; ?>
                                            <?php echo $eo_email; ?>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Website</label>
                                        <div class="controls">
                                            <?php $eo_website = (isset($eo)) ? $eo->eo_website : ""; ?>
                                            <?php echo $eo_website; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="separator bottom" />
                            <div class="control-group">
                                <label class="control-label">Description</label>
                                <div class="controls">
                                    <?php $eo_desc = (isset($eo)) ? $eo->eo_description : ""; ?>
                                    <?php echo $eo_desc; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <div class="tab-pane" id="venue">
                    <div class="widget widget-2">
                        <div class="widget-head">
                            <h4 class="heading glyphicons edit"><i></i>Venue Details</h4>
                        </div>
                        <div class="widget-body" style="padding-bottom: 0;">
                            <div class="row-fluid">
                                <div class="span6">
                                    <div class="control-group">
                                        <label class="control-label">Name</label>
                                        <div class="controls">
                                            <?php $vn_name = (isset($venue)) ? $venue->vn_name : ""; ?>
                                            <p><?php echo $vn_name; ?></p>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Address</label>
                                        <div class="controls">
                                            <?php $vn_address = (isset($venue)) ? $venue->vn_address : ""; ?>
                                            <?php echo $vn_address; ?>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Phone</label>
                                        <div class="controls">
                                            <?php $vn_phone = (isset($venue)) ? $venue->vn_phone : ""; ?>
                                            <?php echo $vn_phone; ?>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Fax</label>
                                        <div class="controls">
                                            <?php $vn_fax = (isset($venue)) ? $venue->vn_fax : ""; ?>
                                            <?php echo $vn_fax; ?>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Email</label>
                                        <div class="controls">
                                            <?php $vn_email = (isset($venue)) ? $venue->vn_email : ""; ?>
                                            <?php echo $vn_email; ?>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Website</label>
                                        <div class="controls">
                                            <?php $vn_website = (isset($venue)) ? $venue->vn_website : ""; ?>
                                            <?php echo $vn_website; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="separator bottom" />
                            <div class="control-group">
                                <label class="control-label">Description</label>
                                <div class="controls">
                                    <?php $vn_desc = (isset($venue)) ? $venue->vn_description : ""; ?>
                                    <?php echo $vn_desc; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="other">
                    <div class="widget widget-2">
                        <div class="widget-head">
                            <h4 class="heading glyphicons edit"><i></i>Other Events</h4>
                        </div>
                        <div class="widget-body" style="padding-bottom: 0;">

                            <table id="basic-datatabel" cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-primary table-condensed">
                                <thead>
                                <tr>
                                    <th>Event</th>
                                    <th>EO</th>
                                    <th>Venue</th>
                                    <th>Date</th>
                                    <th></th>
                                </tr>
                                </thead>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>

    <div class="span3">
        <div class="widget widget-2 primary widget-body-white">
            <div class="widget-head">
                <h4 class="heading glyphicons pencil"><i></i> Edit account</h4>
            </div>
            <div class="widget-body list list-2">
                <ul>
                    <li class="active"><a class="glyphicons user" href="#account-details" data-toggle="tab"><i></i>Event Details</a></li>
                    <li><a class="glyphicons settings" href="#account-settings" data-toggle="tab"><i></i>Event Gallery Pictures</a></li>
                    <?php if(Yii::app()->user->roleid == 2){ ?>
                    <li><a class="glyphicons settings" href="#eo" data-toggle="tab"><i></i>Event Organizer</a></li>
                    <?php } ?>
                    <li><a class="glyphicons settings" href="#venue" data-toggle="tab"><i></i>Venue</a></li>
                    <li><a class="glyphicons settings" href="#other" data-toggle="tab"><i></i>Other Events</a></li>
                </ul>
            </div>
        </div>
        <div class="widget widget-2 primary widget-body-white">
            <div class="widget-head">
                <h4 class="heading glyphicons picture"><i></i>Profile image</h4>
            </div>
            <div class="widget-body center">
                <div class="fileupload fileupload-new" data-provides="fileupload">
                    <?php if(!empty($model->evt_photo)){ ?>
                        <div class="fileupload-new thumbnail"><img src="<?php echo Yii::app()->request->baseUrl . $model->evt_photo; ?>" width="202" height="188" /></div>
                    <?php }else{ ?>
                        <div class="fileupload-new thumbnail"><img src="http://www.placehold.it/202x188/232323" /></div>
                    <?php } ?>

                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 100%;"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<br/>

<?php $this->beginClip('js-page-end'); ?>
    <script type="text/javascript">
        $(document).ready(function(){
            $dataTable = $("#basic-datatabel").dataTable({
                bServerSide: true,
                sAjaxSource: document.location.href,
                "sPaginationType": "bootstrap",
                aoColumns: [
                    {
                        mData: "evt_name",
                        sWidth: "10%",
                        bSortable: true
                    },
                    {
                        mData: "eo_name",
                        sWidth: "10%",
                        bSortable: true
                    },
                    {
                        mData: "vn_name",
                        sWidth: "10%",
                        bSortable: true
                    },
                    {
                        mData: "evt_start_date",
                        sWidth: "10%",
                        sClass: "center",
                        bSortable: true
                    },
                    {
                        mData: 'evt_id',
                        sWidth: "8%",
                        sClass: "center",
                        mRender: function(data, type, all) {
                            var btns = new Array();
                            btns.push("<a class='btn-action glyphicons book_open btn-info' href='<?php echo Yii::app()->createUrl('event/detail'); ?>/id/" + all.evt_id + "' title='Detail'><i></i></a> ");
                            return  btns.join("&nbsp;");

                        }
                    }
                ],
                fnServerParams: function(aoData) {
                    aoData.push({name: "start", value: '<?php echo $model->evt_start_date; ?>'});
                    aoData.push({name: "end", value: '<?php echo $model->evt_end_date; ?>'});
                }
            });

            $dataTable.on('click', 'a[data-delete]', function(e) {
                var delkodel = $(this);
                $('#dialog').dialog({
                    width: 500,
                    modal: true,
                    buttons: {
                        "Delete" : function(){
                            $.post(delkodel.attr('href'), {_method: 'delete'}, function(r) {
                                $dataTable.fnReloadAjax();
                            });
                            $(this).dialog("close");
                        },
                        "Cancel" : function() {
                            $(this).dialog("close");
                        }
                    }
                });
                e.preventDefault();
            });

            $("#date, #time").change(function() {
                $dataTable.fnReloadAjax();
            });
        });
    </script>
<?php echo $this->endClip(); ?>