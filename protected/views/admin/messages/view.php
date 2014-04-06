<?php
$this->breadcrumbs=array(
	'Messages'=>array('index'),
	$model->id,
);

$this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary',
        'buttons'=>array(
        array('label'=>'Operations', 'items'=>array(
                array('label'=>'List Messages','url'=>array('index')),
                array('label'=>'Create Messages','url'=>array('create')),
                array('label'=>'Update Messages','url'=>array('update','id'=>$model->id)),
                array('label'=>'Delete Messages','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
                array('label'=>'Manage Messages','url'=>array('admin')),
        ))),
        'htmlOptions'=>array(
                'class' => 'pull-right',
            ),
 ));
?>

<h1>View Messages #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'message',
		'created',
		'updated',
		'parent_id',
		'sender_id',
		'receiver_id',
		'project_id',
	),
)); ?>
