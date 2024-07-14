<?php

    /**
     * This is the model class for table "audit".
     *
     * The followings are the available columns in table 'audit':
     * @property integer $id
     * @property string $created_at
     * @property string $updated_at
     * @property integer $user_id
     * @property string $table_name
     * @property string $table_value
     * @property string $action
     */
    class Audit extends CActiveRecord
    {

        /**
         * @return string the associated database table name
         */
        public function tableName()
        {
            return 'audit';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules()
        {
            // NOTE: you should only define rules for those attributes that
            // will receive user inputs.
            return array(
                array('user_id', 'numerical', 'integerOnly' => true),
                array('table_name, table_value, action', 'length', 'max' => 255),
                array('created_at, updated_at', 'safe'),
                // The following rule is used by search().
                // @todo Please remove those attributes that should not be searched.
                array('id, created_at, updated_at, user_id, table_name, table_value, action', 'safe', 'on' => 'search'),
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
                'id' => 'ID',
                'created_at' => 'Date Created',
                'updated_at' => 'Updated At',
                'user_id' => 'User',
                'table_name' => 'Table Name',
                'table_value' => 'Table Value',
                'action' => 'Action',
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
            $criteria->compare('table_name', $this->table_name, true);
            $criteria->compare('table_value', $this->table_value, true);
            $criteria->compare('action', $this->action, true);

            return new CActiveDataProvider($this, array(
                'criteria' => $criteria,
            ));
        }

        /**
         * Returns the static model of the specified AR class.
         * Please note that you should have this exact method in all your CActiveRecord descendants!
         * @param string $className active record class name.
         * @return Audit the static model class
         */
        public static function model($className = __CLASS__)
        {
            return parent::model($className);
        }

        public static function addRecord($tableName, $tableValue, $action)
        {
            $model = new Audit();

            $model->created_at = Utilities::get_DateTime();
            $model->updated_at = Utilities::get_DateTime();
            $model->user_id = Utilities::get_UserInfo()->user_id;
            $model->table_name = $tableName;
            $model->table_value = $tableValue;
            $model->action = strtoupper($action);

            return $model->save();
        }

    }
    