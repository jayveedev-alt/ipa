<div class="box">
    <div class="box-header">
        <h1 class="box-title">View Client Request #<?php echo $model->id; ?></h1>
    </div>
    <div class="box-body">
        <?php $this->widget('Flashes'); ?>
        <table class="table table-hover">
            <tbody>
                <tr>
                    <td width="180" class="text-right"><?php echo CHtml::encode($model->getAttributeLabel('created_at')); ?></td>
                    <td><?php echo CHtml::encode(Utilities::setDateStandard($model->created_at)); ?></td>
                </tr>
                <tr>
                    <td width="180" class="text-right"><?php echo CHtml::encode($model->getAttributeLabel('updated_at')); ?></td>
                    <td><?php echo CHtml::encode(Utilities::setDateStandard($model->updated_at)); ?></td>
                </tr>
                <tr>
                    <td width="180" class="text-right"><?php echo CHtml::encode($model->getAttributeLabel('applicant_id')); ?></td>
                    <td><?php echo CHtml::encode($model->get_clientName()); ?></td>
                </tr>
                <tr>
                    <td width="180" class="text-right"><?php echo CHtml::encode($model->getAttributeLabel('remarks')); ?></td>
                    <td><?php echo CHtml::encode($model->remarks); ?></td>
                </tr>
                <tr>
                    <td width="180" class="text-right pt-3">
                        <?php echo CHtml::encode($model->getAttributeLabel('is_approved')); ?>
                    </td>
                    <td>
                        <?php print CHtml::beginForm($this->createUrl('requests/updateStatus'), 'POST', array()); ?>
                        <?php
                            $isDisabled = true;
                            $validStatusId = array(2, 3, 4);
                            $params = array(
                                'condition' => 'position_id = :positionId',
                                'params' => array(':positionId' => Utilities::NO),
                            );
                            $stat = Utilities::model_getAllDataByParams(PositionsStatus::model(), $params);
                            if(in_array($model->is_approved, $validStatusId)) {
                                $isDisabled = false;
                            }
                        ?>
                        <input type="hidden" name="id" value="<?php echo $model->id ?>" />
                        <select name="status_id" class="form-select" onchange="isRejected(this.value);" <?php echo $isDisabled ? 'disabled="disabled"' : '' ?>>
                            <?php
                                if($isDisabled) {
                                    echo '<option vslue="3">Approved</option>';
                                }
                            ?>
                            <?php foreach($stat as $stat): ?>
                                    <option value="<?php echo $stat->status_id ?>"  <?php echo $model->is_approved == $stat->status_id ? 'selected="selected"' : '' ?>>
                                        <?php echo $stat->get_Status() ?>
                                    </option>
                                <?php endforeach; ?>
                        </select>
                        <textarea id="updated_remarks" name="updated_remarks" class="form-control mt-2" <?php echo $isDisabled ? 'disabled="disabled"' : '' ?>><?php echo $model->updated_remarks ?></textarea>
                        <?php echo CHtml::submitButton('Submit', array('class' => 'btn btn-primary btn-sm mt-2', 'disabled' => $isDisabled)); ?>        
                         <?php print CHtml::link('<< Back', $this->createUrl('requests/admin'), array('class' => 'btn btn-default')); ?>
                        <?php print CHtml::endForm(); ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="box">
    <div class="box-header">
        <h1 class="box-title">Client Application</h1>
    </div>
    <div class="box-body">
        <?php
            $this->widget('zii.widgets.grid.CGridView', array(
                'id' => 'applications-grid',
                'dataProvider' => $app->search(),
                'filter' => $app,
                'columns' => array(
                    array(
                        'name' => 'created_at',
                        'value' => 'Utilities::setDateStandard($data->created_at)',
                        'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'model' => $app,
                            'attribute' => 'created_at', // This is how it works for me.
                            'htmlOptions' => array(
                                'class' => 'datePicker',
                                'autocomplete' => 'off',
                            ),
                            'options' => array(// (#3)
                                'showOn' => 'focus',
                                'dateFormat' => 'yy-mm-dd',
                                'showOtherMonths' => true,
                                'selectOtherMonths' => true,
                                'changeMonth' => true,
                                'changeYear' => true,
                                'showButtonPanel' => true,
                            ),
                            ), true),
                        'headerHtmlOptions' => array(
                            'style' => 'width: 15%;',
                        ),
                    ),
                    'ref_no',
                    array(
                        'name' => 'type',
                        'value' => '$data->applicationTypes->name',
                        'filter' => FALSE
                    ),
                    array(
                        'name' => 'project_type_id',
                        'value' => '$data->projectTypes->name',
                        'filter' => FALSE
                    ),
                    array(
                        'name' => 'project_location',
                        'value' => '$data->project_location',
                    ),
                    array(
                        'name' => 'structure_type_id',
                        'value' => '$data->structureTypes->name',
                        'filter' => FALSE
                    ),
                    array(
                        'class' => 'CButtonColumn',
                        'header' => 'Action',
                        'template' => '{open}{edit}',
                        'buttons' => array(
                            'open' => array(
                                'label' => '<span class="fas fa-search fa-fw"></span>',
                                'url' => 'Yii::app()->createUrl("administrator/applications/view", array("id"=>$data->id))',
                                'options' => array(
                                    'title' => '',
                                )
                            ),
                            'edit' => array(
                                'label' => '<span class="fas fa-edit fa-fw"></span>',
                                'url' => 'Yii::app()->createUrl("administrator/applications/update", array("id"=>$data->id))',
                                'options' => array(
                                    'title' => '',
                                )
                            ),
                        ),
                    ),
                ),
            ));
        ?>
    </div>
