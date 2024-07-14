<?php

    class SiteController extends Controller
    {

        /**
         * Declares class-based actions.
         */
        public function actions()
        {
            return array(
                // captcha action renders the CAPTCHA image displayed on the contact page
                'captcha' => array(
                    'class' => 'CCaptchaAction',
                    'backColor' => 0xFFFFFF,
                ),
                // page action renders "static" pages stored under 'protected/views/site/pages'
                // They can be accessed via: index.php?r=site/page&view=FileName
                'page' => array(
                    'class' => 'CViewAction',
                ),
            );
        }

        /**
         * This is the default 'index' action that is invoked
         * when an action is not explicitly requested by users.
         */
        public function actionIndex()
        {
            // renders the view file 'protected/views/site/index.php'
            // using the default layout 'protected/views/layouts/main.php'
            $this->render('index');
        }

        /**
         * This is the action to handle external exceptions.
         */
        public function actionError()
        {
            if($error = Yii::app()->errorHandler->error) {
                if(Yii::app()->request->isAjaxRequest)
                    echo $error['message'];
                else
                    $this->render('error', $error);
            }
        }

        /**
         * Displays the contact page
         */
        public function actionContact()
        {
            $model = new ContactForm;
            if(isset($_POST['ContactForm'])) {
                $model->attributes = $_POST['ContactForm'];
                if($model->validate()) {
                    $name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
                    $subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
                    $headers = "From: $name <{$model->email}>\r\n" .
                        "Reply-To: {$model->email}\r\n" .
                        "MIME-Version: 1.0\r\n" .
                        "Content-Type: text/plain; charset=UTF-8";

                    mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
                    Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                    $this->refresh();
                }
            }
            $this->render('contact', array('model' => $model));
        }

        /**
         * Displays the login page
         */
        public function actionLogin()
        {

            $model = new LoginForm;

            // if it is ajax validation request
            if(isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
                echo CActiveForm::validate($model);
                Yii::app()->end();
            }

            // collect user input data
            if(isset($_POST['LoginForm'])) {
                $model->attributes = $_POST['LoginForm'];
                // validate user input and redirect to the previous page if valid
                if($model->validate() && $model->login()) {
                    switch (Yii::app()->user->role_id) {
                        case Utilities::ROLE_ADMINISTRATOR:
                            $this->redirect($this->createUrl('administrator/dashboard'));
                            break;
                        case Utilities::ROLE_EMPLOYEE:
                            $this->redirect($this->createUrl('employee/dashboard'));
                            break;
                        case Utilities::ROLE_CLIENT:
                            $this->redirect($this->createUrl('client/dashboard'));
                            break;
                        case Utilities::ROLE_SUPER:
                            $this->redirect($this->createUrl('superadmin/dashboard'));
                            break;
                    }
                }

                //$this->redirect(Yii::app()->user->returnUrl);
            }

            $this->render('login', array(
                'model' => $model
            ));
        }

        /**
         * Logs out the current user and redirect to homepage.
         */
        public function actionLogout()
        {
            Yii::app()->user->logout();
            $this->redirect(Yii::app()->homeUrl);
        }

        public function actionRegister()
        {
            $userType = Utilities::ROLE_CLIENT;

            $model = new Users;
            $model->scenario = 'register';

            if(isset($_POST['Users'])) {

                $model->attributes = $_POST['Users'];
                $model->created_at = Utilities::get_DateTime();
                $model->updated_at = Utilities::get_DateTime();

                if($model->validate() && $model->save()) {

                    $auth = new UsersAuth;
                    $auth->created_at = Utilities::get_DateTime();
                    $auth->updated_at = Utilities::get_DateTime();
                    $auth->user_id = $model->id;
                    $auth->role_id = $_POST['user-type'];
                    $auth->username = $model->username;
                    $auth->pass_hash = Utilities::setBcrypt($model->pass_hash);
                    if($auth->save()) {
                        Utilities::set_Flash(Utilities::ALERT_SUCCESS, 'Successfully registered');
                        $this->redirect(array('login'));
                    }
                } else {
                    $userType = $_POST['user-type'];
                }
            }

            $this->render('register', array(
                'model' => $model,
                'userType' => $userType
            ));
        }

        public function actionForgotPassword()
        {
            $model = new Users;
            $model->scenario = 'forgotPassword';

            if(isset($_POST['Users'])) {
                $model->attributes = $_POST['Users'];
                if($model->validate()) {

                    $userCriterria = new CDbCriteria();
                    $userCriterria->with = array('user');
                    if(strpos($model->username, '@') !== false) {
                        $userCriterria->condition = 'user.email = :email';
                        $userCriterria->params = array(':email' => $model->username);
                    } else {
                        $userCriterria->condition = 'username = :username';
                        $userCriterria->params = array(':username' => $model->username);
                    }

                    $usersAuth = Utilities::model_getByParams(UsersAuth::model(), $userCriterria);
                    if(!empty($usersAuth)) {
                        $auth = Utilities::model_getByID(UsersAuth::model(), $usersAuth->id);
                        $auth->updated_at = Utilities::get_DateTime();
                        $auth->pass_hash = Utilities::setBcrypt($model->pass_hash);
                        if($model->validate() && $auth->save()) {
                            Utilities::set_Flash(Utilities::ALERT_SUCCESS, 'Your password has been successfully updated.');
                            $this->redirect(array('forgotPassword'));
                        } else {
                            Utilities::set_Flash(Utilities::ALERT_DANGER, Utilities::get_ModelErrors($auth->errors));
                        }
                    } else {
                        Utilities::set_Flash(Utilities::ALERT_DANGER, 'User does not exist.');
                    }
                }
            }
            $this->render('forgotPassword', array(
                'model' => $model
            ));
        }

    }
    