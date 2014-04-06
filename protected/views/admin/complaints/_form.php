<div class="col-md-12">
    <div class="grid simple">
        <div class="grid-body no-border"> <br>
            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-8">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'complaints-form',
	'enableAjaxValidation'=>false,
)); ?>

        <blockquote class="margin-top-20">
            <p class="help-block">Fields with <span class="required">*</span> are required.</p>
        </blockquote>
	

	<?php echo $form->errorSummary($model); ?>

                    <div class="form-group">
	<?php echo $form->label($model, 'subject', array('class' => 'form-label', 'for' => 'normal')).''.$form->textFieldRow($model,'subject',array('class'=>'form-control','maxlength'=>255, 'labelOptions' => array('label' => false))); ?>
                    </div>
                    <div class="form-group">

	<?php echo $form->label($model, 'description', array('class' => 'form-label', 'for' => 'normal')).''.$form->textFieldRow($model,'description',array('class'=>'form-control','maxlength'=>4096, 'labelOptions' => array('label' => false))); ?>
                    </div>
<!--<div class="form-group">-->
	<?php // echo $form->label($model, 'from', array('class' => 'form-label', 'for' => 'normal')).''.$form->textFieldRow($model,'from',array('class'=>'form-control','maxlength'=>10, 'labelOptions' => array('label' => false))); ?>
<!--</div>-->
<!--<div class="form-group">-->
	<?php // echo $form->label($model, 'against', array('class' => 'form-label', 'for' => 'normal')).''.$form->textFieldRow($model,'against',array('class'=>'form-control','maxlength'=>10, 'labelOptions' => array('label' => false))); ?>
    <!--</div>-->

                    <div class="form-group">

	<?php echo $form->label($model, 'type', array('class' => 'form-label', 'for' => 'normal')).$form->dropDownList($model,'type', Complaints::getTypeList(),array('class'=>'select form-control')); ?>
                    </div>
                    <div class="form-group">
	<?php echo $form->label($model, 'project_id', array('class' => 'form-label', 'for' => 'normal')).''.$form->textFieldRow($model,'project_id',array('value' => $model->project->title, 'class'=>'form-control','maxlength'=>10, 'labelOptions' => array('label' => false))); ?>
                    </div>
                    <div class="form-group">

	<?php echo $form->label($model, 'status', array('class' => 'form-label', 'for' => 'normal')).$form->dropDownList($model,'status', Complaints::getStatusList(),array('class'=>'select form-control')); ?>
                    </div>
                    <div class="form-group">
	<?php echo $form->textAreaRow($model,'decision',array('class' => 'form-control', 'maxlength' => 1000)); ?>
                    </div>
	<div class="form-group">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? ' Create' : ' Save',
//			'label'=>$model->isNewRecord ? '<i class="fa fa-check"></i> Create' : '<i class="fa fa-paste"></i> Save',
                        'htmlOptions' => array('class' => $model->isNewRecord ? 'btn btn-primary btn-cons' : 'btn btn-info btn-cons' ),
		)); ?>
	</div>

<?php $this->endWidget(); ?>
            </div>
            </div>
        </div>
    </div>
</div>