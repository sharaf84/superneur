<?php
$this->breadcrumbs=array(
	'Proposals'=>array('index'),
	'Create',
);

$this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary',
        'buttons'=>array(
        array('label'=>'Operations', 'items'=>array(
//                array('label'=>'List Proposals','url'=>array('index')),
                array('label'=>'Manage Proposals','url'=>array('admin')),
        ))),
        'htmlOptions'=>array(
                'class' => 'pull-right',
            ),
 ));
?>

<h1>Create Proposals</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>