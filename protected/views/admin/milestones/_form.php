<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'milestones-form',
	'enableAjaxValidation'=>false,
)); ?>

        <blockquote class="margin-top-20">
            <p class="help-block">Fields with <span class="required">*</span> are required.</p>
        </blockquote>
	

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->label($model, 'title', array('class' => 'form-label', 'for' => 'normal')).''.$form->textFieldRow($model,'title',array('class'=>'form-control','maxlength'=>45, 'labelOptions' => array('label' => false))).''.'<br /><br />'; ?>

	<?php echo $form->label($model, 'deliverables', array('class' => 'form-label', 'for' => 'normal')).''.$form->textFieldRow($model,'deliverables',array('class'=>'form-control','maxlength'=>500, 'labelOptions' => array('label' => false))).''.'<br /><br />'; ?>

	<?php echo $form->label($model, 'cost', array('class' => 'form-label', 'for' => 'normal')).''.$form->textFieldRow($model,'cost',array('class'=>'form-control','maxlength'=>10, 'labelOptions' => array('label' => false))).''.'<br /><br />'; ?>

	<?php echo $form->label($model, 'created', array('class' => 'form-label', 'for' => 'normal')).'<div class="input-append success date col-md-10 col-lg-6">'.$form->textFieldRow($model,'created',array('class'=>'form-control', 'labelOptions' => array('label' => false))).'<span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span></div>'.'<br /><br />'; ?>

	<?php echo $form->label($model, 'updated', array('class' => 'form-label', 'for' => 'normal')).'<div class="input-append success date col-md-10 col-lg-6">'.$form->textFieldRow($model,'updated',array('class'=>'form-control', 'labelOptions' => array('label' => false))).'<span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span></div>'.'<br /><br />'; ?>

	<?php echo $form->label($model, 'status', array('class' => 'form-label', 'for' => 'normal')).$form->dropDownList($model,'status', array(0 => 'Option1', 1 => 'Option2', 3 => 'Option3'),array('class'=>'select form-control')); ?>

	<?php echo $form->label($model, 'payment_status', array('class' => 'form-label', 'for' => 'normal')).$form->dropDownList($model,'payment_status', array(0 => 'Option1', 1 => 'Option2', 3 => 'Option3'),array('class'=>'select form-control')); ?>

	<?php echo $form->label($model, 'progress', array('class' => 'form-label', 'for' => 'normal')).$form->dropDownList($model,'progress', array(0 => 'Option1', 1 => 'Option2', 3 => 'Option3'),array('class'=>'select form-control')); ?>

	<?php echo $form->label($model, 'start_date', array('class' => 'form-label', 'for' => 'normal')).'<div class="input-append success date col-md-10 col-lg-6">'.$form->textFieldRow($model,'start_date',array('class'=>'form-control', 'labelOptions' => array('label' => false))).'<span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span></div>'.'<br /><br />'; ?>

	<?php echo $form->label($model, 'delivery_date', array('class' => 'form-label', 'for' => 'normal')).'<div class="input-append success date col-md-10 col-lg-6">'.$form->textFieldRow($model,'delivery_date',array('class'=>'form-control', 'labelOptions' => array('label' => false))).'<span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span></div>'.'<br /><br />'; ?>

	<?php echo $form->label($model, 'proposal_id', array('class' => 'form-label', 'for' => 'normal')).''.$form->textFieldRow($model,'proposal_id',array('class'=>'form-control','maxlength'=>10, 'labelOptions' => array('label' => false))).''.'<br /><br />'; ?>

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
