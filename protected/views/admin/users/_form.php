<div class="col-md-12">
    <div class="grid simple">
        <div class="grid-body no-border"> <br>
            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-8">
                    
<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'users-form',
    'enableAjaxValidation' => false,
    'htmlOptions' => array(
        'autocomplete' => 'off'
    )
        ));
?>

<blockquote class="margin-top-20">
    <p class="help-block">Fields with <span class="required">*</span> are required.</p>
</blockquote>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model, 'username', array('class' => 'form-control', 'maxlength' => 45)); ?>

<?php echo $form->textFieldRow($model, 'email', array('class' => 'form-control', 'maxlength' => 255)); ?>

<?php
if ($model->id != 1) {
    echo $form->labelEx($model, 'type');
    echo $form->dropDownList($model, 'type', Users::getTypeList(), array('class' => 'form-control'));
}
?>
<div class="form-group">
<?php echo $form->textFieldRow($model, 'first_name', array('class' => 'form-control', 'maxlength' => 45)); ?>
</div>
<div class="form-group">

<?php echo $form->textFieldRow($model, 'last_name', array('class' => 'form-control', 'maxlength' => 45)); ?>
</div>

<?php //echo $form->textFieldRow($model, 'country_phone_code', array('class' => 'span5')); ?>
<div class="form-group">
<?php echo $form->textFieldRow($model, 'phone', array('class' => 'form-control', 'maxlength' => 11)); ?>
</div>


<?php //echo $form->textFieldRow($model, 'gender', array('class' => 'span5', 'maxlength' => 6)); ?>

<?php //echo $form->textFieldRow($model, 'birthdate', array('class' => 'span5')); ?>
<div class="form-group">
<?php echo $form->checkboxRow($model, 'verified'); ?>
</div>
<div class="form-group">
<?php echo $form->checkboxRow($model, 'activated'); ?>
</div>
<div class="form-group">
<?php echo $form->checkboxRow($model, 'banned'); ?>
</div>
<div class="form-group">
<p class="<?php echo $model->isNewRecord ? 'hide' : '';?>" onclick="$('.passwordHolder').toggle();" style="cursor: pointer"><strong>Reset Password</strong></p>
<div class="passwordHolder <?php echo !$model->isNewRecord ? 'hide' : '';?>">
    <?php echo $form->passwordFieldRow($model, 'password', array('value' => '', 'class' => 'form-control', 'maxlength' => 81)); ?>
    <?php echo $form->passwordFieldRow($model, 'password_repeat', array('value' => '', 'class' => 'form-control', 'maxlength' => 81)); ?>
</div>
</div>

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