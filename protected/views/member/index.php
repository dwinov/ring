<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/8/14
 * Time: 1:55 PM
 */
?>

<!-- BEGIN PAGE HEADER-->
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">User Profile</h3>
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="index.html">
                    Home
                </a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">
                    User Profile
                </a>
            </li>
        </ul>
        <!-- END PAGE TITLE & BREADCRUMB-->
    </div>
</div>
<!-- END PAGE HEADER-->


<!-- BEGIN PAGE CONTENT-->
<div class="row profile">
<div class="col-md-12">
<!--BEGIN TABS-->
<div class="tabbable tabbable-custom tabbable-full-width">
<ul class="nav nav-tabs">
    <li class="active">
        <a href="#tab_1_1" data-toggle="tab">Overview</a>
    </li>
    <li>
        <a href="#tab_1_3" data-toggle="tab">Account</a>
    </li>
    <?php if(Yii::app()->user->roleid == 2){ ?>
        <li>
            <a href="#tab_1_10" data-toggle="tab">Event Organizer</a>
        </li>
        <li>
            <a href="#tab_1_4" data-toggle="tab">Events</a>
        </li>
    <?php }elseif(Yii::app()->user->roleid == 3){ ?>
        <li>
            <a href="#tab_1_4" data-toggle="tab">Venue</a>
        </li>
    <?php } ?>
    <li>
        <a href="#tab_1_6" data-toggle="tab">Help</a>
    </li>
</ul>
<div class="tab-content">
<div class="tab-pane active" id="tab_1_1">
<div class="row">
<div class="col-md-3">
    <ul class="list-unstyled profile-nav">
        <li>
            <?php
                if(empty($model->mem_photo)){
                    $url = Yii::app()->request->baseUrl . '/images/profile/NO-IMAGE-AVAILABLE.jpg';
                }else{
                    $url = Yii::app()->request->baseUrl . '/images/profile/' . $model->mem_photo;
                }
            ?>
            <img src="<?php echo $url; ?>" class="img-responsive" alt=""/>
            <a href="#" class="profile-edit">
                edit
            </a>
        </li>
        <li>
            <a href="#">Projects</a>
        </li>
        <li>
            <a href="#">Messages<span>3</span></a>
        </li>
        <li>
            <a href="#">Friends</a>
        </li>
        <li>
            <a href="#">Settings</a>
        </li>
    </ul>
</div>
<div class="col-md-9">
<div class="row">
    <div class="col-md-8 profile-info">
        <h1><?php echo $model->mem_screen_name; ?></h1>
        <p><?php echo $model->mem_about_me; ?></p>
        <p>
            <a href="#">
                www.mywebsite.com
            </a>
        </p>
        <ul class="list-inline">
            <li>
                <i class="fa fa-map-marker"></i> Spain
            </li>
            <li>
                <i class="fa fa-calendar"></i> 18 Jan 1982
            </li>
            <li>
                <i class="fa fa-briefcase"></i> Design
            </li>
            <li>
                <i class="fa fa-star"></i> Top Seller
            </li>
            <li>
                <i class="fa fa-heart"></i> BASE Jumping
            </li>
        </ul>
    </div>
    <!--end col-md-8-->

    <!--end col-md-4-->
</div>
<!--end row-->
<div class="tabbable tabbable-custom tabbable-custom-profile">
<ul class="nav nav-tabs">
    <li class="active">
        <a href="#tab_1_11" data-toggle="tab">
            Latest Customers
        </a>
    </li>
    <li>
        <a href="#tab_1_22" data-toggle="tab">
            Feeds
        </a>
    </li>
