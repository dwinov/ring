<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 9/5/14
 * Time: 2:59 AM
 */
?>

<section class="vbox">
    <section class="scrollable wrapper-lg">
        <div class="row">
            <div class="col-sm-8">
                <div class="panel">
                    <!-- video player -->
                    <iframe width="680" height="383" src="<?php echo 'http://ringme2.com' . $event['evt_photo']; ?>" frameborder="0" allowfullscreen></iframe>
                    <!-- / video player -->
                    <div class="wrapper-lg">
                        <h2 class="m-t-none text-black"><?php echo $event['evt_name']; ?></h2>
                        <div class="post-sum">
                                <span><?php echo $event['evt_description']; ?></span>
                        </div>
                        <div class="line b-b"></div>
                        <div class="text-muted">
                            <i class="fa fa-home"></i> by <a href="#" class="m-r-sm"><?php echo $event['vn_name']; ?></a>
                            <i class="fa fa-clock-o icon-muted"></i> <?php echo $event['evt_hour']; ?>
                            <a href="#" class="m-l-sm"><i class="fa fa-calendar icon-muted"></i> <?php echo $event['evt_date'] . ' ' . $event['evt_month'] . ' ' . $event['evt_year']; ?></a>
                            <a href="#" class="m-l-sm"><i class="fa fa-location-arrow icon-muted"></i> Check Location</a> <br>
                            <a href="#" class="btn btn-s-md btn-info">Buy Ticket</a>
                        </div>
                    </div>
                </div>
                <h4 class="m-t-lg m-b">3 Comments</h4>
                <section class="comment-list block">
                    <article id="comment-id-1" class="comment-item">
                        <a class="pull-left thumb-sm">
                            <img src="images/a0.png" class="img-circle">
                        </a>
                        <section class="comment-body m-b">
                            <header> <a href="#"><strong>John smith</strong></a>
                                <label class="label bg-info m-l-xs">Editor</label> <span class="text-muted text-xs block m-t-xs"> 24 minutes ago </span>
                            </header>
                            <div class="m-t-sm"><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi id neque quam. Aliquam sollicitudin venenatis ipsum ac feugiat. Vestibulum.</span></div>
                        </section>
                    </article>
                    <!-- .comment-reply -->
                    <article id="comment-id-2" class="comment-item comment-reply">
                        <a class="pull-left thumb-sm">
                            <img src="images/a1.png" class="img-circle">
                        </a>
                        <section class="comment-body m-b">
                            <header> <a href="#"><strong>John smith</strong></a>
                                <label class="label bg-dark m-l-xs">Admin</label> <span class="text-muted text-xs block m-t-xs"> 26 minutes ago </span>
                            </header>
                            <div class="m-t-sm"><span>Lorem ipsum dolor sit amet, consecteter adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet.</span></div>
                        </section>
                    </article>
                    <!-- / .comment-reply -->
                    <article id="comment-id-2" class="comment-item">
                        <a class="pull-left thumb-sm">
                            <img src="images/a2.png" class="img-circle">
                        </a>
                        <section class="comment-body m-b">
                            <header> <a href="#"><strong>John smith</strong></a>
                                <label class="label bg-dark m-l-xs">Admin</label> <span class="text-muted text-xs block m-t-xs"> 26 minutes ago </span>
                            </header>
                            <blockquote class="m-t">
                                <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</span> <small>Someone famous in <cite title="Source Title">Source Title</cite></small>
                            </blockquote>
                            <div class="m-t-sm">Lorem ipsum dolor sit amet, consecteter adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet.</div>
                        </section>
                    </article>
                </section>
                <h4 class="m-t-lg m-b">Leave a comment</h4>
                <form>
                    <div class="form-group pull-in clearfix">
                        <div class="col-sm-6">
                            <label>Your name</label>
                            <input type="text" class="form-control" placeholder="Name">
                        </div>
                        <div class="col-sm-6">
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="Enter email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Comment</label>
                        <textarea class="form-control" rows="5" placeholder="Type your comment"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Submit comment</button>
                    </div>
                </form>
            </div>
            <div class="col-sm-4">
                <div class="panel panel-default">
                    <div class="panel-heading">Suggestions</div>
                    <div class="panel-body">
                        <?php foreach($other as $otr){ ?>
                        <article class="media">
                            <a href="<?php echo Yii::app()->createUrl('event/index', array('id' => $otr['evt_id'])); ?>" class="pull-left thumb-lg m-t-xs">
                                <img src="<?php echo 'http://ringme2.com' . $otr['evt_photo']; ?>">
                            </a>
                            <div class="media-body"> <a href="<?php echo Yii::app()->createUrl('event/index', array('id' => $otr['evt_id'])); ?>" class="font-semibold"><?php echo $otr['evt_name']; ?></a>
                                <div class="text-xs block m-t-xs">&nbsp;&nbsp;<?php echo $otr['evt_date'] . ' ' . $otr['evt_month'] . ' ' . $otr['evt_year'] . ' ' . $otr['evt_hour']; ?></div>
                            </div>
                        </article>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>