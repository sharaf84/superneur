<?php
$this->breadcrumbs=array(
	'Followers'=>array('index'),
	'Create',
);

$this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary',
        'buttons'=>array(
        array('label'=>'Operations', 'items'=>array(
                array('label'=>'List Followers','url'=>array('index')),
                array('label'=>'Manage Followers','url'=>array('admin')),
        ))),
        'htmlOptions'=>array(
                'class' => 'pull-right',
            ),
 ));
?>

<h1>Create Followers</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>