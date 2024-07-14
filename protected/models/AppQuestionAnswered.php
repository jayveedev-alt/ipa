<?php

    /**
     * This is the model class for table "positions".
     *
     * The followings are the available columns in table 'positions':
     * @property integer $id
     * @property string $created_at
     * @property string $updated_at
     * @property integer $app_id
     * @property integer $question_id
     * @property integer $answer
     */
    class AppQuestionAnswered extends CActiveRecord
    {

        /**
         * @return string the associated database table name
         */
        public function tableName()
        {
            return 'app_question_answered';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules()
        {
            // NOTE: you should only define rules for those attributes that
            // will receive user inputs.
            return array(
                array('app_id, question_id, answer', 'required'),
                array('app_id, question_id, answer', 'numerical', 'integerOnly' => true),
                array('created_at, updated_at', 'safe'),
                // The following rule is used by search().
                // Please remove those attributes that should not be searched.
                array('id, created_at, updated_at, app_id, question_id, answer', 'safe', 'on' => 'search'),
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
                'application' => array(self::BELONGS_TO, 'Applications', 'app_id'),
                'question' => array(self::BELONGS_TO, 'Questions', 'question_id'),
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

            $criteria->compare('app_id', $this->app_id);

            $criteria->compare('question_id', $this->question_id);

            $criteria->compare('answer', $this->answer);

            return new CActiveDataProvider('Positions', array(
                'criteria' => $criteria,
            ));
        }

        /**
         * Returns the static model of the specified AR class.
         * @return Positions the static model class
         */
        public static function model($className = __CLASS__)
        {
            return parent::model($className);
        }
        
        public static function model_getAnswered_byApplicationID($applicationId)
        {
            $criteria = new CDbCriteria();
            $criteria->condition = 'app_id = :appId';
            $criteria->params = array(':appId' => $applicationId);
            return self::model()->findAll($criteria);
        }

    }
    