<?php
$this->breadcrumbs=array(
	'Recommendations'=>array('index'),
	$model->id,
);

$this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary',
        'buttons'=>array(
        array('label'=>'Operations', 'items'=>array(
                array('label'=>'List Recommendations','url'=>array('index')),
                array('label'=>'Create Recommendations','url'=>array('create')),
                array('label'=>'Update Recommendations','url'=>array('update','id'=>$model->id)),
                array('label'=>'Delete Recommendations','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
                array('label'=>'Manage Recommendations','url'=>array('admin')),
        ))),
        'htmlOptions'=>array(
                'class' => 'pull-right',
            ),
 ));
?>

<h1>View Recommendations #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'from',
		'to',
		'created',
		'note',
	),
)); ?>
