<?php
$this->breadcrumbs=array(
	'Portfolios'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary',
        'buttons'=>array(
        array('label'=>'Operations', 'items'=>array(
                array('label'=>'List Portfolio','url'=>array('index')),
                array('label'=>'Create Portfolio','url'=>array('create')),
                array('label'=>'View Portfolio','url'=>array('view','id'=>$model->id)),
                array('label'=>'Manage Portfolio','url'=>array('admin')),
        ))),
        'htmlOptions'=>array(
                'class' => 'pull-right',
            ),
 ));
?>

<h1>Update Portfolio <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>