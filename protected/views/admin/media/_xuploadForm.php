<div class="col-md-12">
    <div class="grid simple">
        <div class="row">
            <div class="col-md-8 col-sm-8 col-xs-8">
                <?php
                $this->widget('xupload.XUpload', array(
                    'url' => Yii::app()->createUrl('admin/media/upload'),
                    'model' => $xuploadForm,
                    'attribute' => 'file',
                    'multiple' => true,
                    'htmlOptions' => array('id' => 'media-xupload-form'),
                    'options' => array(
                        'sequentialUploads' => true,
                        'acceptFileTypes' => "js:/(\.|\/)(jpg|jpeg|gif|png|flv|mp3|doc|pdf)$/i",
                        'maxFileSize' => 10000000, // 10 MB
                        //'maxNumberOfFiles' => 5,
                        'completed' => "js:function (e, data) {window.oMain.xuploadAfterCompleted(data);}",
                        'destroyed' => "js:function (e, data) {window.oMain.xuploadAfterDestroyed(data);}",
                    ),
                ));
                ?>
            </div></div></div></div>