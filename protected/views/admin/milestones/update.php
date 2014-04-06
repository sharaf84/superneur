<?php
$this->breadcrumbs=array(
	'Milestones'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary',
        'buttons'=>array(
        array('label'=>'Operations', 'items'=>array(
                array('label'=>'List Milestones','url'=>array('index')),
                array('label'=>'Create Milestones','url'=>array('create')),
                array('label'=>'View Milestones','url'=>array('view','id'=>$model->id)),
                array('label'=>'Manage Milestones','url'=>array('admin')),
        ))),
        'htmlOptions'=>array(
                'class' => 'pull-right',
            ),
 ));
?>

<h1>Update Milestones <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>