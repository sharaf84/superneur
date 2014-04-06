<?php
$this->breadcrumbs=array(
	'Payments'=>array('index'),
	$model->id,
);

$this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary',
        'buttons'=>array(
        array('label'=>'Operations', 'items'=>array(
                array('label'=>'List Payments','url'=>array('index')),
                array('label'=>'Create Payments','url'=>array('create')),
                array('label'=>'Update Payments','url'=>array('update','id'=>$model->id)),
                array('label'=>'Delete Payments','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
                array('label'=>'Manage Payments','url'=>array('admin')),
        ))),
        'htmlOptions'=>array(
                'class' => 'pull-right',
            ),
 ));
?>

<h1>View Payments #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'operation',
		'amount',
		'profit_percentage',
		'profit',
		'sender_id',
		'receiver_id',
		'project_id',
		'milestone_id',
		'created',
		'updated',
		'token',
		'token_date',
		'status',
	),
)); ?>
