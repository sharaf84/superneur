<div class="col-md-12">
    <div class="grid simple">
        <div class="grid-body no-border"> <br>
            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-8">
<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'settings-form',
    'enableAjaxValidation' => false,
        ));
?>

<blockquote class="margin-top-20">
    <p class="help-block">Fields with <span class="required">*</span> are required.</p>
</blockquote>

<?php echo $form->errorSummary($model); ?>
<div class="form-group">
<?php echo $form->textFieldRow($model, 'key', array('class' => 'form-control', 'maxlength' => 45, 'disabled' => !$model->isNewRecord)); ?>
</div>
<div class="form-group">
<?php echo $form->textFieldRow($model, 'value', array('class' => 'form-control', 'maxlength' => 500)); ?>
</div>
<div class="form-group">
<?php echo $form->textFieldRow($model, 'description', array('class' => 'form-control', 'maxlength' => 500)); ?>
</div>
<?php //echo $form->textFieldRow($model, 'created', array('class' => 'span5')); ?>

<?php //echo $form->textFieldRow($model, 'updated', array('class' => 'span5')); ?>

<div class="form-group">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => $model->isNewRecord ? 'Create' : 'Save',
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
       </div>
            </div>
        </div>
    </div>
</div>