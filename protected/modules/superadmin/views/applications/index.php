<?php

    $this->breadcrumbs = array(
        'Applications',
    );

//    $this->menu = array(
//        array('label' => 'Create Applications', 'url' => array('create')),
//        array('label' => 'Manage Applications', 'url' => array('admin')),
//    );
?>

<?php

    $this->widget('zii.widgets.CListView', array(
        'dataProvider' => $dataProvider,
        'itemView' => '_view',
    ));
?>
