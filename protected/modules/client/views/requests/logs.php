<?php $this->widget('Flashes'); ?>

<div class="box">
    <div class="box-header">
        <h1 class="box-title">Application logs</h1>
    </div>
    <div class="box-body">
        <?php
            $this->widget('zii.widgets.grid.CGridView', array(
                'id' => 'documents-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
                    array(
                        'name' => 'created_at',
                        'value' => 'Utilities::setDateStandard($data->created_at)',
                        'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'model' => $model,
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
                        'name' => 'updated_at',
                        'value' => 'Utilities::setDateStandard($data->updated_at)',
                        'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'model' => $model,
                            'attribute' => 'updated_at', // This is how it works for me.
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
                        'header' => 'Reference Number',
                        'name' => 'request_id',
                        'value' => '$data->requests->applications->ref_no',
                        'filter' => false
                    ),
                    array(
                        'header' => 'Approved by',
                        'name' => 'updated_by',
                        'value' => '$data->updatedBy->fullname()',
                        'filter' => false
                    ),
                    array(
                        'name' => 'remarks',
                        'value' => '$data->remarks',
                        'filter' => false
                    ),
                    array(
                        'name' => 'status_id',
                        'value' => '$data->statuses->name',
                        'filter' => false
                    ),
                ),
            ));
        ?>
    </div>
</div>
</div>

