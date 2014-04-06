<?php
$this->breadcrumbs = array(
    'Media' => array('index'),
    'Create',
);

$this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary',
        'buttons'=>array(
        array('label'=>'Operations', 'items'=>array(
                array('label' => 'Manage Media', 'url' => array('admin')),
        ))),
        'htmlOptions'=>array(
                'class' => 'pull-right',
            ),
 ));
?>

<div class="page-title"> <i class="icon-custom-left"></i>
    <h3>Upload - <span class="semi-bold">Media</span></h3>
</div>

<?php echo $this->renderPartial('_xuploadForm', array('xuploadForm' => $xuploadForm)); ?>

<?php

$this->widget('ext.fancybox.EFancyBox', array(
    'target'=>'.fancyImg, .fancyPlay',
    'config'=>array(
        'mouseWheel' => false,
        'arrows' => false,
    ),
));

$this->widget('ext.YiiSortableModel.widgets.SortableTbGridView', array(
    'orderField' => 'position',
    'idField' => 'id',
    'orderUrl' => 'sorting',
    'type' => 'striped',
    'id' => 'media-grid',
    'dataProvider' => $media->relatedTo(Yii::app()->session['Media']['model'], Yii::app()->session['Media']['model_id'])->search(),
    'filter' => $media,
    'columns' => array(
        'id',
        array(
            'name' => 'file_name',
            'type' => 'raw',
            'value' => 'Helpers::mediaDisplay($data)',
        ),
        'title',
        array(
            'name' => 'mime',
            'filter' => Media::getMimeList(),
        ),
        array(
            'name' => 'size',
            'type' => 'raw',
            'value' => 'Utilities::getFileSizeKb($data)',
        ),
        array(
            'name' => 'featured',
            'filter' => Media::getFeaturedList(),
            'value' => 'Media::getFeaturedList($data->featured)',
        ),
        /*
          'model',
          'model_id',
          'created',
          'updated',
         */
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            
        ),
    ),
));
?>