</ul>
<div class="tab-content">
<div class="tab-pane active" id="tab_1_11">
    <div class="portlet-body">
        <table class="table table-striped table-bordered table-advance table-hover">
            <thead>
            <tr>
                <th>
                    <i class="fa fa-briefcase"></i> Company
                </th>
                <th class="hidden-xs">
                    <i class="fa fa-question"></i> Descrition
                </th>
                <th>
                    <i class="fa fa-bookmark"></i> Amount
                </th>
                <th>
                </th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <a href="#">
                        Pixel Ltd
                    </a>
                </td>
                <td class="hidden-xs">
                    Server hardware purchase
                </td>
                <td>
                    52560.10$
																<span class="label label-success label-sm">
																	 Paid
																</span>
                </td>
                <td>
                    <a class="btn default btn-xs green-stripe" href="#">
                        View
                    </a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="#">
                        Smart House
                    </a>
                </td>
                <td class="hidden-xs">
                    Office furniture purchase
                </td>
                <td>
                    5760.00$
																<span class="label label-warning label-sm">
																	 Pending
																</span>
                </td>
                <td>
                    <a class="btn default btn-xs blue-stripe" href="#">
                        View
                    </a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="#">
                        FoodMaster Ltd
                    </a>
                </td>
                <td class="hidden-xs">
                    Company Anual Dinner Catering
                </td>
                <td>
                    12400.00$
																<span class="label label-success label-sm">
																	 Paid
																</span>
                </td>
                <td>
                    <a class="btn default btn-xs blue-stripe" href="#">
                        View
                    </a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="#">
                        WaterPure Ltd
                    </a>
                </td>
                <td class="hidden-xs">
                    Payment for Jan 2013
                </td>
                <td>
                    610.50$
																<span class="label label-danger label-sm">
																	 Overdue
																</span>
                </td>
                <td>
                    <a class="btn default btn-xs red-stripe" href="#">
                        View
                    </a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="#">
                        Pixel Ltd
                    </a>
                </td>
                <td class="hidden-xs">
                    Server hardware purchase
                </td>
                <td>
                    52560.10$
																<span class="label label-success label-sm">
																	 Paid
																</span>
                </td>
                <td>
                    <a class="btn default btn-xs green-stripe" href="#">
                        View
                    </a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="#">
                        Smart House
                    </a>
                </td>
                <td class="hidden-xs">
                    Office furniture purchase
                </td>
                <td>
                    5760.00$
																<span class="label label-warning label-sm">
																	 Pending
																</span>
                </td>
                <td>
                    <a class="btn default btn-xs blue-stripe" href="#">
                        View
                    </a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="#">
                        FoodMaster Ltd
                    </a>
                </td>
                <td class="hidden-xs">
                    Company Anual Dinner Catering
                </td>
                <td>
                    12400.00$
																<span class="label label-success label-sm">
																	 Paid
																</span>
                </td>
                <td>
                    <a class="btn default btn-xs blue-stripe" href="#">
                        View
                    </a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<!--tab-pane-->
<div class="tab-pane" id="tab_1_22">
<div class="tab-pane active" id="tab_1_1_1">
<div class="scroller" data-height="290px" data-always-visible="1" data-rail-visible1="1">
<ul class="feeds">
<li>
    <div class="col1">
        <div class="cont">
            <div class="cont-col1">
                <div class="label label-success">
                    <i class="fa fa-bell-o"></i>
                </div>
            </div>
            <div class="cont-col2">
                <div class="desc">
                    You have 4 pending tasks.
																					<span class="label label-danger label-sm">
																						 Take action <i class="fa fa-share"></i>
																					</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col2">
        <div class="date">
            Just now
        </div>
    </div>
</li>
<li>
    <a href="#">
        <div class="col1">
            <div class="cont">
                <div class="cont-col1">
                    <div class="label label-success">
                        <i class="fa fa-bell-o"></i>
                    </div>
                </div>
                <div class="cont-col2">
                    <div class="desc">
                        New version v1.4 just lunched!
                    </div>
                </div>
            </div>
        </div>
        <div class="col2">
            <div class="date">
                20 mins
            </div>
        </div>
    </a>
</li>
<li>
    <div class="col1">
        <div class="cont">
            <div class="cont-col1">
                <div class="label label-danger">
                    <i class="fa fa-bolt"></i>
                </div>
            </div>
            <div class="cont-col2">
                <div class="desc">
                    Database server #12 overloaded. Please fix the issue.
                </div>
            </div>
        </div>
    </div>
    <div class="col2">
        <div class="date">
            24 mins
        </div>
    </div>
</li>
<li>
    <div class="col1">
        <div class="cont">
            <div class="cont-col1">
                <div class="label label-info">
                    <i class="fa fa-bullhorn"></i>
                </div>
            </div>
            <div class="cont-col2">
                <div class="desc">
                    New order received. Please take care of it.
                </div>
            </div>
        </div>
    </div>
    <div class="col2">
        <div class="date">
            30 mins
        </div>
    </div>
