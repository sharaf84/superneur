<?php
$this->breadcrumbs=array(
	'Comments'=>array('index'),
	'Create',
);

$this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary',
        'buttons'=>array(
        array('label'=>'Operations', 'items'=>array(
                array('label'=>'List Comments','url'=>array('index')),
                array('label'=>'Manage Comments','url'=>array('admin')),
        ))),
        'htmlOptions'=>array(
                'class' => 'pull-right',
            ),
 ));
?>

<h1>Create Comments</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>