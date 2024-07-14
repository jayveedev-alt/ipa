<div class="form">

    <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'positions-form',
            'enableAjaxValidation' => false,
        ));
    ?>

    <div class="form-group row">
        <div class="col-lg-4 col-md-6">
            <?php echo $form->labelEx($model, 'name'); ?>
            <?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'name'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-primary')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->