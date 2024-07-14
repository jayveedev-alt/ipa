<div class="box">
    <div class="box-header">
        <h1 class="box-title">Client Transaction Logs</h1>
    </div>
    <div class="box-body">
        <?php
            $this->widget('zii.widgets.grid.CGridView', array(
                'id' => 'users-log-grid',
                'dataProvider' => $modelAudit->search(),
                'filter' => $modelAudit,
                'columns' => array(
                    array(
                        'name' => 'created_at',
                        'value' => '$data->created_at',
                    ),
                    array(
                        'name' => 'user_id',
                        'value' => '$data->user->fullname()',
                    ),
                    'action',
                ),
            ));
        ?>
    </div>
</div>

<div class="box">
    <div class="box-header">
        <h1 class="box-title">Admin Logs</h1>
    </div>
    <div class="box-body">
        <?php
            $this->widget('zii.widgets.grid.CGridView', array(
                'id' => 'users-log-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
                    array(
                        'name' => 'created_at',
                        'value' => '$data->created_at',
                    ),
                    array(
                        'name' => 'role_id',
                        'value' => '$data->role->name',
                    ),
                    'agent',
                    'ip_address',
                ),
            ));
        ?>
    </div>
</div>
