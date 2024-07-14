<div class="box">   
    <div class="box-header">
        <h1 class="box-title">Manage Employee</h1>
        <?php print CHtml::link('<i class="fa fa-user-plus"></i>', $this->createUrl('users/create'), array('class' => 'text-black')); ?>
    </div>

    <div class="box-body">
        <?php
            $this->widget('zii.widgets.grid.CGridView', array(
                'id' => 'users-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
                    array(
                        'name' => 'id',
                        'value' => '$data->id',
                        'filter' => false
                    ),
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
                    'firstname',
                    'middlename',
                    'lastname',
                    array(
                        'name' => 'phone',
                        'value' => '$data->phone',
                    ),
                    array(
                        'name' => 'email',
                        'value' => '$data->email',
                    ),
//                    array(
//                        'name' => 'position_id',
//                        'value' => '$data->positions->name',
//                    ),
                    /*
                      'phone',
                      'email',
                      'address',
                      'city',
                      'province',
                      'region',
                      'zip_code',
                      'position_id',
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