</li>
<li>
    <div class="col1">
        <div class="cont">
            <div class="cont-col1">
                <div class="label label-success">
                    <i class="fa fa-bullhorn"></i>
                </div>
            </div>
            <div class="cont-col2">
                <div class="desc">
                    New order received. Please take care of it.
                </div>
            </div>
        </div>
    </div>
    <div class="col2">
        <div class="date">
            40 mins
        </div>
    </div>
</li>
<li>
    <div class="col1">
        <div class="cont">
            <div class="cont-col1">
                <div class="label label-warning">
                    <i class="fa fa-plus"></i>
                </div>
            </div>
            <div class="cont-col2">
                <div class="desc">
                    New user registered.
                </div>
            </div>
        </div>
    </div>
    <div class="col2">
        <div class="date">
            1.5 hours
        </div>
    </div>
</li>
<li>
    <div class="col1">
        <div class="cont">
            <div class="cont-col1">
                <div class="label label-success">
                    <i class="fa fa-bell-o"></i>
                </div>
            </div>
            <div class="cont-col2">
                <div class="desc">
                    Web server hardware needs to be upgraded.
																					<span class="label label-inverse label-sm">
																						 Overdue
																					</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col2">
        <div class="date">
            2 hours
        </div>
    </div>
</li>
<li>
    <div class="col1">
        <div class="cont">
            <div class="cont-col1">
                <div class="label label-default">
                    <i class="fa fa-bullhorn"></i>
                </div>
            </div>
            <div class="cont-col2">
                <div class="desc">
                    New order received. Please take care of it.
                </div>
            </div>
        </div>
    </div>
    <div class="col2">
        <div class="date">
            3 hours
        </div>
    </div>
</li>
<li>
    <div class="col1">
        <div class="cont">
            <div class="cont-col1">
                <div class="label label-warning">
                    <i class="fa fa-bullhorn"></i>
                </div>
            </div>
            <div class="cont-col2">
                <div class="desc">
                    New order received. Please take care of it.
                </div>
            </div>
        </div>
    </div>
    <div class="col2">
        <div class="date">
            5 hours
        </div>
    </div>
</li>
<li>
    <div class="col1">
        <div class="cont">
            <div class="cont-col1">
                <div class="label label-info">
                    <i class="fa fa-bullhorn"></i>
                </div>
            </div>
            <div class="cont-col2">
                <div class="desc">
                    New order received. Please take care of it.
                </div>
            </div>
        </div>
    </div>
    <div class="col2">
        <div class="date">
            18 hours
        </div>
    </div>
</li>
<li>
    <div class="col1">
        <div class="cont">
            <div class="cont-col1">
                <div class="label label-default">
                    <i class="fa fa-bullhorn"></i>
                </div>
            </div>
            <div class="cont-col2">
                <div class="desc">
                    New order received. Please take care of it.
                </div>
            </div>
        </div>
    </div>
    <div class="col2">
        <div class="date">
            21 hours
        </div>
    </div>
</li>
<li>
    <div class="col1">
        <div class="cont">
            <div class="cont-col1">
                <div class="label label-info">
                    <i class="fa fa-bullhorn"></i>
                </div>
            </div>
            <div class="cont-col2">
                <div class="desc">
                    New order received. Please take care of it.
                </div>
            </div>
        </div>
    </div>
    <div class="col2">
        <div class="date">
            22 hours
        </div>
    </div>
</li>
<li>
    <div class="col1">
        <div class="cont">
            <div class="cont-col1">
                <div class="label label-default">
                    <i class="fa fa-bullhorn"></i>
                </div>
            </div>
            <div class="cont-col2">
                <div class="desc">
                    New order received. Please take care of it.
                </div>
            </div>
        </div>
    </div>
    <div class="col2">
        <div class="date">
            21 hours
        </div>
    </div>
</li>
<li>
    <div class="col1">
        <div class="cont">
            <div class="cont-col1">
                <div class="label label-info">
                    <i class="fa fa-bullhorn"></i>
                </div>
            </div>
            <div class="cont-col2">
                <div class="desc">
                    New order received. Please take care of it.
                </div>
            </div>
        </div>
    </div>
    <div class="col2">
        <div class="date">
            22 hours
        </div>
    </div>
