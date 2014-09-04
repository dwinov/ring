<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/10/14
 * Time: 10:57 AM
 */
?>

<!DOCTYPE html>
<html lang="en" class="app">


<head>
    <meta charset="utf-8" />
    <title>Ringme2.com</title>
    <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/js/jPlayer/jplayer.flat.css" type="text/css" />

    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/app.v1.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" type="text/css" />
    <!--[if lt IE 9]>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/ie/html5shiv.js">
    </script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/ie/respond.min.js">
    </script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/ie/excanvas.js">
    </script> <![endif]-->
</head>

<body class="">
<section class="vbox">

<header class="bg-white-only header header-md navbar navbar-fixed-top-xs">

    <div class="navbar-header aside bg-info">
        <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html"> <i class="icon-list"></i>
        </a>
        <a href="index.html" class="navbar-brand text-lt">
            <!--i class="icon-earphones"></i-->
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png" alt=".">

                    <span class="hidden-nav-xs m-l-sm">Ringme2
</span>
        </a>
        <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".user"> <i class="icon-settings"></i>
        </a>
    </div>
    <ul class="nav navbar-nav hidden-xs">
        <li>
            <a href="#nav,.navbar-header" data-toggle="class:nav-xs,nav-xs" class="text-muted"> <i class="fa fa-indent text"></i>  <i class="fa fa-dedent text-active"></i>
            </a>
        </li>
    </ul>

    <form class="navbar-form navbar-left input-s-lg m-t m-l-n-xs hidden-xs" role="search">

        <div class="form-group">

            <div class="input-group">

                        <span class="input-group-btn"> <button type="submit" class="btn btn-sm bg-white btn-icon rounded"><i class="fa fa-search"></i></button>
</span>
                <input type="text" class="form-control input-sm no-border rounded" placeholder="Search Event...">
            </div>
        </div>
    </form>

    <div class="navbar-right ">
        <ul class="nav navbar-nav m-n hidden-xs nav-user user">
            <li class="hidden-xs">
                <a href="#" class="dropdown-toggle lt" data-toggle="dropdown"> <i class="icon-bell"></i>

                            <span class="badge badge-sm up bg-danger count">2
</span>
                </a>
                <section class="dropdown-menu aside-xl animated fadeInUp">
                    <section class="panel bg-white">

                        <div class="panel-heading b-light bg-light"> <strong>You have

<span class="count">2
</span> notifications</strong>
                        </div>

                        <div class="list-group list-group-alt">
                            <a href="#" class="media list-group-item">

                                        <span class="pull-left thumb-sm"> <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/a0.png" alt="..." class="img-circle">
</span>

                                        <span class="media-body block m-b-none"> Use awesome animate.css
<br> <small class="text-muted">10 minutes ago</small>
</span>
                            </a>
                            <a href="#" class="media list-group-item">

                                        <span class="media-body block m-b-none"> 1.0 initial released
<br> <small class="text-muted">1 hour ago</small>
</span>
                            </a>
                        </div>

                        <div class="panel-footer text-sm"> <a href="#" class="pull-right"><i class="fa fa-cog"></i></a>  <a href="#notes" data-toggle="class:show animated fadeInRight">See all the notifications</a>
                        </div>
                    </section>
                </section>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle bg clear" data-toggle="dropdown">

                            <span class="thumb-sm avatar pull-right m-t-n-sm m-b-n-sm m-l-sm"> <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/a0.png" alt="...">
</span> John.Smith <b class="caret"></b>
                </a>
                <ul class="dropdown-menu animated fadeInRight">
                    <li>

                                <span class="arrow top">
</span>  <a href="#">Settings</a>
                    </li>
                    <li> <a href="profile.html">Profile</a>
                    </li>
                    <li>
                        <a href="#">

                                    <span class="badge bg-danger pull-right">3
</span> Notifications</a>
                    </li>
                    <li> <a href="#">Help</a>
                    </li>
                    <li class="divider"></li>
                    <li> <a href="<?php echo Yii::app()->createUrl('site/logout'); ?>">Logout</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</header>
