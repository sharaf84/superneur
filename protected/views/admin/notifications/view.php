<?php
$this->breadcrumbs=array(
	'Notifications'=>array('index'),
	$model->id,
);

$this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary',
        'buttons'=>array(
        array('label'=>'Operations', 'items'=>array(
                array('label'=>'List Notifications','url'=>array('index')),
                array('label'=>'Create Notifications','url'=>array('create')),
                array('label'=>'Update Notifications','url'=>array('update','id'=>$model->id)),
                array('label'=>'Delete Notifications','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
                array('label'=>'Manage Notifications','url'=>array('admin')),
        ))),
        'htmlOptions'=>array(
                'class' => 'pull-right',
            ),
 ));
?>

<h1>View Notifications #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'message',
		'created',
		'updated',
		'status',
		'sender_id',
		'receiver_id',
		'project_id',
		'milestone_id',
	),
)); ?>
