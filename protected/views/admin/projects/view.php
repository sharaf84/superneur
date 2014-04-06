<?php
$this->breadcrumbs=array(
	'Projects'=>array('index'),
	$model->title,
);

$this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary',
        'buttons'=>array(
        array('label'=>'Operations', 'items'=>array(
//                array('label'=>'Create Projects','url'=>array('create')),
//                array('label'=>'Update Projects','url'=>array('update','id'=>$model->id)),
//                array('label'=>'Delete Projects','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
                array('label'=>'Manage Projects','url'=>array('admin')),
                array('label' => 'Manage Attachments', 'url' => Yii::app()->createUrl('admin/media/xupload', array('model' => 'Projects', 'id' => $model->id)), 'linkOptions' => array('class' => 'fancyIframeMedia', 'data-fancybox-type' => 'iframe')),
                array('label' => 'Manage Legal Documents', 'url' => Yii::app()->createUrl('admin/media/xupload', array('model' => 'LegalDocuments', 'id' => $model->id)), 'linkOptions' => array('class' => 'fancyIframeMedia', 'data-fancybox-type' => 'iframe')),
        ))),
        'htmlOptions'=>array(
                'class' => 'pull-right',
            ),
 ));
?>

<div class="page-title"> <i class="icon-custom-left"></i>
    <h3>View Project - <span class="semi-bold"><?php echo $model->title; ?></span></h3>
</div>

<?php
$this->renderPartial('_projectConversations', array('conversationsArr' => $conversationsArr, 'model' => $model));
?>

<div class="row">
                    <br>
                    <ul class="nav nav-tabs" id="myTab">
                        <li class="active"><a href="#overview"><?php echo Yii::t('default', 'Overview');?></a></li>
                        <li><a href="#proposals"><?php echo Yii::t('default', 'Proposals');?></a></li>
                        <li><a href="#disputes"><?php echo Yii::t('default', 'Disputes');?></a></li>
                        <!--<li><a href="#legal"><?php echo Yii::t('default', 'Legal Documents');?></a></li>-->
                        <li><a href="#transactions"><?php echo Yii::t('default', 'Transactions');?></a></li>
                      </ul>
                      <div class="tab-content">
                          <div class="tab-pane active" id="overview">
                               <?php $this->widget('bootstrap.widgets.TbDetailView',array(
                                        'data'=>$model,
                                        'attributes'=>array(
                                                'id',
                                                'title',
                                                'description',
                                                'slug',
                                                array(
                                                    'name' => 'type',
                                                    'type' => 'raw',
                                                    'value' => Projects::model()->getTypeList($model->type),
                                                ),
                                                'created',
                                                'updated',
//                                                'enabled',
                                                array(
                                                    'name' => 'enabled',
                                                    'type' => 'raw',
                                                    'value' => Projects::model()->getEnabledList($model->enabled),
                                                ),
//                                                'status',
                                                array(
                                                    'name' => 'status',
                                                    'type' => 'raw',
                                                    'value' => Projects::model()->getStatusList($model->status),
                                                ),
                                                'progress',
//                                                'budget_type',
                                                array(
                                                    'name' => 'budget_type',
                                                    'type' => 'raw',
                                                    'value' => Projects::model()->getBudgetList($model->budget_type),
                                                ),
                                                'min_budget',
                                                'max_budget',
//                                                array(
//                                                    'name' => 'interval',
//                                                    'type' => 'raw',
//                                                    'value' => Projects::model()->getIntervalList($data->interval),
//                                                ),
//                                                'hours_per_interval',
                                                'start_date',
                                                'publish_date',
                                                'expiration_date',
                                                'completion_date',
                                                'min_score',
//                                                'privacy',
                                                array(
                                                    'name' => 'privacy',
                                                    'type' => 'raw',
                                                    'value' => Projects::model()->getPrivacyList($model->privacy),
                                                ),
                                                array(
                                                    'name' => 'seo_indexing',
                                                    'type' => 'raw',
                                                    'value' => Projects::model()->getSeoList($model->seo_indexing),
                                                ),
//                                                'seo_indexing',
//                                                'owner_id',
                                                array(
                                                    'name' => 'owner_id',
                                                    'type' => 'raw',
                                                    'value' => CHtml::link($model->owner->getName(),Yii::app()->createUrl("admin/users/view", array("id"=>$model->owner->id))),
                                                ),
                                        ),
                                )); ?>
                          </div>
                          <div class="tab-pane" id="proposals">
                               <?php
                                    $this->renderPartial('_projectProposals', array('bids' => $bids, 'model' => $model));
                                ?>
                          </div>
                          <div class="tab-pane" id="disputes">
                              <?php 
                                    $this->renderPartial('_projectComplaints', array('disputes' => $disputes, 'model' => $model));
                              ?>
                          </div>
                          <!--<div class="tab-pane" id="legal">-->
                              <?php 
//                                      $this->renderPartial('_projectDocuments', array('documents' => $documents, 'model' => $model));
                              ?>
                          <!--</div>-->
                          <div class="tab-pane" id="transactions">
                              <?php 
                                    $this->renderPartial('_projectTransactions', array('transactions' => $payments, 'model' => $model));
                              ?>
                          </div>
                          
                      </div>
                </div>