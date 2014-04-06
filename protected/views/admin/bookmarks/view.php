<?php
$this->breadcrumbs=array(
	'Bookmarks'=>array('index'),
	$model->id,
);

$this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary',
        'buttons'=>array(
        array('label'=>'Operations', 'items'=>array(
                array('label'=>'List Bookmarks','url'=>array('index')),
                array('label'=>'Create Bookmarks','url'=>array('create')),
                array('label'=>'Update Bookmarks','url'=>array('update','id'=>$model->id)),
                array('label'=>'Delete Bookmarks','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
                array('label'=>'Manage Bookmarks','url'=>array('admin')),
        ))),
        'htmlOptions'=>array(
                'class' => 'pull-right',
            ),
 ));
?>

<h1>View Bookmarks #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'project_id',
		'user_id',
	),
)); ?>
