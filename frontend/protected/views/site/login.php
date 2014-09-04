<!DOCTYPE html>
<html lang="en" class="app">
<head>
    <meta charset="utf-8" />
    <title>Ringme2.com</title>
    <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/js/jPlayer/jplayer.flat.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/app.v1.css" type="text/css" />
    <!--[if lt IE 9]> <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/ie/html5shiv.js"></script> <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/ie/respond.min.js"></script> <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/ie/excanvas.js"></script> <![endif]-->
</head>
<body class="bg-info dker">
<section id="content" class="m-t-lg wrapper-md animated fadeInUp">
    <div class="container aside-xl"> <a class="navbar-brand block" href="index.html"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo2.png"><!--<span class="h1 font-bold">Ring</span>--></a>
        <section class="m-b-lg">
            <header class="wrapper text-center"> <strong>Sign in to get in touch</strong> </header>
            <?php echo CHtml::beginForm(Yii::app()->createUrl('site/login'), 'post'); ?>
                <div class="form-group">
                    <?php echo CHtml::emailField('LoginForm[username]', '', array('class' => 'form-control rounded input-lg text-center no-border', 'placeholder' => 'Email')); ?>
                </div>
                <div class="form-group">
                    <?php echo CHtml::passwordField('LoginForm[password]', '', array('class' => 'form-control rounded input-lg text-center no-border', 'placeholder' => 'Password')); ?>
                </div>
                <button type="submit" class="btn btn-lg btn-info btn-block rounded"><i class="icon-arrow-right pull-right"></i><span class="m-r-n-lg">Sign in</span></button>
                <div class="text-center m-t m-b"><a href="<?php echo Yii::app()->createUrl('site/forgot'); ?>"><small>Forgot password?</small></a></div>
                <div class="line line-dashed"></div>
                <a href="<?php echo Yii::app()->createUrl('site/signup'); ?>" class="btn btn-lg btn-info btn-block rounded">Create an account</a>
            <?php echo CHtml::endForm(); ?>
        </section>
    </div>
</section>
<!-- footer -->
<footer id="footer">
    <div class="text-center padder">
        <span> <small>Copyright&copy; 2014 Ringme2.com</small> </span>
    </div>
</footer>
<!-- / footer -->
<!-- Bootstrap -->
<!-- App -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/app.v1.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/app.plugin.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jPlayer/jquery.jplayer.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jPlayer/add-on/jplayer.playlist.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jPlayer/demo.js"></script>
</body>
</html>