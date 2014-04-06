<?php
$this->breadcrumbs=array(
	'Portfolios'=>array('index'),
	$model->title,
);

$this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary',
        'buttons'=>array(
        array('label'=>'Operations', 'items'=>array(
                array('label'=>'List Portfolio','url'=>array('index')),
                array('label'=>'Create Portfolio','url'=>array('create')),
                array('label'=>'Update Portfolio','url'=>array('update','id'=>$model->id)),
                array('label'=>'Delete Portfolio','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
                array('label'=>'Manage Portfolio','url'=>array('admin')),
        ))),
        'htmlOptions'=>array(
                'class' => 'pull-right',
            ),
 ));
?>

<h1>View Portfolio #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'description',
		'text',
		'category_id',
		'display',
		'created',
		'updated',
		'user_id',
	),
)); ?>
