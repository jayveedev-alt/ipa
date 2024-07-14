<?php

    class DashboardController extends ClientController
    {

        public function actionIndex()
        {
            $userId = Utilities::get_UserInfo()->user_id;
            $model = Users::model()->findbyPk($userId);

            if(isset($_POST['Users'])) {
                $model->attributes = $_POST['Users'];
                $model->save();
                Audit::addRecord('users', $model->id, 'Update client information');
                Utilities::set_Flash(Utilities::ALERT_SUCCESS, 'Successfully updated.');
            }

            $this->render('index', array(
                'model' => $model,
            ));
        }

        public function actionComputation()
        {

            $electronicFees = Utilities::sql_getAllData_byTableName('electronic_fees');

            $this->render('computation', array(
                'electronicFees' => $electronicFees
            ));
        }

        public function actionProcedure()
        {
            $this->render('procedure');
        }

        public function actionRequirements()
        {
//            $dir = 'documents/LIST-OF-REQUIREMENTS-FOR-BUILDING-PERMIT-APPLICATION-MAY-2022.pdf';
//            if(file_exists($dir)) {
//                header('Content-type: application/pdf');
//                readfile($dir);
//            }

            $this->render('requirements');
        }

    }
    