<?php

    /**
     * This is the model class for table "documents".
     *
     * The followings are the available columns in table 'documents':
     * @property integer $id
     * @property string $created_at
     * @property string $updated_at
     * @property integer $request_id
     * @property integer $requirement_id
     * @property string $filename
     * @property integer $is_valid
     */
    class Documents extends CActiveRecord
    {

        /**
         * @return string the associated database table name
         */
        public function tableName()
        {
            return 'documents';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules()
        {
            // NOTE: you should only define rules for those attributes that
            // will receive user inputs.
            return array(
                array('request_id', 'numerical', 'integerOnly' => true),
                array('filename', 'length', 'max' => 255),
                array('created_at, updated_at', 'safe'),
                // The following rule is used by search().
                // Please remove those attributes that should not be searched.
                array('id, created_at, updated_at, request_id, filename', 'safe', 'on' => 'search'),
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
                'request_id' => 'Request',
                'filename' => 'Filename',
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

            $criteria->compare('request_id', $this->request_id);

            $criteria->compare('filename', $this->filename, true);

            return new CActiveDataProvider('Documents', array(
                'criteria' => $criteria,
            ));
        }

        /**
         * Returns the static model of the specified AR class.
         * @return Documents the static model class
         */
        public static function model($className = __CLASS__)
        {
            return parent::model($className);
        }

        public static function model_getDocuments_byRequestID($requestId)
        {
            $criteria = new CDbCriteria();
            $criteria->condition = 'request_id = :requestId';
            $criteria->params = array(':requestId' => $requestId);
            return self::model()->findAll($criteria);
        }

    }
    