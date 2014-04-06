<?php

/**
 * FrontController is the customized base controller class.
 * All front end controller classes for this application should extend from this base class.
 * @author Ahmed Sharaf <sharaf.developer@gmail.com>
 */
class FrontController extends Controller {

    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = '//layouts/front/main';

    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = array();

    /**
     * @var array context footerMenu items. This property will be assigned to {@link CMenu::items}.
     */
    public $footerMenu = array();

    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = array();

    /**
     *  @var bool wheather to view the leftSide for the controller layout view.
     */
    public $leftSide = true;
    
    /**
     * @var obj of auth user model
     */
    public $oAuthUser = null;

    /**
     * @var string of the current requested operation. 
     */
    protected $_currentOperation = '';

    /**
     * @var array of operations dosen't need user auth or access check.   
     */
    protected $_whiteListOperations = array(
        'Auth' => array('site.*', 'posts.*'),
        'Access' => array()
    );

    //////////////// System functions ////////////////

    public function init() {
        parent::init();
        $this->setFooterMenu();
        $this->setAuthUser();
        if (!Yii::app()->request->isAjaxRequest)
            $this->registerMainScripts();
    }

    protected function beforeAction($action) {
        if (parent::beforeAction($action)) {
            $this->setCurrentOperation();
            if ($this->inWhiteListOperations(null, 'Auth'))
                return true;
            elseif (!Yii::app()->user->isAuth()) {
                Yii::app()->user->logout();
                $this->redirect(Yii::app()->createUrl('site/login'));
            }
            return true;
        }
        return false;
    }

    ///////////////// Custom functions ///////////////

    /**
     * register script files used allover the website site
     */
    protected function registerMainScripts() {
        /**
         * libs
         */
        Yii::app()->clientScript->registerCoreScript('jquery'); //jQuery
        // Yii::app()->clientScript->registerCoreScript('jquery.ui');//jQuery UI
        //Yii::app()->bootstrap->register(); //register bootstrap css & js
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/libs/bootstrap/bootstrap.js', CClientScript::POS_END); //Bootstrab

        /**
         * ui files
         */
        //Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/front/jquery-1.10.2.min.js', CClientScript::POS_END); 
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/front/jquery.nivo.slider.js', CClientScript::POS_END);
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/front/jquery.easydropdown.js', CClientScript::POS_END);
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/front/jquery.mCustomScrollbar.concat.min.js', CClientScript::POS_END);
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/front/ui.js', CClientScript::POS_END); //Custom js file for ui
        /**
         * dev files
         */
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/front/dev.js', CClientScript::POS_END); //Custom js file for developers
    }

    /**
     * sets the current operation
     */
    protected function setCurrentOperation() {
        $this->_currentOperation = $this->getCurrentOperation();
    }

    /**
     * Retrieves current operation this user requests
     * @return string of controller.action like 'admin/posts/create'
     */
    protected function getCurrentOperation() {
        return str_replace("/", ".", $this->id) . '.' . $this->action->id;
    }

    /**
     * Checks if the operation in white list.
     * @param type $operation
     * @param type $key
     * @return bool
     */
    protected function inWhiteListOperations($operation = null, $key = null) {
        ($operation) or $operation = $this->_currentOperation;
        $asteriskOperation = substr($operation, 0, strrpos($operation, '.')) . '.*';
        $whiteList = ($key) ? $this->_whiteListOperations[$key] : call_user_func_array('array_merge', $this->_whiteListOperations);
        return in_array($asteriskOperation, $whiteList) || in_array($operation, $whiteList);
    }
    
    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }
    
    /**
     * Sets auth user.
     */
    protected function setAuthUser() {
        $this->oAuthUser = self::getAuthUser();
    }

    /**
     * Returns the data model of auth user.
     * @return Users the loaded model
     */
    public static function getAuthUser() {
        if (Yii::app()->user->isGuest)
            return null;
        return self::loadModel('Users', Yii::app()->user->id); //Users::model()->findByPk(Yii::app()->user->id);
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param string $modelName the name of the model to be loaded
     * @param integer|array $id the ID of the model to be loaded
     * @return Users the loaded model
     * @throws CHttpException
     */
    public static function loadModel($modelName, $id) {
        $model = is_array($id) ? $modelName::model()->findAllByPk($id) : $modelName::model()->findByPk($id);
        if (is_null($model))
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    protected function setFooterMenu() {
        $oTreeFooterMenu = Tree::model()->scopeType(Tree::TYPE_FOOTER_MENU)->findAll();
        foreach ($oTreeFooterMenu as $node)
            array_push($this->footerMenu, array('label' => $node->name, 'url' => array($node->link)));
    }

}