<?php
$this->breadcrumbs=array(
	'Groups'=>array('index'),
	'Create',
);

$this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary',
        'buttons'=>array(
        array('label'=>'Operations', 'items'=>array(
                array('label'=>'List Groups','url'=>array('index')),
                array('label'=>'Manage Groups','url'=>array('admin')),
        ))),
        'htmlOptions'=>array(
                'class' => 'pull-right',
            ),
 ));
?>

<h1>Create Groups</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>