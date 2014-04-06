<?php
$this->breadcrumbs = array(
    'Settings' => array('index'),
    $model->key,
);

$this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary',
        'buttons'=>array(
        array('label'=>'Operations', 'items'=>array(
            array('label' => 'Create Settings', 'url' => array('create')),
            array('label' => 'Update Settings', 'url' => array('update', 'id' => $model->id)),
            array('label' => 'Delete Settings', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
            array('label' => 'Manage Settings', 'url' => array('admin')),
        ))),
        'htmlOptions'=>array(
                'class' => 'pull-right',
            ),
 ));
?>

<div class="page-title"> <i class="icon-custom-left"></i>
    <h3>View Settings - <span class="semi-bold"><?php echo $model->key; ?></span></h3>
</div>
<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'key',
        'value',
        'description',
        'created',
        'updated',
    ),
));
?>
