<?php

    /**
     * This is the model class for table "positions_status".
     *
     * The followings are the available columns in table 'positions_status':
     * @property integer $id
     * @property string $created_at
     * @property string $updated_at
     * @property integer $position_id
     * @property integer $status_id
     */
    class PositionsStatus extends CActiveRecord
    {

        /**
         * @return string the associated database table name
         */
        public function tableName()
        {
            return 'positions_status';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules()
        {
            // NOTE: you should only define rules for those attributes that
            // will receive user inputs.
            return array(
                array('position_id, status_id', 'numerical', 'integerOnly' => true),
                array('created_at, updated_at', 'safe'),
                // The following rule is used by search().
                // Please remove those attributes that should not be searched.
                array('id, created_at, updated_at, position_id, status_id', 'safe', 'on' => 'search'),
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
                'position_id' => 'Position',
                'status_id' => 'Status',
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

            $criteria->compare('position_id', $this->position_id);

            $criteria->compare('status_id', $this->status_id);

            return new CActiveDataProvider('PositionsStatus', array(
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
        
         public function get_Status()
        {
            if($this->statuses) {
                return $this->statuses->name;
            } else {
                return 'Not set';
            }
        }

    }
    