<?php
$this->breadcrumbs=array(
	'Complaints'=>array('admin'),
	'Create',
);

$this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary',
        'buttons'=>array(
        array('label'=>'Operations', 'items'=>array(
                array('label'=>'List Complaints','url'=>array('index')),
                array('label'=>'Manage Complaints','url'=>array('admin')),
        ))),
        'htmlOptions'=>array(
                'class' => 'pull-right',
            ),
 ));
?>

<h1>Create Complaints</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>