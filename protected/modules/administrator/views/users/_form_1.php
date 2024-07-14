<div class="form">

    <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'users-form',
            'enableAjaxValidation' => false,
        ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'created_at'); ?>
        <?php echo $form->textField($model, 'created_at'); ?>
        <?php echo $form->error($model, 'created_at'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'updated_at'); ?>
        <?php echo $form->textField($model, 'updated_at'); ?>
        <?php echo $form->error($model, 'updated_at'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'firstname'); ?>
        <?php echo $form->textField($model, 'firstname', array('size' => 60, 'maxlength' => 100)); ?>
        <?php echo $form->error($model, 'firstname'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'middlename'); ?>
        <?php echo $form->textField($model, 'middlename', array('size' => 50, 'maxlength' => 50)); ?>
        <?php echo $form->error($model, 'middlename'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'lastname'); ?>
        <?php echo $form->textField($model, 'lastname', array('size' => 50, 'maxlength' => 50)); ?>
        <?php echo $form->error($model, 'lastname'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'phone'); ?>
        <?php echo $form->textField($model, 'phone', array('size' => 12, 'maxlength' => 12)); ?>
        <?php echo $form->error($model, 'phone'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'email'); ?>
        <?php echo $form->textField($model, 'email', array('size' => 50, 'maxlength' => 50)); ?>
        <?php echo $form->error($model, 'email'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'address'); ?>
        <?php echo $form->textField($model, 'address', array('size' => 60, 'maxlength' => 100)); ?>
        <?php echo $form->error($model, 'address'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'city'); ?>
        <?php echo $form->textField($model, 'city', array('size' => 50, 'maxlength' => 50)); ?>
        <?php echo $form->error($model, 'city'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'province'); ?>
        <?php echo $form->textField($model, 'province', array('size' => 50, 'maxlength' => 50)); ?>
        <?php echo $form->error($model, 'province'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'region'); ?>
        <?php echo $form->textField($model, 'region', array('size' => 50, 'maxlength' => 50)); ?>
        <?php echo $form->error($model, 'region'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'zip_code'); ?>
        <?php echo $form->textField($model, 'zip_code'); ?>
        <?php echo $form->error($model, 'zip_code'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'position_id'); ?>
        <?php echo $form->textField($model, 'position_id'); ?>
        <?php echo $form->error($model, 'position_id'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->