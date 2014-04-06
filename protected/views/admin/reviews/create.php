<?php
$this->breadcrumbs=array(
	'Reviews'=>array('index'),
	'Create',
);

$this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary',
        'buttons'=>array(
        array('label'=>'Operations', 'items'=>array(
                array('label'=>'List Reviews','url'=>array('index')),
                array('label'=>'Manage Reviews','url'=>array('admin')),
        ))),
        'htmlOptions'=>array(
                'class' => 'pull-right',
            ),
 ));
?>

<h1>Create Reviews</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>