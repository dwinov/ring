<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html> <!--<![endif]-->
<head>
    <title>Ring - Login</title>

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

    <!-- Theme -->
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/new/style.min.css?1359188708" />

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
                <div class="profile heading">
                    <?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/logologin.png', 'Logo', array('width' => 90)); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row-fluid rrow main">
        <div class="span12 main col" role="main">
            <div class="row-fluid rrow">
                <div class="span2 col main-left hide login menu-large">
                    <div class="rrow scroll-y-left">
                        <div class="iScrollWrapper">
                            <ul>
                                <li class="glyphicons home"><a href="index.html?lang=en"><i></i><span>Dashboard</span></a></li>
                                <li class="glyphicons coins"><a href="finances.html?lang=en"><i></i><span>Finances</span></a></li>
                                <li class="hasSubmenu2">
                                    <a data-toggle="collapse" class="glyphicons shopping_cart" href="#menu_ecommerce"><i></i><span>Online Shop</span></a>
                                    <ul class="collapse" id="menu_ecommerce">
                                        <li class=""><a href="products.html?lang=en" class="glyphicons show_thumbnails"><i></i><span>Products</span></a></li>
                                        <!-- <li class=""><a href="categories.html?lang=en" class="glyphicons show_big_thumbnails"><i></i><span>Categories</span></a></li> -->
                                        <li class=""><a href="product_edit.html?lang=en" class="glyphicons cart_in"><i></i><span>Add product</span></a></li>
                                        <!-- <li class=""><a href="orders.html?lang=en" class="glyphicons list"><i></i><span>Orders</span></a></li> -->
                                    </ul>
                                </li>
                                <li class="glyphicons sort"><a href="pages.html?lang=en"><i></i><span>Site Pages</span></a></li>
                                <li class="glyphicons picture"><a href="gallery.html?lang=en"><i></i><span>Photo Gallery</span></a></li>
                                <li class="glyphicons adress_book"><a href="bookings.html?lang=en"><i></i><span>Bookings</span></a></li>
                                <li class="glyphicons charts"><a href="charts.html?lang=en"><i></i><span>Charts</span></a></li>
                                <li class="glyphicons cogwheels"><a href="ui.html?lang=en"><i></i><span>UI Elements</span></a></li>
                                <li class="hasSubmenu2">
                                    <a data-toggle="collapse" class="glyphicons show_thumbnails_with_lines" href="#menu_forms"><i></i><span>Forms</span></a>
                                    <ul class="collapse" id="menu_forms">
                                        <li class=""><a href="form_demo.html?lang=en" class="glyphicons user"><i></i><span>My Account</span></a></li>
                                        <li class=""><a href="form_elements.html?lang=en" class="glyphicons show_big_thumbnails"><i></i><span>Form Elements</span></a></li>
                                        <li class=""><a href="form_validator.html?lang=en" class="glyphicons circle_ok"><i></i><span>Form Validator</span></a></li>
                                        <!-- <li class=""><a href="form_wizzard.html?lang=en" class="glyphicons share_alt"><i></i><span>Form Wizzard</span></a></li> -->
                                        <li class=""><a href="file_managers.html?lang=en" class="glyphicons file_import"><i></i><span>File Managers</span></a></li>
                                    </ul>
                                </li>
                                <li class="hasSubmenu2">
                                    <a data-toggle="collapse" class="glyphicons table" href="#menu_tables"><i></i><span>Tables</span></a>
                                    <ul class="collapse" id="menu_tables">
                                        <li class=""><a href="tables.html?lang=en" class="glyphicons show_thumbnails"><i></i><span>Classic Tables</span></a></li>
                                        <li class=""><a href="tables_themed.html?lang=en" class="glyphicons show_thumbnails"><i></i><span>Themed Tables</span></a></li>
                                        <li class=""><a href="tables_enhanced.html?lang=en" class="glyphicons show_thumbnails"><i></i><span>Enhanced Tables</span></a></li>
                                    </ul>
                                </li>
                                <li class="glyphicons calendar"><a href="calendar.html?lang=en"><i></i><span>Calendar</span></a></li>
                            </ul>
                        </div>
							<span class="navarrow hide">
								<span class="glyphicons circle_arrow_down"><i></i></span>
							</span>
                    </div>
                </div>
                <div class="span10 col main-right login">
                    <div class="rrow scroll-y" id="mainYScroller">
                        <div class="inner topRight"><div class="positionWrapper loginWrapper hide">
                                <span class="line"></span>
                                <div class="box-1 loginbox">
                                    <div class="inner">
                                        <?php echo CHtml::beginForm(Yii::app()->createUrl('site/login'), 'post', array('class' => 'fts')); ?>
                                        <fieldset>
                                            <legend>Login</legend>
                                            <hr class="separator bottom" style="margin-bottom: 10px;" />
                                            <div class="input-prepend input-full">
                                                <span class="add-on glyphicons user"><i></i></span>
                                                <?php echo CHtml::textField('LoginForm[username]', '', array('placeholder' => 'Email')) ?>
                                            </div>
                                            <div class="input-prepend input-full">
                                                <span class="add-on glyphicons lock"><i></i></span>
                                                <?php echo CHtml::passwordField('LoginForm[password]', '', array('placeholder' => 'Password')) ?>
                                            </div>
                                            <a href="" class="glyphicons circle_question_mark forgot">forgot password <i></i></a>
                                            <hr class="separator bottom" style="margin-bottom: 10px;" />
                                            <?php echo CHtml::submitButton('Login',array('class'=>'btn btn-icon btn-block glyphicons right flash btn-primary')); ?>
                                        </fieldset>
                                        <?php echo CHtml::endForm(); ?>
                                    </div>
                                </div>
                                <div class="btn-register">
                                    <a href="#" class="btn btn-icon btn-success glyphicons edit"><i></i>Register</a>
                                </div>
                            </div>

                            <div>
                                <div class="positionWrapper registerWrapper hide">
                                    <span class="line"></span>
                                    <div class="box-1 registerbox">
                                        <div class="inner">
                                            <?php echo CHtml::beginForm(Yii::app()->createUrl('member/register'), 'post', array('class' => 'fts')); ?>
                                                <?php echo CHtml::dropDownList('User[usr_type_id]', '', array(
                                                    '' => '- Choose Account Type -',
                                                    '2' => 'Event Organizer',
                                                    '3' => 'Venue'
                                                )); ?>
                                                <?php echo CHtml::textField('Member[mem_first_name]', '', array('placeholder' => 'First Name')); ?>
                                                <?php echo CHtml::textField('Member[mem_last_name]', '', array('placeholder' => 'Last Name')); ?>
                                                <?php echo CHtml::textField('User[usr_email]', '', array('placeholder' => 'Email')); ?>
                                                <?php echo CHtml::passwordField('User[usr_password]', '', array('placeholder' => 'Password')) ?>
                                                <?php echo CHtml::passwordField('User[repassword]', '', array('placeholder' => 'Re-type Password')); ?>
                                                <div class="toggle-button" data-toggleButton-width="220"
                                                     data-toggleButton-label-enabled="Male"
                                                     data-toggleButton-label-disabled="Female"
                                                     data-toggleButton-height="35"
                                                     data-toggleButton-font-lineHeight="35px">
                                                    <input type="checkbox" checked="checked" name="Member[mem_gender]" />
                                                </div>
                                                <?php echo CHtml::textField('Member[mem_phone]', '', array('placeholder' => 'Phone Number')); ?>
                                                <?php echo CHtml::textField('Member[mem_birthdate]', '', array('class' => 'datepickerold', 'placeholder' => 'Birthdate')); ?>
