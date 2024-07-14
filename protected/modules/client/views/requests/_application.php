<div class="detail-view">
    <?php
        $this->widget('zii.widgets.CDetailView', array(
            'data' => $modelApp,
            'attributes' => array(
                array(
                    'name' => 'is_registered',
                    'value' => Utilities::get_SelectHTML($modelApp->is_registered),
                    'type' => 'raw'
                ),
                array(
                    'name' => 'type',
                    'value' => $modelApp->applicationTypes->name
                ),
                'ref_no',
                'for_construction_owned',
                'ownership_form',
                'project_location',
                array(
                    'name' => 'project_type_id',
                    'value' => $modelApp->projectTypes->name
                ),
                'project_purpose',
                array(
                    'name' => 'structure_type_id',
                    'value' => $modelApp->structureTypes->name
                ),
                'occ_classified',
                'units',
                'total_floor_area',
                'lot_area',
                'total_estimated_cost',
                'proposed_date_cons',
                'expected_date_comp',
                array(
                    'name' => 'engineer_id',
                    'value' => isset($modelApp->users->fullname) ? $modelApp->users->fullname : 'Not set'
                ),
                'signed_date',
                'prc_no',
                'ptr_no',
                'issued_at',
                'validity',
                'date_issued',
            ),
        ));
    ?>
</div>


<table class="table table-hover mt-2">
    <thead>
        <tr>
            <th>Questions</th>
            <th>Answer (Yes/No)</th>
        </tr>
    </thead>
    <tbody>
        <?php $answers = AppQuestionAnswered::model_getAnswered_byApplicationID($modelApp->id); ?>
        <?php foreach($answers as $answer): ?>
                <tr>
                    <td><?php echo $answer->question->name ?></td>
                    <td><?php echo Utilities::getSelectHTML($answer->answer) ?></td>
                </tr>
            <?php endforeach; ?>
    </tbody>
</table>