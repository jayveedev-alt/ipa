<?php print CHtml::beginForm('', 'POST', array('enctype' => 'multipart/form-data')); ?>
<div class="form-group row">
    <?php $this->widget('Flashes'); ?>
    <div class="col-lg-4">
        <?php echo CHtml::activeLabelEx($model, 'firstname'); ?>
        <?php echo CHtml::activeTextField($model, 'firstname', array('class' => 'form-control')); ?>
        <?php echo CHtml::error($model, 'firstname', array('class' => 'text-red')); ?>
    </div>
    <div class="col-lg-4">
        <?php echo CHtml::activeLabelEx($model, 'middlename'); ?>
        <?php echo CHtml::activeTextField($model, 'middlename', array('class' => 'form-control')); ?>
        <?php echo CHtml::error($model, 'middlename', array('class' => 'text-red')); ?>
    </div>
    <div class="col-lg-4">
        <?php echo CHtml::activeLabelEx($model, 'lastname'); ?>
        <?php echo CHtml::activeTextField($model, 'lastname', array('class' => 'form-control')); ?>
        <?php echo CHtml::error($model, 'lastname', array('class' => 'text-red')); ?>
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-4">
        <?php echo CHtml::activeLabelEx($model, 'phone'); ?>
        <?php echo CHtml::activeTextField($model, 'phone', array('class' => 'form-control')); ?>
        <?php echo CHtml::error($model, 'phone', array('class' => 'text-red')); ?>
    </div>
    <div class="col-lg-8">
        <?php echo CHtml::activeLabelEx($model, 'email'); ?>
        <?php echo CHtml::activeTextField($model, 'email', array('class' => 'form-control')); ?>
        <?php echo CHtml::error($model, 'email', array('class' => 'text-red')); ?>
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-12">
        <?php echo CHtml::activeLabelEx($model, 'address'); ?>
        <?php echo CHtml::activeTextField($model, 'address', array('class' => 'form-control')); ?>
        <?php echo CHtml::error($model, 'address', array('class' => 'text-red')); ?>
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-3">
        <?php echo CHtml::activeLabelEx($model, 'city'); ?>
        <?php echo CHtml::activeTextField($model, 'city', array('class' => 'form-control')); ?>
        <?php echo CHtml::error($model, 'city', array('class' => 'text-red')); ?>
    </div>
    <div class="col-lg-3">
        <?php echo CHtml::activeLabelEx($model, 'province'); ?>
        <?php echo CHtml::activeTextField($model, 'province', array('class' => 'form-control')); ?>
        <?php echo CHtml::error($model, 'province', array('class' => 'text-red')); ?>
    </div>
    <div class="col-lg-3">
        <?php echo CHtml::activeLabelEx($model, 'region'); ?>
        <?php echo CHtml::activeTextField($model, 'region', array('class' => 'form-control')); ?>
        <?php echo CHtml::error($model, 'region', array('class' => 'text-red')); ?>
    </div>
    <div class="col-lg-3">
        <?php echo CHtml::activeLabelEx($model, 'zip_code'); ?>
        <?php echo CHtml::activeTextField($model, 'zip_code', array('class' => 'form-control')); ?>
        <?php echo CHtml::error($model, 'zip_code', array('class' => 'text-red')); ?>
    </div>
</div>

<div class="form-group">
    <?php echo CHtml::submitButton('Update', array('class' => 'btn btn-primary')); ?>
</div>
<?php print CHtml::endForm(); ?>
