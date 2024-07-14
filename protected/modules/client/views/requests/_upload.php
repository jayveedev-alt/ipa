<?php print CHtml::beginForm('', 'POST', array('enctype' => 'multipart/form-data')); ?>
<div class="form-group">
    <?php echo CHtml::activeLabelEx($modelReq, 'files'); ?>
    <?php echo CHtml::activeFileField($modelReq, 'files[]', array('multiple' => 'multiple', 'class' => 'form-control')); ?>
    <?php echo CHtml::error($modelReq, 'files', array('class' => 'text-red')); ?>
    <small>Note: <i>Upload your requirements.</i></small>
</div>
<div class="form-group">
    <?php echo CHtml::submitButton('Upload', array('class' => 'btn btn-primary', 'name' => 'upload')); ?>
</div>
<?php print CHtml::endForm(); ?>