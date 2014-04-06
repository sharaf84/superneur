<?php
$this->breadcrumbs = array(
    'Medias' => array('index'),
    'Manage',
);

$this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary',
        'buttons'=>array(
        array('label'=>'Operations', 'items'=>array(
                array('label' => 'Upload Media', 'url' => array('xupload')),
        ))),
        'htmlOptions'=>array(
                'class' => 'pull-right',
            ),
 ));

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('media-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Medias</h1>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button btn')); ?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('ext.fancybox.EFancyBox', array(
    'target' => '.fancyImg, .fancyPlay',
    'config' => array(
        'mouseWheel' => false,
        'arrows' => false,
    ),
));

$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'media-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
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
            'filter' => $model->getMimeList(),
        ),
        array(
            'name' => 'size',
            'type' => 'raw',
            'value' => 'Utilities::getFileSizeKb($data)',
        ),
        'model',
        'model_id',
        /*
          'created',
          'updated',
         */
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>
