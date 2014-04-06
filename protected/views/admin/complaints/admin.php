<?php
$this->breadcrumbs=array(
	'Complaints'=>array('admin'),
	'Manage',
);


//$this->widget('bootstrap.widgets.TbButtonGroup', array(
//        'type'=>'primary',
//        'buttons'=>array(
//        array('label'=>'Operations', 'items'=>array(
//                array('label'=>'List Complaints','url'=>array('index')),
//                array('label'=>'Create Complaints','url'=>array('create')),
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
	$.fn.yiiGridView.update('complaints-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="page-title"> <i class="icon-custom-left"></i>
    <h3>Manage - <span class="semi-bold">Complaints</span></h3>
</div>
<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php // echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<!--<div class="search-form" style="display:none">-->
<?php // $this->renderPartial('_search',array(
//	'model'=>$model,
//)); ?>
<!--</div> search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'complaints-grid',
        'type'=>'striped',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'subject',
		'description',
		array(
                    'name' => 'from',
                    'type' => 'raw',
                    'value' => 'CHtml::link($data->from0->getName(),Yii::app()->createUrl("admin/users/view", array("id"=>$data->from0->id)))',
                ),
                array(
                    'name' => 'against',
                    'type' => 'raw',
                    'value' => 'CHtml::link($data->against0->getName(),Yii::app()->createUrl("admin/users/view", array("id"=>$data->against0->id)))',
                ),
		array(
                    'name' => 'project_id',
                    'type' => 'raw',
                    'value' => 'CHtml::link($data->project->title,Yii::app()->createUrl("admin/projects/view", array("id"=>$data->project->id)))',
                ),
                'created',
		/*
		'updated',
		'type',
		'project_id',
		'status',
		'decision',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
        'pager' => array(
            'htmlOptions' => array('class' => 'pagination'),
        ),
)); ?>
