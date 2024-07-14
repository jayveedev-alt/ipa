<?php $this->widget('Flashes'); ?>

<div class="box">
    <div class="box-header">
        <h1 class="box-title">Request #<?php echo $model->id; ?></h1>
    </div>
    <div class="box-body">
        <div class="detail-view">
            <?php
                $this->widget('zii.widgets.CDetailView', array(
                    'data' => $model,
                    'attributes' => array(
                        array(
                            'name' => 'created_at',
                            'value' => Utilities::setDateStandard($model->created_at)
                        ),
                        array(
                            'name' => 'updated_at',
                            'value' => Utilities::setDateStandard($model->updated_at)
                        ),
                        'remarks',
                        array(
                            'name' => 'is_submitted',
                            'value' => Utilities::get_SelectHTML($model->is_submitted),
                            'type' => 'raw'
                        ),
                        array(
                            'name' => 'is_approved',
                            'value' => Statuses::model_getStatus_byID($model->is_approved),
                            'type' => 'raw'
                        ),
                        array(
                            'name' => 'updated_by',
                            'value' => isset($model->updatedBy) ? $model->updatedBy->fullname() : ''
                        ),
                        'updated_remarks',
                    ),
                ));
            ?> 
            <hr />
            <?php echo $this->renderPartial('_application', array('modelApp' => $modelApp)); ?>
        </div>
    </div>
</div>

<?php if(!$model->is_submitted): ?>
        <div class="box">
            <div class="box-body">
                <?php echo $this->renderPartial('_upload', array('modelReq' => $modelReq)); ?>
            </div>
        </div>
    <?php endif; ?>

<div class="box">
    <div class="box-body">
        <?php echo $this->renderPartial('_documents', array('modelDocs' => $modelDocs)); ?>
    </div>
</div>

<div class="box">
    <div class="box-body">
        <?php print CHtml::beginForm('', 'POST'); ?>
        <?php print CHtml::link('<< Back', $this->createUrl('applications/new'), array('class' => 'btn btn-default')); ?>
        <?php
            if(!$model->is_submitted) {
                print CHtml::submitButton('Submit', array('class' => 'btn btn-primary', 'name' => 'submit'));
            }
        ?>
        <?php print CHtml::endForm(); ?>
    </div>
</div>