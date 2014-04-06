<?php
$this->breadcrumbs=array(
	'Groups Users'=>array('index'),
	'Create',
);

$this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary',
        'buttons'=>array(
        array('label'=>'Operations', 'items'=>array(
                array('label'=>'List GroupsUsers','url'=>array('index')),
                array('label'=>'Manage GroupsUsers','url'=>array('admin')),
        ))),
        'htmlOptions'=>array(
                'class' => 'pull-right',
            ),
 ));
?>

<h1>Create GroupsUsers</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>