<?php
$this->breadcrumbs=array(
	'Payments'=>array('index'),
	'Create',
);

$this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary',
        'buttons'=>array(
        array('label'=>'Operations', 'items'=>array(
                array('label'=>'List Payments','url'=>array('index')),
                array('label'=>'Manage Payments','url'=>array('admin')),
        ))),
        'htmlOptions'=>array(
                'class' => 'pull-right',
            ),
 ));
?>

<h1>Create Payments</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>