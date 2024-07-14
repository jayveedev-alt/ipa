

<p>Please fill out the following form with your login credentials:</p>

<div class="login-container">
    <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'login-form',
            'enableClientValidation' => true,
            'clientOptions' => array(
                'validateOnSubmit' => true,
            ),
        ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <div class="form-group">
        <?php echo $form->textField($model, 'username', array('class' => 'form-control')); ?>
        <?php echo $form->error($model, 'username', array('class' => 'text-red')); ?>
    </div>

    <div class="row">
        <?php echo $form->passwordField($model, 'password'); ?>
        <?php echo $form->error($model, 'password'); ?>
        <p class="hint">
            Hint: You may login with <kbd>demo</kbd>/<kbd>demo</kbd> or <kbd>admin</kbd>/<kbd>admin</kbd>.
        </p>
    </div>

    <div class="row rememberMe">
        <?php echo $form->checkBox($model, 'rememberMe'); ?>
        <?php echo $form->label($model, 'rememberMe'); ?>
        <?php echo $form->error($model, 'rememberMe'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Login'); ?>
    </div>

    <?php $this->endWidget(); ?>
</div><!-- form -->
