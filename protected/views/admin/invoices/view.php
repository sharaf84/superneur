<?php
$this->breadcrumbs=array(
	'Invoices'=>array('index'),
	$model->title,
);

$this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary',
        'buttons'=>array(
        array('label'=>'Operations', 'items'=>array(
                array('label'=>'List Invoices','url'=>array('index')),
                array('label'=>'Create Invoices','url'=>array('create')),
                array('label'=>'Update Invoices','url'=>array('update','id'=>$model->id)),
                array('label'=>'Delete Invoices','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
                array('label'=>'Manage Invoices','url'=>array('admin')),
        ))),
        'htmlOptions'=>array(
                'class' => 'pull-right',
            ),
 ));
?>

<h1>View Invoices #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'file_path',
		'file_name',
		'created',
		'updated',
		'user_id',
	),
)); ?>
