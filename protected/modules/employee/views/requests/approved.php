<div class="box">
    <div class="box-header">
        <h1 class="box-title">Client Request Approved</h1>
    </div>
    <div class="box-body">
        <?php
            $this->widget('zii.widgets.grid.CGridView', array(
                'id' => 'requests-grid',
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
                        'name' => 'applicant_id',
                        'value' => '$data->get_clientName()',
                        'filter' => FALSE
                    ),
                    array(
                        'name' => 'remarks',
                        'value' => '$data->remarks',
                        'filter' => FALSE
                    ),
                    array(
                        'name' => 'is_approved',
                        'value' => '$data->statuses->name',
                        'filter' => FALSE
                    ),
                    /*
                      'is_submitted',
                      'is_approved',
                     */
                    array(
                        'class' => 'CButtonColumn',
                        'header' => 'Action',
                        'template' => '{edit}',
                        'buttons' => array(
                            'edit' => array(
                                'label' => '<span class="fas fa-edit fa-fw"></span>',
                                'url' => 'Yii::app()->createUrl("employee/applications/update", array("id"=>$data->id))',
                                'options' => array(
                                    'title' => '',
                                )
                            ),
                        ),
                        'htmlOptions' => array(
                            'style' => 'width: 100px;',
                        ),
                    ),
                ),
            ));
        ?>
    </div>
</div>
