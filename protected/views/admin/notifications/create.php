<?php
$this->breadcrumbs=array(
	'Notifications'=>array('index'),
	'Create',
);

$this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary',
        'buttons'=>array(
        array('label'=>'Operations', 'items'=>array(
                array('label'=>'List Notifications','url'=>array('index')),
                array('label'=>'Manage Notifications','url'=>array('admin')),
        ))),
        'htmlOptions'=>array(
                'class' => 'pull-right',
            ),
 ));
?>

<h1>Create Notifications</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>