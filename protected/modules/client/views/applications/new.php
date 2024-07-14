<?php print CHtml::beginForm('', 'POST', array()); ?>
<div class="box">
    <div class="box-header">
        <h1 class="box-title">Building Permit Application</h1>
    </div>
</div>
<?php $this->widget('Flashes'); ?>
<div class="box">
    <div class="box-header">
        <h1 class="box-title">Ownership</h1>
    </div>
    <div class="box-body">
        <div class="form-group">
            <?php print CHtml::activeCheckBox($model, 'is_registered', array('class' => 'form-check-inline')) ?>
            <?php echo CHtml::activeLabelEx($model, 'is_registered'); ?>
        </div>
        <div class="form-group row">
            <div class="col-lg-4 col-md-4">
                <?php echo CHtml::activeLabelEx($model, 'for_construction_owned'); ?>
                <?php echo CHtml::activeTextField($model, 'for_construction_owned', array('class' => 'form-control')); ?>
                <?php echo CHtml::error($model, 'for_construction_owned', array('class' => 'text-red')); ?>

            </div>
            <div class="col-lg-8 col-md-8">
                <?php echo CHtml::activeLabelEx($model, 'ownership_form'); ?>
                <?php echo CHtml::activeTextField($model, 'ownership_form', array('class' => 'form-control')); ?>
                <?php echo CHtml::error($model, 'ownership_form', array('class' => 'text-red')); ?>
            </div>
        </div>
        <hr />
        <h5 class="mt-3">PROJECT LOCATION</h5>
        <div class="form-group row">
            <div class="col-lg-3 col-md-3">
                <?php echo CHtml::activeLabelEx($model, 'proj_lot'); ?>
                <?php echo CHtml::activeTextField($model, 'proj_lot', array('class' => 'form-control')); ?>
                <?php echo CHtml::error($model, 'proj_lot', array('class' => 'text-red')); ?>
            </div>
            <div class="col-lg-3 col-md-3">
                <?php echo CHtml::activeLabelEx($model, 'proj_blk'); ?>
                <?php echo CHtml::activeTextField($model, 'proj_blk', array('class' => 'form-control')); ?>
                <?php echo CHtml::error($model, 'proj_blk', array('class' => 'text-red')); ?>
            </div>
            <div class="col-lg-3 col-md-3">
                <?php echo CHtml::activeLabelEx($model, 'proj_tct'); ?>
                <?php echo CHtml::activeTextField($model, 'proj_tct', array('class' => 'form-control')); ?>
                <?php echo CHtml::error($model, 'proj_tct', array('class' => 'text-red')); ?>
            </div>
            <div class="col-lg-3 col-md-3">
                <?php echo CHtml::activeLabelEx($model, 'proj_tax_dec'); ?>
                <?php echo CHtml::activeTextField($model, 'proj_tax_dec', array('class' => 'form-control')); ?>
                <?php echo CHtml::error($model, 'proj_tax_dec', array('class' => 'text-red')); ?>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-3 col-md-3">
                <?php echo CHtml::activeLabelEx($model, 'proj_st'); ?>
                <?php echo CHtml::activeTextField($model, 'proj_st', array('class' => 'form-control')); ?>
                <?php echo CHtml::error($model, 'proj_st', array('class' => 'text-red')); ?>
            </div>
            <div class="col-lg-3 col-md-3">
                <?php echo CHtml::activeLabelEx($model, 'proj_brgy'); ?>
                <?php echo CHtml::activeTextField($model, 'proj_brgy', array('class' => 'form-control')); ?>
                <?php echo CHtml::error($model, 'proj_brgy', array('class' => 'text-red')); ?>
            </div>
            <div class="col-lg-3 col-md-3">
                <?php echo CHtml::activeLabelEx($model, 'proj_dist'); ?>
                <?php echo CHtml::activeTextField($model, 'proj_dist', array('class' => 'form-control')); ?>
                <?php echo CHtml::error($model, 'proj_dist', array('class' => 'text-red')); ?>
            </div>
            <div class="col-lg-3 col-md-3">
                <?php echo CHtml::activeLabelEx($model, 'proj_city'); ?>
                <?php echo CHtml::activeTextField($model, 'proj_city', array('class' => 'form-control')); ?>
                <?php echo CHtml::error($model, 'proj_city', array('class' => 'text-red')); ?>
            </div>
        </div>
        <hr />
        <div class="form-group">
            <?php echo CHtml::activeLabelEx($model, 'project_purpose'); ?>
            <?php echo CHtml::activeTextField($model, 'project_purpose', array('class' => 'form-control')); ?>
            <?php echo CHtml::error($model, 'project_purpose', array('class' => 'text-red')); ?>
        </div>
    </div>
