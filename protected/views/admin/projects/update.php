<?php
$this->breadcrumbs=array(
	'Projects'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary',
        'buttons'=>array(
        array('label'=>'Operations', 'items'=>array(
                array('label'=>'Create Projects','url'=>array('create')),
                array('label'=>'View Projects','url'=>array('view','id'=>$model->id)),
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
    <h3>Update - <span class="semi-bold">Projects <?php echo $model->id; ?></span></h3>
</div>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>