</li>
<li>
    <div class="col1">
        <div class="cont">
            <div class="cont-col1">
                <div class="label label-default">
                    <i class="fa fa-bullhorn"></i>
                </div>
            </div>
            <div class="cont-col2">
                <div class="desc">
                    New order received. Please take care of it.
                </div>
            </div>
        </div>
    </div>
    <div class="col2">
        <div class="date">
            21 hours
        </div>
    </div>
</li>
<li>
    <div class="col1">
        <div class="cont">
            <div class="cont-col1">
                <div class="label label-info">
                    <i class="fa fa-bullhorn"></i>
                </div>
            </div>
            <div class="cont-col2">
                <div class="desc">
                    New order received. Please take care of it.
                </div>
            </div>
        </div>
    </div>
    <div class="col2">
        <div class="date">
            22 hours
        </div>
    </div>
</li>
<li>
    <div class="col1">
        <div class="cont">
            <div class="cont-col1">
                <div class="label label-default">
                    <i class="fa fa-bullhorn"></i>
                </div>
            </div>
            <div class="cont-col2">
                <div class="desc">
                    New order received. Please take care of it.
                </div>
            </div>
        </div>
    </div>
    <div class="col2">
        <div class="date">
            21 hours
        </div>
    </div>
</li>
<li>
    <div class="col1">
        <div class="cont">
            <div class="cont-col1">
                <div class="label label-info">
                    <i class="fa fa-bullhorn"></i>
                </div>
            </div>
            <div class="cont-col2">
                <div class="desc">
                    New order received. Please take care of it.
                </div>
            </div>
        </div>
    </div>
    <div class="col2">
        <div class="date">
            22 hours
        </div>
    </div>
</li>
</ul>
</div>
</div>
</div>
<!--tab-pane-->
</div>
</div>
</div>
</div>
</div>
<!--tab_1_2-->
<div class="tab-pane" id="tab_1_3">
    <div class="row profile-account">
        <div class="col-md-3">
            <ul class="ver-inline-menu tabbable margin-bottom-10">
                <li class="active">
                    <a data-toggle="tab" href="#tab_1-1"><i class="fa fa-cog"></i> Personal info</a>
                    <span class="after"></span>
                </li>
                <li>
                    <a data-toggle="tab" href="#tab_2-2"><i class="fa fa-picture-o"></i> Change Avatar</a>
                </li>
                <li>
                    <a data-toggle="tab" href="#tab_3-3"><i class="fa fa-lock"></i> Change Password</a>
                </li>
                <li>
                    <a data-toggle="tab" href="#tab_4-4"><i class="fa fa-eye"></i> Privacity Settings</a>
                </li>
            </ul>
        </div>
        <div class="col-md-9">
            <div class="tab-content">
                <div id="tab_1-1" class="tab-pane active">
                    <?php echo CHtml::beginForm(Yii::app()->createUrl('member/update'), 'post', array('role' => 'form')); ?>
                        <?php echo CHtml::hiddenField('Member[mem_id]', $model->mem_id); ?>
                        <div class="form-group">
                            <label class="control-label">First Name</label>
                            <?php echo CHtml::textField('Member[mem_first_name]', $model->mem_first_name, array('class' => 'form-control')); ?>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Last Name</label>
                            <?php echo CHtml::textField('Member[mem_last_name]', $model->mem_first_name, array('class' => 'form-control')); ?>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Mobile Number</label>
                            <?php echo CHtml::textField('Member[mem_phone]', $model->mem_phone, array('class' => 'form-control')); ?>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Email</label>
                            <?php echo CHtml::textField('Member[mem_email]', $model->mem_email, array('class' => 'form-control')); ?>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Sex</label>
                            <div class="radio-list">
                                <?php
                                $man = ($model->mem_gender == 1) ? true : false;
                                $woman = ($model->mem_gender == 0) ? true : false;
                                ?>
                                <label class="radio-inline">
                                    <?php echo CHtml::radioButton('Member[mem_gender]', $man, array(
                                        'value' => '1',
                                        'name' => 'ewe',
                                        'uncheckValue' => null
                                    )); ?>
                                    Man
                                </label>
                                <label class="radio-inline">
                                    <?php echo CHtml::radioButton('Member[mem_gender]', $woman, array(
                                        'value' => '0',
                                        'name' => 'ewe',
                                        'uncheckValue' => null
                                    )); ?>
                                    Woman
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">About</label>
                            <?php echo CHtml::textArea('Member[mem_about_me]', $model->mem_about_me, array('class' => 'form-control', 'rows' => '3')); ?>
                        </div>