</div>
<div class="box">
    <div class="box-header">
        <h1 class="box-title">Additional Information</h1>
    </div>
    <div class="box-body">
        <div class="form-group row">
            <div class="col-lg-3 col-md-3 col-sm-6">
                <?php echo CHtml::activeLabelEx($model, 'type'); ?>
                <?php print CHtml::activeDropDownList($model, 'type', CHtml::listData(Utilities::model_getAllData(ApplicationTypes::model()), 'id', 'name'), array('empty' => 'Select a type', 'class' => 'form-select')); ?>
                <?php echo CHtml::error($model, 'type', array('class' => 'text-red')); ?>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <?php echo CHtml::activeLabelEx($model, 'ref_no'); ?>
                <?php echo CHtml::activeTextField($model, 'ref_no', array('class' => 'form-control', 'value' => Utilities::generateRandomNumber(10), 'readonly' => true)); ?>
                <?php echo CHtml::error($model, 'ref_no', array('class' => 'text-red')); ?>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <?php echo CHtml::activeLabelEx($model, 'occ_classified'); ?>
                <?php echo CHtml::activeTextField($model, 'occ_classified', array('class' => 'form-control')); ?>
                <?php echo CHtml::error($model, 'occ_classified', array('class' => 'text-red')); ?>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <?php echo CHtml::activeLabelEx($model, 'units'); ?>
                <?php echo CHtml::activeNumberField($model, 'units', array('class' => 'form-control')); ?>
                <?php echo CHtml::error($model, 'units', array('class' => 'text-red')); ?>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-4 col-md-4">
                <?php echo CHtml::activeLabelEx($model, 'project_type_id'); ?>
                <?php print CHtml::activeDropDownList($model, 'project_type_id', CHtml::listData(Utilities::model_getAllData(ProjectTypes::model()), 'id', 'name'), array('empty' => 'Select a project type', 'class' => 'form-select')); ?>
                <?php echo CHtml::error($model, 'project_type_id', array('class' => 'text-red')); ?>
            </div>
            <div class="col-lg-8 col-md-8">
                <?php echo CHtml::activeLabelEx($model, 'structure_type_id'); ?>
                <?php print CHtml::activeDropDownList($model, 'structure_type_id', CHtml::listData(Utilities::model_getAllData(StructureTypes::model()), 'id', 'name'), array('empty' => 'Select a structure type', 'class' => 'form-select')); ?>
                <?php echo CHtml::error($model, 'structure_type_id', array('class' => 'text-red')); ?>
            </div>
        </div>
        <div class="form-group row">
            <?php foreach($questions as $question): ?>
                    <div class="col-lg-12">
                        <label for="<?php echo 'question_' . $question->id ?>" >
                            <input type="checkbox" name="<?php echo 'question_' . $question->id ?>" class="form-check-inline" value="1" /><?php echo $question->name ?>
                        </label>

                    </div>
                <?php endforeach; ?>
        </div>
        <div class="form-group mt-5">
            <?php echo CHtml::submitButton('Request', array('class' => 'btn btn-primary')); ?>
        </div>
    </div>
</div>

<?php print CHtml::endForm(); ?>

<div class="box">
    <div class="box-header">
        <h1 class="box-title">List of Application Request</h1>
    </div>
    <div class="box-body">
        <?php echo $this->renderPartial('_requests', array('model' => $modelRequests)); ?>
    </div>
</div>

