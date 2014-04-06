<?php
$this->breadcrumbs=array(
	'Portfolios'=>array('index'),
	'Create',
);

$this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary',
        'buttons'=>array(
        array('label'=>'Operations', 'items'=>array(
                array('label'=>'List Portfolio','url'=>array('index')),
                array('label'=>'Manage Portfolio','url'=>array('admin')),
        ))),
        'htmlOptions'=>array(
                'class' => 'pull-right',
            ),
 ));
?>

<h1>Create Portfolio</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>