<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 9/3/14
 * Time: 6:40 PM
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
    <!--[if lt IE 9]>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/ie/html5shiv.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/ie/respond.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/ie/excanvas.js"></script>
    <![endif]-->
</head>
<body class="bg-info dker">
<section id="content" class="m-t-lg wrapper-md animated fadeInDown">
    <div class="container aside-xl"> <a class="navbar-brand block" href="index.html"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo2.png"><!--<span class="h1 font-bold">Ring</span>--></a>
        <section class="m-b-lg">
            <header class="wrapper text-center"> <strong>Sign up to find interesting thing</strong> </header>
            <?php echo CHtml::beginForm(Yii::app()->createUrl('site/register'), 'post'); ?>
                <div class="form-group">
                    <?php echo CHtml::hiddenField('User[usr_type_id]', 4); ?>
                    <?php echo CHtml::hiddenField('Member[mem_gender]', '', array('id' => 'gender')); ?>
                    <?php echo CHtml::textField('Member[mem_first_name]', '', array('class' => 'form-control rounded input-lg text-center no-border', 'placeholder' => 'First Name')); ?>
                </div>
                <div class="form-group">
                    <?php echo CHtml::textField('Member[mem_last_name]', '', array('class' => 'form-control rounded input-lg text-center no-border', 'placeholder' => 'Last Name')); ?>
                </div>
                <div class="form-group">
                    <?php echo CHtml::emailField('User[usr_email]', '', array('class' => 'form-control rounded input-lg text-center no-border', 'placeholder' => 'Email')); ?>
                </div>
                <div class="form-group">
                    <?php echo CHtml::passwordField('User[usr_password]', '', array('class' => 'form-control rounded input-lg text-center no-border', 'placeholder' => 'Password')); ?>
                </div>
                <div class="form-group">
                    <?php echo CHtml::passwordField('repassword', '', array('class' => 'form-control rounded input-lg text-center no-border', 'placeholder' => 'Re-password')); ?>
                </div>

                <div class="m-b-sm" style="text-align:center;">
                    <div class="btn-group">
                        <button type="button" id="gen-male" class="btn btn-default">Male</button>
                        <button type="button" id="gen-female" class="btn btn-default">Female</button>
                    </div>
                </div>

<!--                <div class="checkbox i-checks m-b">-->
                    <label class="m-l">
                        <input type="checkbox" id="tnc" name="tnc">
                        <i></i> Agree the <a href="#">terms and policy</a> </label>
<!--                </div>-->
                <button type="submit" id="btn-signup" disabled class="btn btn-lg btn-info btn-block btn-rounded"><i class="icon-arrow-right pull-right"></i><span class="m-r-n-lg">Sign up</span></button>
                <div class="line line-dashed"></div>
                <p class="text-muted text-center"><small>Already have an account?</small></p>
                <a href="<?php echo Yii::app()->createUrl('site/login'); ?>" class="btn btn-lg btn-info btn-block btn-rounded">Sign in</a>
            <?php echo CHtml::endForm(); ?>
        </section>
    </div>
</section>
<!-- footer -->
<footer id="footer">
    <div class="text-center padder clearfix">
        <p> <small>Copyright&copy; 2014 Ringme2.com</small> </p>
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
<script type="text/javascript">
    $(document).ready(function(){
        $('#tnc').click(function(){
            if($(this).is(':checked'))
            {
                $('#btn-signup').removeAttr('disabled');
            }else{
                $('#btn-signup').attr('disabled', 'disabled');
            }
        });

        $('#gen-male').click(function(){
            $('#gender').val(1);
            console.log($('#gender').val());
        });

        $('#gen-female').click(function(){
            $('#gender').val(0);
            console.log($('#gender').val());
        });
    });
</script>
</body>
</html>