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
                Utilities::set_Flash(Utilities::ALERT_SUCCESS, 'Successfully updated.');
            }

            $this->render('index', array(
                'model' => $model
            ));
        }

    }
    