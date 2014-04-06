<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'milestones-grid',
        'type'=>'striped',
	'dataProvider'=>$milestones->search(array('condition' => '`proposal_id` = ' . $model->id)),
	'filter'=>$milestones,
	'columns'=>array(
		'id',
		'title',
		array(
                    'name' => 'status',
                    'type' => 'raw',
                    'value' => 'Projects::model()->getStatusList($data->status)',
                ),
//		'deliverables',
		'cost',
		'created',
		'updated',
		/*
		'status',
		'payment_status',
		'progress',
		'start_date',
		'delivery_date',
		'proposal_id',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
                        'template' => '{view}',
                        'viewButtonUrl' => 'Yii::app()->createUrl("/admin/milestones/view/", array("id" => $data->id))',
		),
	),
        'pager' => array(
            'htmlOptions' => array('class' => 'pagination'),
        ),
)); ?>
