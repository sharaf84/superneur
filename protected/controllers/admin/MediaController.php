<?php

class MediaController extends AdminController {

    public function init() {
        parent::init();
        /**
         * Don't render layout because it will be rendered at iframe
         */
//        (!empty(Yii::app()->session['Media']['model']) || !empty($_GET['model'])) and $this->layout = false;
    }

    public function actions() {
        return array_merge(
                parent::actions(),
                array(
                    'upload' => array(
                        'class' => 'xupload.actions.XUploadAction',
                        'path' => Yii::getPathOfAlias('webroot') . DIRECTORY_SEPARATOR . Yii::app()->params['uploadDir'] . DIRECTORY_SEPARATOR . date('Y' . DIRECTORY_SEPARATOR . 'm' . DIRECTORY_SEPARATOR . 'd'),
                        'publicPath' => Yii::app()->getBaseUrl(true) . '/' . Yii::app()->params['uploadDir'] . '/' . date('Y/m/d'),
                        'subfolderVar' => false,
                        'secureFileNames' => true,
                    )
                )
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Media;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Media'])) {
            $model->attributes = $_POST['Media'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }
        $this->render('create', array(
            'model' => $model
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Media'])) {
            $model->attributes = $_POST['Media'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Media');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Media('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Media']))
            $model->attributes = $_GET['Media'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Upload media to related $model and $id
     * @param string $model reltaed model name
     * @param int $id related model id
     */
    public function actionXupload($model = null, $id = null) {
        Yii::app()->session['Media'] = array('model' => $model, 'model_id' => $id);
        $media = new Media('search');
        $media->unsetAttributes();  // clear any default values
        if (isset($_GET['Media']))
            $media->attributes = $_GET['Media'];
        Yii::import("xupload.models.XUploadForm");
        $this->render('xupload', array(
            'media' => $media,
            'xuploadForm' => new XUploadForm,
        ));
    }

    /**
     * Saves media uploaded file
     * @called by xupload widget
     * @throws CHttpException
     */
    public function actionXuploadAfterCompleted() {
        if (!Yii::app()->request->isPostRequest || empty($_POST['xUpload']))
            throw new CHttpException(400, Yii::t('default', 'Invalid request'));
        $xUploadResponse = json_decode($_POST['xUpload']['response']);
        $media = new Media('create');
        $media->attributes = array(
            'title' => $xUploadResponse[0]->name,
            'file_name' => $xUploadResponse[0]->filename,
            'mime' => $xUploadResponse[0]->type,
            'size' => $xUploadResponse[0]->size,
            'path' => substr($xUploadResponse[0]->url, strlen(Yii::app()->getBaseUrl(true)), -strlen($xUploadResponse[0]->filename)),
            'model' => Yii::app()->session['Media']['model'],
            'model_id' => Yii::app()->session['Media']['model_id']
        );
        $media->save();
        Yii::app()->end();
    }

    /**
     * Deletes media uploaded file
     * @called by xupload widget
     * @throws CHttpException
     */
    public function actionXuploadAfterDestroyed() {
        if (!Yii::app()->request->isPostRequest || empty($_POST['xUpload']))
            throw new CHttpException(400, Yii::t('default', 'Invalid request'));
        Media::model()->findByAttributes(array('file_name' => $_POST['xUpload']['filename']))->delete();
        Yii::app()->end();
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Media::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
//    protected function performAjaxValidation($model) {
//        if (isset($_POST['ajax']) && $_POST['ajax'] === 'media-form') {
//            echo CActiveForm::validate($model);
//            Yii::app()->end();
//        }
//    }

}
