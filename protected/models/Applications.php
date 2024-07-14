<?php

    /**
     * This is the model class for table "applications".
     *
     * The followings are the available columns in table 'applications':
     * @property integer $id
     * @property string $created_at
     * @property string $updated_at
     * @property integer $type
     * @property integer $application_no
     * @property integer $area_no
     * @property integer $request_id
     * @property string $for_construction_owned
     * @property string $ownership_form
     * @property string $project_location
     * @property integer $project_type_id
     * @property string $project_purpose
     * @property integer $structure_type_id
     * @property string $occ_classified
     * @property integer $units
     * @property integer $total_floor_area
     * @property string $lot_area
     * @property string $total_estimated_cost
     * @property string $proposed_date_cons
     * @property string $expected_date_comp
     * @property integer $engineer_id
     * @property string $signed_date
     * @property string $prc_no
     * @property string $ptr_no
     * @property string $issued_at
     * @property string $validity
     * @property string $date_issued
     * @property integer $is_registered
     * @property integer $ref_no
     * @property string $proj_lot
     * @property string $proj_blk
     * @property string $proj_tct
     * @property string $proj_tax_dec
     * @property string $proj_st
     * @property string $proj_brgy
     * @property string $proj_dist
     * @property string $proj_city
     */
    class Applications extends CActiveRecord
    {

        /**
         * @return string the associated database table name
         */
        public function tableName()
        {
            return 'applications';
        }

        public static function tbl()
        {
            $model = new Applications();
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
                array('type, proj_st, proj_brgy, proj_dist, proj_city, project_type_id, structure_type_id, occ_classified, units', 'required'),
                array('type, request_id, project_type_id, structure_type_id, units, engineer_id, is_registered', 'numerical', 'integerOnly' => true),
                array('total_floor_area, lot_area, total_estimated_cost', 'numerical', 'integerOnly' => false),
                array('total_floor_area, lot_area, total_estimated_cost', 'numerical', 'min' => 0),
                array('for_construction_owned, ownership_form, project_location, project_purpose', 'length', 'max' => 255),
                array('occ_classified, prc_no, ptr_no', 'length', 'max' => 100),
                array('lot_area, total_estimated_cost', 'length', 'max' => 10),
                array('created_at, updated_at, request_id, ref_no, application_no, area_no, proposed_date_cons, expected_date_comp, signed_date, issued_at, validity, date_issued, total_floor_area, lot_area, project_location, proj_lot, proj_blk, proj_tct, proj_tax_dec, project_location, project_purpose', 'safe'),
                array('total_floor_area, lot_area, proposed_date_cons, expected_date_comp, signed_date, issued_at, validity, date_issued, total_estimated_cost', 'required', 'on' => 'update'),
                // The following rule is used by search().
                // Please remove those attributes that should not be searched.
                array('id, created_at, updated_at, type, ref_no, application_no, area_no, request_id, for_construction_owned, ownership_form, project_location, project_type_id, project_purpose, structure_type_id, occ_classified, units, total_floor_area, lot_area, total_estimated_cost, proposed_date_cons, expected_date_comp, engineer_id, signed_date, prc_no, ptr_no, issued_at, validity, date_issued, is_registered, proj_lot, proj_blk, proj_tct, proj_tax_dec, proj_st, proj_brgy, proj_dist, proj_city,', 'safe', 'on' => 'search'),
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
                'applicationTypes' => array(self::BELONGS_TO, 'ApplicationTypes', 'type'),
                'projectTypes' => array(self::BELONGS_TO, 'ProjectTypes', 'project_type_id'),
                'structureTypes' => array(self::BELONGS_TO, 'StructureTypes', 'structure_type_id'),
                'users' => array(self::BELONGS_TO, 'Users', 'engineer_id'),
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
                'updated_at' => 'Last Modified',
                'type' => 'Type',
                'ref_no' => 'Reference Number',
                'application_no' => 'Application No',
                'area_no' => 'Area No',
                'request_id' => 'Request',
                'for_construction_owned' => 'For Construction Owned By An Enterprise',
                'ownership_form' => 'Ownership Form',
                'project_location' => 'Project Location',
                'project_type_id' => 'Project Type',
                'project_purpose' => 'Project Purpose',
                'proj_lot' => 'Lot no.',
                'proj_blk' => 'Blk no.',
                'proj_tct' => 'Tct no.',
                'proj_tax_dec' => 'Tax dec. no.',
                'proj_st' => 'Street',
                'proj_brgy' => 'Barangay',
                'proj_dist' => 'District',
                'proj_city' => 'City',
                'structure_type_id' => 'Structure Type',
                'occ_classified' => 'Occupancy Classified',
                'units' => 'Number of Units',
                'total_floor_area' => 'Total Floor Area (Square Meters)',
                'lot_area' => 'Lot Area (Square Meters)',
                'total_estimated_cost' => 'Total Estimated Cost',
                'proposed_date_cons' => 'Proposed Date Construction',
                'expected_date_comp' => 'Expected Date Completion',
                'engineer_id' => 'Engineer',
                'signed_date' => 'Signed Date',
                'prc_no' => 'Prc No',
                'ptr_no' => 'Ptr No',
                'issued_at' => 'Issued At',
                'validity' => 'Validity',
                'date_issued' => 'Date Issued',
                'is_registered' => 'Are you registered owner of the land?'
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

            $criteria->compare('type', $this->type);

            $criteria->compare('ref_no', $this->ref_no);

            $criteria->compare('application_no', $this->application_no);

            $criteria->compare('area_no', $this->area_no);

            $criteria->compare('request_id', $this->request_id);

            $criteria->compare('for_construction_owned', $this->for_construction_owned, true);

            $criteria->compare('ownership_form', $this->ownership_form, true);

            $criteria->compare('project_location', $this->project_location, true);

            $criteria->compare('project_type_id', $this->project_type_id);

            $criteria->compare('project_purpose', $this->project_purpose, true);

            $criteria->compare('structure_type_id', $this->structure_type_id);

            $criteria->compare('occ_classified', $this->occ_classified, true);

            $criteria->compare('units', $this->units);

            $criteria->compare('total_floor_area', $this->total_floor_area);

            $criteria->compare('lot_area', $this->lot_area, true);

            $criteria->compare('total_estimated_cost', $this->total_estimated_cost, true);

            $criteria->compare('proposed_date_cons', $this->proposed_date_cons, true);

            $criteria->compare('expected_date_comp', $this->expected_date_comp, true);

            $criteria->compare('engineer_id', $this->engineer_id);

            $criteria->compare('signed_date', $this->signed_date, true);

            $criteria->compare('prc_no', $this->prc_no, true);

            $criteria->compare('ptr_no', $this->ptr_no, true);

            $criteria->compare('issued_at', $this->issued_at, true);

            $criteria->compare('validity', $this->validity, true);

            $criteria->compare('date_issued', $this->date_issued, true);

            $criteria->compare('is_registered', $this->is_registered);

            return new CActiveDataProvider('Applications', array(
                'criteria' => $criteria,
            ));
        }

        /**
         * Returns the static model of the specified AR class.
         * @return Applications the static model class
         */
        public static function model($className = __CLASS__)
        {
            return parent::model($className);
        }

        public function get_engineerName()
        {
            if($this->users) {
                return $this->users->firstname . ' ' . $this->users->lastname;
            } else {
                return 'Not set';
            }
        }

    }
    