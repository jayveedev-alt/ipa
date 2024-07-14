<?php
    $this->breadcrumbs = array(
        'Structure Types',
    );

    $this->menu = array(
        array('label' => 'Create Structure Types', 'url' => array('create')),
        array('label' => 'Manage Structure Types', 'url' => array('admin')),
    );
?>

<?php

    $this->widget('zii.widgets.CListView', array(
        'dataProvider' => $dataProvider,
        'itemView' => '_view',
    ));
?>
