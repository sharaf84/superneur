<?php
$this->breadcrumbs = array(
    'Posts' => array('index'),
    $model->title => array('view', 'id' => $model->id),
    'Update',
);


$this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary',
        'buttons'=>array(
        array('label'=>'Operations', 'items'=>array(
                array('label' => 'Create ' . Posts::getTypeList(Yii::app()->session['postType']), 'url' => array('create')),
//                array('label' => 'View ' . Posts::getTypeList(Yii::app()->session['postType']), 'url' => array('view', 'id' => $model->id)),
                array('label' => 'Manage ' . Posts::getTypeList(Yii::app()->session['postType']), 'url' => array('admin')),
                array('label' => 'Manage Media', 'url' => Yii::app()->createUrl('admin/media/xupload', array('model' => 'Posts', 'id' => $model->id)), 'linkOptions' => array('class' => 'fancyIframeMedia', 'data-fancybox-type' => 'iframe')),

        ))),
        'htmlOptions'=>array(
                'class' => 'pull-right',
            ),
 ));
?>
<div class="page-title"> <i class="icon-custom-left"></i>
    <h3>Update - <span class="semi-bold"> <?php echo Posts::getTypeList(Yii::app()->session['postType']) .' '.$model->id; ?></span></h3>
</div>


<?php echo $this->renderPartial('_form', array('model' => $model)); ?>