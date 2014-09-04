<section class="vbox">
<section class="scrollable padder-lg w-f-md" id="bjax-target">
<div class="pull-right text-muted m-t-lg i-lg inline">
    <div class="btn-group">
        <button class="btn btn-success dropdown-toggle" data-toggle="dropdown">Sort By <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
            <li><a href="#">Current Events</a>
            </li>
            <li><a href="#">Pass Events</a>
            </li>
            <li><a href="#">Future Events</a>
            </li>
        </ul>
    </div>
</div>

<h2 class="font-thin m-b">Discover  Events
                        <span class="musicbar animate inline m-l-sm" style="width:20px;height:20px">
                            <span class="bar1 a1 bg-primary lter"></span>
                            <span class="bar2 a2 bg-info lt"></span>
                            <span class="bar3 a3 bg-success"></span>
                            <span class="bar4 a4 bg-warning dk"></span>
                            <span class="bar5 a5 bg-danger dker"></span>
                        </span>
</h2>

<div class="row">
    <div class="col-lg-12">

        <?php foreach($event as $evt){ ?>

        <div class="polaroid">
            <div class="image">
                <!--div class="inner-shadow"></div-->
                <a href="<?php echo Yii::app()->createUrl('event/index', array('id' => $evt['evt_id'])); ?>">
                    <div class="wrapper" style="background-image:url('<?php echo 'http://ringme2.com' . $evt['evt_photo']; ?>')"></div>
                </a>
                <a href="#" target="_blank">
                    <div class="avatar" style="background-image:url('<?php echo 'http://ringme2.com' . $evt['eo_photo']; ?>')"></div>
                </a>
                <div class="time-ago"><?php echo $evt['evt_date'] . ' ' . $evt['evt_month'] . ' ' . $evt['evt_year']; ?></div>
                <a class="handle" href="#" target="_blank"><?php echo $evt['evt_name']; ?></a>
                <div class="caption"><?php echo $evt['vn_name']; ?></div>
                <div class="caption2">Organized by <?php echo $evt['eo_name']; ?></div>
            </div>
            <div class="shadow"></div>
        </div>
        <div class="pull-right text-muted m-t-lg i-lg inline">
            <p>
                <a class="btn btn-default" id="btn-1" href="#btn-1" data-toggle="class:btn-success"> <i class="fa fa-cloud-upload text"></i>  <span class="text">Upload</span>  <i class="fa fa-check text-active"></i>  <span class="text-active">Success</span>
                </a>
                <a class="btn btn-default" data-toggle="button"> <i class="fa fa-heart-o text"></i> <i class="fa fa-heart text-active text-danger"></i>
                </a>
                <a class="btn btn-default" data-toggle="button"> <span class="text"> <i class="fa fa-thumbs-up text-success"></i> 25 </span>  <span class="text-active"> <i class="fa fa-thumbs-down text-danger"></i> 10 </span>
                </a>
            </p>
        </div>
        <?php } ?>
    </div>
</div>

<div class="row m-t-lg m-b-lg">
    <div class="col-lg-12">
        <div class="bg-black wrapper-md r">
                                              <span class="h4 m-b-xs block">
                                                   <i class="icon-cloud-download i-lg"></i> Download our app For <a href="#"> Android </a> & <a href="#">iOS</a></span>
            <span class="text-muted">Get the mobile apps to start Discover Events at anywhere and anytime.</span>

        </div>
    </div>
</div>
</section>
</section>
</section>