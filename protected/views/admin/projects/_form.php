<div class="col-md-12">
    <div class="grid simple">
        <div class="grid-body no-border"> <br>
            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-8">
                    <?php
                    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                        'id' => 'projects-form',
                        'enableAjaxValidation' => false,
                    ));
                    ?>

                    <blockquote class="margin-top-20">
                        <p class="help-block">Fields with <span class="required">*</span> are required.</p>
                    </blockquote>


                    <?php echo $form->errorSummary($model); ?>
                    <div class="form-group">
                        <?php
                        echo $form->label($model, 'title', array('class' => 'form-label', 'for' => 'normal'));
                        echo $form->textFieldRow($model, 'title', array('class' => 'form-control', 'maxlength' => 255, 'labelOptions' => array('label' => false)));
                        ?>
                    </div>
<!--                    <div class="form-group">
                        <?php
//                        echo $form->label($model, 'description', array('class' => 'form-label', 'for' => 'normal'));
//                        echo $form->textFieldRow($model, 'description', array('class' => 'form-control', 'maxlength' => 2500, 'labelOptions' => array('label' => false)));
                        ?>
                    </div>-->
                    <div class="form-group">
                    <?php echo $form->textAreaRow($model, 'description', array('class' => 'form-control', 'maxlength' => 1000)); ?>
                    </div>
                    <!--<div class="form-group">-->
                        <?php
//                        echo $form->label($model, 'slug', array('class' => 'form-label', 'for' => 'normal'));
//                        echo $form->textFieldRow($model, 'slug', array('class' => 'form-control', 'maxlength' => 255, 'labelOptions' => array('label' => false)));
                        ?>
                    <!--</div>-->
                    <div class="form-group">
                        <?php echo $form->label($model, 'type', array('class' => 'form-label', 'for' => 'normal')) . $form->dropDownList($model, 'type', Projects::getTypeList(), array('class' => 'select form-control')); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $form->label($model, 'enabled', array('class' => 'form-label', 'for' => 'normal')) . $form->dropDownList($model, 'enabled', Projects::getEnabledList(), array('class' => 'select form-control')); ?>
                    </div><div class="form-group">
                        <?php echo $form->label($model, 'status', array('class' => 'form-label', 'for' => 'normal')) . $form->dropDownList($model, 'status', Projects::getStatusList(), array('class' => 'select form-control')); ?>
                    </div>
                    <div class="form-group">
                        <?php
                        echo $form->label($model, 'progress', array('class' => 'form-label', 'for' => 'normal'));
                        echo $form->textFieldRow($model, 'progress', array('class' => 'form-control', 'maxlength' => 10, 'labelOptions' => array('label' => false)));
                        ?>
                    </div>
                    <div class="form-group">
<?php echo $form->label($model, 'budget_type', array('class' => 'form-label', 'for' => 'normal')) . $form->dropDownList($model, 'budget_type', Projects::getBudgetList(), array('class' => 'select form-control')); ?>
                    </div>
                    <div class="form-group">
                        <?php
                        echo $form->label($model, 'min_budget', array('class' => 'form-label', 'for' => 'normal'));
                        echo $form->textFieldRow($model, 'min_budget', array('class' => 'form-control', 'maxlength' => 10, 'labelOptions' => array('label' => false)));
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                        echo $form->label($model, 'max_budget', array('class' => 'form-label', 'for' => 'normal'));
                        echo $form->textFieldRow($model, 'max_budget', array('class' => 'form-control', 'maxlength' => 10, 'labelOptions' => array('label' => false)));
                        ?>
                    </div>
<div style="display: none">
<div class="form-group">
                        <?php echo $form->label($model, 'interval', array('class' => 'form-label', 'for' => 'normal')) . $form->dropDownList($model, 'interval', Projects::getIntervalList(), array('class' => 'select form-control')); ?>
                    </div>
</div>    <div style="display: none">
<div class="form-group">

                        <?php
                        echo $form->label($model, 'hours_per_interval', array('class' => 'form-label', 'for' => 'normal'));
                        echo $form->textFieldRow($model, 'hours_per_interval', array('class' => 'form-control', 'maxlength' => 10, 'labelOptions' => array('label' => false)));
                        ?>
                    </div>
