<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <head>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <meta name="MobileOptimized" content="320">
        
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/jquery-slider/css/jquery.sidr.light.css" rel="stylesheet" type="text/css" media="screen"/>
        <!-- BEGIN CORE CSS FRAMEWORK -->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/animate.min.css" rel="stylesheet" type="text/css"/>
        
        <!-- BEGIN CSS TEMPLATE -->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/responsive.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/custom-icon-set.css" rel="stylesheet" type="text/css"/>
        <!-- END CSS TEMPLATE -->
        
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" type="text/css">
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.css" rel="stylesheet" type="text/css">


        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/boostrap-slider/css/slider.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/jquery-slider/css/jquery.sidchat-window-wrapperr.light.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/boostrap-checkbox/css/bootstrap-checkbox.css" rel="stylesheet" type="text/css" media="screen"/>

    </head>

    <body>
    <?php
        $this->widget('ext.fancybox.EFancyBox', array(
            'target' => '.fancyIframeMedia',
            'config' => array(
                'mouseWheel' => false,
                'arrows' => false,
            ),
        ));
    ?>
        <!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
    <div class="header navbar navbar-inverse "> 
        <!-- BEGIN TOP NAVIGATION BAR -->
        <div class="navbar-inner">
            <div class="header-seperation"> 
                <ul class="nav pull-left notifcation-center" id="main-menu-toggle-wrapper" style="display:none">	
                    <li class="dropdown"> <a id="main-menu-toggle" href="#main-menu"  class="" > <div class="iconset top-menu-toggle-white"></div> </a> </li>		 
                </ul>
                <!-- BEGIN LOGO -->	
                <a href="index.html"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/logo.png" class="logo" alt=""  data-src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/logo.png" data-src-retina="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/logo2x.png" width="106" height="21"/></a>
                <!-- END LOGO --> 
                <ul class="nav pull-right notifcation-center">	
                    <li class="dropdown" id="header_task_bar"> <a href="/admin/dashboard" class="dropdown-toggle active" data-toggle=""> <div class="iconset top-home"></div> </a> </li>
                    <!--<li class="dropdown" id="header_inbox_bar" > <a href="email.html" class="dropdown-toggle" > <div class="iconset top-messages"></div>  <span class="badge" id="msgs-badge">2</span> </a></li>-->
                    <li class="dropdown" id="portrait-chat-toggler" style="display:none"> <a href="#sidr" class="chat-menu-toggle"> <div class="iconset top-chat-white "></div> </a> </li>        
                </ul>
            </div>
            <!-- END RESPONSIVE MENU TOGGLER --> 
            <div class="header-quick-nav" > 
                <!-- BEGIN TOP NAVIGATION MENU -->
                <div class="pull-left"> 
                    <ul class="nav quick-section">
                        <li class="quicklinks"> <a href="#" class="" id="layout-condensed-toggle" >
                                <div class="iconset top-menu-toggle-dark"></div>
                            </a> </li>
                    </ul>
                    <ul class="nav quick-section">
                        <li class="quicklinks"> <a href="#" class="" >
                                <div class="iconset top-reload"></div>
                            </a> </li>
                        <li class="quicklinks"> <span class="h-seperate"></span></li>
                        <li class="quicklinks"> <a href="#" class="" >
                                <div class="iconset top-tiles"></div>
                            </a> </li>
                        <li class="m-r-10 input-prepend inside search-form no-boarder">
                            <span class="add-on"> <span class="iconset top-search"></span></span>
                            <input name="" type="text"  class="no-boarder " placeholder="Search Dashboard" style="width:250px;">
                        </li>
                    </ul>
                </div>
                <!-- END TOP NAVIGATION MENU -->
                <!-- BEGIN CHAT TOGGLER -->
                <div class="pull-right"> 
                    <div class="chat-toggler">	
                        <a href="#" class="dropdown-toggle" id="my-task-list" data-placement="bottom"  data-content='' data-toggle="dropdown" data-original-title="Notifications">
                            <div class="user-details"> 
                                <div class="username">
                                    <!--<span class="badge badge-important">3</span>--> 
                                    <span class="bold"><?php echo Yii::app()->user->name;?></span>									
                                </div>						
                            </div> 
                            <!--<div class="iconset top-down-arrow"></div>-->
                        </a>	
                        <div id="notification-list" style="display:none">
                            <div style="width:300px">
                                <div class="notification-messages info">
                                    <div class="user-profile">
                                        
                                        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/d.jpg"  alt="" data-src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/d.jpg" data-src-retina="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/d2x.jpg" width="35" height="35">
                                    </div>
                                    <div class="message-wrapper">
                                        <div class="heading">
                                            David Nester - Commented on your wall
                                        </div>
                                        <div class="description">
                                            Meeting postponed to tomorrow
                                        </div>
                                        <div class="date pull-left">
                                            A min ago
                                        </div>										
                                    </div>
                                    <div class="clearfix"></div>									
                                </div>	
                                <div class="notification-messages danger">
                                    <div class="iconholder">
                                        <i class="icon-warning-sign"></i>
                                    </div>
                                    <div class="message-wrapper">
                                        <div class="heading">
                                            Server load limited
                                        </div>
                                        <div class="description">
                                            Database server has reached its daily capicity
                                        </div>
                                        <div class="date pull-left">
                                            2 mins ago
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>	
                                <div class="notification-messages success">
                                    <div class="user-profile">
                                        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/h.jpg"  alt="" data-src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/h.jpg" data-src-retina="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/h2x.jpg" width="35" height="35">
                                    </div>
                                    <div class="message-wrapper">
                                        <div class="heading">
                                            You haveve got 150 messages
                                        </div>
                                        <div class="description">
                                            150 newly unread messages in your inbox
                                        </div>
                                        <div class="date pull-left">
                                            An hour ago
                                        </div>									
                                    </div>
                                    <div class="clearfix"></div>
                                </div>							
                            </div>				
                        </div>
                        <?php if (!Yii::app()->user->isGuest) {?>
                        <div class="profile-pic"> 
                            <?php $oUser = Users::model()->findByPk(Yii::app()->user->id);?>
                            <?php echo $oUser->getAvatar();?>
                            <!--<img src="<?php // echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/avatar_small.jpg"  alt="" data-src="<?php // echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/avatar_small.jpg" data-src-retina="<?php // echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/avatar_small2x.jpg" width="35" height="35" />--> 
                        </div>       			
                        <?php }?>
                        
                    </div>
                    <ul class="nav quick-section ">
                        <li class="quicklinks"> 
                            <a data-toggle="dropdown" class="dropdown-toggle  pull-right " href="#" id="user-options">						
                                <div class="iconset top-settings-dark "></div> 	
                            </a>
                            <ul class="dropdown-menu  pull-right" role="menu" aria-labelledby="user-options">
                                <li><a href="/admin/users/view/id/<?php echo Yii::app()->user->id;?>"> My Account</a>
                                </li>
