<?php
$this->breadcrumbs = array(
    'Settings' => array('index'),
    $model->id => array('view', 'id' => $model->id),
    'Update',
);

$this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary',
        'buttons'=>array(
        array('label'=>'Operations', 'items'=>array(
            array('label' => 'Create Settings', 'url' => array('create')),
            array('label' => 'View Settings', 'url' => array('view', 'id' => $model->id)),
            array('label' => 'Manage Settings', 'url' => array('admin')),
        ))),
        'htmlOptions'=>array(
                'class' => 'pull-right',
            ),
 ));
?>

<div class="page-title"> <i class="icon-custom-left"></i>
    <h3>Update Settings - <span class="semi-bold"><?php echo $model->key; ?></span></h3>
</div>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>