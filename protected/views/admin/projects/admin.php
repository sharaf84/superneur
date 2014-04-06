<?php
$this->breadcrumbs=array(
	'Projects'=>array('index'),
	'Manage',
);

//
//$this->widget('bootstrap.widgets.TbButtonGroup', array(
//        'type'=>'primary',
//        'buttons'=>array(
//        array('label'=>'Operations', 'items'=>array(
//                array('label'=>'Create Projects','url'=>array('create')),
//        ))),
//        'htmlOptions'=>array(
//                'class' => 'pull-right',
//            ),
// ));

Yii::app()->clientScript->registerScript('search', "

");
?>

<div class="page-title"> <i class="icon-custom-left"></i>
    <h3>Manage - <span class="semi-bold">Projects</span></h3>
</div>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php // echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<!--<div class="search-form" style="display:none">-->
<?php 

//$this->renderPartial('_search',array(
//	'model'=>$model,
//)); 

?>
<!--</div> search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'projects-grid',
        'type'=>'striped',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'title',
		'description',
		'slug',
		'type',
		'created',
		/*
		'updated',
		'enabled',
		'status',
		'progress',
		'budget_type',
		'min_budget',
		'max_budget',
		'interval',
		'hours_per_interval',
		'start_date',
		'publish_date',
		'expiration_date',
		'completion_date',
		'min_score',
		'privacy',
		'seo_indexing',
		'owner_id',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
                        'template'=>'{view}{approve}', //{update}{delete}
                            'cssClassExpression' => '"$data->id"',
                            'htmlOptions' => array('style' => 'width:60px;'),
                            'buttons' => array(
                                'approve' => array(
                                    'label' => 'Approve',
                                    'url' => 'Yii::app()->createUrl("admin/projects/approve", array("id"=>$data->id))',//'"/admin/projects/approve/$data->id"', // a PHP expression for generating the URL of the button
                                    //'imageUrl' => false, // image URL of the button. If not set or false, a text link is used
                                    //'click' => '...', // a JS function to be invoked when the button is clicked
                                    'visible' => '($data->status == 0) ? true : false', // a PHP expression for determining whether the button is visible
                                )
                            )
		),
	),
        'pager' => array(
            'htmlOptions' => array('class' => 'pagination'),
        ),
)); ?>
