<?php
$this->breadcrumbs=array(
	'Proposals'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary',
        'buttons'=>array(
        array('label'=>'Operations', 'items'=>array(
//                array('label'=>'List Proposals','url'=>array('index')),
//                array('label'=>'Create Proposals','url'=>array('create')),
                array('label'=>'View Proposals','url'=>array('view','id'=>$model->id)),
                array('label'=>'Manage Proposals','url'=>array('admin')),
        ))),
        'htmlOptions'=>array(
                'class' => 'pull-right',
            ),
 ));
?>

<h1>Update Proposals <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>