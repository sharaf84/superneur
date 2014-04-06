<?php
$this->breadcrumbs = array(
    'Users' => array('index'),
    'Manage',
);
$this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary',
        'buttons'=>array(
        array('label'=>'Operations', 'items'=>array(
                array('label' => 'Create Users', 'url' => array('create')),
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
	$.fn.yiiGridView.update('users-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Users</h1>

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
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'users-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'username',
        'email',
        array(
            'name' => 'type',
            'filter' => Users::getTypeList(true),
            'value' => 'Users::getTypeList(true, $data->type)',
        ),
        array(
            'name' => 'verified',
            'filter' => Users::getVerifiedList(),
            'value' => 'Users::getVerifiedList($data->verified)',
        ),
        array(
            'name' => 'banned',
            'filter' => Users::getBannedList(),
            'value' => 'Users::getBannedList($data->banned)',
        ),
        array(
            'name' => 'activated',
            'filter' => Users::getActivatedList(),
            'type' => 'raw',
            'value' => '$data->getActivateLink();',
        ),
        /*
          'activated',
          'banned',
          'token',
          'token_date',
          'signature',
          'login_token',
          'last_login',
          'first_name',
          'last_name',
          'gender',
          'birthdate',
          'country_phone_code',
          'phone',
          'facebook_identifier',
          'metadata',
          'created',
          'updated',
          'created_by',
         */
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{view}{update}{delete}{media}',
            'htmlOptions' => array('style' => 'width:60px;'),
            'buttons' => array(
                'delete' => array(
                    'visible' => '($data->type != Users::TYPE_MASTER) ? true : false',
                ),
                'update' => array(
                    'visible' => '($data->type != Users::TYPE_MASTER || Yii::app()->user->isMaster) ? true : false',
                ),
                'view' => array(
                    'visible' => '($data->type != Users::TYPE_MASTER || Yii::app()->user->isMaster) ? true : false',
                ),
                'media' => array(
                    'label' => '<i class="icon-camera"></i>',
                    'url' => 'Yii::app()->createUrl("admin/media/xupload", array("model"=>get_class($data),"id"=>$data->id))', // a PHP expression for generating the URL of the button
                    'options' => array('title' => 'Media', 'class' => 'fancyIframeMedia', 'data-fancybox-type' => 'iframe'), // HTML options for the button tag
                )
            ),
        ),
    ),
));
?>
