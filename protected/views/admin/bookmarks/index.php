<?php
$this->breadcrumbs=array(
	'Bookmarks',
);

$this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary',
        'buttons'=>array(
        array('label'=>'Operations', 'items'=>array(
                array('label'=>'Create Bookmarks','url'=>array('create')),
                array('label'=>'Manage Bookmarks','url'=>array('admin')),
        ))),
        'htmlOptions'=>array(
                'class' => 'pull-right',
            ),
 ));
?>

<h1>Bookmarks</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
