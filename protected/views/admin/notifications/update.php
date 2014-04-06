<?php
$this->breadcrumbs=array(
	'Notifications'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary',
        'buttons'=>array(
        array('label'=>'Operations', 'items'=>array(
                array('label'=>'List Notifications','url'=>array('index')),
                array('label'=>'Create Notifications','url'=>array('create')),
                array('label'=>'View Notifications','url'=>array('view','id'=>$model->id)),
                array('label'=>'Manage Notifications','url'=>array('admin')),
        ))),
        'htmlOptions'=>array(
                'class' => 'pull-right',
            ),
 ));
?>

<h1>Update Notifications <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>