</div>

<div class="box">
    <div class="box-header">
        <h1 class="box-title">Client Documents</h1>
    </div>
    <div class="box-body">
        <?php
            $this->widget('zii.widgets.grid.CGridView', array(
                'id' => 'documents-grid',
                'dataProvider' => $docs->search(),
                'filter' => $docs,
                'columns' => array(
                    array(
                        'header' => 'Date',
                        'name' => 'created_at',
                        'value' => 'Utilities::setDateStandard($data->created_at)',
                        'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'model' => $docs,
                            'attribute' => 'created_at', // This is how it works for me.
                            'htmlOptions' => array(
                                'class' => 'datePicker',
                                'autocomplete' => 'off',
                            ),
                            'options' => array(// (#3)
                                'showOn' => 'focus',
                                'dateFormat' => 'yy-mm-dd',
                                'showOtherMonths' => true,
                                'selectOtherMonths' => true,
                                'changeMonth' => true,
                                'changeYear' => true,
                                'showButtonPanel' => true,
                            ),
                            ), true),
                        'headerHtmlOptions' => array(
                            'style' => 'width: 15%;',
                        ),
                    ),
                    array(
                        'name' => 'filename',
                        'value' => '$data->filename',
                    ),
                    array(
                        'class' => 'CButtonColumn',
                        'header' => 'Action',
                        'template' => '{open}',
                        'buttons' => array(
                            'open' => array(
                                'label' => '<span class="fas fa-file fa-fw"></span>',
                                'url' => 'Yii::app()->createUrl("administrator/requests/open", array("request_id"=>$data->request_id, "id"=>$data->id))',
                                'options' => array(
                                    'target' => '_blank',
                                    'title' => '',
                                )
                            ),
                        ),
                    ),
                ),
            ));
        ?>
    </div>
</div>

<script>
    var input = document.getElementById('updated_remarks');
    input.style.display = '<?php echo $model->is_approved == 4 ? 'block' : 'none' ?>';
    function isRejected(statusId) {

        var input = document.getElementById('updated_remarks');
        if (statusId == 4) {
            input.style.display = 'block';
        } else {
            input.style.display = 'none';
        }
    }
</script>