<!--                        <div class="form-group">-->
<!--                            <label class="control-label">Website Url</label>-->
<!--                            <input type="text" placeholder="http://www.mywebsite.com" class="form-control"/>-->
<!--                        </div>-->
                        <div class="margiv-top-10">
                            <?php echo CHtml::submitButton('Save Change', array('class' => 'btn green')); ?>
                        </div>
                    <?php echo CHtml::endForm(); ?>
                </div>
                <div id="tab_2-2" class="tab-pane">
                    <p>
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                    </p>
                    <form action="#" role="form">
                        <div class="form-group">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""/>
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                </div>
                                <div>
																<span class="btn default btn-file">
																	<span class="fileinput-new">
																		 Select image
																	</span>
																	<span class="fileinput-exists">
																		 Change
																	</span>
																	<input type="file" name="...">
																</span>
                                    <a href="#" class="btn default fileinput-exists" data-dismiss="fileinput">
                                        Remove
                                    </a>
                                </div>
                            </div>
                            <div class="clearfix margin-top-10">
															<span class="label label-danger">
																 NOTE!
															</span>
															<span>
																 Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only
															</span>
                            </div>
                        </div>
                        <div class="margin-top-10">
                            <a href="#" class="btn green">
                                Submit
                            </a>
                            <a href="#" class="btn default">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
                <div id="tab_3-3" class="tab-pane">
                    <form action="#">
                        <div class="form-group">
                            <label class="control-label">Current Password</label>
                            <input type="password" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label class="control-label">New Password</label>
                            <input type="password" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Re-type New Password</label>
                            <input type="password" class="form-control"/>
                        </div>
                        <div class="margin-top-10">
                            <a href="#" class="btn green">
                                Change Password
                            </a>
                            <a href="#" class="btn default">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
                <div id="tab_4-4" class="tab-pane">
                    <form action="#">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <td>
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus..
                                </td>
                                <td>
                                    <label class="uniform-inline">
                                        <input type="radio" name="optionsRadios1" value="option1"/>
                                        Yes </label>
                                    <label class="uniform-inline">
                                        <input type="radio" name="optionsRadios1" value="option2" checked/>
                                        No </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Enim eiusmod high life accusamus terry richardson ad squid wolf moon
                                </td>
                                <td>
                                    <label class="uniform-inline">
                                        <input type="checkbox" value=""/> Yes </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Enim eiusmod high life accusamus terry richardson ad squid wolf moon
                                </td>
                                <td>
                                    <label class="uniform-inline">
                                        <input type="checkbox" value=""/> Yes </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Enim eiusmod high life accusamus terry richardson ad squid wolf moon
                                </td>
                                <td>
                                    <label class="uniform-inline">
                                        <input type="checkbox" value=""/> Yes </label>
                                </td>
                            </tr>
                        </table>
                        <!--end profile-settings-->
                        <div class="margin-top-10">
                            <a href="#" class="btn green">
                                Save Changes
                            </a>
                            <a href="#" class="btn default">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--end col-md-9-->
    </div>
</div>

<div class="tab-pane" id="tab_1_10">
<div class="row profile-account">
<div class="col-md-3">
    <ul class="ver-inline-menu tabbable margin-bottom-10">
        <li class="active">
            <a data-toggle="tab" href="#tab_1-1-2"><i class="fa fa-cog"></i> Personal info</a>
            <span class="after"></span>
        </li>
        <li>
            <a data-toggle="tab" href="#tab_2-2-2"><i class="fa fa-picture-o"></i> Change Avatar</a>
        </li>
    </ul>
