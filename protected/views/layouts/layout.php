<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/10/14
 * Time: 10:57 AM
 */
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ring - A Ring of People</title>

    <!-- Meta -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <!-- Bootstrap -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />

    <!-- Bootstrap Extended -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/extend/jasny-bootstrap/css/jasny-bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/extend/jasny-bootstrap/css/jasny-bootstrap-responsive.min.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/extend/bootstrap-wysihtml5/css/bootstrap-wysihtml5-0.0.2.css" rel="stylesheet">

    <!-- JQueryUI v1.9.2 -->
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui-1.9.2.custom/css/smoothness/jquery-ui-1.9.2.custom.min.css" />

    <!-- Glyphicons -->
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/new/glyphicons.css" />

    <!-- Bootstrap Extended -->
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/extend/bootstrap-select/bootstrap-select.css" />
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/extend/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" />

    <!-- Uniform -->
    <link rel="stylesheet" media="screen" href="<?php echo Yii::app()->request->baseUrl; ?>/js/pixelmatrix-uniform/css/uniform.default.css" />

    <!-- JQuery v1.8.2 -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.8.2.min.js"></script>

    <!-- Modernizr -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/modernizr.custom.76094.js"></script>

    <!-- MiniColors -->
    <link rel="stylesheet" media="screen" href="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-miniColors/jquery.miniColors.css" />

    <!-- plupload -->
    <style type="text/css">@import url(<?php echo Yii::app()->request->baseUrl; ?>/js/plupload/js/jquery.plupload.queue/css/jquery.plupload.queue.css);</style>

    <!-- Theme -->
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/new/style.min.css?1358876495" />

    <!--  Css for maps  -->
    <style type="text/css">
        .popin {
            background:#fff;
            padding:15px;
            box-shadow: 0 0 20px #999;
            border-radius:2px;
        }

        #map {
            height:300px;
            background:#6699cc;
        }
    </style>

    <!-- Google Analytics -->
    <script type="text/javascript">

        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-36057737-1']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();

    </script>

    <!-- LESS 2 CSS -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/less-1.3.3.min.js"></script>
</head>
<body>

<!-- Start Content -->
<div class="container-fluid left-menu">

<div class="navbar main">
    <div class="innerpx">
        <button type="button" class="btn btn-navbar hidden-desktop hidden-tablet">
            <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
        </button>
        <div class="positionWrapper">
            <span class="line"></span>
            <div class="profile">
                <?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/HisHerImage.jpg', 'Profile', array('class' => 'avatar')); ?>
                <span class="info hidden-phone">
                    <strong>Adrian Demian</strong>
                    <em>Content Manager</em>
                </span>
            </div>
            <ul class="topnav hidden-phone">
                <li>
                    <a href="<?php echo Yii::app()->createUrl('site/logout'); ?>" class="logout glyphicons lock"><i></i><span>Logout</span></a>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="row-fluid rrow main">
<div class="span12 main col" role="main">
<div class="row-fluid rrow">
<div class="span2 col main-left hide hidden-phone menu-large">
    <div class="rrow scroll-y-left">
        <div class="iScrollWrapper">
            <ul class="navigasi">
                <li class="glyphicons home"><a href="<?php echo Yii::app()->createUrl('dashboard/index'); ?>"><i></i><span>Dashboard</span></a></li>
                <li class="glyphicons user"><a href="<?php echo Yii::app()->createUrl('member/index'); ?>"><i></i><span>Profile</span></a></li>
                <?php if(Yii::app()->user->roleid == 2){ ?>
                    <li class="glyphicons group"><a href="<?php echo Yii::app()->createUrl('eo/update', array('id' => 1, 'user_id' => Yii::app()->user->usrid)); ?>"><i></i><span>Event Organizer</span></a></li>
                <?php }else{ ?>
                    <li class="glyphicons group"><a href="<?php echo Yii::app()->createUrl('eo/index'); ?>"><i></i><span>Event Organizer</span></a></li>
                <?php } ?>
                <li class="glyphicons globe_af"><a href="<?php echo Yii::app()->createUrl('venue/index'); ?>"><i></i><span>Venue</span></a></li>
                <li class="glyphicons calendar"><a href="<?php echo Yii::app()->createUrl('event/index'); ?>"><i></i><span>Event</span></a></li>
            </ul>
        </div>
        <span class="navarrow hide">
            <span class="glyphicons circle_arrow_down"><i></i></span>
        </span>
    </div>
