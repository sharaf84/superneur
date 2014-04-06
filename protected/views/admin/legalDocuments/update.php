<?php
$this->breadcrumbs=array(
	'Legal Documents'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary',
        'buttons'=>array(
        array('label'=>'Operations', 'items'=>array(
                array('label'=>'List LegalDocuments','url'=>array('index')),
                array('label'=>'Create LegalDocuments','url'=>array('create')),
                array('label'=>'View LegalDocuments','url'=>array('view','id'=>$model->id)),
                array('label'=>'Manage LegalDocuments','url'=>array('admin')),
        ))),
        'htmlOptions'=>array(
                'class' => 'pull-right',
            ),
 ));
?>

<h1>Update LegalDocuments <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>