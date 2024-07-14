<?php

    /**
     * UserIdentity represents the data needed to identity a user.
     * It contains the authentication method that checks if the provided
     * data can identity the user.
     */
    class UserIdentity extends CUserIdentity
    {

        /**
         * Authenticates a user.
         * The example implementation makes sure if the username and password
         * are both 'demo'.
         * In practical applications, this should be changed to authenticate
         * against some persistent user identity storage (e.g. database).
         * @return boolean whether authentication succeeds.
         */
        public function authenticate()
        {
//            $users = array(
//                // username => password
//                'demo' => 'demo',
//                'admin' => 'admin',
//            );
//            if(!isset($users[$this->username]))
//                $this->errorCode = self::ERROR_USERNAME_INVALID;
//            elseif($users[$this->username] !== $this->password)
//                $this->errorCode = self::ERROR_PASSWORD_INVALID;
//            else
//                $this->errorCode = self::ERROR_NONE;
//            return !$this->errorCode;

            $username = $this->username;
            $password = $this->password;

            $userCriterria = new CDbCriteria();
            $userCriterria->with = array('user');

            if(strpos($username, '@') !== false) {
                $userCriterria->condition = 'user.email = :email';
                $userCriterria->params = array(':email' => $username);
            } else {
                $userCriterria->condition = 'username = :username';
                $userCriterria->params = array(':username' => $username);
            }

            $usersAuth = Utilities::model_getByParams(UsersAuth::model(), $userCriterria);

            if(!empty($usersAuth)) {
                if(password_verify($password, $usersAuth->pass_hash)) {

                    $usersLog = new UsersLog;
                    $usersLog->created_at = Utilities::get_DateTime();
                    $usersLog->updated_at = Utilities::get_DateTime();
                    $usersLog->user_id = $usersAuth->user_id;
                    $usersLog->role_id = $usersAuth->role_id;
                    $usersLog->agent = Utilities::get_Request()->userAgent;
                    $usersLog->ip_address = Utilities::get_UserIp();
                    
                    if($usersLog->save()) {
                        $lastLoginUpdate = UsersAuth::sql_updateLastLogin($usersAuth->user_id, Utilities::get_DateTime());
                        if($lastLoginUpdate) {
                            $this->setState('username', $usersAuth->username);
                            $this->setState('user_id', $usersAuth->user_id);
                            $this->setState('role_id', $usersAuth->role_id);
                            $this->errorCode = self::ERROR_NONE;
                        }
                    }
                } else {
                    $this->errorCode = self::ERROR_PASSWORD_INVALID;
                }
            } else {
                $this->errorCode = self::ERROR_USERNAME_INVALID;
            }

            return !$this->errorCode;
        }

    }
    