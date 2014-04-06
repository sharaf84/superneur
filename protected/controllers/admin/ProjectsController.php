<?php

class ProjectsController extends AdminController
{


	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
                $model = $this->loadModel($id);
            
                /**
                * Disputes Listing
                */
               $disputes = new Complaints('search');
               $disputes->unsetAttributes();  // clear any default values

               if(isset($_GET['Complaints'])){
                       $disputes->attributes = $_GET['Complaints'];
               }

               /**
                * Proposals Listing
                */

               $bids = new Proposals('search');
               $bids->unsetAttributes();  // clear any default values

               if(isset($_GET['Proposals'])){
                       $bids->attributes = $_GET['Proposals'];
               }

               /**
                * Documents Listing
                */
               $documents = new LegalDocuments('search');
               $documents->unsetAttributes();  // clear any default values

               if(isset($_GET['LegalDocuments'])){
                       $documents->attributes = $_GET['LegalDocuments'];
               }

               /**
                * Attachments Listing
                */

               $attachments = new Media('search');
               $attachments->unsetAttributes();  // clear any default values

               if(isset($_GET['Media'])){
                       $attachments->attributes = $_GET['Media'];
               }

               /**
                * Conversations Listing
                */
               $projectOwnerId = $model->owner_id;

               $conversationsArr = array();

               $projectConversations = Messages::model()->getUserConversations($model->owner_id, $id);
               foreach ($projectConversations as $conversation) {

                   /**
                    * @author Ahmed Kamal
                    * Fixing Zizo's Konafa by adding checking for 2nd dimension array.
                    */
                   if(!isset($conversationsArr[$conversation->sender_id])){

                       $conversationsArr[$conversation->sender_id] = array();
                   }

                   if(!isset($conversationsArr[$conversation->receiver_id])){

                       $conversationsArr[$conversation->receiver_id] = array();
                   }

                   if($conversation->sender_id != $projectOwnerId){

                       $conversationsArr[$conversation->sender_id][] = $conversation;
                   }else{

                       $conversationsArr[$conversation->receiver_id][] = $conversation;
                   }
               }

               /**
                * Payments Listing
                */

               $payments = new Payments('search');
               $payments->unsetAttributes();  // clear any default values

               if(isset($_GET['Payments'])){
                       $payments->attributes = $_GET['Payments'];
               }
        
		$this->render('view',array(
			'model'=>$model,
                        'disputes' => $disputes,
                        'bids' => $bids,
                        'documents' => $documents,
                        'attachments' => $attachments,
                        'conversationsArr' => $conversationsArr,
                        'payments' => $payments,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Projects;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Projects']))
		{
			$model->attributes=$_POST['Projects'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Projects']))
		{
			$model->attributes=$_POST['Projects'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Projects');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Projects('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Projects']))
			$model->attributes=$_GET['Projects'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Projects::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
        
        public function actionApprove($id) {
            $model=$this->loadModel($id);
            $model->updateByPk($id, array("status" => Projects::STATUS_APPROVED));

            $this->redirect(array('admin'));
    }

}