<!--                                <li><a href="calender.html">My Calendar</a>
                                </li>-->
                                <!--<li><a href="email.html"> My Inbox&nbsp;&nbsp;<span class="badge badge-important animated bounceIn">2</span></a>-->
                                </li>
                                <li class="divider"></li>                
                                <li><a href="/admin/site/logout"><i class="fa fa-power-off"></i>&nbsp;&nbsp;Log Out</a></li>
                            </ul>
                        </li> 
                        <li class="quicklinks"> <span class="h-seperate"></span></li> 
                        <li class="quicklinks"> 	
                            <a id="chat-menu-toggle" href="#sidr" class="chat-menu-toggle" ><div class="iconset top-chat-dark "></div>
                                <!--<span class="badge badge-important hide" id="chat-message-count">1</span>-->
                            </a> 
                            <div class="simple-chat-popup chat-menu-toggle hide" >
                                <div class="simple-chat-popup-arrow"></div><div class="simple-chat-popup-inner">
                                    <div style="width:100px">
                                        <div class="semi-bold"><?php echo Yii::app()->user->name;?></div>
                                        <div class="message">Hey you there </div>
                                    </div>
                                </div>
                            </div>
                        </li> 
                    </ul>
                </div>
                <!-- END CHAT TOGGLER -->
            </div> 
            <!-- END TOP NAVIGATION MENU --> 

        </div>
        <!-- END TOP NAVIGATION BAR --> 
    </div>
    <!-- END HEADER --> 
    <!-- BEGIN CONTAINER -->
    <div class="page-container row-fluid"> 
        <!-- BEGIN SIDEBAR -->
        <div class="page-sidebar" id="main-menu">
            <!-- BEGIN MINI-PROFILE -->
            <div class="page-sidebar-wrapper" id="main-menu-wrapper">
