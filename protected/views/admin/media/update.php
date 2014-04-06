<?php
$this->breadcrumbs=array(
	'Medias'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	//array('label'=>'List Media','url'=>array('index')),
	array('label'=>'Upload Media','url'=>array('upload')),
	array('label'=>'View Media','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Media','url'=>array('admin')),
);
?>

<h1>Update Media <?php echo $model->id; ?></h1>

<?php 
if(!empty(Yii::app()->session['Media']['model']))
    echo CHtml::link('Back', Yii::app()->createUrl('admin/media/xupload', array('model'=>$model->model, 'id'=>$model->model_id)));

echo $this->renderPartial('_form',array('model'=>$model)); 

?>