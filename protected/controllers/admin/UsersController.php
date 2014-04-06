<?php

class UsersController extends AdminController {
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    //public $layout='//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
                //'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $oUser = $this->loadModel($id);
        
        $reviews = new Reviews('search');
        $reviews->unsetAttributes();
        if (isset($_GET['Reviews']))
            $reviews->attributes = $_GET['Reviews'];
        
        $projects = new Projects('search');
        $projects->unsetAttributes();
        if (isset($_GET['Projects']))
            $projects->attributes = $_GET['Projects'];
        
        $transactions = new Payments('search');
        $transactions->unsetAttributes();
        if (isset($_GET['Payments']))
            $transactions->attributes = $_GET['Payments'];
        
        $complaints = new Complaints('search');
        $complaints->unsetAttributes();
        if (isset($_GET['Complaints']))
            $complaints->attributes = $_GET['Complaints'];
	
	
	
	
        
        $this->render('view', array(
            'model' => $oUser,
            'reviews' => $reviews,
            'projects' => $projects,
            'transactions' => $transactions,
            'complaints' => $complaints,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Users('create');

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Users'])) {
            $model->attributes = $_POST['Users'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $model->scenario = 'update';
        if ($model->type == Users::TYPE_MASTER && !Yii::app()->user->isMaster) {
            Yii::app()->user->setFlash('error', "<strong>Access denied!</strong> You don't have permission to edit master user.");
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Users'])) {
            $model->attributes = $_POST['Users'];
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
        $dataProvider = new CActiveDataProvider('Users');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Users('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Users']))
            $model->attributes = $_GET['Users'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }
    
    public function actionActivate($id) {
        if (!Yii::app()->request->isAjaxRequest)
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
        
        $oUser = $this->loadModel($id);
        
        if ($oUser->activate()) {
            $success = Yii::t('default', 'User activated successfully.');
            
            $info = (SMS::instance()->sendActivationNotification($oUser)) ?
                            Yii::t('default', 'SMS sent successfully.') :
                            Yii::t('default', 'Error sending SMS.');
            
            $info .= (Emails::instance()->sendActivationNotification($oUser)) ?
                            Yii::t('default', 'Email sent successfully.') :
                            Yii::t('default', 'Error sending mail.');
            
            echo json_encode(array('success' => $success, 'info' => $info));
        }
        else
            echo json_encode(array('error' => CHtml::errorSummary($oUser)));
        
        Yii::app()->end();
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Users::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
//    protected function performAjaxValidation($model) {
//        if (isset($_POST['ajax']) && $_POST['ajax'] === 'users-form') {
//            echo CActiveForm::validate($model);
//            Yii::app()->end();
//        }
//    }

}