<!--                <div class="user-info-wrapper">
                    <div class="profile-wrapper"> <img src="<?php // echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/avatar.jpg"  alt="" data-src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/avatar.jpg" data-src-retina="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/profiles/avatar2x.jpg" width="69" height="69" /> </div>
                    <div class="user-info">
                        <div class="greeting">Welcome</div>
                        <div class="username">John <span class="semi-bold">Smith</span></div>
                        <div class="status">Status<a href="#">
                                <div class="status-icon green"></div>
                                Online</a></div>
                    </div>
                </div>-->
                <!-- END MINI-PROFILE -->
                <!-- BEGIN SIDEBAR MENU -->
                <!--<p class="menu-title">BROWSE <span class="pull-right"><a href="javascript:;"><i class="fa fa-refresh"></i></a></span></p>-->
                <ul>
                    <?php
                    
                        $items = array();

                        if (!Yii::app()->user->isGuest) {
                            $items += array(
                                array('label' => Yii::t('default', 'Dashboard'), 'icon' => 'fa-home', 'url' => array('/admin/dashboard')),
                                array('label' => 'Users', 'icon' => 'fa-user', 'url' => array('/admin/users/admin')),
//                                array('label' => 'Auth', 'icon' => 'fa-lock', 'url' => array('/auth')),
//                                array('label' => 'Groups', 'icon' => 'fa-users', 'url' => array('/admin/groups/admin')),
                                array('label' => 'Categories & Skills', 'icon' => 'fa-tags', 'url' => array('admin/tree/manage/type/2')),
                                array('label' => 'Projects', 'icon' => 'fa-briefcase', 'url' => array('/admin/projects/admin')),
                                array('label' => 'Payments', 'icon' => 'fa-money', 'url' => array('/admin/payments/admin')),
                                array('label' => 'Complaints', 'icon' => 'fa-bug', 'url' => array('/admin/complaints/admin')),
//                                array('label' => 'Media', 'icon' => 'fa-play-circle', 'url' => array('/admin/media/admin')),
//                                array('label' => 'Posts', 'icon' => 'fa-edit', 'url' => array('/admin/posts/admin')),
                                
                                array('label' => 'FAQs', 'icon' => 'fa-question', 'url' => array('/admin/posts/admin/type/' . Posts::TYPE_FAQ)),
                                array('label' => 'News', 'icon' => 'fa-flash', 'url' => array('/admin/posts/admin/type/' . Posts::TYPE_ARTICLE)),
                                array('label' => 'Pages', 'icon' => 'fa-edit', 'url' => array('/admin/posts/admin/type/' . Posts::TYPE_PAGE)),
                                array('label' => 'Events', 'icon' => 'fa-calendar-o', 'url' => array('/admin/posts/admin/type/' . Posts::TYPE_EVENT)),
//                                array('label' => 'Navigations', 'icon' => 'fa-sitemap', 'url' => array('/admin/navigation/admin')),
                                
                                array('label' => 'Menus', 'icon' => 'fa-sitemap', 'url' => '#', 'items' => array(
                                    array('label' => 'Header Menu', 'url' => array('admin/tree/manage/type/3')),
                                    array('label' => 'Footer Menu', 'url' => array('admin/tree/manage/type/4')),
                                )),
                                array('label' => 'Settings', 'icon' => 'fa-cogs', 'url' => array('/admin/settings/admin')),
                                //////////////////
        //                        array('label' => 'Login', 'icon' => 'fa-lock', 'url' => array('/admin'), 'visible' => Yii::app()->user->isGuest),
        //                        array('label' => 'Logout (' . Yii::app()->user->name . ')', 'icon' => 'fa-key', 'url' => array('/admin/site/logout'), 'visible' => !Yii::app()->user->isGuest)
                            );
                        }
                
                        if(!empty($items)){
                            
                            foreach ($items as $item) {      
                    ?>
                    <li class="<?php echo (array_key_exists('items', $item) && count($item['items'])) ? '' : 'start'?>">
                        <a href="<?php echo (array_key_exists('items', $item) && count($item['items'])) ? 'javascript:;' : Yii::app()->createAbsoluteUrl($item['url'][0]); ?>">
                            <i class="fa <?php echo $item['icon']; ?>"></i>
                            <span class="title">
                                <?php echo $item['label']; ?>
                            </span>
                            <?php if (array_key_exists('items', $item) && count($item['items'])) { ?>
                                <span class="arrow "></span>
                            <?php } ?>
                        </a>
                        <?php if (array_key_exists('items', $item) && count($item['items'])) { ?>
                            <ul class="sub-menu">
                              <?php foreach ($item['items'] as $subItem) { ?>
                                <li>
                                    <a href="<?php echo Yii::app()->createAbsoluteUrl($subItem['url'][0]); ?>"><?php echo $subItem['label']; ?></a>
                                </li>
                              <?php }?>
                            </ul>
                        
                          
                        <?php }?>
                    </li>
                    <?php
                            }
                        }
                    ?>

                </ul>
