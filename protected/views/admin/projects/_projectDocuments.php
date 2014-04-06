<?php 

$this->widget('ext.fancybox.EFancyBox', array(
    'target'=>'.fancyImg, .fancyPlay',
    'config'=>array(
        'mouseWheel' => false,
        'arrows' => false,
    ),
));

$this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'agreements-grid',
	'dataProvider'=> $documents->search(array('condition' => 'project_id = ' . $model->id)),
	'filter' => $documents,
	'columns'=>array(
//		'id',
//		'file_name',
//                array(
//                    'header' => '',
//                    'type' => 'raw',
//                    'value' => 'Helpers::mediaView($data->media)',
//                ),
//            
                array(
                    'header' => 'Filename',
                    'type' => 'raw',
                    'value' => '$data->media->id',
                ),
//            
		'status',
		array(
                    'name' => 'created',
                    'type' => 'raw',
                    'value' => 'date("Y-m-d H:i:s", $data->created)',
                ),
	),
)); ?>