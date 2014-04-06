<?php
$this->breadcrumbs=array(
	'Followers'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary',
        'buttons'=>array(
        array('label'=>'Operations', 'items'=>array(
                array('label'=>'List Followers','url'=>array('index')),
                array('label'=>'Create Followers','url'=>array('create')),
                array('label'=>'View Followers','url'=>array('view','id'=>$model->id)),
                array('label'=>'Manage Followers','url'=>array('admin')),
        ))),
        'htmlOptions'=>array(
                'class' => 'pull-right',
            ),
 ));
?>

<h1>Update Followers <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>