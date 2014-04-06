<?php
$this->breadcrumbs=array(
	'Groups Users'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary',
        'buttons'=>array(
        array('label'=>'Operations', 'items'=>array(
                array('label'=>'List GroupsUsers','url'=>array('index')),
                array('label'=>'Create GroupsUsers','url'=>array('create')),
                array('label'=>'View GroupsUsers','url'=>array('view','id'=>$model->id)),
                array('label'=>'Manage GroupsUsers','url'=>array('admin')),
        ))),
        'htmlOptions'=>array(
                'class' => 'pull-right',
            ),
 ));
?>

<h1>Update GroupsUsers <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>