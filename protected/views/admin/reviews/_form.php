<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'reviews-form',
	'enableAjaxValidation'=>false,
)); ?>

        <blockquote class="margin-top-20">
            <p class="help-block">Fields with <span class="required">*</span> are required.</p>
        </blockquote>
	

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->label($model, 'subject', array('class' => 'form-label', 'for' => 'normal')).''.$form->textFieldRow($model,'subject',array('class'=>'form-control','maxlength'=>255, 'labelOptions' => array('label' => false))).''.'<br /><br />'; ?>

	<?php echo $form->label($model, 'review', array('class' => 'form-label', 'for' => 'normal')).''.$form->textFieldRow($model,'review',array('class'=>'form-control','maxlength'=>4096, 'labelOptions' => array('label' => false))).''.'<br /><br />'; ?>

	<?php echo $form->label($model, 'from', array('class' => 'form-label', 'for' => 'normal')).''.$form->textFieldRow($model,'from',array('class'=>'form-control','maxlength'=>10, 'labelOptions' => array('label' => false))).''.'<br /><br />'; ?>

	<?php echo $form->label($model, 'to', array('class' => 'form-label', 'for' => 'normal')).''.$form->textFieldRow($model,'to',array('class'=>'form-control','maxlength'=>10, 'labelOptions' => array('label' => false))).''.'<br /><br />'; ?>

	<?php echo $form->label($model, 'commitment_rate', array('class' => 'form-label', 'for' => 'normal')).''.$form->textFieldRow($model,'commitment_rate',array('class'=>'form-control','maxlength'=>2, 'labelOptions' => array('label' => false))).''.'<br /><br />'; ?>

	<?php echo $form->label($model, 'quality_rate', array('class' => 'form-label', 'for' => 'normal')).''.$form->textFieldRow($model,'quality_rate',array('class'=>'form-control','maxlength'=>2, 'labelOptions' => array('label' => false))).''.'<br /><br />'; ?>

	<?php echo $form->label($model, 'cost_rate', array('class' => 'form-label', 'for' => 'normal')).''.$form->textFieldRow($model,'cost_rate',array('class'=>'form-control','maxlength'=>2, 'labelOptions' => array('label' => false))).''.'<br /><br />'; ?>

	<?php echo $form->label($model, 'availability_rate', array('class' => 'form-label', 'for' => 'normal')).''.$form->textFieldRow($model,'availability_rate',array('class'=>'form-control','maxlength'=>2, 'labelOptions' => array('label' => false))).''.'<br /><br />'; ?>

	<?php echo $form->label($model, 'created', array('class' => 'form-label', 'for' => 'normal')).'<div class="input-append success date col-md-10 col-lg-6">'.$form->textFieldRow($model,'created',array('class'=>'form-control', 'labelOptions' => array('label' => false))).'<span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span></div>'.'<br /><br />'; ?>

	<?php echo $form->label($model, 'updated', array('class' => 'form-label', 'for' => 'normal')).'<div class="input-append success date col-md-10 col-lg-6">'.$form->textFieldRow($model,'updated',array('class'=>'form-control', 'labelOptions' => array('label' => false))).'<span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span></div>'.'<br /><br />'; ?>

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
