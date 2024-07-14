<?php

    /**
     * This is the model class for table "requests".
     *
     * The followings are the available columns in table 'requests':
     * @property integer $id
     * @property string $created_at
     * @property string $updated_at
     * @property integer $applicant_id
     * @property string $remarks
     * @property integer $is_new
     * @property integer $is_approved
     * @property integer $updated_by
     * @property string $updated_remarks Description
     */
    class Requests extends CActiveRecord
    {

        public $files;

        /**
         * @return string the associated database table name
         */
        public function tableName()
        {
            return 'requests';
        }

        public static function tbl()
        {
            $model = new Requests();
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
                //array('applicant_id', 'required'),
                array('files', 'required', 'on' => 'create'),
                array('applicant_id, is_new, is_approved, is_submitted, updated_by', 'numerical', 'integerOnly' => true),
                array('created_at, updated_at, remarks, updated_remarks, files', 'safe'),
                array('files', 'file', 'types' => 'pdf', 'maxFiles' => 50),
                // The following rule is used by search().
                // Please remove those attributes that should not be searched.
                array('id, created_at, updated_at, applicant_id, remarks, is_new, is_approved, is_submitted, updated_by, updated_remarks', 'safe', 'on' => 'search'),
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
                'users' => array(self::BELONGS_TO, 'Users', 'applicant_id'),
                'updatedBy' => array(self::BELONGS_TO, 'Users', 'updated_by'),
                'statuses' => array(self::BELONGS_TO, 'Statuses', 'is_approved'),
                'applications' => array(self::BELONGS_TO, 'Applications', 'id'),
            );
        }

        /**
         * @return array customized attribute labels (name=>label)
         */
        public function attributeLabels()
        {
            return array(
                'id' => 'ID',
                'created_at' => 'Date Requested',
                'updated_at' => 'Last Modified',
                'applicant_id' => 'Client',
                'remarks' => 'Remarks',
                'is_new' => 'Is New',
                'is_approved' => 'Status',
                'files' => 'Requirements',
                'updated_by' => 'Updated by',
                'updated_remarks' => 'Reason'
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

            $criteria->compare('remarks', $this->remarks, true);

            $criteria->compare('is_new', $this->is_new);

            $criteria->compare('is_approved', $this->is_approved);

            $criteria->compare('is_submitted', $this->is_submitted);

            return new CActiveDataProvider('Requests', array(
                'criteria' => $criteria,
            ));
        }

        /**
         * Returns the static model of the specified AR class.
         * @return Requests the static model class
         */
        public static function model($className = __CLASS__)
        {
            return parent::model($className);
        }

        public static function sql_updateData_bySubmitRequestID($id)
        {
            $cnn = Utilities::createConnection();
            $command = $cnn->createCommand();
            $isSubmmited = Utilities::YES;
            $sql = "UPDATE " . self::tbl() . " SET is_submitted=:isSubmitted WHERE id=:ID";
            $command->setText($sql);
            $command->bindParam(':isSubmitted', $isSubmmited, PDO::PARAM_INT);
            $command->bindParam(':ID', $id, PDO::PARAM_INT);

            return $command->execute();
        }

        public function get_clientName()
        {
            return $this->users ? $this->users->firstname . ' ' . $this->users->lastname : 'Not set';
        }

        public static function sql_updateStatus_byRequestID($id, $status, $updatedRemarks = null, $updatedBy = null)
        {
            $cnn = Utilities::createConnection();
            $command = $cnn->createCommand();
            $sql = "UPDATE " . self::tbl() . " SET is_approved=:isApproved, updated_remarks=:updatedRemarks, updated_by=:updatedBy WHERE id=:ID";
            $command->setText($sql);
            $command->bindParam(':isApproved', $status, PDO::PARAM_INT);
            $command->bindParam(':updatedRemarks', $updatedRemarks, PDO::PARAM_STR);
            $command->bindParam(':updatedBy', $updatedBy, PDO::PARAM_INT);
            $command->bindParam(':ID', $id, PDO::PARAM_INT);

            return $command->execute();
        }

        public static function sql_rejectionUpdate_byRequestID($id, $status, $updatedBy, $updatedRemarks, $resubmit = 0)
        {
            $cnn = Utilities::createConnection();
            $command = $cnn->createCommand();
            $sql = "UPDATE " . self::tbl() . " SET is_approved=:isApproved, updated_by=:updatedBy, updated_remarks=:updatedRemarks, is_submitted=:isSubmitted WHERE id=:ID";
            $command->setText($sql);
            $command->bindParam(':isSubmitted', $resubmit, PDO::PARAM_INT);
            $command->bindParam(':isApproved', $status, PDO::PARAM_INT);
            $command->bindParam(':updatedBy', $updatedBy, PDO::PARAM_INT);
            $command->bindParam(':updatedRemarks', $updatedRemarks, PDO::PARAM_STR);
            $command->bindParam(':ID', $id, PDO::PARAM_INT);

            return $command->execute();
        }

        public static function sql_addRecord($applicantId, $datetime)
        {
            $cnn = Utilities::createConnection();
            $command = $cnn->createCommand();
            $sql = "INSERT INTO requests (created_at, updated_at, applicant_id) VALUES (:createdAt, :updatedAt, :applicantId)";
            $command->setText($sql);
            $command->bindParam(':createdAt', $datetime, PDO::PARAM_STR);
            $command->bindParam(':updatedAt', $datetime, PDO::PARAM_STR);
            $command->bindParam(':applicantId', $applicantId, PDO::PARAM_INT);

            if($command->execute()) {
                return $cnn->getLastInsertID();
            }
        }

    }
    