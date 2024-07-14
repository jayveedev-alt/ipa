<?php

    class RequestsController extends AdministratorController
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
                    'actions' => array('admin', 'view', 'updateStatus', 'open'),
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

            $app = new Applications('search');
            $app->unsetAttributes();  // clear any default values
            $app->request_id = $model->id;

//            if($model->is_approved != 2) {
//                $this->redirect(array('admin'));
//            }

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

            $model->is_approved = array(2, 3, 4);
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
            if($_POST['status_id'] == 4) {
                $remarks = $_POST['updated_remarks'];
                Requests::sql_rejectionUpdate_byRequestID($_POST['id'], $_POST['status_id'], $updatedBy, $remarks);
            }

            Requests::sql_updateStatus_byRequestID($_POST['id'], $_POST['status_id'], $remarks, $updatedBy);

            $params = array(
                'condition' => 'id = :Id',
                'params' => array(':Id' => $_POST['id']),
            );
            $request = Utilities::model_getByParams(Requests::model(), $params);

            $model = new RequestLogs;
            $model->created_at = Utilities::get_DateTime();
            $model->updated_at = Utilities::get_DateTime();
            $model->applicant_id = $request->applicant_id;
            $model->request_id = $_POST['id'];
            $model->status_id = $_POST['status_id'];
            $model->updated_by = $updatedBy;
            $model->remarks = $remarks;
            $model->save();

            Utilities::set_Flash(Utilities::ALERT_SUCCESS, 'Successfully updated.');
            $this->redirect(array('requests/view', 'id' => $_POST['id']));
        }

        public function actionOpen()
        {
            $request = Utilities::model_getByID(Requests::model(), $_GET['request_id']);
            $params = array(
                'condition' => 'user_id = :userId',
                'params' => array(':userId' => $request->applicant_id),
            );
            $client = Utilities::model_getByParams(UsersAuth::model(), $params);
            //$client = Utilities::model_getByID(UsersAuth::model(), $request->applicant_id);

            $model = Documents::model()->findbyPk($_GET['id']);
            $dir = 'documents/' . $client->username . '/' . $model->filename;
            if(file_exists($dir)) {
                header('Content-type: application/pdf');
                readfile($dir);
            } else {
                $this->redirect(array('view', 'id' => $_GET['id']));
            }
        }

    }
    