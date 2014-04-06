<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'payments-grid',
        'type'=>'striped',
	'dataProvider'=>$transactions->search(array('condition' => '`sender_id` = ' . $model->id . ' OR `receiver_id` = ' . $model->id)),
	'filter'=>$transactions,
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