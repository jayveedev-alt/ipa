<?php

    class UsersLogController extends AdministratorController
    {

        /**
         * @return array action filters
         */
        public function filters()
        {
            return array(
                'accessControl', // perform access control for CRUD operations
                'postOnly + delete', // we only allow deletion via POST request
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
                    'actions' => array('admin'),
                    'users' => array('@'),
                ),
                array('deny', // deny all users
                    'users' => array('*'),
                ),
            );
        }

        /**
         * Manages all models.
         */
        public function actionAdmin()
        {
            $model = new UsersLog('search');
            $model->unsetAttributes();  // clear any default values
            if(isset($_GET['UsersLog']))
                $model->attributes = $_GET['UsersLog'];
            
            $modelAudit = new Audit('search');
            $modelAudit->unsetAttributes();  // clear any default values
            if(isset($_GET['Audit']))
                $modelAudit->attributes = $_GET['Audit'];

            $model->user_id = Utilities::get_UserInfo()->user_id;

            $this->render('admin', array(
                'model' => $model,
                'modelAudit' => $modelAudit
            ));
        }

        /**
         * Returns the data model based on the primary key given in the GET variable.
         * If the data model is not found, an HTTP exception will be raised.
         * @param integer $id the ID of the model to be loaded
         * @return UsersLog the loaded model
         * @throws CHttpException
         */
        public function loadModel($id)
        {
            $model = UsersLog::model()->findByPk($id);
            if($model === null)
                throw new CHttpException(404, 'The requested page does not exist.');
            return $model;
        }

        /**
         * Performs the AJAX validation.
         * @param UsersLog $model the model to be validated
         */
        protected function performAjaxValidation($model)
        {
            if(isset($_POST['ajax']) && $_POST['ajax'] === 'users-log-form') {
                echo CActiveForm::validate($model);
                Yii::app()->end();
            }
        }

    }
    