<?php
$this->breadcrumbs=array(
	'Payments'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary',
        'buttons'=>array(
        array('label'=>'Operations', 'items'=>array(
                array('label'=>'List Payments','url'=>array('index')),
                array('label'=>'Create Payments','url'=>array('create')),
                array('label'=>'View Payments','url'=>array('view','id'=>$model->id)),
                array('label'=>'Manage Payments','url'=>array('admin')),
        ))),
        'htmlOptions'=>array(
                'class' => 'pull-right',
            ),
 ));
?>

<h1>Update Payments <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>