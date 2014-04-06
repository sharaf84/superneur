<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'proposals-grid',
        'type'=>'striped',
	'dataProvider'=>$bids->search(array('condition' => '`project_id` = ' . $model->id)),
	'filter'=>$bids,
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