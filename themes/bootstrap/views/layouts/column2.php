<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="row">
    <div class="">
        <div id="content">
            <?php
//            foreach (Yii::app()->user->getFlashes() as $key => $message) {
//                echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
//            }
            ?>
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
            <?php echo $content; ?>
        </div><!-- content -->
    </div>
    <div class="span3">
        <div id="sidebar">
            <?php
            $this->beginWidget('zii.widgets.CPortlet', array(
                'title' => 'Operations',
            ));
            $this->widget('bootstrap.widgets.TbMenu', array(
                'items' => $this->menu,
                'htmlOptions' => array('class' => 'operations'),
            ));
            $this->endWidget();
            ?>
        </div><!-- sidebar -->
    </div>
</div>
<?php $this->endContent(); ?>