<section>
<section class="hbox stretch">
<!-- .aside -->
<aside class="bg-black dk aside hidden-print" id="nav">
    <section class="vbox">
        <section class="w-f-md scrollable">
            <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">
                <!-- nav -->
                <nav class="nav-primary hidden-xs">
                    <ul class="nav bg clearfix">
                        <li class="hidden-nav-xs padder m-t m-b-sm text-xs text-muted">Discover</li>
                        <li>
                            <a href="index.html"> <i class="icon-disc icon text-success"></i>
                                <span class="font-bold">What's new</span>
                            </a>
                        </li>
                        <li>
                            <a href="genres.html"> <i class="icon-music-tone-alt icon text-info"></i>
                                <span class="font-bold">Genres</span>
                            </a>
                        </li>
                        <li>
                            <a href="myringers.html"> <i class="icon-users icon text-primary-lter"></i>  <b class="badge bg-primary pull-right">6</b>
                                <span class="font-bold">My Ringers</span>
                            </a>
                        </li>
                        <li>
                            <a href="video.html" data-target="#content" data-el="#bjax-el" data-replace="true"> <i class="icon-picture icon text-primary"></i>
                                <span class="font-bold">Gallery</span>
                            </a>
                        </li>
                        <li class="m-b hidden-nav-xs"></li>
                    </ul>
                    <ul class="nav bg clearfix">
                        <li class="hidden-nav-xs padder m-t m-b-sm text-xs text-muted">My Account</li>
                        <li>
                            <a href="profile.html"> <i class="icon-user icon text-success"></i>
                                <span class="font-bold">My Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="myticket.html"> <i class="icon-tag icon text-info"></i>
                                <span class="font-bold">My Ticket</span>
                            </a>
                        </li>
                        <li>
                            <a href="#.html"> <i class="icon-calendar icon text-primary-lter"></i>  <b class="badge bg-primary pull-right">6</b>
                                <span class="font-bold">My Events</span>
                            </a>
                        </li>
                        <li>
                            <a href="timeline.html" data-target="#content" data-el="#bjax-el" data-replace="true"> <i class="icon-note icon text-primary"></i>
                                <span class="font-bold">Event Planning</span>
                            </a>
                        </li>
                        <li class="m-b hidden-nav-xs"></li>
                    </ul>
                </nav>
                <!-- / nav -->
            </div>
        </section>
        <footer class="footer hidden-xs no-padder text-center-nav-xs">
        </footer>
    </section>
