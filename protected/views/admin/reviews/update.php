<?php
$this->breadcrumbs=array(
	'Reviews'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary',
        'buttons'=>array(
        array('label'=>'Operations', 'items'=>array(
                array('label'=>'List Reviews','url'=>array('index')),
                array('label'=>'Create Reviews','url'=>array('create')),
                array('label'=>'View Reviews','url'=>array('view','id'=>$model->id)),
                array('label'=>'Manage Reviews','url'=>array('admin')),
        ))),
        'htmlOptions'=>array(
                'class' => 'pull-right',
            ),
 ));
?>

<h1>Update Reviews <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>