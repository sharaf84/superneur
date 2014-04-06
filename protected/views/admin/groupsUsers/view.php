<?php
$this->breadcrumbs=array(
	'Groups Users'=>array('index'),
	$model->id,
);

$this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary',
        'buttons'=>array(
        array('label'=>'Operations', 'items'=>array(
                array('label'=>'List GroupsUsers','url'=>array('index')),
                array('label'=>'Create GroupsUsers','url'=>array('create')),
                array('label'=>'Update GroupsUsers','url'=>array('update','id'=>$model->id)),
                array('label'=>'Delete GroupsUsers','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
                array('label'=>'Manage GroupsUsers','url'=>array('admin')),
        ))),
        'htmlOptions'=>array(
                'class' => 'pull-right',
            ),
 ));
?>

<h1>View GroupsUsers #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'group_id',
		'user_id',
	),
)); ?>
