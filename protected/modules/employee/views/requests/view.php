<div class="box">
    <div class="box-header">
        <h1 class="box-title">View Client Request #<?php echo $model->id; ?></h1>
    </div>
    <div class="box-body">
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
                            $stat = [];
                            if($model->is_approved == 7) {
                                $stat = array(7 => 'Approved');
                            } elseif($model->is_approved == 8) {
                                $stat = array(8 => 'Rejected');
                            } else {
                                $stat = array(2 => 'Pending', $model->is_approved + 1 => 'Approved', 8 => 'Rejected');
                            }
                        ?>
                        <input type="hidden" name="id" value="<?php echo $model->id ?>" />
                        <select name="status_id" class="form-select" onchange="isRejected(this.value);" >
                            <?php foreach($stat as $key => $stat): ?>
                                    <option value="<?php echo $key ?>">
                                        <?php echo $stat ?>
                                    </option>
                                <?php endforeach; ?>
                        </select>
                        <textarea id="updated_remarks" name="updated_remarks" class="form-control mt-2" ><?php echo $model->updated_remarks ?></textarea>
                        <?php echo CHtml::submitButton('Submit', array('class' => 'btn btn-primary btn-sm mt-2')); ?>                           
                        <?php print CHtml::endForm(); ?>
                    </td>
                </tr>
            </tbody>
        </table>
        <?php
//            $this->widget('zii.widgets.CDetailView', array(
//                'data' => $model,
//                'attributes' => array(
//                    array(
//                        'name' => 'created_at',
//                        'value' => Utilities::setDateStandard($model->created_at)
//                    ),
//                    array(
//                        'name' => 'updated_at',
//                        'value' => Utilities::setDateStandard($model->updated_at)
//                    ),
//                    array(
//                        'name' => 'applicant_id',
//                        'value' => $model->get_clientName(),
//                    ),
//                    'remarks',
//                    array(
//                        'name' => 'is_approved',
//                        'type' => 'raw',
//                        //'value' => Statuses::model_getStatus_byID($model->is_approved),
//                        'value' => CHtml::dropDownList(
//                            'is_approved', $model->is_approved, array(
//                            2 => 'Pending',
//                            $model->is_approved != 8 ? $model->is_approved + 1 : 7 => 'Approved',
//                            8 => 'Rejected',
//                            ), array(
//                            'class' => 'form-select',
//                            'onchange' => "$.ajax({
//                                type:'POST',
//                                url:'" . $this->createUrl('requests/updateStatus') . "',
//                                data:{ id: " . $model->id . ", status: $(this).val() },
//                                success:function(data){
//                                    location.reload();
//                                }
//                            })",
//                            )
//                        ),
//                    ),
//                ),
//            ));
        ?>
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
                    array(
                        'name' => 'type',
                        'value' => '$data->applicationTypes->name',
                        'filter' => FALSE
                    ),
                    'application_no',
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
                        'template' => '{open}',
                        'buttons' => array(
                            'open' => array(
                                'label' => '<span class="fas fa-search fa-fw"></span>',
                                'url' => 'Yii::app()->createUrl("employee/applications/view", array("id"=>$data->id))',
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
        <h1 class="box-title">Client Request</h1>
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
                                'url' => 'Yii::app()->createUrl("employee/requests/open", array("id"=>$data->id))',
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
    input.style.display = '<?php echo $model->is_approved == 8 ? 'block' : 'none' ?>';
    function isRejected(statusId) {

        var input = document.getElementById('updated_remarks');
        if (statusId == 8) {
            input.style.display = 'block';
        } else {
            input.style.display = 'none';
        }
    }
</script>

