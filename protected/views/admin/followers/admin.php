<?php
$this->breadcrumbs=array(
	'Followers'=>array('index'),
	'Manage',
);


$this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary',
        'buttons'=>array(
        array('label'=>'Operations', 'items'=>array(
                array('label'=>'List Followers','url'=>array('index')),
                array('label'=>'Create Followers','url'=>array('create')),
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
	$.fn.yiiGridView.update('followers-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Followers</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'followers-grid',
        'type'=>'striped',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'user_id',
		'follower_id',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
        'pager' => array(
            'htmlOptions' => array('class' => 'pagination'),
        ),
)); ?>
