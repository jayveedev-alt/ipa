<?php

    /**
     * This is the model class for table "positions_status".
     *
     * The followings are the available columns in table 'positions_status':
     * @property integer $id
     * @property string $created_at
     * @property string $updated_at
     * @property integer $request_id
     * @property integer $status_id
     * @property integer $updated_by
     * @property string $remarks
     * @property integer $applicant_id
     */
    class RequestLogs extends CActiveRecord
    {

        /**
         * @return string the associated database table name
         */
        public function tableName()
        {
            return 'request_logs';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules()
        {
            // NOTE: you should only define rules for those attributes that
            // will receive user inputs.
            return array(
                array('applicant_id, request_id, status_id, updated_by', 'numerical', 'integerOnly' => true),
                array('created_at, updated_at, remarks', 'safe'),
                // The following rule is used by search().
                // Please remove those attributes that should not be searched.
                array('id, created_at, updated_at, applicant_id, request_id, status_id, updated_by, remarks', 'safe', 'on' => 'search'),
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
                'statuses' => array(self::BELONGS_TO, 'Statuses', 'status_id'),
                'updatedBy' => array(self::BELONGS_TO, 'Users', 'updated_by'),
                'requests' => array(self::BELONGS_TO, 'Requests', 'request_id'),
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
                'request_id' => 'Request',
                'status_id' => 'Status',
                'updated_by' => 'Updated by'
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

            $criteria->compare('applicant_id', $this->applicant_id);

            $criteria->compare('request_id', $this->request_id);

            $criteria->compare('status_id', $this->status_id);

            $criteria->compare('updated_by', $this->updated_by);

            $criteria->compare('remarks', $this->remarks, true);

            return new CActiveDataProvider('RequestLogs', array(
                'criteria' => $criteria,
            ));
        }

        /**
         * Returns the static model of the specified AR class.
         * @return PositionsStatus the static model class
         */
        public static function model($className = __CLASS__)
        {
            return parent::model($className);
        }

    }
    