<?php print CHtml::beginForm('', 'POST', array()); ?>
<div class="form-group row">
    <div class="col-lg-12">
        <?php print CHtml::activeCheckBox($model, 'is_registered', array('class' => 'form-check-inline')) ?>
        <?php echo CHtml::activeLabelEx($model, 'is_registered'); ?>
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-4 col-md-6">
        <?php echo CHtml::activeLabelEx($model, 'type'); ?>
        <?php print CHtml::activeDropDownList($model, 'type', CHtml::listData(Utilities::model_getAllData(ApplicationTypes::model()), 'id', 'name'), array('empty' => 'Select a type', 'class' => 'form-select')); ?>
        <?php echo CHtml::error($model, 'type', array('class' => 'text-red')); ?>
    </div>
    <div class="col-lg-4 col-md-3">
        <?php echo CHtml::activeLabelEx($model, 'application_no'); ?>
        <?php echo CHtml::activeTextField($model, 'application_no', array('class' => 'form-control', 'value' => Utilities::generateRandomNumber(10), 'readonly' => true)); ?>
        <?php echo CHtml::error($model, 'application_no', array('class' => 'text-red')); ?>
    </div>
    <div class="col-lg-4 col-md-3">
        <?php echo CHtml::activeLabelEx($model, 'area_no'); ?>
        <?php echo CHtml::activeTextField($model, 'area_no', array('class' => 'form-control', 'value' => Utilities::generateRandomNumber(10), 'readonly' => true)); ?>
        <?php echo CHtml::error($model, 'area_no', array('class' => 'text-red')); ?>
    </div>
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
<div class="form-group row">
    <div class="col-lg-8 col-md-8">
        <?php echo CHtml::activeLabelEx($model, 'project_location'); ?>
        <?php echo CHtml::activeTextField($model, 'project_location', array('class' => 'form-control', 'placeholder' => 'Lot no. / Blk no. / Tct no. / Tax dec. no. / Street, Barangay, District, City')); ?>
        <?php echo CHtml::error($model, 'project_location', array('class' => 'text-red')); ?>
    </div>
    <div class="col-lg-4 col-md-4">
        <?php echo CHtml::activeLabelEx($model, 'project_purpose'); ?>
        <?php echo CHtml::activeTextField($model, 'project_purpose', array('class' => 'form-control')); ?>
        <?php echo CHtml::error($model, 'project_purpose', array('class' => 'text-red')); ?>
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
    <div class="col-lg-3 col-md-3 col-sm-6">
        <?php echo CHtml::activeLabelEx($model, 'total_floor_area'); ?>
        <?php echo CHtml::activeNumberField($model, 'total_floor_area', array('class' => 'form-control')); ?>
        <?php echo CHtml::error($model, 'total_floor_area', array('class' => 'text-red')); ?>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6">
        <?php echo CHtml::activeLabelEx($model, 'lot_area'); ?>
        <?php echo CHtml::activeNumberField($model, 'lot_area', array('class' => 'form-control')); ?>
        <?php echo CHtml::error($model, 'lot_area', array('class' => 'text-red')); ?>
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

<div class="form-group">
    <?php echo CHtml::submitButton('Submit', array('class' => 'btn btn-primary')); ?>
    <?php echo CHtml::link('<< Back', $this->createUrl('requests/view', array('id' => $_GET['requestId'])), array('class' => 'btn btn-default')); ?>
</div>
<?php print CHtml::endForm(); ?>

