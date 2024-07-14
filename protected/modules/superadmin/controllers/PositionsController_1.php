<?php

    class PositionsController extends AdministratorController
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
                    'actions' => array('create', 'update', 'admin', 'delete', 'view'),
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
            $this->render('view', array(
                'model' => $this->loadModel(),
            ));
        }

        /**
         * Creates a new model.
         * If creation is successful, the browser will be redirected to the 'view' page.
         */
        public function actionCreate()
        {
            $model = new Positions;

            // Uncomment the following line if AJAX validation is needed
            // $this->performAjaxValidation($model);

            if(isset($_POST['Positions'])) {
                $model->attributes = $_POST['Positions'];
                if($model->save())
                    $this->redirect(array('view', 'id' => $model->id));
            }

            $this->render('create', array(
                'model' => $model,
            ));
        }

        /**
         * Updates a particular model.
         * If update is successful, the browser will be redirected to the 'view' page.
         */
        public function actionUpdate()
        {
            $model = $this->loadModel();

            // Uncomment the following line if AJAX validation is needed
            $this->performAjaxValidation($model);

            if(isset($_POST['Positions'])) {
                $model->attributes = $_POST['Positions'];
                $model->created_at = Utilities::get_DateTime();
                $model->updated_at = Utilities::get_DateTime();
                if($model->save())
                    $this->redirect(array('admin'));
            }

            $this->render('update', array(
                'model' => $model,
            ));
        }

        /**
         * Deletes a particular model.
         * If deletion is successful, the browser will be redirected to the 'index' page.
         */
        public function actionDelete()
        {
            if($this->loadModel()) {
                // we only allow deletion via POST request
                $this->loadModel()->delete();

                // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
                if(!isset($_GET['ajax']))
                    $this->redirect(array('index'));
            } else
                throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
        }

        /**
         * Manages all models.
         */
        public function actionAdmin()
        {
            $model = new Positions('search');
            $model->unsetAttributes();  // clear any default values
            if(isset($_GET['Positions']))
                $model->attributes = $_GET['Positions'];

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
                    $this->_model = Positions::model()->findbyPk($_GET['id']);
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
            if(isset($_POST['ajax']) && $_POST['ajax'] === 'positions-form') {
                echo CActiveForm::validate($model);
                Yii::app()->end();
            }
        }

    }
    