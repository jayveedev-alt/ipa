<?php print CHtml::beginForm('', 'POST', array()); ?>
<div class="box">
    <div class="box-header">
        <h1 class="box-title">Register Form</h1>
    </div>
    <div class="box-body">
        <?php $this->widget('Flashes'); ?>
        <div class="custom-form-group">
            <div class="user-type-button">
                <label>
                    <input type="radio" name="user-type" value="<?php echo Utilities::ROLE_CLIENT; ?>" <?php echo $userType == Utilities::ROLE_CLIENT ? 'checked="checked"' : '' ?>>
                    <span>Client</span>
                </label>
                <label hidden>
                    <input type="radio" name="user-type" value="<?php echo Utilities::ROLE_EMPLOYEE; ?>" <?php echo $userType == Utilities::ROLE_EMPLOYEE ? 'checked="checked"' : '' ?>>
                    <span>Employee</span>
                </label>
                <label>
                    <input type="radio" name="user-type" value="<?php echo Utilities::ROLE_ADMINISTRATOR; ?>" <?php echo $userType == Utilities::ROLE_ADMINISTRATOR ? 'checked="checked"' : '' ?>>
                    <span>Admin</span>
                </label>
            </div>
        </div>
        <div class="custom-form-group row">
            <div class="col-lg-6">
                <?php print CHtml::activeLabelEx($model, 'firstname'); ?>
                <?php print CHtml::activeTextField($model, 'firstname', array('class' => 'custom-form')); ?>
                <?php print CHtml::error($model, 'firstname', array('class' => 'text-red')); ?>
            </div>
            <div class="col-lg-6">
                <?php print CHtml::activeLabelEx($model, 'lastname'); ?>
                <?php print CHtml::activeTextField($model, 'lastname', array('class' => 'custom-form')); ?>
                <?php print CHtml::error($model, 'lastname', array('class' => 'text-red')); ?>
            </div>
        </div>
        <div class="custom-form-group row">
            <div class="col-lg-6">
                <?php print CHtml::activeLabelEx($model, 'email'); ?>
                <?php print CHtml::activeTextField($model, 'email', array('class' => 'custom-form')); ?>
                <?php print CHtml::error($model, 'email', array('class' => 'text-red')); ?>
            </div>
            <div class="col-lg-6">
                <?php print CHtml::activeLabelEx($model, 'username'); ?>
                <?php print CHtml::activeTextField($model, 'username', array('class' => 'custom-form')); ?>
                <?php print CHtml::error($model, 'username', array('class' => 'text-red')); ?>
            </div>
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
        <div class="custom-form-group text-center">
            <?php echo CHtml::submitButton('Register', array('class' => 'btn btn-primary')); ?>
        </div>
        <div class="custom-form-group text-center">
            <label>
                Already have an account?
                <?php print CHtml::link('Login', $this->createUrl('site/login'), array('class' => '')); ?>
            </label>
        </div>
    </div>
</div>
<?php print CHtml::endForm(); ?>

