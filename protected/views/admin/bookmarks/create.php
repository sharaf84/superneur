<?php
$this->breadcrumbs=array(
	'Bookmarks'=>array('index'),
	'Create',
);

$this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary',
        'buttons'=>array(
        array('label'=>'Operations', 'items'=>array(
                array('label'=>'List Bookmarks','url'=>array('index')),
                array('label'=>'Manage Bookmarks','url'=>array('admin')),
        ))),
        'htmlOptions'=>array(
                'class' => 'pull-right',
            ),
 ));
?>

<h1>Create Bookmarks</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>