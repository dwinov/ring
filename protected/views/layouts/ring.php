<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/4/14
 * Time: 12:46 PM
 */
?>

<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html> <!--<![endif]-->
<head>
    <title>RING</title>



    <!-- Meta -->
    <meta charset="UTF-8" />
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
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/js/club/jquery-ui-1.9.2.custom/css/smoothness/jquery-ui-1.9.2.custom.min.css" />

    <!-- Glyphicons -->
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/club/glyphicons.css" />

    <!-- Bootstrap Extended -->
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/extend/bootstrap-select/bootstrap-select.css" />
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/extend/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" />

    <!-- Uniform -->
    <link rel="stylesheet" media="screen" href="<?php echo Yii::app()->request->baseUrl; ?>/js/club/pixelmatrix-uniform/css/uniform.default.css" />

    <!-- JQuery v1.8.2 -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/club/jquery-1.8.2.min.js"></script>

    <!-- Modernizr -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/club/modernizr.custom.76094.js"></script>

    <!-- MiniColors -->
    <link rel="stylesheet" media="screen" href="<?php echo Yii::app()->request->baseUrl; ?>/js/club/jquery-miniColors/jquery.miniColors.css" />

    <!-- Theme -->
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/club/style.min.css?1359188857" />

    <link type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/css/bootstrap-timepicker.min.css" />

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
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/club/less-1.3.3.min.js"></script>

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
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/club/logo/logo.png" class="avatar" alt="Profile" />
						<span class="info hidden-phone">
							<strong>FKKCLUB.NL</strong>
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
                            <li class="glyphicons home"><a href="<?php echo Yii::app()->createUrl('company/dashboard'); ?>"><i></i><span>Dashboard</span></a></li>
                            <li class="glyphicons star currentScroll"><a href="<?php echo Yii::app()->createUrl('company/clubs'); ?>"><i></i><span>Club Profile</span></a></li>
                            <li class="glyphicons calendar"><a href="<?php echo Yii::app()->createUrl('event/list'); ?>"><i></i><span>Manage Event</span></a></li>
                            <li class="hasSubmenu2">
                                <a data-toggle="collapse" class="glyphicons check" href="#review_menu"><i></i><span>Review</span></a>
                                <ul class="collapse" id="review_menu">
                                    <li class="glyphicons check"><a href="<?php echo Yii::app()->createUrl('review/admin', array("id" => 1)); ?>"><i></i><span>Club Review</span></a></li>
                                    <li class="glyphicons check"><a href="<?php echo Yii::app()->createUrl('review/event', array("id" => 2)); ?>"><i></i><span>Events Review</span></a></li>
                                </ul>
                            </li>
                            <li class="glyphicons envelope"><a href="<?php echo Yii::app()->createUrl('company/broadcast'); ?>"><i></i><span>Broadcast Message</span></a></li>
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

</div>
</div>
</div>
</div>
</div>
<!-- End Content -->
</div>
</div>

<!-- Cubiq iScroll -->
<!--[if gte IE 9]><!-->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/club/cubiq-iscroll/src/iscroll.js"></script>
<!--<![endif]-->

<!--[if lt IE 9]>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/club/cubiq-iscroll/src/iscroll-ie.js"></script>
<![endif]-->

