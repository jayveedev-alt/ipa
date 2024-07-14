<?php print CHtml::beginForm('', 'POST', array()); ?>
<div class="box">
    <div class="box-header">
        <h1 class="box-title">Login</h1>
    </div>
    <div class="box-body">
        <?php $this->widget('Flashes'); ?>
        <div class="custom-form-group ">
            <?php print CHtml::activeLabelEx($model, 'username'); ?>
            <?php print CHtml::activeTextField($model, 'username', array('class' => 'custom-form')); ?>
            <?php print CHtml::error($model, 'username', array('class' => 'text-red')); ?>
        </div>
        <div class="custom-form-group">
            <?php print CHtml::activeLabelEx($model, 'password'); ?>
            <?php print CHtml::activePasswordField($model, 'password', array('size' => 60, 'maxlength' => 100, 'class' => 'custom-form')); ?>
            <?php print CHtml::error($model, 'password', array('class' => 'text-red')); ?>
        </div>

        <div class="custom-form-group">
            <?php print CHtml::activeCheckBox($model, 'rememberMe', array('class' => 'custom-checkbox')); ?>
            <?php print CHtml::activeLabelEx($model, 'rememberMe', array('class' => '')); ?>
        </div>
        <div class="custom-form-group text-right">
            <?php print CHtml::link('Forgot password?', $this->createUrl('site/forgotPassword'), array('class' => '')); ?>
        </div>

    </div>
    <div class="box-footer text-center">
        <div class="custom-form-group">
            <?php echo CHtml::submitButton('Login', array('class' => 'btn btn-primary')); ?>
        </div>
        <div class="custom-form-group text-center">
            <label>
                Don't have an account?
                <?php print CHtml::link('Sign up here', $this->createUrl('site/register'), array('class' => '')); ?>
            </label>
        </div>
    </div>
</div>
<?php print CHtml::endForm(); ?>
