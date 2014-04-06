<?php
$this->breadcrumbs=array(
	'Reviews'=>array('index'),
	'Manage',
);


$this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary',
        'buttons'=>array(
        array('label'=>'Operations', 'items'=>array(
                array('label'=>'List Reviews','url'=>array('index')),
                array('label'=>'Create Reviews','url'=>array('create')),
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
	$.fn.yiiGridView.update('reviews-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Reviews</h1>

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
	'id'=>'reviews-grid',
        'type'=>'striped',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'subject',
		'review',
		array(
                    'name' => 'from',
                    'type' => 'raw',
                    'value' => 'CHtml::link($data->reviewFrom->getName(),Yii::app()->createUrl("admin/users/view", array("id"=>$data->reviewFrom->id)))',
                 ),
            
		array(
                    'name' => 'to',
                    'type' => 'raw',
                    'value' => 'CHtml::link($data->reviewTo->getName(),Yii::app()->createUrl("admin/users/view", array("id"=>$data->reviewTo->id)))',
                 ),
            
              array(
                    'header' => 'Rating',
                    'type' => 'raw',
                    'value' => '(($data->commitment_rate + $data->quality_rate + $data->cost_rate + $data->availability_rate) / 4 )',
                ),
            
//		'commitment_rate',
		/*
		'quality_rate',
		'cost_rate',
		'availability_rate',
		'created',
		'updated',
		'project_id',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
        'pager' => array(
            'htmlOptions' => array('class' => 'pagination'),
        ),
)); ?>
