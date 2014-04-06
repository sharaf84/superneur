<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'messages-form',
	'enableAjaxValidation'=>false,
)); ?>

        <blockquote class="margin-top-20">
            <p class="help-block">Fields with <span class="required">*</span> are required.</p>
        </blockquote>
	

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->label($model, 'message', array('class' => 'form-label', 'for' => 'normal')).''.$form->textFieldRow($model,'message',array('class'=>'form-control','maxlength'=>4096, 'labelOptions' => array('label' => false))).''.'<br /><br />'; ?>

	<?php echo $form->label($model, 'created', array('class' => 'form-label', 'for' => 'normal')).'<div class="input-append success date col-md-10 col-lg-6">'.$form->textFieldRow($model,'created',array('class'=>'form-control', 'labelOptions' => array('label' => false))).'<span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span></div>'.'<br /><br />'; ?>

	<?php echo $form->label($model, 'updated', array('class' => 'form-label', 'for' => 'normal')).'<div class="input-append success date col-md-10 col-lg-6">'.$form->textFieldRow($model,'updated',array('class'=>'form-control', 'labelOptions' => array('label' => false))).'<span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span></div>'.'<br /><br />'; ?>

	<?php echo $form->label($model, 'parent_id', array('class' => 'form-label', 'for' => 'normal')).''.$form->textFieldRow($model,'parent_id',array('class'=>'form-control','maxlength'=>10, 'labelOptions' => array('label' => false))).''.'<br /><br />'; ?>

	<?php echo $form->label($model, 'sender_id', array('class' => 'form-label', 'for' => 'normal')).''.$form->textFieldRow($model,'sender_id',array('class'=>'form-control','maxlength'=>10, 'labelOptions' => array('label' => false))).''.'<br /><br />'; ?>

	<?php echo $form->label($model, 'receiver_id', array('class' => 'form-label', 'for' => 'normal')).''.$form->textFieldRow($model,'receiver_id',array('class'=>'form-control','maxlength'=>10, 'labelOptions' => array('label' => false))).''.'<br /><br />'; ?>

	<?php echo $form->label($model, 'project_id', array('class' => 'form-label', 'for' => 'normal')).''.$form->textFieldRow($model,'project_id',array('class'=>'form-control','maxlength'=>10, 'labelOptions' => array('label' => false))).''.'<br /><br />'; ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? ' Create' : ' Save',
//			'label'=>$model->isNewRecord ? '<i class="fa fa-check"></i> Create' : '<i class="fa fa-paste"></i> Save',
                        'htmlOptions' => array('class' => $model->isNewRecord ? 'btn btn-primary btn-cons' : 'btn btn-info btn-cons' ),
		)); ?>
	</div>

<?php $this->endWidget(); ?>
