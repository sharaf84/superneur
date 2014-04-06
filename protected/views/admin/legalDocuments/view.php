<?php
$this->breadcrumbs=array(
	'Legal Documents'=>array('index'),
	$model->id,
);

$this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary',
        'buttons'=>array(
        array('label'=>'Operations', 'items'=>array(
                array('label'=>'List LegalDocuments','url'=>array('index')),
                array('label'=>'Create LegalDocuments','url'=>array('create')),
                array('label'=>'Update LegalDocuments','url'=>array('update','id'=>$model->id)),
                array('label'=>'Delete LegalDocuments','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
                array('label'=>'Manage LegalDocuments','url'=>array('admin')),
        ))),
        'htmlOptions'=>array(
                'class' => 'pull-right',
            ),
 ));
?>

<h1>View LegalDocuments #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'status',
		'reject_reason',
		'created',
		'updated',
		'project_id',
	),
)); ?>