</div>

                    <!--<div class="form-group">-->
                    <?php echo $form->label($model, 'start_date', array('class' => 'form-label', 'for' => 'normal'));
                    echo '<div class="input-append success date col-md-10 col-lg-6">' . $form->textFieldRow($model, 'start_date', array('class' => 'form-control', 'labelOptions' => array('label' => false))) . '<span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span></div>';
                    ?>
                    <!--</div>-->

                    <!--<div class="form-group">--><br><br>
                    <?php echo $form->label($model, 'publish_date', array('class' => 'form-label', 'for' => 'normal')) . '<div class="input-append success date col-md-10 col-lg-6">' . $form->textFieldRow($model, 'publish_date', array('class' => 'form-control', 'labelOptions' => array('label' => false))) . '<span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span></div>'; ?>
                    <br><br>
                    <!--</div><div class="form-group">-->
                    <?php echo $form->label($model, 'expiration_date', array('class' => 'form-label', 'for' => 'normal')) . '<div class="input-append success date col-md-10 col-lg-6">' . $form->textFieldRow($model, 'expiration_date', array('class' => 'form-control', 'labelOptions' => array('label' => false))) . '<span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span></div>'; ?>
                    <br> <br><!--</div><div class="form-group">-->
                        <?php echo $form->label($model, 'completion_date', array('class' => 'form-label', 'for' => 'normal')) . '<div class="input-append success date col-md-10 col-lg-6">' . $form->textFieldRow($model, 'completion_date', array('class' => 'form-control', 'labelOptions' => array('label' => false))) . '<span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span></div>'; ?>
                    <br><br><!--</div>-->
                    <div class="form-group">
                        <?php
                        echo $form->label($model, 'min_score', array('class' => 'form-label', 'for' => 'normal'));
                        echo $form->textFieldRow($model, 'min_score', array('class' => 'form-control', 'maxlength' => 10, 'labelOptions' => array('label' => false)));
                        ?>
                    </div><div class="form-group">

                        <?php echo $form->label($model, 'privacy', array('class' => 'form-label', 'for' => 'normal')) . $form->dropDownList($model, 'privacy', Projects::getPrivacyList(), array('class' => 'select form-control')); ?>
                    </div><div class="form-group">
                        <?php echo $form->label($model, 'seo_indexing', array('class' => 'form-label', 'for' => 'normal')) . $form->dropDownList($model, 'seo_indexing', Projects::getSeoList(), array('class' => 'select form-control')); ?>
                    </div>
                    <div class="form-group">
                        <?php
                        echo $form->label($model, 'owner_id', array('class' => 'form-label', 'for' => 'normal'));
                        echo $form->textFieldRow($model, 'owner_id', array('class' => 'form-control', 'maxlength' => 10, 'labelOptions' => array('label' => false)));
                        ?>
                    </div>
                    <div class="form-group">
<!--                        <a  class="btn btn-primary my-colorpicker-control fancyIframeMedia" data-fancybox-type ="iframe" href="<?php // echo Yii::app()->createUrl('admin/media/xupload', array('model' => 'Projects', 'id' => $model->id));?>">Manage Attachments</a>
                        <a  class="btn btn-primary my-colorpicker-control fancyIframeMedia" data-fancybox-type ="iframe" href="<?php // echo Yii::app()->createUrl('admin/media/xupload', array('model' => 'LegalDocuments', 'id' => $model->id));?>">Manage Legal Documents</a>
                        <a class="fancyIframeMedia" data-fancybox-type="iframe" tabindex="-1" href="/admin/media/xupload/model/Posts/id/1">Manage Media</a>-->
                    </div>
                    <div class="form-group">

                        
                            <?php
                            $this->widget('bootstrap.widgets.TbButton', array(
                                'buttonType' => 'submit',
                                'type' => 'primary',
                                'label' => $model->isNewRecord ? ' Create' : ' Save',
//			'label'=>$model->isNewRecord ? '<i class="fa fa-check"></i> Create' : '<i class="fa fa-paste"></i> Save',
                                'htmlOptions' => array('class' => $model->isNewRecord ? 'btn btn-primary btn-cons' : 'btn btn-info btn-cons'),
                            ));
                            ?>
                   </div>
<?php $this->endWidget(); ?>
                    
                </div>
            </div>
        </div>
    </div>
</div>