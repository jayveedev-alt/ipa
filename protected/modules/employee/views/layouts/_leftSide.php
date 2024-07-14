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
                    array('label' => 'Home', 'url' => array('/employee/dashboard/index')),
                    array('label' => 'Request', 'url' => array('/employee/requests/admin')),
                    //array('label' => 'Request Approved', 'url' => array('/employee/requests/approved')),
                    array('label' => 'Logout (' . Yii::app()->user->username . ') ', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
                ),
            ));
        ?>
    </div>
</nav>