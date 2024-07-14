<?php
    $this->breadcrumbs = array(
        'Structure Types' => array('admin'),
        $model->name,
    );

    $this->menu = array(
        array('label' => 'Create Structure Types', 'url' => array('create')),
        array('label' => 'Update Structure Types', 'url' => array('update', 'id' => $model->id)),
        array('label' => 'Delete Structure Types', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => Yii::t('zii', 'Are you sure you want to delete this item?'))),
        array('label' => 'Manage Structure Types', 'url' => array('admin')),
    );
?>

<div class="box">
    <div class="box-header">
        <h1 class="box-title">View Structure Types #<?php echo $model->id; ?></h1>
    </div>
    <div class="box-body">
        <div class="detail-view">
            <?php
                $this->widget('zii.widgets.CDetailView', array(
                    'data' => $model,
                    'attributes' => array(
                        'id',
                        'created_at',
                        'updated_at',
                        'name',
                        'is_with_free_text',
                    ),
                ));
            ?> 
        </div>
    </div>
</div>

