<?php
$this->breadcrumbs = array(
    'Settings' => array('index'),
    'Manage',
);

$this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary',
        'buttons'=>array(
        array('label'=>'Operations', 'items'=>array(
                array('label' => 'Create Settings', 'url' => array('create')),
        ))),
        'htmlOptions'=>array(
                'class' => 'pull-right',
            ),
 ));

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('settings-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="page-title"> <i class="icon-custom-left"></i>
    <h3>Manage - <span class="semi-bold">Settings</span></h3>
</div>
<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php // echo CHtml::link('Advanced Search', '#', array('class' => 'search-button btn')); ?>
<!--<div class="search-form" style="display:none">-->
    <?php
//    $this->renderPartial('_search', array(
//        'model' => $model,
//    ));
    ?>
<!--</div> search-form -->

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'settings-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'key',
        'value',
        'description',
        'created',
        'updated',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>
