<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'complaints-grid',
        'type'=>'striped',
	'dataProvider'=>$disputes->search(array('condition' => '`project_id` = ' . $model->id)),
	'filter'=>$disputes,
	'columns'=>array(
		'id',
		'subject',
		'description',
//		'from',
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
//		array(
//                    'name' => 'project_id',
//                    'type' => 'raw',
//                    'value' => 'CHtml::link($data->project->title,Yii::app()->createUrl("admin/projects/view", array("id"=>$data->project->id)))',
//                ),
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
                        'template' => '{view}',
                        'viewButtonUrl' => 'Yii::app()->createUrl("/admin/complaints/view/", array("id" => $data->id))',
		),
	),
        'pager' => array(
            'htmlOptions' => array('class' => 'pagination'),
        ),
)); ?>