<?php

    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'documents-grid',
        'dataProvider' => $modelDocs->search(),
        'filter' => $modelDocs,
        'columns' => array(
            array(
                'header' => 'Date',
                'name' => 'created_at',
                'value' => 'Utilities::setDateStandard($data->created_at)',
                'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model' => $modelDocs,
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
            'filename',
            array(
                'class' => 'CButtonColumn',
                'header' => 'Action',
                'template' => '{open}{remove}',
                'buttons' => array(
                    'open' => array(
                        'label' => '<span class="fas fa-file fa-fw"></span>',
                        'url' => 'Yii::app()->createUrl("client/requests/open", array("id"=>$data->id))',
                        'options' => array(
                            'target' => '_blank',
                            'title' => ''
                        )
                    ),
                    'remove' => array(
                        'label' => '<span class="fas fa-trash fa-fw"></span>',
                        'url' => 'Yii::app()->createUrl("client/requests/remove", array("id"=>$data->id, "request_id" => $_GET["id"]))',
                        'click' => 'function(){return confirm("Are you sure you want to delete?");}',
                        'options' => array(
                            'title' => ''
                        )
                    ),
                ),
            ),
        ),
    ));
?>