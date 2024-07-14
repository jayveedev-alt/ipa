<?php print CHtml::beginForm('', 'POST'); ?>
<div class="form-group row">
    <div class="col-lg-4"> 
        <?php echo CHtml::activeLabelEx($model, 'name'); ?>
        <?php echo CHtml::activeTextField($model, 'name', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
        <?php echo CHtml::error($model, 'name', array('class' => 'text-red')); ?>
    </div>
</div>
<div class="form-group">
    <?php print CHtml::activeCheckBox($model, 'is_with_free_text', array('class' => '')); ?>
    <?php print CHtml::activeLabelEx($model, 'is_with_free_text', array('class' => '')); ?>
</div>
<div class="form-group">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-primary')); ?>
    <?php
        if(!$model->isNewRecord) {
            print CHtml::link('<< Back', $this->createUrl('structureTypes/admin'), array('class' => 'btn btn-default'));
        }
    ?>
</div>
<?php print CHtml::endForm(); ?>

