<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/31/14
 * Time: 12:03 AM
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

<h2 class="glyphicons globe"><i></i> Venue Detail</h2>
<div class="separator"></div>

<div class="row-fluid">

    <div class="span9">
        <form class="form-horizontal">
            <div class="tab-content" style="padding: 0;">
                <div class="tab-pane active" id="account-details">

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
                                            <?php $name = (isset($model)) ? $model->vn_name : ""; ?>
                                            <p><?php echo $name; ?></p>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Address</label>
                                        <div class="controls">
                                            <?php $address = (isset($model)) ? $model->vn_address : ""; ?>
                                            <?php echo $address; ?>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Phone</label>
                                        <div class="controls">
                                            <?php $phone = (isset($model)) ? $model->vn_phone : ""; ?>
                                            <?php echo $phone; ?>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Fax</label>
                                        <div class="controls">
                                            <?php $fax = (isset($model)) ? $model->vn_fax : ""; ?>
                                            <?php echo $fax; ?>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Email</label>
                                        <div class="controls">
                                            <?php $email = (isset($model)) ? $model->vn_email : ""; ?>
                                            <?php echo $email; ?>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Website</label>
                                        <div class="controls">
                                            <?php $website = (isset($model)) ? $model->vn_website : ""; ?>
                                            <?php echo $website; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="separator bottom" />
                            <div class="control-group">
                                <label class="control-label">Description</label>
                                <div class="controls">
                                    <?php $desc = (isset($model)) ? $model->vn_description : ""; ?>
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
                                    <?php foreach($glr_venue as $gallery){ ?>
                                        <li class="span3">
                                        <span class="thumb view">
                                            <span class="back">
                                                <span id="<?php echo $gallery['glr_vn_id']; ?>" class="btn btn-mini btn-primary delete">Delete</span>
                        <!--                        <a href=""  class="arr">&times;</a>-->
                                            </span>
                                            <img src="<?php echo Yii::app()->request->baseUrl . $gallery['glr_vn_name']; ?>" alt="Album" />
                                        </span>
                                            <span class="name"></span>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
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
                    <li class="active"><a class="glyphicons user" href="#account-details" data-toggle="tab"><i></i>Venue Details</a></li>
                    <li><a class="glyphicons settings" href="#account-settings" data-toggle="tab"><i></i>Venue Gallery Pictures</a></li>
                </ul>
            </div>
        </div>
        <div class="widget widget-2 primary widget-body-white">
            <div class="widget-head">
                <h4 class="heading glyphicons picture"><i></i>Profile image</h4>
            </div>
            <div class="widget-body center">
                <div class="fileupload fileupload-new" data-provides="fileupload">
                    <?php if(!empty($model->vn_photo)){ ?>
                        <div class="fileupload-new thumbnail"><img src="<?php echo Yii::app()->request->baseUrl . $model->vn_photo; ?>" width="202" height="188" /></div>
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