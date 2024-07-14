<?php

    class ApplicationsController extends ClientController
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
                    'actions' => array('new'),
                    'users' => array('@'),
                ),
                array('deny', // deny all users
                    'users' => array('*'),
                ),
            );
        }

        /**
         * Creates a new model.
         * If creation is successful, the browser will be redirected to the 'view' page.
         */
        public function actionCreate()
        {
            if(!isset($_GET['requestId'])) {
                throw new CHttpException(404, 'The requested page does not exist.');
            }

            $model = new Applications;
            $questions = Utilities::model_getAllData(Questions::model());

            // Uncomment the following line if AJAX validation is needed
            $this->performAjaxValidation($model);

            if(isset($_POST['Applications'])) {
                $model->attributes = $_POST['Applications'];
                $model->created_at = Utilities::get_DateTime();
                $model->updated_at = Utilities::get_DateTime();
                $model->request_id = $_GET['requestId'];

                if($model->save()) {

                    foreach($questions as $value) {
                        $questionAnswered = new AppQuestionAnswered;
                        $questionAnswered->created_at = Utilities::get_DateTime();
                        $questionAnswered->updated_at = Utilities::get_DateTime();
                        $questionAnswered->app_id = $model->id;
                        $questionAnswered->question_id = $value->id;
                        $questionAnswered->answer = isset($_POST['question_' . $value->id]) ? 1 : 0;
                        $questionAnswered->save();
                    }
                    
                    Requests::sql_updateStatus_byRequestID($model->request_id, 2);
                    Audit::addRecord('requests', $model->id, 'Create client request');
                    $this->redirect(array('requests/view', 'id' => $model->request_id));
                }
            }

            $this->render('create', array(
                'model' => $model,
                'questions' => $questions
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
                    $this->_model = Applications::model()->findbyPk($_GET['id']);
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
            if(isset($_POST['ajax']) && $_POST['ajax'] === 'applications-form') {
                echo CActiveForm::validate($model);
                Yii::app()->end();
            }
        }

        public function actionNew()
        {
            $model = new Applications;

            $modelRequests = new Requests('search');
            $modelRequests->unsetAttributes();  // clear any default values

            $questions = Utilities::model_getAllData(Questions::model());

            $dir = 'documents/' . Utilities::get_UserInfo()->username;
            if(!file_exists($dir)) {
                mkdir($dir);
            }

            $this->performAjaxValidation($model);

            if(isset($_POST['Applications'])) {
                $model->attributes = $_POST['Applications'];
                $model->created_at = Utilities::get_DateTime();
                $model->updated_at = Utilities::get_DateTime();
                $model->project_location = $model->proj_lot . ' ' . $model->proj_blk . ' ' . $model->proj_tct . ' ' . $model->proj_tax_dec . ' ' . $model->proj_st . ' ' . $model->proj_brgy . ' ' . $model->proj_dist . ' ' . $model->proj_city;
                if($model->validate()) {

                    $requestId = Requests::sql_addRecord(Utilities::get_UserInfo()->user_id, Utilities::get_DateTime());
                    if($requestId) {
                        $model->request_id = $requestId;
                        $model->save();

                        foreach($questions as $value) {
                            $questionAnswered = new AppQuestionAnswered;
                            $questionAnswered->created_at = Utilities::get_DateTime();
                            $questionAnswered->updated_at = Utilities::get_DateTime();
                            $questionAnswered->app_id = $model->id;
                            $questionAnswered->question_id = $value->id;
                            $questionAnswered->answer = isset($_POST['question_' . $value->id]) ? 1 : 0;
                            $questionAnswered->save();
                        }
                        
                        Audit::addRecord('requests', $model->id, 'Create client request');
                        Utilities::set_Flash(Utilities::ALERT_SUCCESS, 'Application requested.');
                        $this->redirect(array('applications/new'));
                    }
                }
            }

            if(isset($_GET['Requests'])) {
                $modelRequests->attributes = $_GET['Requests'];
            }
            
            $modelRequests->applicant_id = Utilities::get_UserInfo()->user_id;
            $this->render('new', array(
                'model' => $model,
                'questions' => $questions,
                'modelRequests' => $modelRequests
            ));
        }

    }
    