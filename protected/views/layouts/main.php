<?php
    // Yii::app()->clientScript->registerCoreScript('jquery');
    // Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl.'/js/core/demo/DemoDashboard.js', CClientScript::POS_END);
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <!--<title>Boostbox - Dashboard</title>-->
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>

        <!-- BEGIN META -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="your,keywords">
        <meta name="description" content="Short explanation about this website">
        <!-- END META -->

        <!-- BEGIN STYLESHEETS -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,300,400,600,700,800' rel='stylesheet' type='text/css'/>
        <link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/theme-default/bootstrap.css" />
        <link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/theme-default/boostbox.css" />
        <link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/theme-default/boostbox_responsive.css" />
        <link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/theme-default/font-awesome.min.css" />
        <link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/theme-default/libs/jquery-ui/jquery-ui-boostbox.css" />
        <link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/theme-default/libs/fullcalendar/fullcalendar.css" />

        <link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/theme-default/libs/blueimp-file-upload/jquery.fileupload.css" />
        <!-- END STYLESHEETS -->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/utils/html5shiv.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/utils/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

    <!-- BEGIN HEADER-->
    <header id="header">
        <!-- BEGIN NAVBAR -->
        <nav class="navbar navbar-default" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="btn btn-transparent btn-equal btn-menu" href="javascript:void(0);"><i class="fa fa-bars fa-lg"></i></a>
                <div class="navbar-brand">
                    <?php echo CHtml::link('<h3 class="text-light text-white"><span><strong>u</strong>Pi </span><i class="fa fa-android fa-fw"></i></h3>',
                        array('/site/index'),
                        array('class'=>'main-brand')); ?>
                </div><!--end .navbar-brand -->
                <a class="btn btn-transparent btn-equal navbar-toggle" data-toggle="collapse" data-target="#header-navbar-collapse"><i class="fa fa-wrench fa-lg"></i></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="header-navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><?php echo CHtml::link('<i class="fa fa-home fa-lg"></i>',array('/site/index')); ?></li>
                </ul><!--end .nav -->
                <ul class="nav navbar-nav navbar-right">
                    <li><span class="navbar-devider"></span></li>
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="navbar-profile dropdown-toggle text-bold" data-toggle="dropdown">
                            <?php echo Yii::app()->user->getState('name').' '.Yii::app()->user->getState('surname'); ?>
                            <i class="fa fa-fw fa-angle-down"></i> <img class="img-circle" src="<?php echo Yii::app()->request->baseUrl; ?>/img/avatar1.jpg" alt="" /></a>
                        <ul class="dropdown-menu animation-slide">
                            <li class="dropdown-header">Config</li>
                            <!--<li><a href="../../html/pages/profile.html">My profile</a></li>-->
                            <li><?php echo CHtml::link('My profile',array('user/view', 'id'=>Yii::app()->user->getId())); ?></li>
                            <li class="divider"></li>
                            <li><?php echo CHtml::link('<i class="fa fa-fw fa-power-off text-danger"></i>Log out',array('/site/logout')); ?></li>
                        </ul><!--end .dropdown-menu -->
                    </li><!--end .dropdown -->
                </ul><!--end .nav -->
            </div><!--end #header-navbar-collapse -->
        </nav>
        <!-- END NAVBAR -->
    </header>
    <!-- END HEADER-->

    <!-- BEGIN BASE-->
    <div id="base">

    <!-- BEGIN SIDEBAR-->
    <div id="sidebar">
        <div class="sidebar-back"></div>
        <div class="sidebar-content">
            <div class="nav-brand">
                <?php echo CHtml::link('<h3 class="text-light text-white"><span><strong>u</strong>Pi </span><i class="fa fa-android fa-fw"></i></h3>',
                    array('/site/index'),
                    array('class'=>'main-brand')); ?>
            </div>

            <!-- BEGIN MENU SEARCH -->
            <form class="sidebar-search" role="search">
                <a href="javascript:void(0);"><i class="fa fa-search fa-fw search-icon"></i><i class="fa fa-angle-left fa-fw close-icon"></i></a>
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" class="form-control navbar-input" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-equal" type="button"><i class="fa fa-search"></i></button>
                                    </span>
                    </div>
                </div>
            </form>
            <!-- END MENU SEARCH -->

            <!-- BEGIN MAIN MENU -->

            <?php // TODO: menu with yii components (active <a>) ?>
            <?php if(Yii::app()->user->getState('rol') === 'admin') { ?>
            <?php $this->widget('application.components.MyMenu',array(
                'activateItemsOuter'=>false,
                'linkLabelWrapper' => 'span',
                'activateItems' => true,
                'id' => 'search-type',

                'encodeLabel'=>false,
                'htmlOptions'=>array('class'=>'main-menu'),
                // 'activeCssClass'=>'active',
                'items'=>array(
                    array('label'=>'<i class="fa fa-home fa-fw"></i><span class="title">Home</span>', 'url'=>array('/site/index'),),
                    array('label'=>'<i class="fa fa-users fa-fw"></i><span class="title">Users</span>', 'url'=>array('/user/index')),

                    array('label'=>'<i class="fa fa-tags fa-fw"></i><span class="title">Subject</span>', 'url'=>array('/subject/index'), ),
                    array('label'=>'<i class="fa fa-copy fa-fw"></i><span class="title">Documents</span>', 'url'=>array('/document/index')),
                    array('label'=>'<i class="fa fa-calendar fa-fw"></i><span class="title">Registrations</span>', 'url'=>array('/userSubject/index')),
                    array('label'=>'<i class="fa fa-calendar fa-fw"></i><span class="title">Attendances</span>', 'url'=>array('/attendance/index')),
                    array('label'=>'<i class="fa fa-users fa-fw"></i><span class="title">Annotations</span>', 'url'=>array('/userAttendance/index')),
                    array('label'=>'<i class="fa fa-laptop fa-fw"></i><span class="title">Devices</span>', 'url'=>array('/device/index')),

                    // array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
                    // array('label'=>'Contact', 'url'=>array('/site/contact')),
                    // array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                    // array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
                ),
            )); ?>
            <?php } else { ?>
                <?php $this->widget('application.components.MyMenu',array(
                    'activateItemsOuter'=>false,
                    'linkLabelWrapper' => 'span',
                    'activateItems' => true,
                    'id' => 'search-type',

                    'encodeLabel'=>false,
                    'htmlOptions'=>array('class'=>'main-menu'),
                    // 'activeCssClass'=>'active',
                    'items'=>array(
                        array('label'=>'<i class="fa fa-home fa-fw"></i><span class="title">Home</span>', 'url'=>array('/site/index'),),
                        array('label'=>'<i class="fa fa-tags fa-fw"></i><span class="title">Subject</span>', 'url'=>array('/subject/index'), ),
                        array('label'=>'<i class="fa fa-copy fa-fw"></i><span class="title">Documents</span>', 'url'=>array('/document/index')),
                        array('label'=>'<i class="fa fa-calendar fa-fw"></i><span class="title">Attendances</span>', 'url'=>array('/attendance/index')),
                        array('label'=>'<i class="fa fa-users fa-fw"></i><span class="title">Annotations</span>', 'url'=>array('/userAttendance/index')),
                    ),
                )); ?>
            <?php } ?>

            <!--
            <ul class="main-menu">
                <!-- Menu Dashboard
                <li>
                    <a href="http://localhost/upi/" class="active">
                        <i class="fa fa-home fa-fw"></i><span class="title">Home</span>
                    </a>
                </li><!--end /menu-item
                <li>
                    <a href="http://localhost/upi/user/create">
                        <i class="fa fa-home fa-fw"></i><span class="title">Dashboard</span>
                    </a>
                </li><!--end /menu-item
                <!-- Menu UI
                <li>
                    <a href="javascript:void(0);">
                        <i class="fa fa-puzzle-piece fa-fw"></i><span class="title">UI features</span> <span class="expand-sign">+</span>
                    </a>
                    <!--start submenu
                    <ul>
                        <li><a href="../../html/ui/boxes.html" >Boxes</a></li>
                        <li><a href="../../html/ui/buttons.html" >Buttons</a></li>
                        <li><a href="../../html/ui/grid.html" >Grid</a></li>
                        <li><a href="../../html/ui/lists.html" >Lists</a></li>
                        <li><a href="../../html/ui/tabs-accordions.html" >Tabs & Accordions</a></li>
                        <li><a href="../../html/ui/typography.html" >Typography</a></li>
                        <li><a href="../../html/ui/icons.html" >Icons</a></li>
                        <li><a href="../../html/ui/messages.html" >Messages</a></li>
                    </ul><!--end /submenu
                </li><!--end /menu-item -->
                <!-- Menu Pages
                <li>
                    <a href="javascript:void(0);">
                        <i class="fa fa-file fa-fw"></i><span class="title">Pages</span> <span class="expand-sign">+</span>
                    </a>
                    <!--start submenu
                    <ul>
                        <li><a href="../../html/pages/profile.html" >User profile<span class="badge">42</span></a></li>
                        <li><a href="../../html/pages/invoice.html" >Invoice</a></li>
                        <li><a href="../../html/pages/calendar.html" >Calendar</a></li>
                        <li><a href="../../html/pages/pricing.html" >Pricing</a></li>
                        <li>
                            <a href="javascript:void(0);">
                                <span class="expand-sign">+</span> <span class="title">Blog</span>
                            </a>
                            <!--start submenu
                            <ul>
                                <li><a href="../../html/pages/blog/masonry.html" >Blog masonry</a></li>
                                <li><a href="../../html/pages/blog/list.html" >Blog list</a></li>
                                <li><a href="../../html/pages/blog/post.html" >Blog post</a></li>
                            </ul><!--end /submenu
                        </li><!--end /menu-item
                        <li><a href="../../html/pages/locked.html" >Lock screen</a></li>
                        <li><a href="../../html/pages/login.html" >Login</a></li>
                        <li>
                            <a href="javascript:void(0);">
                                <span class="expand-sign">+</span> <span class="title">Error pages</span>
                            </a>
                            <!--start submenu
                            <ul>
                                <li><a href="../../html/pages/404.html" >404 page</a></li>
                                <li><a href="../../html/pages/500.html" >500 page</a></li>
                            </ul><!--end /submenu
                        </li><!--end /menu-item
                        <li><a href="../../html/pages/blank.html" >Blank page</a></li>
                    </ul><!--end /submenu
                </li><!--end /menu-item -->
                <!-- Menu Tables
                <li>
                    <a href="javascript:void(0);">
                        <i class="fa fa-th fa-fw"></i><span class="title">Tables</span> <span class="expand-sign">+</span>
                    </a>
                    <!--start submenu
                    <ul>
                        <li><a href="../../html/tables/static.html" >Static Tables</a></li>
                        <li><a href="../../html/tables/dynamic.html" >Dynamic Tables</a></li>
                        <li><a href="../../html/tables/responsive.html" >Responsive Table</a></li>
                    </ul><!--end /submenu
                </li><!--end /menu-item -->
                <!-- Menu Forms
                <li>
                    <a href="javascript:void(0);">
                        <i class="fa fa-list fa-fw"></i><span class="title">Forms</span> <span class="expand-sign">+</span>
                    </a>
                    <!--start submenu
                    <ul>
                        <li><a href="../../html/forms/layouts.html" >Form layouts</a></li>
                        <li><a href="../../html/forms/components.html" >Form components</a></li>
                        <li><a href="../../html/forms/editors.html" >Editors</a></li>
                        <li><a href="../../html/forms/fileupload.html" >File upload</a></li>
                        <li><a href="../../html/forms/validation.html" >Form validation</a></li>
                        <li><a href="../../html/forms/wizard.html" >Form wizard</a></li>
                    </ul><!--end /submenu
                </li><!--end /menu-item -->
                <!-- Menu Charts
                <li>
                    <?php // echo CHtml::link('<i class="fa fa-bar-chart-o fa-fw"></i><span class="title">Visual charts</span>',array('user/index')); ?>
                    <!--
                    <a href="../../html/charts/chart.html" >
                        <i class="fa fa-bar-chart-o fa-fw"></i><span class="title">Visual charts</span>
                    </a>

                </li><!--end /menu-item -->
                <!-- Menu Levels
                <li>
                    <a href="javascript:void(0);">
                        <i class="fa fa-folder-open fa-fw"></i><span class="title">Menu levels</span> <span class="expand-sign">+</span>
                    </a>
                    <!--start submenu
                    <ul>
                        <li><a href="#"><span class="title">Item 1</span></a></li>
                        <li><a href="#"><span class="title">Item 1</span></a></li>
                        <li>
                            <a href="javascript:void(0);">
                                <span class="expand-sign">+</span> <span class="title">Open level 2</span>
                            </a>
                            <!--start submenu
                            <ul>
                                <li><a href="#"><span class="title">Item 2</span></a></li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <span class="expand-sign">+</span> <span class="title">Open level 3</span>
                                    </a>
                                    <!--start submenu
                                    <ul>
                                        <li><a href="#"><span class="title">Item 3</span></a></li>
                                        <li><a href="#"><span class="title">Item 3</span></a></li>
                                        <li>
                                            <a href="javascript:void(0);">
                                                <span class="expand-sign">+</span> <span class="title">Open level 4</span>
                                            </a>
                                            <!--start submenu
                                            <ul>
                                                <li><a href="#"><span class="title">Item 4</span></a></li>
                                                <li>
                                                    <a href="javascript:void(0);">
                                                        <span class="expand-sign">+</span> <span class="title">Open level 5</span>
                                                    </a>
                                                    <!--start submenu
                                                    <ul>
                                                        <li><a href="#"><span class="title">Item 5</span></a></li>
                                                        <li><a href="#"><span class="title">Item 5</span></a></li>
                                                    </ul><!--end /submenu
                                                </li><!--end /submenu-item
                                            </ul><!--end /submenu
                                        </li><!--end /submenu-item
                                    </ul><!--end /submenu
                                </li><!--end /submenu-item
                            </ul><!--end /submenu
                        </li><!--end /submenu-item
                    </ul><!--end /submenu
                </li><!--end /menu-item
            </ul><!--end .main-menu
            <!-- END MAIN MENU -->

        </div>
    </div><!--end #sidebar-->
    <!-- END SIDEBAR -->

    <!-- BEGIN CONTENT-->
    <div id="content">

        <section>
            <?php if(isset($this->breadcrumbs)):?>
                <?php $this->widget('application.components.BreadCrumb', array(
                        'delimiter' => '',
                        'crumbs'=>$this->breadcrumbs,
                    )
                );
                ?>
            <?php endif?>

            <div class="section-header">
                <h3 class="text-standard"><i class="fa fa-fw fa-arrow-circle-right text-gray-light"></i> <?php echo $this->title; ?></h3>
            </div>

            <div class="section-body">
                <?php echo $content; ?>
            </div><!--end .section-body -->

        </section>

    </div><!--end #content-->
    <!-- END CONTENT -->

    </div><!--end #base-->
    <!-- END BASE -->

    <!-- BEGIN JAVASCRIPT -->
    <!-- START FILE UPLOAD TEMPLATES -->
    <script id="template-upload" type="text/x-tmpl">
			{% for (var i=0, file; file=o.files[i]; i++) { %}
			<tr class="template-upload fade">
				<td>
					<span class="preview"></span>
				</td>
				<td>
					<p class="name">{%=file.name%}</p>
					<strong class="error text-danger"></strong>
				</td>
				<td>
					<p class="size">Processing...</p>
					<div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
				</td>
				<td>
					{% if (!i && !o.options.autoUpload) { %}
					<button class="btn btn-primary start" disabled>
						<i class="glyphicon glyphicon-upload"></i>
						<span>Start</span>
					</button>
					{% } %}
					{% if (!i) { %}
					<button class="btn btn-warning cancel">
						<i class="glyphicon glyphicon-ban-circle"></i>
						<span>Cancel</span>
					</button>
					{% } %}
				</td>
			</tr>
			{% } %}
    </script>
    <script id="template-download" type="text/x-tmpl">
			{% for (var i=0, file; file=o.files[i]; i++) { %}
			<tr class="template-download fade">
				<td>
					<span class="preview">
						{% if (file.thumbnailUrl) { %}
						<a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
						{% } %}
					</span>
				</td>
				<td>
					<p class="name">
						{% if (file.url) { %}
						<a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
						{% } else { %}
						<span>{%=file.name%}</span>
						{% } %}
					</p>
					{% if (file.error) { %}
					<div><span class="label label-danger">Error</span> {%=file.error%}</div>
					{% } %}
				</td>
				<td>
					<span class="size">{%=o.formatFileSize(file.size)%}</span>
				</td>
				<td>
					{% if (file.deleteUrl) { %}
					<button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
						<i class="glyphicon glyphicon-trash"></i>
						<span>Delete</span>
					</button>
					<input type="checkbox" name="delete" value="1" class="toggle">
					{% } else { %}
					<button class="btn btn-warning cancel">
						<i class="glyphicon glyphicon-ban-circle"></i>
						<span>Cancel</span>
					</button>
					{% } %}
				</td>
			</tr>
			{% } %}
    </script>
    <!-- END FILE UPLOAD TEMPLATES -->

    <!--[if lte IE 8]-->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/excanvas-modified/excanvas.min.js"></script>
    <!--[endif]-->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/jquery/jquery-1.11.0.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/jquery/jquery-migrate-1.2.1.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/jquery-ui/jquery-ui-1.10.3.custom.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/core/BootstrapFixed.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/bootstrap/bootstrap.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/spin.js/spin.min.js"></script>

    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/moment/moment.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/flot/jquery.flot.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/flot/jquery.flot.time.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/flot/jquery.flot.resize.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/flot/jquery.flot.orderBars.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/flot/jquery.flot.pie.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/jquery-knob/jquery.knob.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/sparkline/jquery.sparkline.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/fullcalendar/fullcalendar.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/core/demo/DemoCharts.js"></script>

    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/core/App.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/core/demo/Demo.js"></script>

    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/jquery-validation/dist/additional-methods.min.js"></script>

    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/blueimp-file-upload/vendor/jquery.ui.widget.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/blueimp-file-upload/vendor/tmpl.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/blueimp-file-upload/vendor/load-image.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/blueimp-file-upload/vendor/jquery.blueimp-gallery.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/blueimp-file-upload/jquery.iframe-transport.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/blueimp-file-upload/jquery.fileupload.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/blueimp-file-upload/jquery.fileupload-process.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/blueimp-file-upload/jquery.fileupload-image.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/blueimp-file-upload/jquery.fileupload-audio.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/blueimp-file-upload/jquery.fileupload-video.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/blueimp-file-upload/jquery.fileupload-validate.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/blueimp-file-upload/jquery.fileupload-ui.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/blueimp-file-upload/main.js"></script>

    <!--[if (gte IE 8)&(lt IE 10)]>
    <script src='<?php echo Yii::app()->request->baseUrl; ?>/js/libs/blueimp-file-upload/cors/jquery.xdr-transport.js'></script>
    <![endif]-->

    <!-- END JAVASCRIPT -->

    </body>
</html>
