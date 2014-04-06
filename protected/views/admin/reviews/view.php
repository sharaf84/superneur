<?php
$this->breadcrumbs=array(
	'Reviews'=>array('index'),
	$model->id,
);

$this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary',
        'buttons'=>array(
        array('label'=>'Operations', 'items'=>array(
                array('label'=>'List Reviews','url'=>array('index')),
                array('label'=>'Create Reviews','url'=>array('create')),
                array('label'=>'Update Reviews','url'=>array('update','id'=>$model->id)),
                array('label'=>'Delete Reviews','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
                array('label'=>'Manage Reviews','url'=>array('admin')),
        ))),
        'htmlOptions'=>array(
                'class' => 'pull-right',
            ),
 ));
?>

<h1>View Reviews #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'subject',
		'review',
		'from',
		'to',
		'commitment_rate',
		'quality_rate',
		'cost_rate',
		'availability_rate',
		'created',
		'updated',
		'project_id',
	),
)); ?>


