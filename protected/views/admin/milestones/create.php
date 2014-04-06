<?php
$this->breadcrumbs=array(
	'Milestones'=>array('index'),
	'Create',
);

$this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary',
        'buttons'=>array(
        array('label'=>'Operations', 'items'=>array(
                array('label'=>'List Milestones','url'=>array('index')),
                array('label'=>'Manage Milestones','url'=>array('admin')),
        ))),
        'htmlOptions'=>array(
                'class' => 'pull-right',
            ),
 ));
?>

<h1>Create Milestones</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>