<!--                <div class="side-bar-widgets">
                    <p class="menu-title">FOLDER <span class="pull-right"><a href="#" class="create-folder"> <i class="fa fa-plus"></i></a></span></p>
                    <ul class="folders" >
                        <li><a href="#">
                                <div class="status-icon green"></div>
                                My quick tasks </a> </li>
                        <li><a href="#">
                                <div class="status-icon red"></div>
                                To do list </a> </li>
                        <li><a href="#">
                                <div class="status-icon blue"></div>
                                Projects </a> </li>
                        <li class="folder-input" style="display:none">
                            <input type="text" placeholder="Name of folder" class="no-boarder folder-name" name="" >
                        </li>
                    </ul>
                    <p class="menu-title">PROJECTS </p>
                    <div class="status-widget">
                        <div class="status-widget-wrapper">
                            <div class="title">Freelancer<a href="#" class="remove-widget"><i class="icon-custom-cross"></i></a></div>
                            <p>Redesign home page</p>
                        </div>
                    </div>
                    <div class="status-widget">
                        <div class="status-widget-wrapper">
                            <div class="title">envato<a href="#" class="remove-widget"><i class="icon-custom-cross"></i></a></div>
                            <p>Statistical report</p>
                        </div>
                    </div>
                </div>-->
                <div class="clearfix"></div>
                <!-- END SIDEBAR MENU -->
            </div>
        </div>
        <a href="#" class="scrollup">Scroll</a>
        <?php if (!Yii::app()->user->isGuest) {?>
        <div style="display: none;">
            <div class="footer-widget">		
                <div class="progress transparent progress-small no-radius no-margin">
                    <div class="progress-bar progress-bar-success animate-progress-bar" data-percentage="79%" style="width: 79%;"></div>		
                </div>
                <div class="pull-right">
                    <div class="details-status">
                        <span class="animate-number" data-value="86" data-animation-duration="560">86</span>%
                    </div>	
                    <!--<a href="lockscreen.html"><i class="fa fa-power-off"></i></a>-->
                </div>
            </div>
        </div>
        <?php }?>
        <!-- END SIDEBAR --> 
        <!-- BEGIN PAGE CONTAINER-->
        <div class="page-content">
            <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
            <div id="portlet-config" class="modal hide">
                <div class="modal-header">
                    <button data-dismiss="modal" class="close" type="button"></button>
                    <h3>Widget Settings</h3>
                </div>
                <div class="modal-body"> Widget settings form goes here </div>
            </div>
            <div class="clearfix"></div>
            <div class="content">
