
<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('projects-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
$this->widget('bootstrap.widgets.TbGridView',array(
                                    'id'=>'projects-grid',
                                    'type'=>'striped',
                                    'dataProvider'=>$projects->search(),
                                    'filter'=>$projects,
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
                                                    'template' => '{view}',
                                                    'viewButtonUrl' => 'Yii::app()->createUrl("/admin/projects/view/", array("id" => $data->id))',
                                            ),
                                    ),
                                    'pager' => array(
                                        'htmlOptions' => array('class' => 'pagination'),
                                    ),
                            )); 
