<?php
$this->breadcrumbs = array(
    'Posts' => array('index'),
    $model->title,
);

$this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary',
        'buttons'=>array(
        array('label'=>'Operations', 'items'=>array(
                array('label' => 'Create ' . Posts::getTypeList(Yii::app()->session['postType']), 'url' => array('create')),
                array('label' => 'Update ' . Posts::getTypeList(Yii::app()->session['postType']), 'url' => array('update', 'id' => $model->id)),
                array('label' => 'Delete ' . Posts::getTypeList(Yii::app()->session['postType']), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
                array('label' => 'Manage ' . Posts::getTypeList(Yii::app()->session['postType']), 'url' => array('admin')),
                array('label' => 'Manage Media', 'url' => Yii::app()->createUrl('admin/media/xupload', array('model'=>'Posts', 'id'=>$model->id)), 'linkOptions' => array('class' => 'fancyIframeMedia', 'data-fancybox-type' => 'iframe')),

        ))),
        'htmlOptions'=>array(
                'class' => 'pull-right',
            ),
 ));

?>

<div class="page-title"> <i class="icon-custom-left"></i>
    <h3>View <?php echo Posts::getTypeList(Yii::app()->session['postType']);?> - <span class="semi-bold">#<?php echo $model->id?></span></h3>
</div>

<p>
    <!--View Url:--> 
    <?php
//    echo CHtml::link($model->getFrontUrl('view'), $model->getFrontUrl('view'), array('target' => 'blanck'));
    ?>
</p>
<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
//        array('name'=>'type', 'value' => Posts::getTypeList($model->type)),
        'title',
        array('name'=>'date', 'value' => $model->date, 'visible' => (Yii::app()->session['postType'] == Posts::TYPE_EVENT) ? TRUE: FALSE),
        array('name'=>'end_date', 'value' => $model->end_date, 'visible' => (Yii::app()->session['postType'] == Posts::TYPE_EVENT) ? TRUE : FALSE ),
        //'slug',
        'description',
//        'body',visible
        array('name'=>'body', 'type' => 'raw','value' => $model->body, 'visible' => (Yii::app()->session['postType'] == Posts::TYPE_FAQ) ? false : true ),
//        'date',
//        'end_date',
//        'position',
        'created',
        'updated',
    ),
));
?>