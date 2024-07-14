<?php

    class RequestsController extends ClientController
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
                    'actions' => array('view', 'remove', 'open', 'logs'),
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

            $modelDocs = new Documents('search');
            $modelDocs->unsetAttributes();  // clear any default values
            $modelDocs->request_id = $model->id;

            if(isset($_POST['submit'])) {
                $docs = Documents::model()->findAll('request_id = :requestId', array(':requestId' => $_GET['id']));
                if($docs) {
                    Requests::sql_updateStatus_byRequestID($_GET['id'], 2);
                    Requests::sql_updateData_bySubmitRequestID($model->id);

                    Audit::addRecord('requests', $_GET['id'], 'Submit client request');
                    Utilities::set_Flash(Utilities::ALERT_SUCCESS, 'Your requirements have been successfully submitted.');
                    $this->redirect(array('view', 'id' => $_GET['id']));
                } else {
                    Utilities::set_Flash(Utilities::ALERT_DANGER, 'No requirements were submitted. Please fill in the necessary information before proceeding with the submission');
                }
            }

            $modelReq = $this->loadModel();
            $this->performAjaxValidation($modelReq);
            if(isset($_POST['Requests']) && isset($_POST['upload'])) {
                $modelReq->attributes = $_POST['Requests'];
                $modelReq->updated_at = Utilities::get_DateTime();

                if($modelReq->save()) {
                    $dir = 'documents/' . Utilities::get_UserInfo()->username;
                    $files = CUploadedFile::getInstances($modelReq, 'files');
                    foreach($files as $file) {

                        $ext = pathinfo($file->name)['extension'];
                        $filename = pathinfo($file->name)['filename'];
                        $newFile = date('m-Y') . '-' . $filename . '.' . $ext;

                        if($file->saveAs($dir . '/' . $newFile)) {
                            $docs = new Documents;
                            $docs->created_at = Utilities::get_DateTime();
                            $docs->updated_at = Utilities::get_DateTime();
                            $docs->request_id = $model->id;
                            $docs->filename = $newFile;
                            $docs->save();
                        }
                    }

                    Audit::addRecord('requests', $model->id, 'Upload client requirements');
                    $this->redirect(array('view', 'id' => $_GET['id']));
                }
            }

            $modelApp = Applications::model()->find('request_id = :requestId', array(':requestId' => $_GET['id']));

            $this->render('view', array(
                'model' => $model,
                'modelDocs' => $modelDocs,
                'modelReq' => $modelReq,
                'modelApp' => $modelApp
            ));
        }

        /**
         * Creates a new model.
         * If creation is successful, the browser will be redirected to the 'view' page.
         */
        public function actionCreate()
        {
            $model = new Requests;

            $this->performAjaxValidation($model);

            $dir = 'documents/' . Utilities::get_UserInfo()->username;
            if(!file_exists($dir)) {
                mkdir($dir);
            }

            if(isset($_POST['Requests'])) {

                $model->attributes = $_POST['Requests'];
                $model->created_at = Utilities::get_DateTime();
                $model->updated_at = Utilities::get_DateTime();
                $model->applicant_id = Utilities::get_UserInfo()->user_id;

                if($model->save()) {

                    $files = CUploadedFile::getInstances($model, 'files');
                    foreach($files as $file) {

                        $ext = pathinfo($file->name)['extension'];
                        $filename = pathinfo($file->name)['filename'];
                        $newFile = date('m-Y') . '-' . $filename . '.' . $ext;

                        if($file->saveAs($dir . '/' . $newFile)) {
                            $docs = new Documents;
                            $docs->created_at = Utilities::get_DateTime();
                            $docs->updated_at = Utilities::get_DateTime();
                            $docs->request_id = $model->id;
                            $docs->filename = $newFile;
                            $docs->save();
                        }
                    }

                    Audit::addRecord('requests', $model->id, 'Create client request');
                    $this->redirect(array('view', 'id' => $model->id));
                }
            }

            $modelList = new Requests('search');
            $modelList->unsetAttributes();  // clear any default values
            if(isset($_GET['Requests'])) {
                $modelList->attributes = $_GET['Requests'];
            }

            $modelList->applicant_id = Utilities::get_UserInfo()->user_id;
            $this->render('create', array(
                'model' => $model,
                'modelList' => $modelList
            ));
        }

        /**
         * Deletes a particular model.
         * If deletion is successful, the browser will be redirected to the 'index' page.
         */
        public function actionDelete()
        {
            $model = $this->loadModel();
            if($model) {
                if($model->is_submitted == false) {

                    $docs = Documents::model()->findAll('request_id = :requestId', array(':requestId' => $model->id));
                    foreach($docs as $doc) {
                        $filename = 'documents/' . Utilities::get_UserInfo()->username . '/' . $doc->filename;
                        Utilities::deleteFile($filename);
                        $doc->delete();
                    }
                    $model->delete();
                    Audit::addRecord('requests', $model->id, 'Delete client request');

                    if(!isset($_GET['ajax']))
                        $this->redirect(array('admin'));
                } else {
                    Utilities::set_Flash(Utilities::ALERT_DANGER, 'These requirements have been submitted and can no longer be deleted.');
                }
            } else
                throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
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

        public function actionRemove()
        {
            $model = Requests::model()->findbyPk($_GET['request_id']);
            if($model) {
                if($model->is_submitted == 0) {
                    $doc = Documents::model()->findbyPk($_GET['id']);
                    $filename = 'documents/' . Utilities::get_UserInfo()->username . '/' . $doc->filename;
                    Utilities::deleteFile($filename);
                    $doc->delete();

                    Audit::addRecord('requests', $doc->id, 'Delete client requirements');
                } else {
                    Utilities::set_Flash(Utilities::ALERT_DANGER, 'This file contains submitted requirements and cannot be deleted.');
                }

                $this->redirect(array('view', 'id' => $_GET['request_id']));
            }
        }

        public function actionOpen()
        {
            $model = Documents::model()->findbyPk($_GET['id']);
            $dir = 'documents/' . Utilities::get_UserInfo()->username . '/' . $model->filename;
            if(file_exists($dir)) {
                Audit::addRecord('documents', $model->id, 'View client requirements');
                header('Content-type: application/pdf');
                readfile($dir);
            }
        }

        public function actionLogs()
        {
            $model = new RequestLogs('search');
            $model->unsetAttributes();  // clear any default values
            if(isset($_GET['RequestLogs'])) {
                $model->attributes = $_GET['RequestLogs'];
            }

            $model->applicant_id = Utilities::get_UserInfo()->user_id;
            $this->render('logs', array(
                'model' => $model,
            ));
        }

    }
    