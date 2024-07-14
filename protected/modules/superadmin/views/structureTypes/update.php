<?php
    $this->breadcrumbs = array(
        'Structure Types' => array('index'),
        $model->name => array('view', 'id' => $model->id),
        'Update',
    );
?>

<div class="box">
    <div class="box-header">
        <h1 class="box-title">Update Structure Types</h1>
    </div>
    <div class="box-body">
        <?php echo $this->renderPartial('_form', array('model' => $model)); ?>
    </div>
</div>