<!--                                                <label class="checkbox">-->
                                                    <input name="tnc" type="checkbox" id="termcon" class="checkbox" value="1" style="margin:0 -117px 0 -114px !important;" />
                                                    I AGREE WITH THE TERM AND CONDITIONS
<!--                                                </label>-->
                                                <button type="submit" id="btn-register" class="btn btn-icon btn-block glyphicons right edit btn-success" disabled>Register<i></i></button>
                                            <?php echo CHtml::endForm(); ?>
                                        </div>
                                    </div>
                                    <div class="btn-login">
                                        <a href="#" class="btn btn-icon btn-primary glyphicons unlock"><i></i>Login</a>
                                    </div>
                                </div>
                            </div>							</div>
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
                <li><a href="documentation.html?lang=en" class="glyphicons circle_question_mark text" title=""><i></i><span class="hidden-phone">Documentation</span></a></li>
            </ul>
        </div>
    </div>

</div>

<!-- Cubiq iScroll -->
<!--[if gte IE 9]><!-->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/cubiq-iscroll/src/iscroll.js"></script>
<!--<![endif]-->

<!--[if lt IE 9]>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/cubiq-iscroll/src/iscroll-ie.js"></script>
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



<!-- Resize Script -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.ba-resize.js"></script>

<!-- Uniform -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/pixelmatrix-uniform/jquery.uniform.min.js"></script>

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

<!-- Custom Onload Script -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/load.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#termcon').click(function(){
            if($('#btn-register').prop('disabled') == true)
            {
                $('#btn-register').prop('disabled', false);
            }else{
                $('#btn-register').prop('disabled', true);
            }
        });
    });
</script>

</body>
</html>