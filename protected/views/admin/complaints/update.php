<?php
$this->breadcrumbs=array(
	'Complaints'=>array('index'),
	$model->subject=>array('view','id'=>$model->id),
	'Update',
);

$this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary',
        'buttons'=>array(
        array('label'=>'Operations', 'items'=>array(
//                array('label'=>'List Complaints','url'=>array('index')),
//                array('label'=>'Create Complaints','url'=>array('create')),
                array('label'=>'View Complaints','url'=>array('view','id'=>$model->id)),
                array('label'=>'Manage Complaints','url'=>array('admin')),
        ))),
        'htmlOptions'=>array(
                'class' => 'pull-right',
            ),
 ));
?>

<div class="page-title"> <i class="icon-custom-left"></i>
    <h3>Update Complaints - <span class="semi-bold"><?php echo $model->subject; ?></span></h3>
</div>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>