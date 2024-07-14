<?php print CHtml::beginForm('', 'POST', array()); ?>
<div class="box">
    <div class="box-header">
        <h1 class="box-title">Forgot Password</h1>
    </div>
    <div class="box-body">
        <?php $this->widget('Flashes'); ?>
        <div class="custom-form-group">
            <?php print CHtml::activeLabelEx($model, 'username'); ?>
            <?php print CHtml::activeTextField($model, 'username', array('class' => 'custom-form', 'placeholder' => 'Email or username')); ?>
            <?php print CHtml::error($model, 'username', array('class' => 'text-red')); ?>
        </div>
        <div class="custom-form-group">
            <?php print CHtml::activeLabelEx($model, 'pass_hash'); ?>
            <?php print CHtml::activePasswordField($model, 'pass_hash', array('size' => 60, 'maxlength' => 100, 'class' => 'custom-form')); ?>
            <?php print CHtml::error($model, 'pass_hash', array('class' => 'text-red')); ?>
        </div>
        <div class="custom-form-group">
            <?php print CHtml::activeLabelEx($model, 'confirm_pass_hash'); ?>
            <?php print CHtml::activePasswordField($model, 'confirm_pass_hash', array('size' => 60, 'maxlength' => 100, 'class' => 'custom-form')); ?>
            <?php print CHtml::error($model, 'confirm_pass_hash', array('class' => 'text-red')); ?>
        </div>
    </div>
    <div class="box-footer">
        <div class="custom-form-group">
             <?php print CHtml::link('<< Back', $this->createUrl('site/login'), array('class' => 'btn btn-default')); ?>
            <?php echo CHtml::submitButton('Reset my password', array('class' => 'btn btn-primary')); ?>
        </div>
    </div>
</div>
<?php print CHtml::endForm(); ?>

