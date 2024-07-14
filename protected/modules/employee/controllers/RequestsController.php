<?php

    class RequestsController extends EmployeeController
    {

        /**
         * @var CActiveRecord the currently loaded data model instance.
         */
        private $_model;

        /**
         * @return array action filters
         */
        public function filters()
        {
            return array(
                'accessControl', // perform access control for CRUD operations
            );
        }

        /**
         * Specifies the access control rules.
         * This method is used by the 'accessControl' filter.
         * @return array access control rules
         */
        public function accessRules()
        {
            return array(
                array('allow', // allow authenticated user to perform 'create' and 'update' actions
                    'actions' => array('admin', 'view', 'updateStatus', 'open', 'approved'),
                    'users' => array('@'),
                ),
                array('deny', // deny all users
                    'users' => array('*'),
                ),
            );
        }

        /**
         * Displays a particular model.
         */
        public function actionView()
        {
            $model = $this->loadModel();

            $docs = new Documents('search');
            $docs->unsetAttributes();  // clear any default values
            $docs->request_id = $model->id;

            $userId = Utilities::get_UserInfo()->user_id;
            $user = Utilities::model_getByID(Users::model(), $userId);
            $userStatus = Utilities::model_getByID(PositionsStatus::model(), $user->position_id);

            if($model->is_approved != $userStatus->status_id) {
                $this->redirect(array('admin'));
            }

            $app = new Applications('search');
            $app->unsetAttributes();  // clear any default values
            $app->request_id = $model->id;

            $this->render('view', array(
                'model' => $model,
                'docs' => $docs,
                'app' => $app
            ));
        }

        /**
         * Manages all models.
         */
        public function actionAdmin()
        {
            $model = new Requests('search');
            $model->unsetAttributes();  // clear any default values
            if(isset($_GET['Requests'])) {
                $model->attributes = $_GET['Requests'];
            }

            $userId = Utilities::get_UserInfo()->user_id;
            $user = Utilities::model_getByID(Users::model(), $userId);
            $userStatus = Utilities::model_getByID(PositionsStatus::model(), $user->position_id);

            if($userStatus) {
                $model->is_approved = $userStatus->status_id;
            } else {
                $this->redirect(array('dashboard/index'));
            }

            $this->render('admin', array(
                'model' => $model,
            ));
        }

        /**
         * Returns the data model based on the primary key given in the GET variable.
         * If the data model is not found, an HTTP exception will be raised.
         */
        public function loadModel()
        {
            if($this->_model === null) {
                if(isset($_GET['id']))
                    $this->_model = Requests::model()->findbyPk($_GET['id']);
                if($this->_model === null)
                    throw new CHttpException(404, 'The requested page does not exist.');
            }
            return $this->_model;
        }

        /**
         * Performs the AJAX validation.
         * @param CModel the model to be validated
         */
        protected function performAjaxValidation($model)
        {
            if(isset($_POST['ajax']) && $_POST['ajax'] === 'requests-form') {
                echo CActiveForm::validate($model);
                Yii::app()->end();
            }
        }

        public function actionUpdateStatus()
        {
            $remarks = null;
            $updatedBy = Utilities::get_UserInfo()->user_id;
            if(!isset($_POST)) {
                throw new CHttpException(404, 'The requested page does not exist.');
            }
            if($_POST['status_id'] == 8) {
                $remarks = $_POST['updated_remarks'];
                Requests::sql_rejectionUpdate_byRequestID($_POST['id'], $_POST['status_id'], $updatedBy, $remarks);
            }

            $model = new RequestLogs;
            $model->created_at = Utilities::get_DateTime();
            $model->updated_at = Utilities::get_DateTime();
            $model->request_id = $_POST['id'];
            $model->status_id = $_POST['status_id'];
            $model->updated_by = $updatedBy;
            $model->remarks = $remarks;
            $model->save();

            Requests::sql_updateStatus_byRequestID($_POST['id'], $_POST['status_id']);
            $this->redirect(array('requests/view', 'id' => $_POST['id']));
        }

        public function actionOpen()
        {
            $request = Utilities::model_getByID(Requests::model(), $_GET['id']);
            $client = Utilities::model_getByID(UsersAuth::model(), $request->applicant_id);

            $model = Documents::model()->findbyPk($_GET['id']);
            $dir = 'documents/' . $client->username . '/' . $model->filename;
            if(file_exists($dir)) {
                header('Content-type: application/pdf');
                readfile($dir);
            } else {
                $this->redirect(array('view', 'id' => $_GET['id']));
            }
        }

        public function actionApproved()
        {
            $model = new Requests('search');
            $model->unsetAttributes();  // clear any default values
            if(isset($_GET['Requests'])) {
                $model->attributes = $_GET['Requests'];
            }

            $model->is_approved = 7; // Approved
            $this->render('approved', array(
                'model' => $model,
            ));
        }

    }
    