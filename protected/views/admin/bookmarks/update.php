<?php
$this->breadcrumbs=array(
	'Bookmarks'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary',
        'buttons'=>array(
        array('label'=>'Operations', 'items'=>array(
                array('label'=>'List Bookmarks','url'=>array('index')),
                array('label'=>'Create Bookmarks','url'=>array('create')),
                array('label'=>'View Bookmarks','url'=>array('view','id'=>$model->id)),
                array('label'=>'Manage Bookmarks','url'=>array('admin')),
        ))),
        'htmlOptions'=>array(
                'class' => 'pull-right',
            ),
 ));
?>

<h1>Update Bookmarks <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>