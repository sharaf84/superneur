<?php
$this->breadcrumbs=array(
	'Recommendations'=>array('index'),
	'Create',
);

$this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary',
        'buttons'=>array(
        array('label'=>'Operations', 'items'=>array(
                array('label'=>'List Recommendations','url'=>array('index')),
                array('label'=>'Manage Recommendations','url'=>array('admin')),
        ))),
        'htmlOptions'=>array(
                'class' => 'pull-right',
            ),
 ));
?>

<h1>Create Recommendations</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>