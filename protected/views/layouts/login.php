<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $this->pageTitle=Yii::app()->name; ?> - Log in</title>

    <!-- BEGIN META -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="your,keywords">
    <meta name="description" content="Short explanation about this website">
    <!-- END META -->

    <!-- BEGIN STYLESHEETS -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,300,400,600,700,800' rel='stylesheet' type='text/css'/>
    <link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/theme-default/bootstrap.css?1403937764" />
    <link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/theme-default/boostbox.css?1403937765" />
    <link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/theme-default/boostbox_responsive.css?1403937765" />
    <link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/theme-default/font-awesome.min.css?1401481653" />
    <!-- END STYLESHEETS -->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]-->
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/utils/html5shiv.js?1401481649"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/utils/respond.min.js?1401481651"></script>
    <!--[endif]-->
</head>
<body class="body-dark">
<!-- START LOGIN BOX -->
<div class="box-type-login">
    <div class="box text-center">
        <div class="box-head">
            <h2 class="text-light text-white"><strong>u</strong>Pi <i class="fa fa-android fa-fw"></i></h2>
            <h4 class="text-light text-inverse-alt">An ubiquitous learning environment</h4>
        </div>
        <div class="box-body box-centered style-inverse">
            <h2 class="text-light">Log in to your account</h2>
            <br/>

            <?php echo $content; ?>

        </div><!--end .box-body -->
        <div class="box-footer force-padding text-white">
            <a class="text-primary-alt" href="">Forgot your password?</a>
        </div>
    </div>
</div>
<!-- END LOGIN BOX -->

<!-- BEGIN JAVASCRIPT -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/jquery/jquery-1.11.0.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/jquery/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/core/BootstrapFixed.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/bootstrap/bootstrap.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/spin.js/spin.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/core/App.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/core/demo/Demo.js"></script>
<!-- END JAVASCRIPT -->

</body>
</html>
