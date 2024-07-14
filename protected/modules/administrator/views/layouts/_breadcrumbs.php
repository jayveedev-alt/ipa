
<?php

    if(isset($this->breadcrumbs)) {
        $this->widget('zii.widgets.CBreadcrumbs', array(
            'links' => $this->breadcrumbs,
        ));
    }