<?php
$this->breadcrumbs = array(
    'Settings' => array('index'),
    'Create',
);

$this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary',
        'buttons'=>array(
        array('label'=>'Operations', 'items'=>array(
            array('label' => 'Manage Settings', 'url' => array('admin')),
        ))),
        'htmlOptions'=>array(
                'class' => 'pull-right',
            ),
 ));
?>

<div class="page-title"> <i class="icon-custom-left"></i>
    <h3>Create - <span class="semi-bold">Settings</span></h3>
</div>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>