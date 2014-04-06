<?php
$this->breadcrumbs=array(
	'Messages'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary',
        'buttons'=>array(
        array('label'=>'Operations', 'items'=>array(
                array('label'=>'List Messages','url'=>array('index')),
                array('label'=>'Create Messages','url'=>array('create')),
                array('label'=>'View Messages','url'=>array('view','id'=>$model->id)),
                array('label'=>'Manage Messages','url'=>array('admin')),
        ))),
        'htmlOptions'=>array(
                'class' => 'pull-right',
            ),
 ));
?>

<h1>Update Messages <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>