<script type="text/javascript">
    var scrollers = [];
    var mainYScroller;

    $(function()
    {
        //document.addEventListener('touchmove', function(e){ e.preventDefault(); });
        var xScrollers = $(".scroll-x");
        for (var i = 0; i < xScrollers.length; i++)
            scrollers.push(new iScroll(xScrollers[i], {
                vScroll: false,
                hideScrollbar: true,
                useTransform: $('html').is('.lt-ie9') ? false : true,
                onBeforeScrollStart: function (e)
                {
                    var target;
                    if (!e) var e = window.event;
                    if (e.target) target = e.target;
                    else if (e.srcElement) target = e.srcElement;
                    if (target.nodeType == 3) target = target.parentNode;

                    if (target.tagName != 'SELECT' && target.tagName != 'INPUT' && target.tagName != 'TEXTAREA')
                    {
                        if (e.preventDefault) e.preventDefault();
                        else e.returnValue = false;
                    }
                }
            }));

        var yScrollers = $('.scroll-y').not('#mainYScroller');
        $.each(yScrollers, function(i,v)
        {
            var scroller = new iScroll($(v).attr('id'),
                {
                    hScroll: false,
                    hideScrollbar: true,
                    useTransform: $('html').is('.lt-ie9') ? false : true,
                    onBeforeScrollStart: function (e)
                    {
                        var target;
                        if (!e) var e = window.event;
                        if (e.target) target = e.target;
                        else if (e.srcElement) target = e.srcElement;
                        if (target.nodeType == 3) target = target.parentNode;

                        if (target.tagName != 'SELECT' &&
                            target.tagName != 'INPUT' &&
                            target.tagName != 'TEXTAREA' &&
                            $(target).parents('table-responsive').size() == 0)
                        {
                            if (e.preventDefault) e.preventDefault();
                            else e.returnValue = false;
                        }
                    }
                });
            scrollers.push(scroller);
        });

        mainYScroller = new iScroll('mainYScroller',
            {
                zoom: true,
                hScroll: false,
                hideScrollbar: true,
                useTransform: $('html').is('.lt-ie9') ? false : true,
                onBeforeScrollStart: function (e)
                {
                    var target;
                    if (!e) var e = window.event;
                    if (e.target) target = e.target;
                    else if (e.srcElement) target = e.srcElement;
                    if (target.nodeType == 3) target = target.parentNode;

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
                    {
                        if (e.preventDefault) e.preventDefault();
                        else e.returnValue = false;
                    }
                },
                onScrollEnd: function()
                {
                    //if (mainYScroller.enabled == false) mainYScroller.enable();
                }
            });
        scrollers['mainYScroller'] = mainYScroller;
    });
</script>

<!-- JQueryUI v1.9.2 -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/club/jquery-ui-1.9.2.custom/js/jquery-ui-1.9.2.custom.min.js"></script>

<!-- JQueryUI Touch Punch -->
<!-- small hack that enables the use of touch events on sites using the jQuery UI user interface library -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/club/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

<!-- MiniColors -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/club/jquery-miniColors/jquery.miniColors.js"></script>

<!-- Themer -->
<script>
    var themerPrimaryColor = '#DA4C4C',
        themerHeaderColor = '#393D41',
        themerMenuColor = '#232628';
</script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/club/jquery.cookie.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/club/themer.js"></script>



<!-- Resize Script -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/club/jquery.ba-resize.js"></script>

<!-- Uniform -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/club/pixelmatrix-uniform/jquery.uniform.min.js"></script>

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
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/club/DataTables/media/js/jquery.dataTables.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/club/DatatableReloadAjax.js"></script>
<!-- timepicker -->
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/js/bootstrap-timepicker.min.js"></script>

<!-- Custom Onload Script -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/club/load.js"></script>

<script type="text/javascript">
    $('.timepicker1').timepicker({
        template: true,
        showInputs: false,
        minuteStep: 5,
        defaultTime: false
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        window.onload = function(){
            setNavigation();
        }
//        $(function(){
//            setNavigation();
//        });

        function setNavigation()
        {
            var path = window.location.pathname;
            path = path.replace(/\/$/, "");
            path = decodeURIComponent(path);

            $(".navigasi a").each(function () {
                var href = $(this).attr('href');
                if(path.substring(0, href.length)  + '/' === href){
                    $(this).closest('li').addClass('active');
                    if($(this).parents('.collapse').attr('id') == "review_menu")
                    {
                        $(this).parents('.hasSubmenu2').children('a').addClass('collapsed');
//                        $('.collapse').collapse('hide');
                    }
                }
            });
        }
    });
</script>

<?php $this->renderClip('js-page-end'); ?>

</body>
</html>