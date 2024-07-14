<?php
    $this->breadcrumbs = array(
        'Applications' => array('index'),
        'Manage',
    );

    $this->menu = array(
        array('label' => 'List Applications', 'url' => array('index')),
        array('label' => 'Create Applications', 'url' => array('create')),
    );
?>


<div class="box">
    <div class="box-header">
        <h1 class="box-title">Manage Structure Types</h1>
    </div>
    <div class="box-body">
        <?php
            $this->widget('zii.widgets.grid.CGridView', array(
                'id' => 'applications-grid',
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
                    //'updated_at',
                    'application_no',
                    'area_no',
       
                    /*
                      'tin',
                      'ownership_form',
                      'project_location',
                      'project_type_id',
                      'project_purpose',
                      'structure_type_id',
                      'total_floor_area',
                      'lot_area',
                      'engineer_id',
                      'engineer_license',
                      'prc_no',
                      'ptr_no',
                      'date_issued',
                      'payment_reference',
                      'status_id',
                     */
                    array(
                        'class' => 'CButtonColumn',
                        'header' => 'Action',
                        'template' => '{view}{update}{delete}', // buttons here...
                        'viewButtonLabel' => '<span class="fas fa-search fa-fw"></span>', // custom icon
                        'viewButtonOptions' => ['title' => '', 'data-tooltip' => 'View'],
                        'viewButtonImageUrl' => false, // disable default image
                        'updateButtonLabel' => '<span class="fas fa-edit fa-fw"></span>', // custom icon
                        'updateButtonOptions' => ['title' => '', 'data-tooltip' => 'Update'],
                        'updateButtonImageUrl' => false, // disable default image
                        'deleteButtonLabel' => '<span class="fas fa-trash fa-fw"></span>',
                        'deleteButtonOptions' => ['title' => '', 'data-tooltip' => 'Delete'],
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
