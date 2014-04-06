<?php
/* @var $this OperationController|TaskController|RoleController */
/* @var $model AuthItemForm */
/* @var $form TbActiveForm */

$this->breadcrumbs = array(
    $this->capitalize($this->getTypeText(true)) => array('index'),
    Yii::t('AuthModule.main', 'New {type}', array('{type}' => $this->getTypeText())),
);
?>

<h1><?php echo Yii::t('AuthModule.main', 'New {type}', array('{type}' => $this->getTypeText())); ?></h1>

<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'type' => 'horizontal',
        ));
?>
<?php echo $form->hiddenField($model, 'type'); ?>
<div class="control-group ">
    <?php echo $form->labelEx($model, 'name', array('class' => 'control-label required')); ?>
    <div class="controls">
        <?php
        $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
            'model' => $model,
            'attribute' => 'name',
            'source' => $operations,
            // additional javascript options for the autocomplete plugin
            'options' => array(
                'minLength' => '2',
            )
        ));
        ?>
    </div>
</div>
<?php echo $form->textFieldRow($model, 'description'); ?>

<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => Yii::t('AuthModule.main', 'Create'),
    ));
    ?>
    <?php
    $this->widget('TbButton', array(
        'type' => 'link',
        'label' => Yii::t('AuthModule.main', 'Cancel'),
        'url' => array('index'),
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
