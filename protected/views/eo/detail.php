<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/30/14
 * Time: 9:16 PM
 */
?>

<h2 class="glyphicons group"><i></i> Event Organizer Detail</h2>
<div class="separator"></div>

<div class="row-fluid">

<div class="span9">
    <form class="form-horizontal">
        <div class="tab-content" style="padding: 0;">
            <div class="tab-pane active" id="account-details">

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
                                        <?php $name = (isset($model)) ? $model->eo_name : ""; ?>
                                        <p><?php echo $name; ?></p>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Address</label>
                                    <div class="controls">
                                        <?php $address = (isset($model)) ? $model->eo_address : ""; ?>
                                        <?php echo $address; ?>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Phone</label>
                                    <div class="controls">
                                        <?php $phone = (isset($model)) ? $model->eo_phone : ""; ?>
                                        <?php echo $phone; ?>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Fax</label>
                                    <div class="controls">
                                        <?php $fax = (isset($model)) ? $model->eo_fax : ""; ?>
                                        <?php echo $fax; ?>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Email</label>
                                    <div class="controls">
                                        <?php $email = (isset($model)) ? $model->eo_email : ""; ?>
                                        <?php echo $email; ?>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Website</label>
                                    <div class="controls">
                                        <?php $website = (isset($model)) ? $model->eo_website : ""; ?>
                                        <?php echo $website; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="separator bottom" />
                        <div class="control-group">
                            <label class="control-label">Description</label>
                            <div class="controls">
                                <?php $desc = (isset($model)) ? $model->eo_description : ""; ?>
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
                                <?php foreach($glr_eo as $gallery){ ?>
                                    <li class="span3">
                                        <span class="thumb view">
                                            <span class="back">
                                                <span id="<?php echo $gallery['glr_id']; ?>" class="btn btn-mini btn-primary delete">Delete</span>
                        <!--                        <a href=""  class="arr">&times;</a>-->
                                            </span>
                                            <img src="<?php echo Yii::app()->request->baseUrl . $gallery['glr_name']; ?>" alt="Album" />
                                        </span>
                                        <span class="name"></span>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="list-event">
                <div class="widget widget-2">
                    <div class="well">
                        <table class="table table-bordered table-primary">
                            <thead>
                            <tr>
                                <th width="50" class="center">No.</th>
                                <th>Event Name</th>
                                <th>Venue</th>
                                <th>Date</th>
                                <th>Hour</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no = 1; ?>
                            <?php foreach($event as $evt){ ?>
                            <tr>
                                <td class="center"><?php echo $no++; ?></td>
                                <td><?php echo $evt['evt_name']; ?></td>
                                <td><?php echo $evt['vn_name']; ?></td>
                                <td><?php echo $evt['evt_date']; ?></td>
                                <td><?php echo $evt['evt_hour']; ?></td>
                            </tr>
                            <?php } ?>
                            </tbody>
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
                <li class="active"><a class="glyphicons user" href="#account-details" data-toggle="tab"><i></i>EO Details</a></li>
                <li><a class="glyphicons settings" href="#account-settings" data-toggle="tab"><i></i>EO Gallery Pictures</a></li>
                <li><a class="glyphicons settings" href="#list-event" data-toggle="tab"><i></i>Events</a></li>
            </ul>
        </div>
    </div>
    <div class="widget widget-2 primary widget-body-white">
        <div class="widget-head">
            <h4 class="heading glyphicons picture"><i></i>Profile image</h4>
        </div>
        <div class="widget-body center">
            <div class="fileupload fileupload-new" data-provides="fileupload">
                <?php if(!empty($model->eo_photo)){ ?>
                    <div class="fileupload-new thumbnail"><img src="<?php echo Yii::app()->request->baseUrl . $model->eo_photo; ?>" width="202" height="188" /></div>
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