<?php
$this->breadcrumbs=array(
	'Proposals'=>array('index'),
	'Manage',
);


//$this->widget('bootstrap.widgets.TbButtonGroup', array(
//        'type'=>'primary',
//        'buttons'=>array(
//        array('label'=>'Operations', 'items'=>array(
//                array('label'=>'List Proposals','url'=>array('index')),
//                array('label'=>'Create Proposals','url'=>array('create')),
//        ))),
//        'htmlOptions'=>array(
//                'class' => 'pull-right',
//            ),
// ));

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('proposals-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Proposals</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div>
<!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'proposals-grid',
        'type'=>'striped',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'description',
		array(
                    'name' => 'status',
                    'type' => 'raw',
                    'value' => 'Proposals::model()->getStatusList($data->status)',
                ),
		array(
                    'name' => 'activity',
                    'type' => 'raw',
                    'value' => 'Proposals::model()->getActivityList($data->activity)',
                ),
//		'activity',
		'start_date',
//		'started',
                array(
                    'name' => 'started',
                    'type' => 'raw',
                    'value' => 'Proposals::model()->getStartList($data->started)',
                ),
                array(
                    'name' => 'user_id',
                    'type' => 'raw',
                    'value' => 'CHtml::link($data->user->getName(),Yii::app()->createUrl("admin/users/view", array("id"=>$data->user->id)))',
                ),
		/*
		'duration',
		'created',
		'updated',
		'project_id',
		'user_id',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
                        'template' => '{view}',
                        'viewButtonUrl' => 'Yii::app()->createUrl("/admin/proposals/view/", array("id" => $data->id))',
		),
	),
        'pager' => array(
            'htmlOptions' => array('class' => 'pagination'),
        ),
)); ?>