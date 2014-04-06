<div class="col-md-12">
    <div class="grid simple">
        <div class="grid-body no-border"> <br>
            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-8">
<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'posts-form',
    'enableAjaxValidation' => false,
        ));
?>

<blockquote class="margin-top-20">
    <p class="help-block">Fields with <span class="required">*</span> are required.</p>
</blockquote>

<?php echo $form->errorSummary($model); ?>
                    
<div class="form-group">
<?php echo $form->textFieldRow($model, 'title', array('class' => 'form-control', 'maxlength' => 255)); ?>
</div>
                    
<?php if(isset(Yii::app()->session['postType']) && Yii::app()->session['postType'] == Posts::TYPE_EVENT){?>
    <div class="control-group">
        <?php echo $form->label($model, 'date', array('class' => 'form-label', 'for' => 'normal')); ?>
        <div class="controls">
            <?php  echo '<div class="input-append success date col-md-10 col-lg-6">';
              echo $form->textFieldRow($model, 'date', array('class' => 'form-control', 'labelOptions' => array('label' => false))) ;
              echo '<span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span></div>';?>
            <?php
//            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
//                'attribute' => 'date',
//                'model' => $model,
//                // additional javascript options for the date picker plugin http://jqueryui.com/datepicker/
//                'options' => array(
//                    'mode' => 'focus',
//                    'dateFormat' => 'yy-mm-dd',
//                    'showAnim' => 'fold',
//                    //'minDate' => '1',
//                    'changeMonth' => true,
//                    'changeYear' => true,
//                ),
//                'htmlOptions' => array('class' => 'span5'),
//            ));
            ?>
            <?php // echo $form->error($model, 'date'); ?>
        </div>
    </div>
                    <br><br>
    <div class="control-group">
        <?php echo $form->label($model, 'end_date', array('class' => 'form-label', 'for' => 'normal')); ?>
       <?php  echo '<div class="input-append success date col-md-10 col-lg-6">';
              echo $form->textFieldRow($model, 'end_date', array('class' => 'form-control', 'labelOptions' => array('label' => false))) ;
              echo '<span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span></div>';?>
<!--        <div class="controls">
            <?php
//            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
//                'attribute' => 'end_date',
//                'model' => $model,
//                // additional javascript options for the date picker plugin http://jqueryui.com/datepicker/
//                'options' => array(
//                    'mode' => 'focus',
//                    'dateFormat' => 'yyyy-mm-dd',
//                    'showAnim' => 'fold',
//                    //'minDate' => '1',
//                    'changeMonth' => true,
//                    'changeYear' => true,
//                ),
//                'htmlOptions' => array('class' => 'span5'),
//            ));
            ?>
            <?php // echo $form->error($model, 'end_date'); ?>
        </div>-->
    </div>
                    <br><br>
<?php }?>
<div class="form-group">
<?php echo $form->textAreaRow($model, 'description', array('class' => 'form-control', 'maxlength' => 1000)); ?>
</div>
<?php if(isset(Yii::app()->session['postType']) && Yii::app()->session['postType'] != Posts::TYPE_FAQ){?>
<div class="form-group">
<?php
echo $form->label($model, 'body', array('class' => 'form-label', 'for' => 'normal'));
$this->widget('ext.editMe.widgets.ExtEditMe', array(
    'model' => $model,
    'attribute' => 'body',
));
echo $form->error($model, 'body');
?>
</div>
<?php }?>

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
                </div></div></div></div></div>