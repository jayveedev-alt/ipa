<?php

    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'requests-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
            array(
                'name' => 'created_at',
                'value' => 'Utilities::setDateStandard($data->created_at)',
                'filter' => false
            ),
            array(
                'header' => 'Reference Number',
                'name' => 'id',
                'value' => '$data->applications->ref_no',
                'filter' => false
            ),
            array(
                'name' => 'is_submitted',
                'value' => 'Utilities::get_SelectHTML($data->is_submitted)',
                'type' => 'raw',
                'filter' => false
            ),
            array(
                'name' => 'is_approved',
                'value' => 'Statuses::model_getStatus_byID($data->is_approved)',
                'type' => 'raw',
                'filter' => false
            ),
            array(
                'name' => 'updated_remarks',
                'value' => '$data->updated_remarks',
                'filter' => false
            ),
            array(
                'class' => 'CButtonColumn',
                'header' => 'Action',
                'template' => '{viewRequest}', // buttons here...
                'viewButtonLabel' => '<span class="fas fa-search fa-fw"></span>', // custom icon
                'viewButtonOptions' => ['title' => 'View', 'data-tooltip' => 'View'],
                'viewButtonImageUrl' => false, // disable default image
                'buttons' => array(
                    'viewRequest' => array(
                        'label' => '<span class="fas fa-folder-open fa-fw"></span>',
                        'url' => 'Yii::app()->createUrl("client/requests/view", array("id"=>$data->id))',
                        'options' => array('title' => 'View'),
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