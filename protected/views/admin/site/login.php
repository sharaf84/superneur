<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */
$this->pageTitle=Yii::app()->name . ' - Login';

$this->breadcrumbs=array(
	'Login',
);
?>


<!--<h1>Login</h1>-->
<div class="page-title"> <i class="icon-custom-left"></i>
    <h3><span class="semi-bold">Login</span></h3>
</div>
<p>Please fill out the following form with your login credentials:</p>

<div class="form">
<div class="col-md-12">
    <div class="grid simple">
        <div class="grid-body no-border"> <br>
            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-8">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'login-form',
    'type'=>'horizontal',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<blockquote class="margin-top-20">
            <p class="help-block">Fields with <span class="required">*</span> are required.</p>
        </blockquote>

	<?php echo $form->textFieldRow($model,'username'); ?>

	<?php echo $form->passwordFieldRow($model,'password',array(
        'hint'=>'Hint: You may login with <kbd>master</kbd>/<kbd>master</kbd>',
    )); ?>

	<?php echo $form->checkBoxRow($model,'rememberMe'); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType'=>'submit',
            'type'=>'primary',
            'label'=>'Login',
        )); ?>
	</div>

<?php $this->endWidget(); ?>
  </div>
            </div>
        </div>
    </div>
</div>
</div><!-- form -->