<!--                <ul class="breadcrumb">
                    <li>
                        <p>YOU ARE HERE</p>
                    </li>
                    <li><a href="#" class="active">Form Elements</a> </li>
                </ul>-->

                <?php if (isset($this->breadcrumbs)): ?>
                    <?php
                    $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
                        'links' => $this->breadcrumbs,
                        'separator' => '',
                    ));
                    ?><!-- breadcrumbs -->
                <?php endif ?>
                
                <!--<div class="page-title"> <i class="icon-custom-left"></i>-->
                    <!--<h3><?php // echo CHtml::encode($this->pageTitle); ?></h3>-->
                <!--</div>-->
                <!-- END BASIC FORM ELEMENTS-->	 

                <!-- BEGIN FORM OPTIONS-->	  
                <div>
                    <?php echo $content;?>
                    <div class="clear"></div>

                    <div id="footer">
                        Copyright &copy; <?php echo date('Y'); ?> by Smartology.<br/>
                        All Rights Reserved.<br/>
                        <?php echo Yii::powered(); ?>
                    </div><!-- footer -->
                </div>
                <!-- END PAGE -->
            </div>
        </div>
    </div>
    

<!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
        <?php

//        if (!Yii::app()->user->isGuest) {
//            $this->widget('bootstrap.widgets.TbNavbar', array(
//                'items' => array(
//                    array(
//                        'class' => 'bootstrap.widgets.TbMenu',
//                        'items' => array(
//                            array('label' => 'Dashboard', 'url' => array('/admin/dashboard')),
//                            //array('label' => 'Auth', 'url' => array('/auth')),
//                            array('label' => 'Users', 'url' => array('/admin/users/admin')),
//                            array('label' => 'Menus', 'url' => '#', 'items' => array(
//                                array('label' => 'Header Menu', 'url' => Yii::app()->createUrl('admin/tree/manage', array('type' => 3))),
//                                array('label' => 'Footer Menu', 'url' => Yii::app()->createUrl('admin/tree/manage', array('type' => 4))),
//                            )),
//                            array('label' => 'Settings', 'url' => array('/admin/settings/admin')),
//                            //////////////////
//                            //array('label' => 'Login', 'url' => array('/admin'), 'visible' => Yii::app()->user->isGuest),
//                            array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('admin/site/logout'))
//                        ),
//                    ),
//                ),
//            ));
//        }
        ?>
        <?php
        // <!-- BEGIN CORE JS FRAMEWORK-->
//        Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/assets/plugins/jquery-1.8.3.min.js', CClientScript::POS_END);
        Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js', CClientScript::POS_END);
//        
//        Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/assets/plugins/bootstrap/js/bootstrap.min.js', CClientScript::POS_END);
        
        Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/assets/plugins/breakpoints.js', CClientScript::POS_END);
        Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/assets/plugins/jquery-unveil/jquery.unveil.min.js', CClientScript::POS_END);
        
        // <!-- END CORE JS FRAMEWORK -->
        
        // <-- DatePicker !-->
        
        Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js', CClientScript::POS_END);
        Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js', CClientScript::POS_END);
        // <-- End of DatePicker !-->
        Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js', CClientScript::POS_END);
        Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/assets/plugins/jquery-block-ui/jqueryblockui.js', CClientScript::POS_END);
        Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/assets/plugins/jquery-slider/jquery.sidr.min.js', CClientScript::POS_END);
        Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js', CClientScript::POS_END);
        Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js', CClientScript::POS_END);
        
        Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/assets/js/form_elements.js', CClientScript::POS_END);
        Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/assets/js/core.js', CClientScript::POS_END);
        
        Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/assets/js/icon.js', CClientScript::POS_END);
        Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/assets/js/chat.js', CClientScript::POS_END);
        Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/assets/js/demo.js', CClientScript::POS_END);
//        Yii::app()->clientScript->registerScriptFile('/js/admin/custom.js', CClientScript::POS_END);
        
        ?>
        
        <?php /**
         * makes datepicker to any input ends with [created] or [updated]
         *
          $this->widget('zii.widgets.jui.CJuiDatePicker', array('name' => 'test', 'htmlOptions' => array('class' => 'hidden'))); //This line just to import the DatePicker js & css libs
          ?>
          <script type="text/javascript">

          $(document).ready(function() {
          $('body').on('focus', "input[name$='[created]'], input[name$='[updated]']", function() {
          $(this).datepicker({'mode': 'focus', 'dateFormat': 'yy-mm-dd', 'showAnim': 'fold', 'changeMonth': true, 'changeYear': true});
          });
          });
          </script>
          <?php */ ?>
    </body>
</html>
