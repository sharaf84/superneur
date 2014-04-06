<?php
$this->breadcrumbs=array(
	'Messages'=>array('index'),
	'Create',
);

$this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary',
        'buttons'=>array(
        array('label'=>'Operations', 'items'=>array(
                array('label'=>'List Messages','url'=>array('index')),
                array('label'=>'Manage Messages','url'=>array('admin')),
        ))),
        'htmlOptions'=>array(
                'class' => 'pull-right',
            ),
 ));
?>

<h1>Create Messages</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>