</div>
<div class="col-md-9">
    <div class="tab-content">
        <div id="tab_1-1-2" class="tab-pane active">
            <?php if(Yii::app()->user->roleid == 2){ ?>
                <?php echo $this->renderPartial('_eo', array('eo' => $eo)); ?>
            <?php }elseif(Yii::app()->user->roleid == 3){ ?>
                <?php echo $this->renderPartial('_venue', array('model' => $venue)); ?>
            <?php } ?>
        </div>
        <div id="tab_2-2-2" class="tab-pane">
            <p>
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
            </p>
            <form action="#" role="form">
                <div class="form-group">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""/>
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                        </div>
                        <div>
																<span class="btn default btn-file">
																	<span class="fileinput-new">
																		 Select image
																	</span>
																	<span class="fileinput-exists">
																		 Change
																	</span>
																	<input type="file" name="...">
																</span>
                            <a href="#" class="btn default fileinput-exists" data-dismiss="fileinput">
                                Remove
                            </a>
                        </div>
                    </div>
                    <div class="clearfix margin-top-10">
															<span class="label label-danger">
																 NOTE!
															</span>
															<span>
																 Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only
															</span>
                    </div>
                </div>
                <div class="margin-top-10">
                    <a href="#" class="btn green">
                        Submit
                    </a>
                    <a href="#" class="btn default">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
        <div id="tab_3-3" class="tab-pane">
            <form action="#">
                <div class="form-group">
                    <label class="control-label">Current Password</label>
                    <input type="password" class="form-control"/>
                </div>
                <div class="form-group">
                    <label class="control-label">New Password</label>
                    <input type="password" class="form-control"/>
                </div>
                <div class="form-group">
                    <label class="control-label">Re-type New Password</label>
                    <input type="password" class="form-control"/>
                </div>
                <div class="margin-top-10">
                    <a href="#" class="btn green">
                        Change Password
                    </a>
                    <a href="#" class="btn default">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
        <div id="tab_4-4" class="tab-pane">
            <form action="#">
                <table class="table table-bordered table-striped">
                    <tr>
                        <td>
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus..
                        </td>
                        <td>
                            <label class="uniform-inline">
                                <input type="radio" name="optionsRadios1" value="option1"/>
                                Yes </label>
                            <label class="uniform-inline">
                                <input type="radio" name="optionsRadios1" value="option2" checked/>
                                No </label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Enim eiusmod high life accusamus terry richardson ad squid wolf moon
                        </td>
                        <td>
                            <label class="uniform-inline">
                                <input type="checkbox" value=""/> Yes </label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Enim eiusmod high life accusamus terry richardson ad squid wolf moon
                        </td>
                        <td>
                            <label class="uniform-inline">
                                <input type="checkbox" value=""/> Yes </label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Enim eiusmod high life accusamus terry richardson ad squid wolf moon
                        </td>
                        <td>
                            <label class="uniform-inline">
                                <input type="checkbox" value=""/> Yes </label>
                        </td>
                    </tr>
                </table>
                <!--end profile-settings-->
                <div class="margin-top-10">
                    <a href="#" class="btn green">
                        Save Changes
                    </a>
                    <a href="#" class="btn default">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
