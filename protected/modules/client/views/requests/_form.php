<?php print CHtml::beginForm('', 'POST', array('enctype' => 'multipart/form-data')); ?>
<div class="form-group">
    <?php echo CHtml::activeLabelEx($model, 'files'); ?>
    <?php echo CHtml::activeFileField($model, 'files[]', array('multiple' => 'multiple', 'class' => 'form-control')); ?>
    <?php echo CHtml::error($model, 'files', array('class' => 'text-red')); ?>
    <small>Note: <i>Upload your requirements.</i></small>
</div>
<div class="form-group">
    <?php echo CHtml::activeLabelEx($model, 'remarks'); ?>
    <?php echo CHtml::activeTextArea($model, 'remarks', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
    <?php echo CHtml::error($model, 'remarks', array('class' => 'text-red')); ?>
</div>
<div class="form-group">
    <?php echo CHtml::submitButton('Request', array('class' => 'btn btn-primary')); ?>
</div>
<?php print CHtml::endForm(); ?>

