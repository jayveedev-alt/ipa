<?php
    $this->breadcrumbs = array(
        'Documents' => array('admin'),
        'Create',
    );
?>

<div class="box">
    <div class="box-header">
        <h1 class="box-title">Create Documents</h1>
        <div class="box-action">
            <?php print CHtml::link('Manage/Search', $this->createUrl('documents/admin'), array('class' => 'box-icon')); ?>
        </div>
    </div>
    <div class="box-body">
        <?php echo $this->renderPartial('_form', array('model' => $model)); ?>
    </div>
</div>