<?php
$this->breadcrumbs = array(
    'Users' => array('index'),
    $model->id => array('view', 'id' => $model->id),
    'Update',
);
$this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary',
        'buttons'=>array(
        array('label'=>'Operations', 'items'=>array(
                array('label' => 'Create Users', 'url' => array('create')),
                array('label' => 'View Users', 'url' => array('view', 'id' => $model->id)),
                array('label' => 'Manage Users', 'url' => array('admin')),
        ))),
        'htmlOptions'=>array(
                'class' => 'pull-right',
            ),
 ));
?>
<div class="page-title"> <i class="icon-custom-left"></i>
    <h3>Update User- <span class="semi-bold"> <?php echo $model->getName(); ?></span></h3>
</div>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>