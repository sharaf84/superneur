<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'media-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'title',array('class'=>'span5','maxlength'=>255)); ?>
        
	<?php echo $form->textAreaRow($model,'description',array('class'=>'span5','maxlength'=>1000)); ?>
        
        <?php echo $form->textFieldRow($model,'link',array('class'=>'span5','maxlength'=>255)); ?>
        
        <?php echo $form->textAreaRow($model,'embed',array('class'=>'span5','maxlength'=>1000)); ?>
        
        <?php echo $form->checkBoxRow($model,'featured',array('class'=>'span5')); ?>
        
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