<!--end col-md-9-->
</div>
</div>
<!--end tab-pane-->
<div class="tab-pane" id="tab_1_4">
    <div class="row">
        <div class="col-md-12">
            <div class="add-portfolio">
											<span>
												 502 Items sold this week
											</span>
                <a href="#" class="btn icn-only green">
                    Add a new Project <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>
    </div>
    <!--end add-portfolio-->
    <div class="row portfolio-block">
        <div class="col-md-5">
            <div class="portfolio-text">
                <img src="assets/img/profile/portfolio/logo_metronic.jpg" alt=""/>
                <div class="portfolio-text-info">
                    <h4>Metronic - Responsive Template</h4>
                    <p>
                        Lorem ipsum dolor sit consectetuer adipiscing elit.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-5 portfolio-stat">
            <div class="portfolio-info">
                Today Sold
											<span>
												 187
											</span>
            </div>
            <div class="portfolio-info">
                Total Sold
											<span>
												 1789
											</span>
            </div>
            <div class="portfolio-info">
                Earns
											<span>
												 $37.240
											</span>
            </div>
        </div>
        <div class="col-md-2">
            <div class="portfolio-btn">
                <a href="#" class="btn bigicn-only">
												<span>
													 Manage
												</span>
                </a>
            </div>
        </div>
    </div>
    <!--end row-->
    <div class="row portfolio-block">
        <div class="col-md-5 col-sm-12 portfolio-text">
            <img src="assets/img/profile/portfolio/logo_azteca.jpg" alt=""/>
            <div class="portfolio-text-info">
                <h4>Metronic - Responsive Template</h4>
                <p>
                    Lorem ipsum dolor sit consectetuer adipiscing elit.
                </p>
            </div>
        </div>
        <div class="col-md-5 portfolio-stat">
            <div class="portfolio-info">
                Today Sold
											<span>
												 24
											</span>
            </div>
            <div class="portfolio-info">
                Total Sold
											<span>
												 660
											</span>
            </div>
            <div class="portfolio-info">
                Earns
											<span>
												 $7.060
											</span>
            </div>
        </div>
        <div class="col-md-2 col-sm-12 portfolio-btn">
            <a href="#" class="btn bigicn-only">
											<span>
												 Manage
											</span>
            </a>
        </div>
    </div>
    <!--end row-->
    <div class="row portfolio-block">
        <div class="col-md-5 portfolio-text">
            <img src="assets/img/profile/portfolio/logo_conquer.jpg" alt=""/>
            <div class="portfolio-text-info">
                <h4>Metronic - Responsive Template</h4>
                <p>
                    Lorem ipsum dolor sit consectetuer adipiscing elit.
                </p>
            </div>
        </div>
        <div class="col-md-5 portfolio-stat">
            <div class="portfolio-info">
                Today Sold
											<span>
												 24
											</span>
            </div>
            <div class="portfolio-info">
                Total Sold
											<span>
												 975
											</span>
            </div>
            <div class="portfolio-info">
                Earns
											<span>
												 $21.700
											</span>
            </div>
        </div>
        <div class="col-md-2 portfolio-btn">
            <a href="#" class="btn bigicn-only">
											<span>
												 Manage
											</span>
            </a>
        </div>
    </div>
    <!--end row-->
</div>
<!--end tab-pane-->
<div class="tab-pane" id="tab_1_6">
<div class="row">
<div class="col-md-3">
    <ul class="ver-inline-menu tabbable margin-bottom-10">
        <li class="active">
            <a data-toggle="tab" href="#tab_1">
                <i class="fa fa-briefcase"></i> General Questions
            </a>
												<span class="after">
												</span>
        </li>
        <li>
            <a data-toggle="tab" href="#tab_2">
                <i class="fa fa-group"></i> Membership
            </a>
        </li>
        <li>
            <a data-toggle="tab" href="#tab_3">
                <i class="fa fa-leaf"></i> Terms Of Service
            </a>
        </li>
        <li>
            <a data-toggle="tab" href="#tab_1">
                <i class="fa fa-info-circle"></i> License Terms
            </a>
        </li>
        <li>
            <a data-toggle="tab" href="#tab_2">
                <i class="fa fa-tint"></i> Payment Rules
            </a>
        </li>
        <li>
            <a data-toggle="tab" href="#tab_3">
                <i class="fa fa-plus"></i> Other Questions
            </a>
        </li>
    </ul>
</div>
<div class="col-md-9">
<div class="tab-content">
<div id="tab_1" class="tab-pane active">
    <div id="accordion1" class="panel-group">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_1">
                        1. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry ?
                    </a>
                </h4>
            </div>
            <div id="accordion1_1" class="panel-collapse collapse in">
                <div class="panel-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_2">
                        2. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry ?
                    </a>
                </h4>
            </div>
            <div id="accordion1_2" class="panel-collapse collapse">
                <div class="panel-body">
                    Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
            </div>
        </div>
        <div class="panel panel-success">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_3">
                        3. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor ?
                    </a>
                </h4>
            </div>
            <div id="accordion1_3" class="panel-collapse collapse">
                <div class="panel-body">
                    Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
            </div>
        </div>
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_4">
                        4. Wolf moon officia aute, non cupidatat skateboard dolor brunch ?
                    </a>
                </h4>
            </div>
            <div id="accordion1_4" class="panel-collapse collapse">
                <div class="panel-body">
                    3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
            </div>
        </div>
        <div class="panel panel-danger">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_5">
                        5. Leggings occaecat craft beer farm-to-table, raw denim aesthetic ?
                    </a>
                </h4>
            </div>
            <div id="accordion1_5" class="panel-collapse collapse">
                <div class="panel-body">
                    3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_6">
                        6. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth ?
                    </a>
                </h4>
            </div>
            <div id="accordion1_6" class="panel-collapse collapse">
                <div class="panel-body">
                    3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_7">
                        7. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft ?
                    </a>
                </h4>
            </div>
            <div id="accordion1_7" class="panel-collapse collapse">
                <div class="panel-body">
                    3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et
                </div>
            </div>
        </div>
    </div>
