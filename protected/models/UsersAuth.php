<?php

    /**
     * This is the model class for table "users_auth".
     *
     * The followings are the available columns in table 'users_auth':
     * @property integer $id
     * @property string $created_at
     * @property string $updated_at
     * @property integer $user_id
     * @property integer $role_id
     * @property string $username
     * @property string $pass_hash
     * @property string $last_login
     * @property integer $is_active
     */
    class UsersAuth extends CActiveRecord
    {

        public $confirm_pass_hash;

        /**
         * @return string the associated database table name
         */
        public function tableName()
        {
            return 'users_auth';
        }

        public static function tbl()
        {
            $model = new UsersAuth();
            return $model->tableName();
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules()
        {
            // NOTE: you should only define rules for those attributes that
            // will receive user inputs.
            return array(
                array('username', 'unique'),
                array('username, pass_hash', 'required'),
                array('user_id, role_id, is_active', 'numerical', 'integerOnly' => true),
                array('username, pass_hash, confirm_pass_hash', 'length', 'max' => 255),
                array('created_at, updated_at, last_login', 'safe'),
                // The following rule is used by search().
                // Please remove those attributes that should not be searched.
                array('id, created_at, updated_at, user_id, role_id, username, pass_hash, last_login, is_active', 'safe', 'on' => 'search'),
            );
        }

        /**
         * @return array relational rules.
         */
        public function relations()
        {
            // NOTE: you may need to adjust the relation name and the related
            // class name for the relations automatically generated below.
            return array(
                'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
            );
        }

        /**
         * @return array customized attribute labels (name=>label)
         */
        public function attributeLabels()
        {
            return array(
                'id' => 'Id',
                'created_at' => 'Created At',
                'updated_at' => 'Updated At',
                'user_id' => 'User',
                'role_id' => 'Role',
                'username' => 'Username',
                'pass_hash' => 'Password',
                'confirm_pass_hash' => 'Confrim password',
                'last_login' => 'Last Login',
                'is_active' => 'Is Active',
            );
        }

        /**
         * Retrieves a list of models based on the current search/filter conditions.
         *
         * Typical usecase:
         * - Initialize the model fields with values from filter form.
         * - Execute this method to get CActiveDataProvider instance which will filter
         * models according to data in model fields.
         * - Pass data provider to CGridView, CListView or any similar widget.
         *
         * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
         */
        public function search()
        {
            // Warning: Please modify the following code to remove attributes that
            // should not be searched.

            $criteria = new CDbCriteria;

            $criteria->compare('id', $this->id);

            $criteria->compare('created_at', $this->created_at, true);

            $criteria->compare('updated_at', $this->updated_at, true);

            $criteria->compare('user_id', $this->user_id);

            $criteria->compare('role_id', $this->role_id);

            $criteria->compare('username', $this->username, true);

            $criteria->compare('pass_hash', $this->pass_hash, true);

            $criteria->compare('last_login', $this->last_login, true);

            $criteria->compare('is_active', $this->is_active);

            return new CActiveDataProvider('UsersAuth', array(
                'criteria' => $criteria,
            ));
        }

        /**
         * Returns the static model of the specified AR class.
         * @return UsersAuth the static model class
         */
        public static function model($className = __CLASS__)
        {
            return parent::model($className);
        }

        public static function sql_updateLastLogin($userId, $lastLogin)
        {
            $cnn = Utilities::createConnection();
            $command = $cnn->createCommand();

            $sql = "UPDATE " . self::tbl() . " SET last_login=:lastLogin WHERE user_id=:userId";
            $command->setText($sql);
            $command->bindParam(':lastLogin', $lastLogin, PDO::PARAM_STR);
            $command->bindParam(':userId', $userId, PDO::PARAM_INT);

            return $command->execute();
        }

    }
    