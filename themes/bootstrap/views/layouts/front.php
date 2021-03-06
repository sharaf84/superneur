<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />

        <title><?php echo CHtml::encode($this->pageTitle); ?></title>

        <?php Yii::app()->bootstrap->register(); ?>
    </head>

    <body>

        <?php
        $this->widget('bootstrap.widgets.TbNavbar', array(
            'items' => array(
                array(
                    'class' => 'bootstrap.widgets.TbMenu',
                    'items' => array(
                        array('label' => 'Register', 'url' => array('site/register')),
                        array('label' => 'Reverify', 'url' => array('site/reverify')),
                        array('label' => 'Login', 'url' => array('site/login'), 'visible' => Yii::app()->user->isGuest),
                        array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('site/logout'), 'visible' => !Yii::app()->user->isGuest),
                        array('label' => 'Admin', 'url' => array('/admin')),
                    ),
                ),
            ),
        ));
        ?>

        <div class="container" id="page">

            <?php if (isset($this->breadcrumbs)): ?>
                <?php
                $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
                    'links' => $this->breadcrumbs,
                ));
                ?><!-- breadcrumbs -->
            <?php endif ?>
            
            <?php
            $this->widget('bootstrap.widgets.TbAlert', array(
                'block' => true, // display a larger alert block?
                'fade' => true, // use transitions?
                'closeText' => '&times;', // close link text - if set to false, no close link is displayed
//                'alerts' => array(// configurations per alert type
//                    'success' => array('block' => true, 'fade' => true, 'closeText' => '&times;'), // success, info, warning, error or danger
//                ),
            ));
            ?>
            <div id="content">    
                <?php echo $content; ?>
            </div>    
            <div class="clear"></div>

            <div id="footer">
                Copyright &copy; <?php echo date('Y'); ?> by Superneur.<br/>
                All Rights Reserved.<br/>
                <?php echo Yii::powered(); ?>
            </div><!-- footer -->
        </div><!-- page -->

            <?php //External js files:
                    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/admin/main.js');
            ?>
    </body>
</html>
