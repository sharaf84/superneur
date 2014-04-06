<?php
$this->breadcrumbs = array(
    'Posts' => array('index'),
    'Manage',
);

$this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary',
        'buttons'=>array(
        array('label'=>'Operations', 'items'=>array(
                array('label' => 'Create ' . Posts::getTypeList(Yii::app()->session['postType']), 'url' => array('create')),
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
	$.fn.yiiGridView.update('posts-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="page-title"> <i class="icon-custom-left"></i>
    <h3>Manage - <span class="semi-bold"><?php echo Posts::getTypeList(Yii::app()->session['postType']);?></span></h3>
</div>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php // echo CHtml::link('Advanced Search', '#', array('class' => 'search-button btn')); ?>
<!--<div class="search-form" style="display:none">-->
    <?php
//    $this->renderPartial('_search', array(
//        'model' => $model,
//    ));
    ?>
<!--</div> search-form -->

<?php
$this->widget('ext.YiiSortableModel.widgets.SortableTbGridView', array(
    'orderField' => 'position',
    'idField' => 'id',
    'orderUrl' => 'sorting',
    'type' => 'striped',
    'id' => 'posts-grid',
    'dataProvider' => $model->scopeStatus('<>' . Posts::STATUS_DRAFT)->scopeType(Yii::app()->session['postType'])->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'title',
        'position',
//        array(
//            'name' => 'type',
//            'filter' => Posts::getTypeList(),
//            'value' => 'Posts::getTypeList($data->type)',
//        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template'=>'{view}{update}{delete}{media}',
            'cssClassExpression' => '"media_$data->id"',
            'htmlOptions' => array('style' => 'width:60px;'),
            'buttons' => array(
                'media' => array(
                    'label' => '<i class="fa fa-camera"></i>',
                    'url' => 'Yii::app()->createUrl("admin/media/xupload", array("model"=>get_class($data),"id"=>$data->id))', // a PHP expression for generating the URL of the button
                    //'imageUrl' => false, // image URL of the button. If not set or false, a text link is used
                    'options' => array('title' => 'Media', 'class' => 'fancyIframeMedia', 'data-fancybox-type' => 'iframe'), // HTML options for the button tag
                    //'click' => '...', // a JS function to be invoked when the button is clicked
                    //'visible' => '...', // a PHP expression for determining whether the button is visible
                )
            )
        ),
    ),
));
?>
