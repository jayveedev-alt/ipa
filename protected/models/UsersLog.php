<?php

    /**
     * This is the model class for table "users_log".
     *
     * The followings are the available columns in table 'users_log':
     * @property integer $id
     * @property string $created_at
     * @property string $updated_at
     * @property integer $user_id
     * @property integer $role_id
     * @property string $agent
     * @property string $ip_address
     */
    class UsersLog extends CActiveRecord
    {

        /**
         * @return string the associated database table name
         */
        public function tableName()
        {
            return 'users_log';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules()
        {
            // NOTE: you should only define rules for those attributes that
            // will receive user inputs.
            return array(
                array('user_id, role_id', 'numerical', 'integerOnly' => true),
                array('agent, ip_address', 'length', 'max' => 255),
                array('created_at, updated_at', 'safe'),
                // The following rule is used by search().
                // @todo Please remove those attributes that should not be searched.
                array('id, created_at, updated_at, user_id, role_id, agent, ip_address', 'safe', 'on' => 'search'),
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
                  'role' => array(self::BELONGS_TO, 'Roles', 'role_id'),
            );
        }

        /**
         * @return array customized attribute labels (name=>label)
         */
        public function attributeLabels()
        {
            return array(
                'id' => 'ID',
                'created_at' => 'Last Login',
                'updated_at' => 'Updated At',
                'user_id' => 'User',
                'role_id' => 'Role',
                'agent' => 'Agent',
                'ip_address' => 'IP Address'
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
         * @return CActiveDataProvider the data provider that can return the models
         * based on the search/filter conditions.
         */
        public function search()
        {
            // @todo Please modify the following code to remove attributes that should not be searched.

            $criteria = new CDbCriteria;

            $criteria->compare('id', $this->id);
            $criteria->compare('created_at', $this->created_at, true);
            $criteria->compare('updated_at', $this->updated_at, true);
            $criteria->compare('user_id', $this->user_id);
            $criteria->compare('role_id', $this->role_id);
            $criteria->compare('agent', $this->agent, true);
            $criteria->compare('ip_address', $this->ip_address, true);

            return new CActiveDataProvider($this, array(
                'criteria' => $criteria,
            ));
        }

        /**
         * Returns the static model of the specified AR class.
         * Please note that you should have this exact method in all your CActiveRecord descendants!
         * @param string $className active record class name.
         * @return UsersLog the static model class
         */
        public static function model($className = __CLASS__)
        {
            return parent::model($className);
        }

    }
    