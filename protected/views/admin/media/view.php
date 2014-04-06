<?php
$this->breadcrumbs = array(
    'Medias' => array('index'),
    $model->title,
);

$this->menu = array(
    //array('label' => 'List Media', 'url' => array('index')),
    array('label' => 'Upload Media', 'url' => array('xupload')),
    array('label' => 'Update Media', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete Media', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Media', 'url' => array('admin')),
);
?>

<h1>View Media #<?php echo $model->id; ?></h1>

<?php
if(!empty(Yii::app()->session['Media']['model']))
    echo CHtml::link('Back', Yii::app()->createUrl('admin/media/xupload', array('model'=>$model->model, 'id'=>$model->model_id)));

$this->widget('ext.fancybox.EFancyBox', array(
    'target'=>'.fancyImg, .fancyPlay',
    'config'=>array(
        'mouseWheel' => false,
        'arrows' => false,
    ),
));

$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        array(
            'label' => 'Display',
            'type' => 'raw',
            'value' => Helpers::mediaDisplay($model),
        ),
        'path',
        'file_name',
        'mime',
        'size',
        'title',
        'description',
        'embed',
        'featured',
        'type',
        'position',
        'created',
        'updated',
        'model',
        'model_id',
    ),
));
?>