</aside>
<!-- /.aside -->
<section id="content">
    <section class="hbox stretch">
        <section>

            <?php echo $content; ?>

        <!-- side content -->
        <aside class="aside-md bg-light dk" id="sidebar">
            <section class="vbox animated fadeInRight">
                <section class="w-f-md scrollable hover">
                    <h4 class="font-thin m-l-md m-t">My Ringers Connected</h4>
                    <ul class="list-group no-bg no-borders auto m-t-n-xxs">
                        <li class="list-group-item">
                            <span class="pull-left thumb-xs m-t-xs avatar m-l-xs m-r-sm">
                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/m20.jpg" alt="..." class="img-circle">
                                <i class="on b-light right sm"></i>
                            </span>

                            <div class="clear">
                                <div><a href="chatscreen.html">Eka Prasyanti</a>
                                </div> <small class="text-muted">Manchester</small>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <span class="pull-left thumb-xs m-t-xs avatar m-l-xs m-r-sm">
                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/a2.png" alt="...">
                                <i class="on b-light right sm"></i>
                            </span>

                            <div class="clear">
                                <div><a href="#">Amanda Conlan</a>
                                </div> <small class="text-muted">France</small>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <span class="pull-left thumb-xs m-t-xs avatar m-l-xs m-r-sm">
                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/a3.png" alt="...">
                                <i class="busy b-light right sm"></i>
                            </span>

                            <div class="clear">
                                <div><a href="#">Dan Doorack</a>
                                </div> <small class="text-muted">Hamburg</small>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <span class="pull-left thumb-xs m-t-xs avatar m-l-xs m-r-sm">
                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/a4.png" alt="...">
                                <i class="away b-light right sm"></i>
                            </span>

                            <div class="clear">
                                <div><a href="#">Lauren Taylor</a>
                                </div> <small class="text-muted">London</small>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <span class="pull-left thumb-xs m-t-xs avatar m-l-xs m-r-sm">
                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/a5.png" alt="..." class="img-circle">
                                <i class="on b-light right sm"></i>
                            </span>

                            <div class="clear">
                                <div><a href="#">Chris Fox</a>
                                </div> <small class="text-muted">Milan</small>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <span class="pull-left thumb-xs m-t-xs avatar m-l-xs m-r-sm">
                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/a6.png" alt="...">
                                <i class="on b-light right sm"></i>
                            </span>

                            <div class="clear">
                                <div><a href="#">Amanda Conlan</a>
                                </div> <small class="text-muted">Copenhagen</small>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <span class="pull-left thumb-xs m-t-xs avatar m-l-xs m-r-sm">
                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/a7.png" alt="...">
                                <i class="busy b-light right sm"></i>
                            </span>

                            <div class="clear">
                                <div><a href="#">Dan Doorack</a>
                                </div> <small class="text-muted">Barcelona</small>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <span class="pull-left thumb-xs m-t-xs avatar m-l-xs m-r-sm">
                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/a8.png" alt="...">
                                <i class="away b-light right sm"></i>
                            </span>

                            <div class="clear">
                                <div><a href="#">Lauren Taylor</a>
                                </div> <small class="text-muted">Tokyo</small>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <span class="pull-left thumb-xs m-t-xs avatar m-l-xs m-r-sm">
                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/a9.png" alt="..." class="img-circle">
                                <i class="on b-light right sm"></i>
                            </span>

                            <div class="clear">
                                <div><a href="#">Chris Fox</a>
                                </div> <small class="text-muted">UK</small>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <span class="pull-left thumb-xs m-t-xs avatar m-l-xs m-r-sm">
                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/a1.png" alt="...">
                                <i class="on b-light right sm"></i>
                            </span>

                            <div class="clear">
                                <div><a href="#">Amanda Conlan</a>
                                </div> <small class="text-muted">Africa</small>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <span class="pull-left thumb-xs m-t-xs avatar m-l-xs m-r-sm">
                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/a2.png" alt="...">
                                <i class="busy b-light right sm"></i>
                            </span>

                            <div class="clear">
                                <div><a href="#">Dan Doorack</a>
                                </div> <small class="text-muted">Paris</small>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <span class="pull-left thumb-xs m-t-xs avatar m-l-xs m-r-sm">
                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/a3.png" alt="...">
                                <i class="away b-light right sm"></i>
                            </span>

                            <div class="clear">
                                <div><a href="#">Lauren Taylor</a>
                                </div> <small class="text-muted">Brussels</small>
                            </div>
                        </li>
                    </ul>
                </section>
                <footer class="footer footer-md bg-black">

                    <form class="" role="search">

                        <div class="form-group clearfix m-b-none">

                            <div class="input-group m-t m-b">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-sm bg-empty text-muted btn-icon"><i class="fa fa-search"></i></button>
                                </span>
                                <input type="text" class="form-control input-sm text-white bg-empty b-b b-dark no-border" placeholder="Search members">
                            </div>
                        </div>
                    </form>
                </footer>
            </section>
        </aside>
        <!-- / side content -->
    </section>
    <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a>
</section>
</section>
</section>
</section>
<!-- Bootstrap -->
<!-- App -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/app.v1.js">
</script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/app.plugin.js">
</script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jPlayer/jquery.jplayer.min.js">
</script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jPlayer/add-on/jplayer.playlist.min.js">
</script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jPlayer/demo.js">
</script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/file-input/bootstrap-filestyle.min.js"></script>
</body>

<!-- Mirrored from flatfull.com/themes/musik/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 07 Aug 2014 06:52:38 GMT -->

</html>