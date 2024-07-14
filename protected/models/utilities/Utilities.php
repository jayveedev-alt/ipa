<?php

    class Utilities
    {

        const NO = 0;
        const YES = 1;
        const ALERT_PRIMARY = 'primary';
        const ALERT_SUCCESS = 'success';
        const ALERT_DANGER = 'danger';
        const ALERT_WARNING = 'warning';
        const ALERT_INFO = 'info';
        const ALERT_SECONDARY = 'secondary';
        const ROLE_ADMINISTRATOR = 1;
        const ROLE_EMPLOYEE = 2;
        const ROLE_CLIENT = 3;
        const ROLE_SUPER = 4;
        const TYPE_NEW = 0;
        const TYPE_RENEWAL = 1;
        const TYPE_AMENDATORY = 2;

        public static function clearSessions($tableName)
        {
            unset($_SESSION[$tableName]);
        }

        public static function setSession($tableName, $field, $value)
        {
            $_SESSION[$tableName][$field] = $value;
        }

        public static function getSession($tableName, $field)
        {
            return $_SESSION[$tableName][$field];
        }

        public static function debug($a, $caption = null)
        {
            print $caption;
            print '<pre>';
            print_r($a);
            print '</pre>';
        }

        public static function model_getByID($model, $id)
        {
            return $model->model()->findByPk($id);
        }

        public static function model_getByParams($model, $params)
        {
            return $model->model()->find($params);
        }

        public static function model_getAllData($model)
        {
            return $model->model()->findAll();
        }

        public static function model_getAllDataByParams($model, $params)
        {
            return $model->model()->findAll($params);
        }

        public static function setCapitalFirst($string)
        {
            return ucwords(strtolower($string));
        }

        public static function setCapitalAll($string)
        {
            return strtoupper($string);
        }

        public static function setLowerAll($string)
        {
            return strtolower($string);
        }

        public static function deleteFile($filename)
        {
            if(file_exists($filename) == true) {
                unlink($filename);
            }
        }

        public static function get_Date()
        {
            return date('Y-m-d');
        }

        public static function get_Time()
        {
            return date('H:i:s');
        }

        public static function get_DateTime()
        {
            return date('Y-m-d H:i:s');
        }

        public static function setDateStandard($date)
        {
            return date('M d, Y', strtotime($date));
        }

        public static function setDateTimeStandard($date)
        {
            return date('M d, Y H:i:s', strtotime($date));
        }

        public static function setDateTimeAmPm($date)
        {
            return date('M d, Y h:i:s A', strtotime($date));
        }

        public static function addMinutes($dateTime, $minutes)
        {
            return strtotime('+' . $minutes . ' minutes', strtotime($dateTime));
        }

        public static function addHours($dateTime, $hours)
        {
            return strtotime('+' . $hours . ' hours', strtotime($dateTime));
        }

        public static function addDays($dateTime, $day)
        {
            return strtotime('+' . $day . ' days', strtotime($dateTime));
        }

        public static function addMonths($dateTime, $month)
        {
            return strtotime('+' . $month . ' month', strtotime($dateTime));
        }

        public static function setBcrypt($str)
        {
            return password_hash(trim($str), PASSWORD_DEFAULT);
        }

        public static function get_baseUrl()
        {
            return Yii::app()->request->baseUrl;
        }

        public static function get_appName()
        {
            return Yii::app()->name;
        }

        public static function createConnection()
        {
            return Yii::app()->db;
        }

        public static function get_UserIp()
        {
            return Yii::app()->request->userHostAddress;
        }

        public static function get_RemoteIP()
        {
            return $_SERVER['REMOTE_ADDR'];
        }

        public static function set_Flash($status, $message)
        {
            Yii::app()->user->setFlash($status, $message);
        }

        public static function set_FlashSuccess($message)
        {
            Yii::app()->user->setFlash(self::FLASH_SUCCESS, $message);
        }

        public static function set_FlashError($message)
        {
            Yii::app()->user->setFlash(self::FLASH_ERROR, $message);
        }

        public static function set_FlashNotice($message)
        {
            Yii::app()->user->setFlash(self::FLASH_NOTICE, $message);
        }

        public static function get_ModelErrors($modelErrors)
        {
            $errorMsg = NULL;
            foreach($modelErrors as $modelErrors) {
                foreach($modelErrors as $messages) {
                    $errorMsg .= $messages . '<br />';
                }
            }
            return $errorMsg;
        }

        public static function get_UserInfo()
        {
            return Yii::app()->user;
        }

        public static function get_ControllerID()
        {
            return Yii::app()->controller->id;
        }

        public static function get_ActionID()
        {
            return Yii::app()->controller->action->id;
        }

        public static function get_roleID()
        {
            return Yii::app()->user->role_id;
        }

        public static function getSelectHTML($id = null)
        {
            $active = array(
                self::YES => '<span class="label label-primary">Yes</span>',
                self::NO => '<span class="label label-danger">No</span>',
            );
            if(is_null($id))
                return $active;
            else
                return $active[$id];
        }

        public static function get_SelectHTML($id)
        {
            return self::getSelectHTML($id);
        }

        public static function getTypeSelect($id = null)
        {
            $active = array(
                self::TYPE_NEW => 'New',
                self::TYPE_RENEWAL => 'Renewal',
                self::TYPE_AMENDATORY => 'Amendatory',
            );
            if(is_null($id))
                return $active;
            else
                return $active[$id];
        }

        public static function generateRandomNumber($length = 10)
        {
            $min = pow(10, $length - 1);
            $max = pow(10, $length) - 1;

            return mt_rand($min, $max);
        }

        public static function sql_getAllData_byTableName($tableName)
        {
            $cnn = Utilities::createConnection();
            $sql = 'SELECT * FROM ' . $tableName;
            $command = $cnn->createCommand($sql);
            return $command->queryAll();
        }

        public static function setPesoSign($amount)
        {
            return '₱' . number_format($amount, 2, '.', ',');
        }

        public static function get_Request()
        {
            return Yii::app()->request;
        }

    }
    