<?php
$this->breadcrumbs=array(
	'Invoices'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary',
        'buttons'=>array(
        array('label'=>'Operations', 'items'=>array(
                array('label'=>'List Invoices','url'=>array('index')),
                array('label'=>'Create Invoices','url'=>array('create')),
                array('label'=>'View Invoices','url'=>array('view','id'=>$model->id)),
                array('label'=>'Manage Invoices','url'=>array('admin')),
        ))),
        'htmlOptions'=>array(
                'class' => 'pull-right',
            ),
 ));
?>

<h1>Update Invoices <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>