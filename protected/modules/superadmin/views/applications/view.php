<div class="box">
    <div class="box-header">
        <h1 class="box-title">View Application #<?php echo $model->id; ?></h1>
    </div>
    <div class="box-body">
        <?php
            $this->widget('zii.widgets.CDetailView', array(
                'data' => $model,
                'attributes' => array(
                    array(
                        'name' => 'is_registered',
                        'value' => Utilities::get_SelectHTML($model->is_registered),
                        'type' => 'raw'
                    ),
                    array(
                        'name' => 'created_at',
                        'value' => Utilities::setDateStandard($model->created_at)
                    ),
                    array(
                        'name' => 'type',
                        'value' => $model->applicationTypes->name
                    ),
                    'application_no',
                    'area_no',
                    'for_construction_owned',
                    'ownership_form',
                    'project_location',
                    array(
                        'name' => 'project_type_id',
                        'value' => $model->projectTypes->name
                    ),
                    'project_purpose',
                    array(
                        'name' => 'structure_type_id',
                        'value' => $model->structureTypes->name
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
                        'value' => isset($model->users) ? $model->users->firstname . ' ' . $model->users->lastname : 'Not set'
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

        <table class="table table-hover mt-2">
            <thead>
                <tr>
                    <th>Questions</th>
                    <th>Answer (Yes/No)</th>
                </tr>
            </thead>
            <tbody>
                <?php $answers = AppQuestionAnswered::model_getAnswered_byApplicationID($model->id); ?>
                <?php foreach($answers as $answer): ?>
                        <tr>
                            <td><?php echo $answer->question->name ?></td>
                            <td><?php echo Utilities::getSelectHTML($answer->answer) ?></td>
                        </tr>
                    <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
