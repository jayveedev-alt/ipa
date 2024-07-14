<?php print CHtml::beginForm('', 'POST', array()); ?>
<div class="form-group row">
    <div class="col-lg-4 col-md-6">
        <?php echo CHtml::activeLabelEx($model, 'type'); ?>
        <?php print CHtml::activeDropDownList($model, 'type', CHtml::listData(Utilities::model_getAllData(ApplicationTypes::model()), 'id', 'name'), array('empty' => 'Select a type', 'class' => 'form-select', 'disabled' => true)); ?>
        <?php echo CHtml::error($model, 'type', array('class' => 'text-red')); ?>
    </div>
    <div class="col-lg-4 col-md-3">
        <?php echo CHtml::activeLabelEx($model, 'application_no'); ?>
        <?php echo CHtml::activeTextField($model, 'application_no', array('class' => 'form-control', 'disabled' => true)); ?>
        <?php echo CHtml::error($model, 'application_no', array('class' => 'text-red')); ?>
    </div>
    <div class="col-lg-4 col-md-3">
        <?php echo CHtml::activeLabelEx($model, 'area_no'); ?>
        <?php echo CHtml::activeTextField($model, 'area_no', array('class' => 'form-control', 'disabled' => true)); ?>
        <?php echo CHtml::error($model, 'area_no', array('class' => 'text-red')); ?>
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-4 col-md-4">
        <?php echo CHtml::activeLabelEx($model, 'for_construction_owned'); ?>
        <?php echo CHtml::activeTextField($model, 'for_construction_owned', array('class' => 'form-control', 'disabled' => true)); ?>
        <?php echo CHtml::error($model, 'for_construction_owned', array('class' => 'text-red')); ?>

    </div>
    <div class="col-lg-8 col-md-8">
        <?php echo CHtml::activeLabelEx($model, 'ownership_form'); ?>
        <?php echo CHtml::activeTextField($model, 'ownership_form', array('class' => 'form-control', 'disabled' => true)); ?>
        <?php echo CHtml::error($model, 'ownership_form', array('class' => 'text-red')); ?>
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-8 col-md-8">
        <?php echo CHtml::activeLabelEx($model, 'project_location'); ?>
        <?php echo CHtml::activeTextField($model, 'project_location', array('class' => 'form-control', 'disabled' => true)); ?>
        <?php echo CHtml::error($model, 'project_location', array('class' => 'text-red')); ?>
    </div>
    <div class="col-lg-4 col-md-4">
        <?php echo CHtml::activeLabelEx($model, 'project_purpose'); ?>
        <?php echo CHtml::activeTextField($model, 'project_purpose', array('class' => 'form-control', 'disabled' => true)); ?>
        <?php echo CHtml::error($model, 'project_purpose', array('class' => 'text-red')); ?>
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-4 col-md-4">
        <?php echo CHtml::activeLabelEx($model, 'project_type_id'); ?>
        <?php print CHtml::activeDropDownList($model, 'project_type_id', CHtml::listData(Utilities::model_getAllData(ProjectTypes::model()), 'id', 'name'), array('empty' => 'Select a project type', 'class' => 'form-select', 'disabled' => true)); ?>
        <?php echo CHtml::error($model, 'project_type_id', array('class' => 'text-red')); ?>
    </div>
    <div class="col-lg-8 col-md-8">
        <?php echo CHtml::activeLabelEx($model, 'structure_type_id'); ?>
        <?php print CHtml::activeDropDownList($model, 'structure_type_id', CHtml::listData(Utilities::model_getAllData(StructureTypes::model()), 'id', 'name'), array('empty' => 'Select a structure type', 'class' => 'form-select', 'disabled' => true)); ?>
        <?php echo CHtml::error($model, 'structure_type_id', array('class' => 'text-red')); ?>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 col-md-5">
        <div class="form-group">
            <?php echo CHtml::activeLabelEx($model, 'occ_classified'); ?>
            <?php echo CHtml::activeTextField($model, 'occ_classified', array('class' => 'form-control', 'disabled' => true)); ?>
            <?php echo CHtml::error($model, 'occ_classified', array('class' => 'text-red')); ?>
        </div>
        <div class="form-group">
            <?php echo CHtml::activeLabelEx($model, 'units'); ?>
            <?php echo CHtml::activeNumberField($model, 'units', array('class' => 'form-control', 'disabled' => true)); ?>
            <?php echo CHtml::error($model, 'units', array('class' => 'text-red')); ?>
        </div>
        <div class="form-group">
            <?php echo CHtml::activeLabelEx($model, 'total_floor_area'); ?>
            <?php echo CHtml::activeNumberField($model, 'total_floor_area', array('class' => 'form-control', 'disabled' => true)); ?>
            <?php echo CHtml::error($model, 'total_floor_area', array('class' => 'text-red')); ?>
        </div>
        <div class="form-group">
            <?php echo CHtml::activeLabelEx($model, 'lot_area'); ?>
            <?php echo CHtml::activeNumberField($model, 'lot_area', array('class' => 'form-control', 'disabled' => true)); ?>
            <?php echo CHtml::error($model, 'lot_area', array('class' => 'text-red')); ?>
        </div>
    </div>
    <div class="col-lg-6 col-md-5">
        <div class="form-group">
            <?php echo CHtml::activeLabelEx($model, 'total_estimated_cost'); ?>
            <?php echo CHtml::activeTextField($model, 'total_estimated_cost', array('size' => 10, 'maxlength' => 10, 'class' => 'form-control', 'disabled' => true)); ?>
            <?php echo CHtml::error($model, 'total_estimated_cost', array('class' => 'text-red')); ?>
        </div>
        <div class="form-group">
            <?php echo CHtml::activeLabelEx($model, 'proposed_date_cons'); ?>
            <?php echo CHtml::activeDateField($model, 'proposed_date_cons', array('class' => 'form-control', 'disabled' => true)); ?>
            <?php echo CHtml::error($model, 'proposed_date_cons', array('class' => 'text-red')); ?>
        </div>
        <div class="form-group">
            <?php echo CHtml::activeLabelEx($model, 'expected_date_comp'); ?>
            <?php echo CHtml::activeDateField($model, 'expected_date_comp', array('class' => 'form-control', 'disabled' => true)); ?>
            <?php echo CHtml::error($model, 'expected_date_comp', array('class' => 'text-red')); ?>
        </div>
    </div>
</div>
<div class="form-group">
    <?php echo CHtml::submitButton('Update', array('class' => 'btn btn-primary')); ?>
    <?php echo CHtml::link('<< Back', $this->createUrl('requests/view', array('id' => $_GET['id'])), array('class' => 'btn btn-default')); ?>
</div>
<?php print CHtml::endForm(); ?>



