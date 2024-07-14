<?php
    $this->breadcrumbs = array(
        'Applications' => array('index'),
        'Create',
    );

    $this->menu = array(
        array('label' => 'List Applications', 'url' => array('index')),
        array('label' => 'Manage Applications', 'url' => array('admin')),
    );
?>

<div class="box">
    <div class="box-header">
        <h1 class="box-title">Create Applications</h1>
    </div>
    <div class="box-body">
        <?php echo $this->renderPartial('_form', array('model' => $model)); ?>
    </div>
</div>