<?php
$this->breadcrumbs=array(
	'Proposals'=>array('index'),
	$model->id,
);

$this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary',
        'buttons'=>array(
        array('label'=>'Operations', 'items'=>array(
//                array('label'=>'List Proposals','url'=>array('index')),
//                array('label'=>'Create Proposals','url'=>array('create')),
//                array('label'=>'Update Proposals','url'=>array('update','id'=>$model->id)),
                array('label'=>'Delete Proposals','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
                array('label'=>'Manage Proposals','url'=>array('admin')),
        ))),
        'htmlOptions'=>array(
                'class' => 'pull-right',
            ),
 ));
?>

<div class="page-title"> <i class="icon-custom-left"></i>
    <h3>View - <span class="semi-bold">Proposals #<?php echo $model->id; ?></span></h3>
</div>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'description',
		array(
                    'name' => 'status',
                    'type' => 'raw',
                    'value' => Proposals::model()->getStatusList($model->status),
                ),
		array(
                    'name' => 'activity',
                    'type' => 'raw',
                    'value' => Proposals::model()->getActivityList($model->activity),
                ),
//		'activity',
		'start_date',
//		'started',
                array(
                    'name' => 'started',
                    'type' => 'raw',
                    'value' => Proposals::model()->getStartList($model->started),
                ),
                array(
                    'name' => 'user_id',
                    'type' => 'raw',
                    'value' => CHtml::link($model->user->getName(),Yii::app()->createUrl("admin/users/view", array("id"=>$model->user->id))),
                ),
                array(
                    'name' => 'duration',
                    'type' => 'raw',
                    'value' => $model->duration . ' Day',
                ),
                array(
                    'name' => 'project_id',
                    'type' => 'raw',
                    'value' => CHtml::link($model->project->title,Yii::app()->createUrl("admin/projects/view", array("id"=>$model->project->id))),
                ),
//		'duration',
		'created',
		'updated',
		
//		'user_id',
	),
)); ?>

<div class="page-title"> <i class="icon-custom-left"></i>
    <h3>Related - <span class="semi-bold">Milestones</span></h3>
</div>
<?php 
    $this->renderPartial('_proposalMilestones', array('milestones' => $milestones, 'model' => $model));
?>