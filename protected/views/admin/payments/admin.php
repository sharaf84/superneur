<?php
$this->breadcrumbs=array(
	'Payments'=>array('index'),
	'Manage',
);


$this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary',
        'buttons'=>array(
        array('label'=>'Operations', 'items'=>array(
                array('label'=>'List Payments','url'=>array('index')),
                array('label'=>'Create Payments','url'=>array('create')),
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
	$.fn.yiiGridView.update('payments-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Payments</h1>

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
	'id'=>'payments-grid',
        'type'=>'striped',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'operation',
		'amount',
		'profit_percentage',
		'profit',
//		'sender_id',
                array(
                    'name' => 'sender_id',
                    'type' => 'raw',
                    'value' => 'CHtml::link($data->sender->getName(),Yii::app()->createUrl("admin/users/view", array("id"=>$data->sender->id)))',
                ),
                array(
                    'name' => 'receiver_id',
                    'type' => 'raw',
                    'value' => 'CHtml::link($data->receiver->getName(),Yii::app()->createUrl("admin/users/view", array("id"=>$data->receiver->id)))',
                ),
		/*
		'receiver_id',
		'project_id',
		'milestone_id',
		'created',
		'updated',
		'token',
		'token_date',
		'status',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
                        'template' => '{view}{delete}',
                        'template' => '{view}{delete}{download}',
                        'buttons' => array(
                            'download' => array(
                                'label' => '<i class="fa fa-download"></i>',
                                'url' => 'Yii::app()->createUrl("admin/payments/csv", array("class" => "Payments", "condition"=>"id = ".$data->id))',
                                'options' => array('title' => 'CSV'), // HTML options for the button tag
                            )
                        ),
		),
	),
        'pager' => array(
            'htmlOptions' => array('class' => 'pagination'),
        ),
)); ?>
