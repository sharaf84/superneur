
<?php
$this->breadcrumbs=array(
	'Complaints'=>array('admin'),
	$model->subject,
);

$this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary',
        'buttons'=>array(
        array('label'=>'Operations', 'items'=>array(
//                array('label'=>'List Complaints','url'=>array('index')),
//                array('label'=>'Create Complaints','url'=>array('create')),
                array('label'=>'Update Complaints','url'=>array('update','id'=>$model->id)),
//                array('label'=>'Delete Complaints','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
                array('label'=>'Manage Complaints','url'=>array('admin')),
        ))),
        'htmlOptions'=>array(
                'class' => 'pull-right',
            ),
 ));
?>

<div class="page-title"> <i class="icon-custom-left"></i>
    <h3>View Complaint - <span class="semi-bold"><?php echo $model->subject; ?></span></h3>
</div>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'subject',
		'description',
		array(
                    'name' => 'from',
                    'type' => 'raw',
                    'value' => CHtml::link($model->from0->getName(),Yii::app()->createUrl("admin/users/view", array("id"=>$model->from0->id))),
                ),
                array(
                    'name' => 'against',
                    'type' => 'raw',
                    'value' => CHtml::link($model->against0->getName(),Yii::app()->createUrl("admin/users/view", array("id"=>$model->against0->id))),
                ),
                array(
                    'name' => 'project_id',
                    'type' => 'raw',
                    'value' => CHtml::link($model->project->title,Yii::app()->createUrl("admin/projects/view", array("id"=>$model->project->id))),
                ),
		'created',
		'updated',
//		'type',
		array(
                    'name' => 'type',
                    'type' => 'raw',
                    'value' => Complaints::model()->getTypeList($model->type),
                ),
		array(
                    'name' => 'status',
                    'type' => 'raw',
                    'value' => Complaints::model()->getStatusList($model->status),
                ),
//		'status',
		'decision',
	),
)); ?>