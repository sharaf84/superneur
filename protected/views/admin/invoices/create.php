<?php
$this->breadcrumbs=array(
	'Invoices'=>array('index'),
	'Create',
);

$this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary',
        'buttons'=>array(
        array('label'=>'Operations', 'items'=>array(
                array('label'=>'List Invoices','url'=>array('index')),
                array('label'=>'Manage Invoices','url'=>array('admin')),
        ))),
        'htmlOptions'=>array(
                'class' => 'pull-right',
            ),
 ));
?>

<h1>Create Invoices</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>