<?php

    /**
     * This is the model class for table "users".
     *
     * The followings are the available columns in table 'users':
     * @property integer $id
     * @property string $created_at
     * @property string $updated_at
     * @property string $firstname
     * @property string $middlename
     * @property string $lastname
     * @property string $phone
     * @property string $email
     * @property string $address
     * @property string $city
     * @property string $province
     * @property string $region
     * @property integer $zip_code
     * @property integer $position_id
     */
    class Users extends CActiveRecord
    {

        public $username;
        public $pass_hash;
        public $confirm_pass_hash;

        /**
         * @return string the associated database table name
         */
        public function tableName()
        {
            return 'users';
        }

//        protected function beforeSave()
//        {
//            // Call parent beforeSave()
//            if(!parent::beforeSave()) {
//                return false;
//            }
//            
//            
//           print_r('a'); exit();
//
//            return true; // Return true to continue saving
//        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules()
        {
            // NOTE: you should only define rules for those attributes that
            // will receive user inputs.
            return array(
                array('email', 'unique', 'on' => 'register'),
                array('username', 'uniqueUsername', 'on' => 'register'),
                array('pass_hash', 'comparePasswords'),
                array('firstname, lastname, email, username, pass_hash, confirm_pass_hash', 'required', 'on' => 'register'),
                array('zip_code, position_id', 'numerical', 'integerOnly' => true),
                array('firstname, address', 'length', 'max' => 100),
                array('middlename, lastname, email, city, province, region', 'length', 'max' => 50),
                array('phone', 'length', 'max' => 12),
                array('created_at, updated_at', 'safe'),
                array('username, pass_hash, confirm_pass_hash', 'length', 'max' => 255),
                //array('email, username, pass_hash', 'on' => 'forgotPassword'),
                // The following rule is used by search().
                // Please remove those attributes that should not be searched.
                array('id, created_at, updated_at, firstname, middlename, lastname, phone, email, address, city, province, region, zip_code, position_id', 'safe', 'on' => 'search'),
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
                'positions' => array(self::BELONGS_TO, 'Positions', 'position_id'),
            );
        }

        /**
         * @return array customized attribute labels (name=>label)
         */
        public function attributeLabels()
        {
            return array(
                'id' => 'Id',
                'created_at' => 'Date Created',
                'updated_at' => 'Last Modified',
                'firstname' => 'First Name',
                'middlename' => 'Middle Name',
                'lastname' => 'Last Name',
                'phone' => 'Phone',
                'email' => 'Email',
                'address' => 'Address',
                'city' => 'City',
                'province' => 'Province',
                'region' => 'Region',
                'zip_code' => 'Zip Code',
                'position_id' => 'Position',
                'username' => 'Username',
                'pass_hash' => 'Password',
                'confirm_pass_hash' => 'Confrim password',
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

            $criteria->compare('firstname', $this->firstname, true);

            $criteria->compare('middlename', $this->middlename, true);

            $criteria->compare('lastname', $this->lastname, true);

            $criteria->compare('phone', $this->phone, true);

            $criteria->compare('email', $this->email, true);

            $criteria->compare('address', $this->address, true);

            $criteria->compare('city', $this->city, true);

            $criteria->compare('province', $this->province, true);

            $criteria->compare('region', $this->region, true);

            $criteria->compare('zip_code', $this->zip_code);

            $criteria->compare('position_id', $this->position_id);

            return new CActiveDataProvider('Users', array(
                'criteria' => $criteria,
            ));
        }

        /**
         * Returns the static model of the specified AR class.
         * @return Users the static model class
         */
        public static function model($className = __CLASS__)
        {
            return parent::model($className);
        }

        public function uniqueUsername($attribute, $params)
        {
            if(!$this->hasErrors()) {
                $existingUser = UsersAuth::model()->findByAttributes(array('username' => $this->$attribute));
                if($existingUser !== null && $existingUser->id !== $this->id) {
                    $this->addError($attribute, 'This username has already been taken.');
                }
            }
        }

        public function comparePasswords($attribute, $params)
        {
            if($this->pass_hash !== $this->confirm_pass_hash) {
                $this->addError('confirm_pass_hash', 'The passwords do not match.');
            }
        }

        public function fullname()
        {
            return $this->firstname . ' ' . $this->lastname;
        }

        public static function model_getPosition()
        {
            return Users::model()->findAll(array(
                    'condition' => 'position_id IS NOT NULL',
            ));
        }

        public function department()
        {
            if($this->positions) {
                return $this->positions->name;
            }
            return '';
        }

    }
    