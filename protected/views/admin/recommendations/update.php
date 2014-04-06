<?php
$this->breadcrumbs=array(
	'Recommendations'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary',
        'buttons'=>array(
        array('label'=>'Operations', 'items'=>array(
                array('label'=>'List Recommendations','url'=>array('index')),
                array('label'=>'Create Recommendations','url'=>array('create')),
                array('label'=>'View Recommendations','url'=>array('view','id'=>$model->id)),
                array('label'=>'Manage Recommendations','url'=>array('admin')),
        ))),
        'htmlOptions'=>array(
                'class' => 'pull-right',
            ),
 ));
?>

<h1>Update Recommendations <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>