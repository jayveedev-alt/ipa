<?php $this->widget('Flashes'); ?>

<div class="box">
    <div class="box-header">
        <h1 class="box-title">Request Building Permit - test</h1>
    </div>
    <div class="box-body">
        <?php echo $this->renderPartial('_form', array('model' => $model)); ?>
    </div>
</div>

<div class="box">
    <div class="box-body">
        <?php
            $this->widget('zii.widgets.grid.CGridView', array(
                'id' => 'requests-grid',
                'dataProvider' => $modelList->search(),
                'filter' => $modelList,
                'columns' => array(
                    array(
                        'header' => 'Date',
                        'name' => 'created_at',
                        'value' => 'Utilities::setDateStandard($data->created_at)',
                        'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'model' => $modelList,
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
                    'remarks',
                    array(
                        'name' => 'is_submitted',
                        'value' => 'Utilities::get_SelectHTML($data->is_submitted)',
                        'type' => 'raw'
                    ),
                    array(
                        'name' => 'is_approved',
                        'value' => 'Statuses::model_getStatus_byID($data->is_approved)',
                        'type' => 'raw'
                    ),
                    array(
                        'class' => 'CButtonColumn',
                        'header' => 'Action',
                        'template' => '{logs}{view}{delete}', // buttons here...
                        'viewButtonLabel' => '<span class="fas fa-search fa-fw"></span>', // custom icon
                        'viewButtonOptions' => ['title' => 'View', 'data-tooltip' => 'View'],
                        'viewButtonImageUrl' => false, // disable default image
                        'buttons' => array(
                            'applicationForm' => array(
                                'label' => '<span class="fas fa-folder-open fa-fw"></span>',
                                'url' => 'Yii::app()->createUrl("client/applications/admin", array("requestId"=>$data->id))',
                                'options' => array('title' => 'Application Form'),
                            ),
                            'logs' => array(
                                'label' => '<span class="fas fa-file fa-fw"></span>',
                                'url' => 'Yii::app()->createUrl("client/requests/logs", array("requestId"=>$data->id))',
                                'options' => array('title' => 'Request logs'),
                            ),
                        ),
                        'updateButtonLabel' => '<span class="fas fa-edit fa-fw"></span>', // custom icon
                        'updateButtonOptions' => ['title' => '', 'data-tooltip' => 'Update'],
                        'updateButtonImageUrl' => false, // disable default image
                        'deleteButtonLabel' => '<span class="fas fa-trash fa-fw"></span>',
                        'deleteButtonOptions' => ['title' => 'Delete', 'data-tooltip' => 'Delete'],
                        'deleteButtonImageUrl' => false,
                        'deleteConfirmation' => 'Are you sure you want to delete?', // confirmation message for delete
                        'htmlOptions' => array(
                            'style' => 'width: 100px;',
                        ),
                    ),
                ),
            ));
        ?>
    </div>
</div>