</div>
<div class="span10 col main-right">
    <div class="rrow scroll-y" id="mainYScroller">
        <div class="inner topRight">

            <?php echo $content; ?>

            <br/>
        </div>
    </div>
</div>
</div>
</div>

<!-- End Content -->
</div>

<!-- Sticky Footer -->
<div id="footer" class="hide">
    <div class="wrap">
        <ul>
            <li class="active"><span data-toggle="menu-position" data-menu-position="left-menu" class="glyphicons circle_arrow_left" title=""><i></i></span></li>
            <li><span data-toggle="menu-position" data-menu-position="right-menu" class="glyphicons circle_arrow_right" title=""><i></i></span></li>
            <li><span data-toggle="menu-position" data-menu-position="top-menu" class="glyphicons circle_arrow_top" title=""><i></i></span></li>
            <li class="divider"></li>
            <li class="active"><span data-toggle="menu-size" data-menu-size="0" class="glyphicons show_big_thumbnails text" title=""><i></i><span class="hidden-phone">Large menus</span></span></li>
            <li><span data-toggle="menu-size" data-menu-size="1" class="glyphicons show_thumbnails text" title=""><i></i><span class="hidden-phone">Small menus</span></span></li>
        </ul>
    </div>
</div>

</div>

<!-- Cubiq iScroll -->
<!--[if gte IE 9]><!-->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/cubiq-iscroll/src/iscroll.js"></script>

<script type="text/javascript">
    var scrollers = [];
    var mainYScroller;

    $(function()
    {
        //document.addEventListener('touchmove', function(e){ e.preventDefault(); });
        var xScrollers = document.getElementsByClassName("scroll-x");
        for (var i = 0; i < xScrollers.length; i++)
            scrollers.push(new iScroll(xScrollers[i], {
                vScroll: false,
                hideScrollbar: true,
                onBeforeScrollStart: function (e) {
                    var target = e.target;
                    while (target.nodeType != 1) target = target.parentNode;

                    if (target.tagName != 'SELECT' && target.tagName != 'INPUT' && target.tagName != 'TEXTAREA')
                        e.preventDefault();
                }
            }));

        var yScrollers = $('.scroll-y').not('#mainYScroller');
        $.each(yScrollers, function(i,v)
        {
            var scroller = new iScroll($(v).attr('id'),
                {
                    hScroll: false,
                    hideScrollbar: true,
                    onBeforeScrollStart: function (e)
                    {
                        var target = e.target;
                        while (target.nodeType != 1) target = target.parentNode;

                        if (target.tagName != 'SELECT' &&
                            target.tagName != 'INPUT' &&
                            target.tagName != 'TEXTAREA' &&
                            $(target).parents('table-responsive').size() == 0)
                            e.preventDefault();
                    }
                });
            scrollers.push(scroller);
        });

        mainYScroller = new iScroll('mainYScroller',
            {
                zoom: true,
                hScroll: false,
                hideScrollbar: true,
                onBeforeScrollStart: function (e)
                {
                    var target = e.target;
                    while (target.nodeType != 1) target = target.parentNode;

                    if ($('input:focus, textarea:focus').length) $('input:focus, textarea:focus').blur();

                    if ($(target).parents('.table-responsive').size() > 0 ||
                        $(target).parents('.google-visualization-table-table').size() > 0 ||
                        $(target).parents('#calendar').size() > 0 ||
                        $(target).is('.btn'))
                    {
                        return true;
                    }

                    if (target.tagName != 'SELECT' &&
                        target.tagName != 'INPUT' &&
                        target.tagName != 'TEXTAREA')
                        e.preventDefault();
                },
                onScrollEnd: function()
                {
                    //if (mainYScroller.enabled == false) mainYScroller.enable();
                }
            });
        scrollers['mainYScroller'] = mainYScroller;
    });
