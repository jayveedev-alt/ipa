<?php

    /**
     * Controller is the customized base controller class.
     * All controller classes for this application should extend from this base class.
     */
    class EmployeeController extends CController
    {

        public $leftMenu;
        public $menu = array();
        public $breadcrumbs = array();
        public $layout = '/layouts/main';

        public function init()
        {
            parent::init();

            $app = Yii::app();
            if(isset($_POST['_lang'])) {
                $app->language = $_POST['_lang'];
                $app->session['_lang'] = $app->language;
            } else if(isset($app->session['_lang'])) {
                $app->language = $app->session['_lang'];
            } else {
                $app->language = 'en';
            }

            Yii::app()->setHomeUrl($this->createUrl('index'));

            $this->checkAccount();
        }

        public function checkAccount()
        {
            if(Yii::app()->user->isGuest) {
                Yii::app()->user->loginRequired();
            }

            if(Utilities::get_roleID() != Utilities::ROLE_EMPLOYEE) {
                if(Utilities::get_roleID() == Utilities::ROLE_ADMINISTRATOR) {
                    $this->redirect($this->createUrl('administrator/dashboard'));
                } else {
                    $this->redirect($this->createUrl('client/dashboard'));
                }
            }
        }

    }
    