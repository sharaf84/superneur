<?php
$this->breadcrumbs = array(
    'Posts' => array('index'),
    'Create',
);



$this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary',
        'buttons'=>array(
        array('label'=>'Operations', 'items'=>array(
                array('label' => 'Manage Posts', 'url' => array('admin')),
        ))),
        'htmlOptions'=>array(
                'class' => 'pull-right',
            ),
 ));
?>
<div class="page-title"> <i class="icon-custom-left"></i>
    <h3>Create - <span class="semi-bold">Posts</span></h3>
</div>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>