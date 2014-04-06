<?php
$this->breadcrumbs=array(
	'Milestones'=>array('index'),
	$model->title,
);

$this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary',
        'buttons'=>array(
        array('label'=>'Operations', 'items'=>array(
                array('label'=>'List Milestones','url'=>array('index')),
                array('label'=>'Create Milestones','url'=>array('create')),
                array('label'=>'Update Milestones','url'=>array('update','id'=>$model->id)),
                array('label'=>'Delete Milestones','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
                array('label'=>'Manage Milestones','url'=>array('admin')),
        ))),
        'htmlOptions'=>array(
                'class' => 'pull-right',
            ),
 ));
?>

<h1>View Milestones #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'deliverables',
		'cost',
		'created',
		'updated',
		array(
                    'name' => 'status',
                    'type' => 'raw',
                    'value' => Milestones::model()->getStatusList($model->status),
                ),
//		'payment_status',
                array(
                    'name' => 'payment_status',
                    'type' => 'raw',
                    'value' => Milestones::model()->getPaymentStatusList($model->payment_status),
                ),
		'progress',
		'start_date',
		'delivery_date',
	),
)); ?>
