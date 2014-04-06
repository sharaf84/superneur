<?php
$this->breadcrumbs=array(
	'Legal Documents'=>array('index'),
	'Create',
);

$this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary',
        'buttons'=>array(
        array('label'=>'Operations', 'items'=>array(
                array('label'=>'List LegalDocuments','url'=>array('index')),
                array('label'=>'Manage LegalDocuments','url'=>array('admin')),
        ))),
        'htmlOptions'=>array(
                'class' => 'pull-right',
            ),
 ));
?>

<h1>Create LegalDocuments</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>