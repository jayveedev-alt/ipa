<nav class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <a class="sidebar-brand" href="#">
            <?php echo Utilities::get_appName(); ?>
        </a>
    </div>
    <div class="sidebar-nav">
        <?php
            $this->widget('zii.widgets.CMenu', array(
                'items' => array(
                    array('label' => 'Home', 'url' => array('/client/dashboard/index')),
                    array('label' => 'Requirements', 'url' => array('/client/dashboard/requirements')),
                    array('label' => 'How to Apply', 'url' => array('/client/dashboard/procedure')),
                    array('label' => 'Application Form', 'url' => array('/client/applications/new')),
                    array('label' => 'Sample Calculations', 'url' => array('/client/dashboard/computation')),
                    array('label' => 'Application Logs', 'url' => array('/client/requests/logs')),
                    array('label' => 'Logs', 'url' => array('/client/usersLog/admin')),
                    array('label' => 'Logout (' . Yii::app()->user->username . ') ', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
                ),
            ));
        ?>
    </div>
</nav>


