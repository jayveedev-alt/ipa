<div class="box">
    <div class="box-header">
        <h1 class="box-title">View Employee #<?php echo $model->id; ?></h1>
    </div>
    <div class="box-body">
        <?php
            $this->widget('zii.widgets.CDetailView', array(
                'data' => $model,
                'attributes' => array(
                    'created_at',
                    'updated_at',
                    'firstname',
                    'middlename',
                    'lastname',
                    'phone',
                    'email',
                    array(
                        'name' => 'position_id',
                        'value' => $model->positions->name
                    ),
                    'address',
                    'city',
                    'province',
                    'region',
                    'zip_code',
                ),
            ));
        ?>
        <hr />
        <?php print CHtml::link('<< Back', $this->createUrl('users/admin'), array('class' => 'btn btn-default')); ?>
    </div>
</div>
