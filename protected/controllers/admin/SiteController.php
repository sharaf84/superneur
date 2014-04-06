<?php

class SiteController extends AdminController {
    
    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // this is an admin action that will help you to configure HybridAuth 
            // (you must delete this action, when you'll be ready with configuration, or 
            // specify rules for admin role. User shouldn't have access to this action!)
            'oauthadmin' => array(
                'class' => 'ext.hoauth.HOAuthAdminAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionDashboard() {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->render('index');
    }

    
    /**
     * Displays the login page
     */
    public function actionLogin() {
        if(!Yii::app()->user->isGuest)
            $this->redirect(Yii::app()->createUrl('admin/dashboard'));
        
        $model = new LoginForm;
        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
//            var_dump($model->validate(),$model->login());die;
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login()){
                Yii::app()->user->setFlash('success', "Logged in successfully.");
                $this->redirect(Yii::app()->createUrl('admin/dashboard')); //$this->redirect(Yii::app()->user->returnUrl);
            }
                 
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->createUrl('admin'));
    }

}