</div>
<div id="tab_2" class="tab-pane">
    <div id="accordion2" class="panel-group">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#accordion2_1">
                        1. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry ?
                    </a>
                </h4>
            </div>
            <div id="accordion2_1" class="panel-collapse collapse in">
                <div class="panel-body">
                    <p>
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                    </p>
                    <p>
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                    </p>
                </div>
            </div>
        </div>
        <div class="panel panel-danger">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#accordion2_2">
                        2. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry ?
                    </a>
                </h4>
            </div>
            <div id="accordion2_2" class="panel-collapse collapse">
                <div class="panel-body">
                    Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
            </div>
        </div>
        <div class="panel panel-success">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#accordion2_3">
                        3. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor ?
                    </a>
                </h4>
            </div>
            <div id="accordion2_3" class="panel-collapse collapse">
                <div class="panel-body">
                    Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#accordion2_4">
                        4. Wolf moon officia aute, non cupidatat skateboard dolor brunch ?
                    </a>
                </h4>
            </div>
            <div id="accordion2_4" class="panel-collapse collapse">
                <div class="panel-body">
                    3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#accordion2_5">
                        5. Leggings occaecat craft beer farm-to-table, raw denim aesthetic ?
                    </a>
                </h4>
            </div>
            <div id="accordion2_5" class="panel-collapse collapse">
                <div class="panel-body">
                    3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#accordion2_6">
                        6. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth ?
                    </a>
                </h4>
            </div>
            <div id="accordion2_6" class="panel-collapse collapse">
                <div class="panel-body">
                    3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#accordion2_7">
                        7. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft ?
                    </a>
                </h4>
            </div>
            <div id="accordion2_7" class="panel-collapse collapse">
                <div class="panel-body">
                    3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et
                </div>
            </div>
        </div>
    </div>
</div>
<div id="tab_3" class="tab-pane">
    <div id="accordion3" class="panel-group">
        <div class="panel panel-danger">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#accordion3_1">
                        1. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry ?
                    </a>
                </h4>
            </div>
            <div id="accordion3_1" class="panel-collapse collapse in">
                <div class="panel-body">
                    <p>
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
                    </p>
                    <p>
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
                    </p>
                    <p>
                        Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                    </p>
                </div>
            </div>
        </div>
        <div class="panel panel-success">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#accordion3_2">
                        2. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry ?
                    </a>
                </h4>
            </div>
            <div id="accordion3_2" class="panel-collapse collapse">
                <div class="panel-body">
                    Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#accordion3_3">
                        3. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor ?
                    </a>
                </h4>
            </div>
            <div id="accordion3_3" class="panel-collapse collapse">
                <div class="panel-body">
                    Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#accordion3_4">
                        4. Wolf moon officia aute, non cupidatat skateboard dolor brunch ?
                    </a>
                </h4>
            </div>
            <div id="accordion3_4" class="panel-collapse collapse">
                <div class="panel-body">
                    3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#accordion3_5">
                        5. Leggings occaecat craft beer farm-to-table, raw denim aesthetic ?
                    </a>
                </h4>
            </div>
            <div id="accordion3_5" class="panel-collapse collapse">
                <div class="panel-body">
                    3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#accordion3_6">
                        6. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth ?
                    </a>
                </h4>
            </div>
            <div id="accordion3_6" class="panel-collapse collapse">
                <div class="panel-body">
                    3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#accordion3_7">
                        7. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft ?
                    </a>
                </h4>
            </div>
            <div id="accordion3_7" class="panel-collapse collapse">
                <div class="panel-body">
                    3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
<!--end tab-pane-->
</div>
</div>
<!--END TABS-->
</div>
</div>
<!-- END PAGE CONTENT-->