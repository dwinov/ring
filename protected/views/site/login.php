<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <title>Ring | Admin Dashboard</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/js/ring/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/js/ring/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/js/ring/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/js/ring/select2/select2.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/js/ring/select2/select2-metronic.css"/>
    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- BEGIN THEME STYLES -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/ring/style-metronic.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/ring/style.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/ring/style-responsive.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/ring/plugins.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/ring/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/ring/pages/login.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/ring/custom.css" rel="stylesheet" type="text/css"/>
    <!-- END THEME STYLES -->
    <link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- BEGIN BODY -->
<body class="login">
<!-- BEGIN LOGO -->
<div class="logo">
    <a href="index.html">
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo-big.png" alt=""/>
    </a>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
<!-- BEGIN LOGIN FORM -->
<?php echo CHtml::beginForm(Yii::app()->createUrl('site/login'), 'post', array('id' => 'login-form', 'class' => 'login-form')); ?>
    <h3 class="form-title">Login to your account</h3>
    <div class="alert alert-danger display-hide">
        <button class="close" data-close="alert"></button>
			<span>
				 Enter any email and password.
			</span>
    </div>
    <div class="form-group">
        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
        <label class="control-label visible-ie8 visible-ie9">E-Mail</label>
        <div class="input-icon">
            <i class="fa fa-user"></i>
            <?php echo CHtml::textField('LoginForm[username]', '', array('placeholder' => 'Email', 'class' => 'form-control placeholder-no-fix')) ?>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">Password</label>
        <div class="input-icon">
            <i class="fa fa-lock"></i>
            <?php echo CHtml::passwordField('LoginForm[password]', '', array('class' => 'form-control placeholder-no-fix', 'autocomplete' => 'off', 'placeholder' => 'Password')) ?>
        </div>
    </div>
    <div class="form-actions">
        <button type="submit" class="btn green pull-right">
            Login <i class="m-icon-swapright m-icon-white"></i>
        </button>
    </div>

    <div class="forget-password">
        <h4>Forgot your password ?</h4>
        <p>
            no worries, click
            <a href="javascript:;" id="forget-password">
                here
            </a>
            to reset your password.
        </p>
    </div>
    <div class="create-account">
        <p>
            Don't have an account yet ?&nbsp;
            <a href="javascript:;" id="register-btn">
                Create an account
            </a>
        </p>
    </div>
<?php echo CHtml::endForm(); ?>
<!-- END LOGIN FORM -->
<!-- BEGIN FORGOT PASSWORD FORM -->
<form class="forget-form" action="index.html" method="post">
    <h3>Forget Password ?</h3>
    <p>
        Enter your e-mail address below to reset your password.
    </p>
    <div class="form-group">
        <div class="input-icon">
            <i class="fa fa-envelope"></i>
            <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email"/>
        </div>
    </div>
    <div class="form-actions">
        <button type="button" id="back-btn" class="btn">
            <i class="m-icon-swapleft"></i> Back </button>
        <button type="submit" class="btn green pull-right">
            Submit <i class="m-icon-swapright m-icon-white"></i>
        </button>
    </div>
</form>
<!-- END FORGOT PASSWORD FORM -->
<!-- BEGIN REGISTRATION FORM -->
<?php echo CHtml::beginForm(Yii::app()->createUrl('member/register'), 'post', array('id' => 'register-form', 'class' => 'register-form')); ?>
<h3>Sign Up</h3>
<p>
    Enter your account details below:
</p>
<div class="form-group">
    <label class="control-label visible-ie8 visible-ie9">Account Type</label>
        <?php echo CHtml::dropDownList('User[usr_type_id]', '', array(
            '' => '',
            '2' => 'Event Organizer',
            '3' => 'Venue',
            '4' => 'Member'
        ), array('class' => 'select2 form-control', 'id' => 'select2_sample4')) ?>
</div>
<div class="form-group">
    <label class="control-label visible-ie8 visible-ie9">First Name</label>
    <div class="input-icon">
        <i class="fa fa-font"></i>
        <?php echo CHtml::textField('Member[mem_first_name]', '', array('class' => 'form-control placeholder-no-fix', 'placeholder' => 'First Name')) ?>
    </div>
</div>
<div class="form-group">
    <label class="control-label visible-ie8 visible-ie9">Last Name</label>
    <div class="input-icon">
        <i class="fa fa-font"></i>
        <?php echo CHtml::textField('Member[mem_last_name]', '', array('class' => 'form-control placeholder-no-fix', 'placeholder' => 'Last Name')) ?>
    </div>
</div>
<div class="form-group">
    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
    <label class="control-label visible-ie8 visible-ie9">Email</label>
    <div class="input-icon">
        <i class="fa fa-envelope"></i>
        <?php echo CHtml::textField('User[usr_email]', '', array('class' => 'form-control placeholder-no-fix', 'placeholder' => 'Email')) ?>
    </div>
</div>
<div class="form-group">
    <label class="control-label visible-ie8 visible-ie9">Password</label>
    <div class="input-icon">
        <i class="fa fa-lock"></i>
        <?php echo CHtml::passwordField('User[usr_password]', '', array('class' => 'form-control placeholder-no-fix', 'autocomplete' => 'off', 'placeholder' => 'Password')) ?>
    </div>
</div>
<div class="form-group">
    <label class="control-label visible-ie8 visible-ie9">Re-type Your Password</label>
    <div class="controls">
        <div class="input-icon">
            <i class="fa fa-check"></i>
            <?php echo CHtml::passwordField('User[usr_rpassword]', '', array('class' => 'form-control placeholder-no-fix', 'autocomplete' => 'off', 'placeholder' => 'Re-type Your Password')) ?>
        </div>
    </div>
</div>
<div class="form-group">
    <label>
        <?php echo CHtml::checkBox('tnc', false); ?> I agree to the
        <a href="#">
            Terms of Service
        </a>
        and
        <a href="#">
            Privacy Policy
        </a>
    </label>
    <div id="register_tnc_error">
    </div>
</div>
<div class="form-actions">
    <button id="register-back-btn" type="button" class="btn">
        <i class="m-icon-swapleft"></i> Back </button>
    <button type="submit" id="register-submit-btn" class="btn green pull-right">
        Sign Up <i class="m-icon-swapright m-icon-white"></i>
    </button>
</div>
<?php echo CHtml::endForm(); ?>
<!-- END REGISTRATION FORM -->
</div>
<!-- END LOGIN -->
<!-- BEGIN COPYRIGHT -->
<div class="copyright">
    2014 &copy; Metronic. Admin Dashboard Template.
</div>
<!-- END COPYRIGHT -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/ring/respond.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/ring/excanvas.min.js"></script>
<![endif]-->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/ring/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/ring/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/ring/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/ring/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/ring/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/ring/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/ring/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/ring/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/ring/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/ring/select2/select2.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/ring/core/app.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/ring/custom/login.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
    jQuery(document).ready(function() {
        App.init();
        Login.init();
    });
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>