</script>
<!--<![endif]-->

<!-- JQueryUI v1.9.2 -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui-1.9.2.custom/js/jquery-ui-1.9.2.custom.min.js"></script>

<!-- JQueryUI Touch Punch -->
<!-- small hack that enables the use of touch events on sites using the jQuery UI user interface library -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

<!-- MiniColors -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-miniColors/jquery.miniColors.js"></script>

<!-- Themer -->
<script>
    var themerPrimaryColor = '#DA4C4C',
        themerHeaderColor = '#393D41',
        themerMenuColor = '#232628';
</script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.cookie.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/themer.js"></script>


<script type="text/javascript" src="https://www.google.com/jsapi"></script>

<!--  Flot (Charts) JS -->
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/flot/excanvas.min.js"></script><![endif]-->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/flot/jquery.flot.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/flot/jquery.flot.pie.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/flot/jquery.flot.tooltip.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/flot/jquery.flot.selection.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/flot/jquery.flot.resize.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/flot/jquery.flot.orderBars.js" type="text/javascript"></script>

<!-- Resize Script -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.ba-resize.js"></script>

<!-- Uniform -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/pixelmatrix-uniform/jquery.uniform.min.js"></script>

<!-- DataTables -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/DataTables/media/js/jquery.dataTables.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/DataTables/media/js/DT_bootstrap.js"></script>

<!-- Bootstrap Script -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/js/bootstrap.min.js"></script>

<!-- Bootstrap Extended -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/extend/bootstrap-select/bootstrap-select.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/extend/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/extend/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/extend/jasny-bootstrap/js/jasny-bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/extend/jasny-bootstrap/js/bootstrap-fileupload.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/extend/bootbox.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/extend/bootstrap-wysihtml5/js/wysihtml5-0.3.0_rc2.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/extend/bootstrap-wysihtml5/js/bootstrap-wysihtml5-0.0.2.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui-timepicker-addon.js" type="text/javascript"></script>
<script type="text/javascript" src="//maps.google.com/maps/api/js?sensor=true"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/gmaps.js" type="text/javascript"></script>

<!-- Custom Onload Script -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/load.js"></script>

<!-- Third party script for BrowserPlus runtime (Google Gears included in Gears runtime now) -->
<script type="text/javascript" src="http://bp.yahooapis.com/2.4.21/browserplus-min.js"></script>

<!-- Load plupload and all it's runtimes and finally the jQuery queue widget -->
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/plupload/js/plupload.full.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/plupload/js/jquery.plupload.queue/jquery.plupload.queue.js"></script>

<script>
    //Load the Visualization API and the piechart package.
    google.load('visualization', '1.0', {'packages':['table', 'corechart']});

    // Set a callback to run when the Google Visualization API is loaded.
//    google.setOnLoadCallback(charts.traffic_sources_dataTables.init);
</script>

<script type="text/javascript">
    $(document).ready(function(){
        window.onload = function(){
            setNavigation();
        }

        function setNavigation()
        {
            var path = window.location.pathname;
            path = path.replace(/\/$/, "");
            path = decodeURIComponent(path);

            $(".navigasi a").each(function () {
                var href = $(this).attr('href');
                if(path.substring(0, href.length) === href){
                    $(this).closest('li').addClass('active');
                }
            });
        }
    });
</script>

<?php $this->renderClip('js-page-end'); ?>

</body>
</html>