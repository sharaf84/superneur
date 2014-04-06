<?php

/**
 * AdminController is the customized base controller class.
 * All Admin controller classes for this application should extend from this base class.
 */
class AdminController extends Controller {

    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = '//layouts/column2';

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
     * @var string of the current requested operation. 
     */
    protected $_currentOperation = '';

    /**
     * @var array of operations dosen't need user auth or access check.   
     */
    protected $_whiteListOperations = array(
        'Auth' => array('admin.site.login', 'admin.site.logout'),
        'Access' => array('admin.site.dashboard')
    );

    //////////// System functions ///////////////

    public function init() {
        parent::init();
        if (!Yii::app()->request->isAjaxRequest)
            $this->registerMainScripts();
    }

    public function actions() {
        return array_merge(
                parent::actions(), 
                array(
                    'sorting' => array(
                        'class' => 'ext.YiiSortableModel.actions.AjaxSortingAction',
                    ),
                )
            );
    }

    protected function beforeRender($view) {
        return (parent::beforeRender($view) && Yii::app()->theme = 'bootstrap');
    }

    protected function beforeAction($action) {
        if (parent::beforeAction($action)) {
            $this->setCurrentOperation();
            if ($this->inWhiteListOperations(null, 'Auth'))
                return true;
            elseif (!Yii::app()->user->isAuth()) {
                Yii::app()->user->logout();
                //throw new CHttpException(401, 'Access denied.');
                $this->redirect(Yii::app()->createUrl('admin'));
            } elseif (Yii::app()->user->isMember)
                $this->redirect(Yii::app()->homeUrl);
            elseif ($this->inWhiteListOperations(null, 'Access'))
                return true;
            elseif (!Yii::app()->user->hasAccess($this->_currentOperation)) {
                //throw new CHttpException(401, 'Access denied.');
                Yii::app()->user->setFlash('error', "<strong>Access denied!</strong> You don't have permission to access this action.");
                $this->redirect(Yii::app()->createUrl('admin/dashboard'));
            }
            return true;
        }
        return false;
    }

    /**
     * Exports model data in CSV/Excel file based on $condition
     * @param string $class the name of the model class
     * @param string $condition model condition 
     * @return Sends file to the browser by using method yii:app()->request->sendfile();
     */
    public function actionCsv($class, $condition = true) {
        $models = $class::model()->findAll($condition);
        $data = null;
        foreach ($models as $model) {
            switch ($class) {
                case 'Users':
                    $model->metadata = str_replace(',', ';', $model->metadata);
                    break;
                
                default:
                    break;
            }
            $data or $data = implode(',', array_keys($model->attributes));
            $data .= "\n" . implode(',', array_values($model->attributes));
        }
        yii::app()->request->sendFile($class . '.csv', $data);
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

    ///////////////// Custom functions ///////////////

    /**
     * register script files used allover the website site
     */
    public function registerMainScripts() {
        Yii::app()->bootstrap->register(); //register bootstrap css & js
        // CSS Files
//        Yii::app()->clientScript->registerCssFile('/themes/bootstrap' . '/assets/plugins/jquery-slider/css/jquery.sidr.light.css');  //main css file
//        // <!-- BEGIN CORE CSS FRAMEWORK -->
//        Yii::app()->clientScript->registerCssFile('/themes/bootstrap' . '/assets/plugins/boostrapv3/css/bootstrap.min.css');  //main css file
//        Yii::app()->clientScript->registerCssFile('/themes/bootstrap' . '/assets/plugins/boostrapv3/css/bootstrap-theme.min.css');  //main css file
//        Yii::app()->clientScript->registerCssFile('/themes/bootstrap' . '/assets/plugins/font-awesome/css/font-awesome.css');  //main css file
//        Yii::app()->clientScript->registerCssFile('/themes/bootstrap' . '/assets/css/animate.min.css');  //main css file
//        
//        //<!-- BEGIN CSS TEMPLATE -->
//        Yii::app()->clientScript->registerCssFile('/themes/bootstrap' . '/assets/css/style.css');  //main css file
//        Yii::app()->clientScript->registerCssFile('/themes/bootstrap' . '/assets/css/responsive.css');  //main css file
//        Yii::app()->clientScript->registerCssFile('/themes/bootstrap' . '/assets/css/custom-icon-set.css');  //main css file
//        
//        
//        Yii::app()->clientScript->registerCssFile('/themes/bootstrap' . '/assets/plugins/bootstrap-datepicker/css/datepicker.css');  //main css file
//        Yii::app()->clientScript->registerCssFile('/themes/bootstrap' . '/assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.css');  //main css file
//        Yii::app()->clientScript->registerCssFile('/themes/bootstrap' . '/assets/plugins/boostrap-slider/css/slider.css');  //main css file
//        Yii::app()->clientScript->registerCssFile('/themes/bootstrap' . '/assets/plugins/jquery-slider/css/jquery.sidchat-window-wrapperr.light.css');  //main css file
//        Yii::app()->clientScript->registerCssFile('/themes/bootstrap' . '/assets/plugins/boostrap-checkbox/css/bootstrap-checkbox.css');  //main css file
        
        Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/admin/style.css');  //main css file
        
        
        // Js Files
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/admin/custom.js', CClientScript::POS_END); //main js file for developers
    }

    /**
     * Sets the current operation
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

}

