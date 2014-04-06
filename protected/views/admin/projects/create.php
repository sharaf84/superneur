<?php
$this->breadcrumbs=array(
	'Projects'=>array('index'),
	'Create',
);

$this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary',
        'buttons'=>array(
        array('label'=>'Operations', 'items'=>array(
                array('label'=>'Manage Projects','url'=>array('admin')),
        ))),
        'htmlOptions'=>array(
                'class' => 'pull-right',
            ),
 ));
?>
<div class="page-title"> <i class="icon-custom-left"></i>
    <h3>Create - <span class="semi-bold">Projects</span></h3>
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>